<?php 
/**
 *  category model 
 */
class Post extends DbModel
{
	
	function __construct(){
		parent::__construct();
	}
	public function getAllPost($table)
	{	
		$data = array();
		$sql = "SELECT * FROM $table order by id desc limit 6";
		return $this->db->select($sql,$data);
	}
	public function getPostList($table)
	{	
		$data = array();
		$sql = "SELECT * FROM $table order by id desc";
		return $this->db->select($sql,$data);
	}
	public function latestPost($table,$limit)
	{	
		$data = array();
		$sql = "SELECT * FROM $table order by id desc limit $limit";
		return $this->db->select($sql,$data);
	}
	public function getPostById($post,$category,$id)
	{
		$data = array();
		$sql = "SELECT $post.*, $category.category_name FROM $post
		INNER JOIN  $category
		ON $post.categoryId = $category.id
		where $post.id = $id";

		return $this->db->select($sql,$data);
	}
	public function getPostByCategory($post,$category,$id)
	{
		$data = array();
		$sql = "SELECT $post.*, $category.category_name FROM $post
		INNER JOIN  $category
		ON $post.categoryId = $category.id
		where $post.categoryId = $id";

		return $this->db->select($sql,$data);
	}
	public function searchPost($postTable,$keyword,$id)
	{
		$data = array();
		if(isset($keyword) && !empty($keyword)){
			$sql = "SELECT * FROM $postTable WHERE title LIKE '%$keyword%' OR content LIKE
			 '%$keyword%' ";
		}else if(isset($id)){
			$sql = "SELECT * FROM $postTable WHERE categoryId=$id";
		}
		return $this->db->select($sql,$data);
	}
	public function insertPost($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	public function postById($table,$id)
	{
		$sql = "SELECT * FROM $table WHERE id=:id";
		$data = array(':id' => $id);
		return $this->db->select($sql,$data);
	}
	public function updatePost($table,$data,$condition)
	{
		return $this->db->update($table,$data,$condition);
	}
	public function deletePostById($table,$condition)
	{
		return $this->db->delete($table,$condition);
	}
}