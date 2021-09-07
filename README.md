## 使用

可选转换方案：

    - 内存型，适用于服务器内存空间较富余，优点：转换快
    - 小内存型(默认)，适用于内存比较紧张的环境，优点：占用内存小，转换不如内存型快
    - I/O型，适用于虚拟机，内存限制比较严格环境。优点：非常微小内存消耗。缺点：转换慢，不如内存型转换快,php >= 5.5

##安装

    使用 Composer 安装:
    composer require "overtrue/pinyin:~3.0" 使用 拼音数组

### 拼音数组

```php
use Overtrue\Pinyin\Pinyin;

// 小内存型
$pinyin = new Pinyin(); // 默认
// 内存型
// $pinyin = new Pinyin('Overtrue\Pinyin\MemoryFileDictLoader');
// I/O型
// $pinyin = new Pinyin('Overtrue\Pinyin\GeneratorFileDictLoader');

$pinyin->convert('带着希望去旅行，比到达终点更美好');
// ["dai", "zhe", "xi", "wang", "qu", "lv", "xing", "bi", "dao", "da", "zhong", "dian", "geng", "mei", "hao"]

$pinyin->convert('带着希望去旅行，比到达终点更美好', PINYIN_UNICODE);
// ["dài","zhe","xī","wàng","qù","lǚ","xíng","bǐ","dào","dá","zhōng","diǎn","gèng","měi","hǎo"]

$pinyin->convert('带着希望去旅行，比到达终点更美好', PINYIN_ASCII);
//["dai4","zhe","xi1","wang4","qu4","lv3","xing2","bi3","dao4","da2","zhong1","dian3","geng4","mei3","hao3"]
```

- 小内存型: 将字典分片载入内存
- 内存型: 将所有字典预先载入内存
- I/O型: 不载入内存，将字典使用文件流打开逐行遍历并运用php5.5生成器(yield)特性分配单行内存


选项：

|      选项      | 描述                                                |
| -------------  | ---------------------------------------------------|
| `PINYIN_NONE`   | 不带音调输出: `mei hao`                           |
| `PINYIN_ASCII`  | 带数字式音调：  `mei3 hao3`                    |
| `PINYIN_UNICODE`  | UNICODE 式音调：`měi hǎo`                    |

### 生成用于链接的拼音字符串

```php
$pinyin->permalink('带着希望去旅行'); // dai-zhe-xi-wang-qu-lv-xing
$pinyin->permalink('带着希望去旅行', '.'); // dai.zhe.xi.wang.qu.lv.xing
```

### 获取首字符字符串

```php
$pinyin->abbr('带着希望去旅行'); // dzxwqlx
$pinyin->abbr('带着希望去旅行', '-'); // d-z-x-w-q-l-x
```

### 翻译整段文字为拼音

将会保留中文字符：`，。 ！ ？ ： “ ” ‘ ’` 并替换为对应的英文符号。

```php
$pinyin->sentence('带着希望去旅行，比到达终点更美好！');
// dai zhe xi wang qu lv xing, bi dao da zhong dian geng mei hao!

$pinyin->sentence('带着希望去旅行，比到达终点更美好！', true);
// dài zhe xī wàng qù lǚ xíng, bǐ dào dá zhōng diǎn gèng měi hǎo!
```

### 翻译姓名

姓名的姓的读音有些与普通字不一样，比如 ‘单’ 常见的音为 `dan`，而作为姓的时候读 `shan`。

```php
$pinyin->name('单某某'); // ['shan', 'mou', 'mou']
$pinyin->name('单某某', PINYIN_UNICODE); // ["shàn","mǒu","mǒu"]
```
### 引入方式请查看根目录 index.php
