--TEST--
SPL: SplEnum
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
<?php if (!extension_loaded("reflection")) print "skip reflection not available"; ?>
--FILE--
<?php

class MyIntEnum extends SplEnum
{
	const one = 1;
	const two = 2;

	const __default = MyIntEnum::one;
}

echo "==INT==\n";
$r1 = new ReflectionClass('MyIntEnum');
var_dump($r1->getConstants());

echo "==NEW==\n";
$e1 = new MyIntEnum;
var_dump($e1);
echo "$e1\n";

echo "==ASSIGN==\n";
$x1 = $e1;
var_dump($x1);
echo "$x1\n";
$y1 = "Bar" . $e1;

echo "==CHANGE==\n";
$e1 = 2;
var_dump($e1);
echo "$e1\n";

echo "==ADD==\n";
$y1 = 2 + $e1;
var_dump($y1);
echo "$y1\n";

echo "==CONCAT==\n";
$y1 = "Wee" . $e1;
var_dump($y1);
echo "$y1\n";

echo "==CONV==\n";
$e1 = "2";
var_dump($e1);
echo "$e1\n";

echo "==FAIL==\n";
try
{
	$e1 = 7;
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e1);
echo "$e1\n";

class MyStrEnum extends SplEnum
{
	const foo = "Foo";
	const bar = "Bar";
	const __default = MyStrEnum::foo;
}

echo "==STR==\n";
$r2 = new ReflectionClass('MyStrEnum');
var_dump($r2->getConstants());

echo "==NEW==\n";
$e2 = new MyStrEnum;
var_dump($e2);
echo "$e2\n";

echo "==ASSIGN==\n";
$x2 = $e2;
var_dump($x2);
echo "$x2\n";

echo "==CHANGE==\n";
$e2 = "Bar";
var_dump($e2);
echo "$e2\n";

echo "==ADD==\n";
$y2 = 2 + $e2;
var_dump($y2);
echo "$y2\n";

echo "==CONCAT==\n";
$y2 = "Wee" . $e2;
var_dump($y2);
echo "$y2\n";

echo "==FAIL==\n";
try
{
	$e2 = "Baz";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e2);
echo "$e2\n";

echo "==EXTEND==\n";

class MyStrEnumEx extends MyStrEnum
{
	const bar = "Baz";
	const bla = "Bla";
	const __default = "def";
}

echo "==STR==\n";
$r3 = new ReflectionClass('MyStrEnumEx');
var_dump($r3->getConstants());

echo "==NEW==\n";
$e3 = new MyStrEnumEx;
var_dump($e3);
echo "$e3\n";

echo "==ASSIGN==\n";
$x3 = $e3;
var_dump($x3);
echo "$x3\n";

echo "==CHANGE==\n";
$e3 = "def";
var_dump($e3);
echo "$e3\n";

echo "==ADD==\n";
$y3 = 3 + $e3;
var_dump($y3);
echo "$y3\n";

echo "==CONCAT==\n";
$y3 = "Bar" . $e3;
var_dump($y3);
echo "$y3\n";

echo "==FAIL==\n";
try
{
	$e3 = "Bar";
}
catch(UnexpectedValueException $err)
{
	var_dump($err->getMessage());
}
var_dump($e3);
echo "$e3\n";

echo "==ASSIGN==\n";
$e2 = "Foo";
$e3 = $e2;
var_dump($e3);
echo "$e3\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
==INT==
array(3) {
  ["one"]=>
  int(1)
  ["two"]=>
  int(2)
  ["__default"]=>
  int(1)
}
==NEW==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==ASSIGN==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==CHANGE==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==ADD==
int(4)
4
==CONCAT==
string(4) "Wee2"
Wee2
==CONV==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==FAIL==
string(35) "Value not a const in enum MyIntEnum"
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==STR==
array(3) {
  ["foo"]=>
  string(3) "Foo"
  ["bar"]=>
  string(3) "Bar"
  ["__default"]=>
  string(3) "Foo"
}
==NEW==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
==ASSIGN==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
==CHANGE==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Bar"
}
Bar
==ADD==
int(2)
2
==CONCAT==
string(6) "WeeBar"
WeeBar
==FAIL==
string(35) "Value not a const in enum MyStrEnum"
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Bar"
}
Bar
==EXTEND==
==STR==
array(4) {
  ["bar"]=>
  string(3) "Baz"
  ["bla"]=>
  string(3) "Bla"
  ["__default"]=>
  string(3) "def"
  ["foo"]=>
  string(3) "Foo"
}
==NEW==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  string(3) "def"
}
def
==ASSIGN==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  string(3) "def"
}
def
==CHANGE==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  string(3) "def"
}
def
==ADD==
int(3)
3
==CONCAT==
string(6) "Bardef"
Bardef
==FAIL==
string(37) "Value not a const in enum MyStrEnumEx"
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  string(3) "def"
}
def
==ASSIGN==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
===DONE===
--UEXPECTF--
==INT==
array(3) {
  [u"one"]=>
  int(1)
  [u"two"]=>
  int(2)
  [u"__default"]=>
  int(1)
}
==NEW==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==ASSIGN==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==CHANGE==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==ADD==
int(4)
4
==CONCAT==
unicode(4) "Wee2"
Wee2
==CONV==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==FAIL==
unicode(35) "Value not a const in enum MyIntEnum"
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(2)
}
2
==STR==
array(3) {
  [u"foo"]=>
  unicode(3) "Foo"
  [u"bar"]=>
  unicode(3) "Bar"
  [u"__default"]=>
  unicode(3) "Foo"
}
==NEW==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
==ASSIGN==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
==CHANGE==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Bar"
}
Bar
==ADD==
int(2)
2
==CONCAT==
unicode(6) "WeeBar"
WeeBar
==FAIL==
unicode(35) "Value not a const in enum MyStrEnum"
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Bar"
}
Bar
==EXTEND==
==STR==
array(4) {
  [u"bar"]=>
  unicode(3) "Baz"
  [u"bla"]=>
  unicode(3) "Bla"
  [u"__default"]=>
  unicode(3) "def"
  [u"foo"]=>
  unicode(3) "Foo"
}
==NEW==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  unicode(3) "def"
}
def
==ASSIGN==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  unicode(3) "def"
}
def
==CHANGE==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  unicode(3) "def"
}
def
==ADD==
int(3)
3
==CONCAT==
unicode(6) "Bardef"
Bardef
==FAIL==
unicode(37) "Value not a const in enum MyStrEnumEx"
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  unicode(3) "def"
}
def
==ASSIGN==
object(MyStrEnumEx)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
===DONE===
