<?php

class Helpers{
	
	private $post;
	private $get;
	private $session;
	
	public function post($index=null){
		if($index){
			return $_POST[$index];
		}else{
			return $_POST;
		}
	}
	
	public function get($index=null){
		if($index){
			return $_GET[$index];
		}else{
			return $_GET;
		}
	}
	
}