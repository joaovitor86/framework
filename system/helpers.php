<?php

class Helpers{

	private $file;
	
	public function post($index=null){
		if($_POST){
			if($index){
				return $_POST[$index];
			}else{
				return $_POST;
			}
		}
	}
	
	public function get($index=null){
		if($_GET){
			if($index){
				return $_GET[$index];
			}else{
				return $_GET;
			}
		}
	}

	public function upload($name=null, $dir='upload'){
		if($_FILES){
			$field = array_keys($_FILES)[0];
			$file = $_FILES[$field];
			$tmp = $file['tmp_name'];
			$name = ($name) ? $name : $file['name'];
			$this->file = $file;
			if(move_uploaded_file($tmp, ROOT.$dir.DS.$name)){
				return $this->file;
			}else{
				return false;
			}
		}
	}
}