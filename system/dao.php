<?php

class DAO{

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $base = DB_BASE;
	private $conn;
	
	public function __construct(){
		$this->conn = new PDO("mysql:host=$this->host;dbname=$this->base",$this->user,$this->pass);
	}
	
	public function select($table,$col,$param=null){
		$sql = "SELECT $col FROM $table $param";
		try{
			$res = $this->conn->query($sql);
			return $res->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function insert($table,array $values){
		$key = implode(',', array_keys($values));
		$val = "'" . implode("','", array_values($values)) . "'";
		$sql = "INSERT INTO `$table`($key) VALUES($val)";
		try{
			$res = $this->conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return $res;
	}
	
	public function update($table,array $values,$where){
		$v = [];
		foreach($values as $key => $val){
			array_push($v, " $key = '$val'");
		}
		$sql = "UPDATE `$table` SET " . implode(',', $v) . " WHERE $where";
		try{
			$res = $this->conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return $res;
	}
	
	public function delete($table,$where){
		$sql = "DELETE FROM `$table` WHERE $where";
		try{
			$res = $this->conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return $res;
	}

}

