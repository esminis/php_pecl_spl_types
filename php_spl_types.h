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

#ifndef PHP_SPL_TYPES_H
#define PHP_SPL_TYPES_H

#include "php.h"
#include <stdarg.h>

extern zend_module_entry spl_types_module_entry;
#define phpext_spl_types_ptr &spl_types_module_entry

#define PHP_SPL_TYPES_VERSION "0.4.0-dev"

PHP_MINFO_FUNCTION(spl_types);

#ifdef PHP_WIN32
# ifdef SPL_TYPES_EXPORTS
#  define SPL_TYPES_API __declspec(dllexport)
# elif defined(COMPILE_DL_SPL)
#  define SPL_TYPES_API __declspec(dllimport)
# else
#  define SPL_TYPES_API /* nothing */
# endif
#else
# define SPL_TYPES_API
#endif

#if defined(PHP_WIN32) && !defined(COMPILE_DL_SPL_TYPES)
#undef phpext_spl_types
#define phpext_spl_types NULL
#endif

#endif /* PHP_SPL_TYPES_H */

/*
 * Local Variables:
 * c-basic-offset: 4
 * tab-width: 4
 * End:
 * vim600: fdm=marker
 * vim: noet sw=4 ts=4
 */
