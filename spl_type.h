/*
   +----------------------------------------------------------------------+
   | PHP Version 5                                                        |
   +----------------------------------------------------------------------+
   | Copyright (c) 1997-2006 The PHP Group                                |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
   | Authors: Marcus Boerger <helly@php.net>                              |
   +----------------------------------------------------------------------+
 */

/* $Id$ */

#ifndef SPL_TYPE_H
#define SPL_TYPE_H

#include "php.h"
#include "php_spl_types.h"

SPL_TYPES_API zend_class_entry  *spl_ce_SplType;
SPL_TYPES_API zend_class_entry  *spl_ce_SplEnum;
SPL_TYPES_API zend_class_entry  *spl_ce_SplBool;
SPL_TYPES_API zend_class_entry  *spl_ce_SplInt;

PHP_MINIT_FUNCTION(spl_type);

typedef struct _spl_type_object  spl_type_object;

typedef struct _spl_type_set_info {
	spl_type_object    *object;
	zval               *value;
	int                done;
} spl_type_set_info;

typedef void (*spl_type_set_t)(spl_type_set_info *inf TSRMLS_DC);

struct _spl_type_object {
	zend_object        std;
	zval               *value;
	zend_bool          strict;
	spl_type_set_t     set;
	HashTable          *properties_copy;
};

#endif /* SPL_TYPE_H */

/*
 * Local Variables:
 * c-basic-offset: 4
 * tab-width: 4
 * End:
 * vim600: fdm=marker
 * vim: noet sw=4 ts=4
 */
