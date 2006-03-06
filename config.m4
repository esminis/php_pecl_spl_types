dnl $Id$
dnl config.m4 for extension SPL Types

PHP_ARG_ENABLE(spl-types, enable SPL Type suppport,
[  --disable-spl-types     Disable SPL Type], yes)

if test "$PHP_SPL_TYPES" != "no"; then
  AC_DEFINE(HAVE_SPL_TYPES, 1, [Whether you want SPL Type support]) 
  PHP_NEW_EXTENSION(spl_types, php_spl_types.c spl_type.c, $ext_shared)
  PHP_ADD_EXTENSION_DEP(spl_types, spl)
fi
