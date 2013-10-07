--TEST--
SPL: SplString
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
--FILE--
<?php

echo "==NEW==\n";
$e1 = new SplString();
var_dump($e1);
echo "$e1\n";

echo "==PASS==\n";
$e1 = "String";
var_dump($e1);
echo "$e1\n";
$e1 = "Second String";
var_dump($e1);
echo "$e1\n";

echo "==FAIL==\n";
try
{
	$e1 = array();
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
object(SplString)#1 (1) {
  ["__default"]=>
  string(0) ""
}

==PASS==
object(SplString)#1 (1) {
  ["__default"]=>
  string(6) "String"
}
String
object(SplString)#1 (1) {
  ["__default"]=>
  string(13) "Second String"
}
Second String
==FAIL==
string(18) "Value not a string"
object(SplString)#1 (1) {
  ["__default"]=>
  string(13) "Second String"
}
Second String
===DONE===
