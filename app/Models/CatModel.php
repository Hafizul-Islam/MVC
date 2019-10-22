<?php 
/**
 *  category model 
 */
class CatModel extends DbModel
{
	
	function __construct(){
		parent::__construct();
	}
	public function catlist($table)
	{	
		$data = array();
		$sql = "SELECT * FROM $table";
		return $this->db->select($sql,$data);
	}
	public function catById($table,$id)
	{
		$sql = "SELECT * FROM $table WHERE id=:id";
		$data = array(':id' => $id);
		return $this->db->select($sql,$data);
	}
	public function insertcat($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	public function updateCategory($table,$data,$condition)
	{
		return $this->db->update($table,$data,$condition);
	}
	public function deleteByCategory($table,$condition)
	{
		return $this->db->delete($table,$condition);
	}
}