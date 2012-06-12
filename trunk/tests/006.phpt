--TEST--
SPL: SplEnum with strings and new parameter parsing api
--SKIPIF--
<?php if (!extension_loaded("spl_types")) die("skip"); ?>
<?php if (version_compare(PHP_VERSION, "5.2", "<")) die("skip requires 5.2"); ?>
--FILE--
<?php

class MyStrEnum extends SplEnum
{
	const text = "The quick brown fox jumped over the lazy dog.";
	const __default = MyStrEnum::text;

	function __construct()
	{
		parent::__construct(self::__default, true);
	}
}

$e = new MyStrEnum;
var_dump($e);
var_dump(wordwrap($e, 20, "|\n"));
var_dump($e);
var_dump(wordwrap($e, 20, "|\n"));

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(45) "The quick brown fox jumped over the lazy dog."
}
string(47) "The quick brown fox|
jumped over the lazy|
dog."
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(45) "The quick brown fox jumped over the lazy dog."
}
string(47) "The quick brown fox|
jumped over the lazy|
dog."
===DONE===
--UEXPECTF--
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(45) "The quick brown fox jumped over the lazy dog."
}
string(47) "The quick brown fox|
jumped over the lazy|
dog."
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(45) "The quick brown fox jumped over the lazy dog."
}
string(47) "The quick brown fox|
jumped over the lazy|
dog."
===DONE===
