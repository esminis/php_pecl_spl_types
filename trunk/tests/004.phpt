--TEST--
SPL: SplInt
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
--FILE--
<?php

echo "==NEW==\n";
$e1 = new SplInt;
var_dump($e1);
echo "$e1\n";

echo "==PASS==\n";
$e1 = 1;
var_dump($e1);
echo "$e1\n";
$e1 = 0;
var_dump($e1);
echo "$e1\n";

echo "==STRING==\n";
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

echo "==FAIL==\n";
$e2 = new SplInt(0, true);
try
{
	$e2 = "xyz";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e2);
echo "$e2\n";

echo "===STRICT:1<2==\n"; // not getting strict
$e3 = new SplInt(0, false);
try
{
	$e3 = "xyz";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e3);
echo "$e3\n";

echo "===STRICT:2>1==\n"; // staying strict
$e4 = new SplInt(0, true);
try
{
	$e4 = "xyz";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e4);
echo "$e4\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
==NEW==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==PASS==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(1)
}
1
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==STRING==
string(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==FAIL==
string(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===STRICT:1<2==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===STRICT:2>1==
string(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===DONE===
--UEXPECTF--
==NEW==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==PASS==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(1)
}
1
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==STRING==
unicode(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
==FAIL==
unicode(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===STRICT:1<2==
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===STRICT:2>1==
unicode(20) "Value not an integer"
object(SplInt)#%d (1) {
  ["__default"]=>
  int(0)
}
0
===DONE===
