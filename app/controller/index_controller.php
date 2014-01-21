<?php

class Index_Controller extends Default_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$p = new Site();
		$data['site_name'] = 'Nome do Site';
		$data['site_title'] = 'Nome do Site';
		$data['menu_header'] = $p->getMenu();
		$data['content'] = $p->getDocks();		
		$this->load->view('home', $data);
	}
	
}