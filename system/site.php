<?php

class Site{
	
	private $dao;
	private $docks = [];
	private $types = [0 => 'banner', 1 => 'dock', 2 => 'dock highlight1', 3 => 'dock highlight2'];
	private $tags = ['h1','h2','h3','h4','h5','h6','p'];
	private $menus = [];
	
	public function __construct(){
		$this->dao = new DAO();
	}
	
	public function getDocks(){
		$docks = $this->dao->select('docks', '*', 'WHERE owner = ' . OWNER_ID . ' ORDER BY position');
		foreach($docks as $dock){
			$h = ($dock['type'] > 0) ? 'h3' : 'h2';
			$t = ($dock['type'] > 0) ? 'p' : 'h3';
			$b = ($dock['button']) ? "<a class='calltoaction' href='$dock[link]'>$dock[button]</a>" : NULL;
			$html  = "<article class='{$this->types[$dock['type']]}' id='dock-$dock[id]'><$h>$dock[title]</$h><$t>$dock[html]</$t>$b</article>";
			array_push($this->docks, $html);
		}
		return implode("\n\t\t\t\t", $this->docks) . "\n";
	}
	
	public function getMenu(){
		$menus = $this->dao->select('menus', '*','WHERE owner = ' . OWNER_ID . ' ORDER BY position');
		foreach ($menus as $menu){
			$html = "<a title='$menu[title]' href='$menu[url]'>$menu[text]</a>";
			array_push($this->menus, $html);
		}
		return implode("\n", $this->menus) . "\n";
	}
}