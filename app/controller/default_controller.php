<?php

class Default_Controller{
		
	protected $helper;
	protected $load;
	protected $dao;
	
	public function __construct(){
		$this->helper();
		$this->dao();
	}
	
	public function __call($name,$args){
		$data['url'] = $_SERVER['REQUEST_URI'];
		$this->view('404',$data);
	}
		
	public function helper(){
		$this->helper = new Helpers();
	}
	
	public function dao(){
		$this->dao = new DAO();
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