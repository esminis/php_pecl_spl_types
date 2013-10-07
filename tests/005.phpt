--TEST--
SPL: SplEnum::getConstList()
--SKIPIF--
<?php if (!extension_loaded("spl_types")) print "skip"; ?>
<?php if (!extension_loaded("reflection")) print "skip reflection not available"; ?>
--FILE--
<?php

function test($cname)
{
	echo "===$cname===\n";
	eval('$x = new '.$cname.'; var_dump($x->getConstList());');
	eval('$x = new '.$cname.'; var_dump($x->getConstList(true));');
}

test('SplBool');

class MyIntEnum extends SplEnum
{
	const one = 1;
	const two = 2;

	const __default = MyIntEnum::one;
}

test('MyIntEnum');

class MyStrEnum extends SplEnum
{
	const foo = "Foo";
	const bar = "Bar";
	const __default = MyStrEnum::foo;
}

test('MyStrEnum');

class MyStrEnumEx extends MyStrEnum
{
	const bar = "Baz";
	const bla = "Bla";
	const __default = "def";
}

test('MyStrEnumEx');
test('MyStrEnumEx');

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
===SplBool===
array(2) {
  ["false"]=>
  bool(false)
  ["true"]=>
  bool(true)
}
array(3) {
  ["__default"]=>
  bool(false)
  ["false"]=>
  bool(false)
  ["true"]=>
  bool(true)
}
===MyIntEnum===
array(2) {
  ["one"]=>
  int(1)
  ["two"]=>
  int(2)
}
array(3) {
  ["one"]=>
  int(1)
  ["two"]=>
  int(2)
  ["__default"]=>
  int(1)
}
===MyStrEnum===
array(2) {
  ["foo"]=>
  string(3) "Foo"
  ["bar"]=>
  string(3) "Bar"
}
array(3) {
  ["foo"]=>
  string(3) "Foo"
  ["bar"]=>
  string(3) "Bar"
  ["__default"]=>
  string(3) "Foo"
}
===MyStrEnumEx===
array(3) {
  ["bar"]=>
  string(3) "Baz"
  ["bla"]=>
  string(3) "Bla"
  ["foo"]=>
  string(3) "Foo"
}
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
===MyStrEnumEx===
array(3) {
  ["bar"]=>
  string(3) "Baz"
  ["bla"]=>
  string(3) "Bla"
  ["foo"]=>
  string(3) "Foo"
}
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
===DONE===
--UEXPECT--
===SplBool===
array(2) {
  [u"false"]=>
  bool(false)
  [u"true"]=>
  bool(true)
}
array(3) {
  [u"__default"]=>
  bool(false)
  [u"false"]=>
  bool(false)
  [u"true"]=>
  bool(true)
}
===MyIntEnum===
array(2) {
  [u"one"]=>
  int(1)
  [u"two"]=>
  int(2)
}
array(3) {
  [u"one"]=>
  int(1)
  [u"two"]=>
  int(2)
  [u"__default"]=>
  int(1)
}
===MyStrEnum===
array(2) {
  [u"foo"]=>
  unicode(3) "Foo"
  [u"bar"]=>
  unicode(3) "Bar"
}
array(3) {
  [u"foo"]=>
  unicode(3) "Foo"
  [u"bar"]=>
  unicode(3) "Bar"
  [u"__default"]=>
  unicode(3) "Foo"
}
===MyStrEnumEx===
array(3) {
  [u"bar"]=>
  unicode(3) "Baz"
  [u"bla"]=>
  unicode(3) "Bla"
  [u"foo"]=>
  unicode(3) "Foo"
}
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
===MyStrEnumEx===
array(3) {
  [u"bar"]=>
  unicode(3) "Baz"
  [u"bla"]=>
  unicode(3) "Bla"
  [u"foo"]=>
  unicode(3) "Foo"
}
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
===DONE===
