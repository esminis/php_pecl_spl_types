--TEST--
SPL: SplBool
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
--FILE--
<?php

echo "==NEW==\n";
$e1 = new SplBool;
var_dump($e1);
echo "$e1\n";

echo "==PASS==\n";
$e1 = 1;
var_dump($e1);
echo "$e1\n";
$e1 = 0;
var_dump($e1);
echo "$e1\n";

echo "==FAIL==\n";
try
{
	$e1 = "xyz";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e1);
echo "$e1\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
==NEW==
object(SplBool)#%d (1) {
  ["__default"]=>
  bool(false)
}

==PASS==
object(SplBool)#%d (1) {
  ["__default"]=>
  bool(true)
}
1
object(SplBool)#%d (1) {
  ["__default"]=>
  bool(false)
}

==FAIL==
object(SplBool)#%d (1) {
  ["__default"]=>
  bool(true)
}
1
===DONE===
