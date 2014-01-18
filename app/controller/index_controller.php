<?php

class Index_Controller extends Default_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data['value'] = $this->dao->select('users', '*');
		$this->view('home', $data);
	}
	
}