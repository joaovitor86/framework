<?php

class Session{
	
	private $id;
	
	public function start($id = null){
		$this->id = session_id($id);
		session_start();
	}
	
	public function set($name, $value){
		$_SESSION[$name] = $value;
	}
	
	public function get($name){
		return $_SESSION[$name];
	}
	
	public function destroy(){
		session_destroy();
	}
	
	public function expire($t){
		session_cache_limiter('private');
		session_cache_expire($t);
	}
	
}