<?php
error_reporting(E_ALL | E_STRICT);

define('CLASS_DIR','/var/www/prestashop/classes');
define ('CONFIG_DIR','/var/www/prestashop/config');
define('PHPUNIT_DIR','/usr/share/php/PHPUnit34/usr/share/php/PHPUnit');//version 3.4
define('TEST_DIR','/var/www/prestashop/modules/firstPrestaModule');


set_include_path (get_include_path().PATH_SEPARATOR . CLASS_DIR);
set_include_path (get_include_path().PATH_SEPARATOR . CONFIG_DIR);
set_include_path (get_include_path().PATH_SEPARATOR . PHPUNIT_DIR);
set_include_path (get_include_path().PATH_SEPARATOR . TEST_DIR);
/**
 * Any other component that registers an autoloader unregisters the default __autoload().
 *
 */
require_once 'autoload.php';
spl_autoload_register('__autoload');