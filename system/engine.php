<?php

class Engine{
	
	private $params;
	private $controller;
	private $action;
	
	public function __construct(){
		$this->setParams();
		$this->setController();
		$this->setAction();
		$this->start();
	}
	
	private function setParams(){
		$raw = (isset($_GET['param'])) ? $_GET['param'] : 'index/index';
		$raw = (strpos($raw, '/')) ? $raw : $raw.'/index';
		$param = explode('/',$raw);
		$param[1] = ($param[1]!="") ? $param[1] : 'index';
		$this->params = array_combine(['controller','action'], $param);  
	}
	
	private function setController(){
		$this->controller = $this->params['controller'];
	}
	
	private function setAction(){
		$this->action = $this->params['action'];
	}
	
	public function getController(){
		return $this->controller;
	}
	
	public function getAction(){
		return $this->action;
	}
	
	public function start(){
		$c = $this->getController() . '_Controller';
		$a = $this->getAction();
		$c = new $c();
		$c->$a();
	}
}