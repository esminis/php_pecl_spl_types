--TEST--
SPL: SplEnum, strict mode
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
--FILE--
<?php

class MyIntEnum extends SplEnum
{
	const one = 1;
	const two = 2;

	const __default = MyIntEnum::one;
	
	function __construct()
	{
		parent::__construct(self::__default, true);
	}
}

echo "==NEW==\n";
$e1 = new MyIntEnum;
var_dump($e1);
echo "$e1\n";

echo "==PASS==\n";
$e1 = 1;
var_dump($e1);
echo "$e1\n";
$e1 = 2;
var_dump($e1);
echo "$e1\n";

echo "==FAIL==\n";
try
{
	$e1 = "2";
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

	function __construct()
	{
		parent::__construct(self::__default, true);
	}
}

echo "==NEW==\n";
$e2 = new MyStrEnum;
var_dump($e2);
echo "$e2\n";

echo "==PASS==\n";
$e2 = "Bar";
var_dump($e2);
echo "$e2\n";
$e2 = "Foo";
var_dump($e2);
echo "$e2\n";

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

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
==NEW==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==PASS==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
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
==NEW==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
==PASS==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Bar"
}
Bar
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
==FAIL==
string(35) "Value not a const in enum MyStrEnum"
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  string(3) "Foo"
}
Foo
===DONE===
--UEXPECTF--
==NEW==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
==PASS==
object(MyIntEnum)#%d (1) {
  ["__default"]=>
  int(1)
}
1
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
==NEW==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
==PASS==
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Bar"
}
Bar
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
==FAIL==
unicode(35) "Value not a const in enum MyStrEnum"
object(MyStrEnum)#%d (1) {
  ["__default"]=>
  unicode(3) "Foo"
}
Foo
===DONE===
