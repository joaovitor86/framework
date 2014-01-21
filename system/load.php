<?php

class Load{
	
	public function model($name){
		$class = "{$name}_Model";
		return new $class();
	}
	
	public function controller($name){
		$class = "{$name}_Controller";
		return new $class();
	}
	
	public function view($file, $data=null){
		$path = './app/view/'. $file . '.phtml';
		if(file_exists($path)){
			include $path;
		}else{
			echo '<h1>Error!</h1>';
			echo "View file <a href='$path'>$path</a> not found!";
		}
	}
	
} 