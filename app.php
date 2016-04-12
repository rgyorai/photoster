<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

define('API_VERSION', 'v1');
define('API_ROOT_PATH', '/api/'.API_VERSION.'/');
define('ADMIN_ROOT_PATH', '/admin/');

foreach(glob('../controllers/*') as $file) {
	if(is_file($file)) {
		require 'controllers/'.$file;
	}
}