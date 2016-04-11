<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

foreach(glob('../controllers/*') as $file) {
	if(is_file($file)) {
		require 'controllers/'.$file;
	}
}