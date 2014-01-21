<?php

class Default_Controller{
		
	protected $helper;
	protected $dao;
	protected $session;
	protected $load;
	
	public function __construct(){
		$this->helper();
		$this->dao();
		$this->session();
		$this->load();
	}
	
	public function __call($name,$args){
		$data['url'] = $_SERVER['REQUEST_URI'];
		$this->load->view('404',$data);
	}

	private function helper(){
		$this->helper = new Helpers();
	}
	
	private function dao(){
		$this->dao = new DAO();
	}
	
	private function session(){
		$this->session = new Session();
	}
	
	private function load(){
		$this->load = new Load();
	}
}