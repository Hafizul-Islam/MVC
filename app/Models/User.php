<?php 
/**
 *  user model 
 */
class User extends DbModel
{
	
	function __construct(){
		parent::__construct();
	}
	public function userList($table)
	{	
		$data = array();
		$sql = "SELECT * FROM $table";
		return $this->db->select($sql,$data);
	}
	public function insertUser($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	public function userChack($table,$username,$password)
	{	
		$sql = "SELECT * FROM $table WHERE username=? AND password=?";
		return $this->db->ChackUser($sql,$username,$password);
	}
	public function userData($table,$username,$password)
	{	
		$sql = "SELECT * FROM $table WHERE username=? AND password=?";
		return $this->db->UserValue($sql,$username,$password);
	}
	public function deleteUser($table,$condition)
	{
		return $this->db->delete($table,$condition);
	}

}