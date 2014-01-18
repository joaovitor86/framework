<?php
function __autoload($class){
	$x = explode('_', $class);
	$path = (count($x) > 1) ? './app'.DS.strtolower($x[1].DS.$class).'.php' : './system'.DS.strtolower($class).'.php';
	if(file_exists($path)){
		include $path;
	}else{
		$data['url'] = $_SERVER['REQUEST_URI'];
		include './app/view/404.phtml';
		exit();
	}
}