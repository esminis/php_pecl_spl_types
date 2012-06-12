/*
   +----------------------------------------------------------------------+
   | PHP Version 5                                                        |
   +----------------------------------------------------------------------+
   | Copyright (c) 1997-2008 The PHP Group                                |
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

#ifdef HAVE_CONFIG_H
	#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "ext/standard/info.h"
#include "php_spl_types.h"
#include "spl_type.h"

#ifdef COMPILE_DL_SPL_TYPES
ZEND_GET_MODULE(spl_types)
#endif

/* {{{ spl_functions_none
 */
zend_function_entry spl_types_functions[] = {
	{NULL, NULL, NULL}
};
/* }}} */

PHP_MINIT_FUNCTION(spl_types) /* {{{ */
{
	PHP_MINIT(spl_type)(INIT_FUNC_ARGS_PASSTHRU);

	return SUCCESS;
}
/* }}} */

static zend_module_dep spl_types_deps[] = {
	ZEND_MOD_REQUIRED("spl")
	{NULL, NULL, NULL}
};

zend_module_entry spl_types_module_entry = { /* {{{ */
	STANDARD_MODULE_HEADER_EX, NULL,
	spl_types_deps,
	"SPL_Types",
	spl_types_functions,
	PHP_MINIT(spl_types),
	NULL,
	NULL,
	NULL,
	PHP_MINFO(spl_types),
	PHP_SPL_TYPES_VERSION,
	STANDARD_MODULE_PROPERTIES
};
/* }}} */

/* {{{ PHP_MINFO(spl_types)
 */
PHP_MINFO_FUNCTION(spl_types)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "SPL Types support", "enabled");
	php_info_print_table_row(2, "Version", PHP_SPL_TYPES_VERSION);
	php_info_print_table_end();
}
/* }}} */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: fdm=marker
 * vim: noet sw=4 ts=4
 */
