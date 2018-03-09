<?php

include "src/DictLoaderInterface.php";
include "src/FileDictLoader.php";

include "src/Pinyin.php";
use Overtrue\Pinyin\Pinyin;
$pinyin = new Pinyin();	

//echo $pinyin->permalink('厦门大厦厦门大学!'); // dai-zhe-xi-wang-qu-lv-xing
echo $pinyin->abbr('厦门大厦厦门大学!'); 
	
?>


