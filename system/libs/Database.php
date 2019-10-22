<?php 
/**
 * 
 */
class Database extends PDO
{
	
	function __construct($dsn, $user, $pass)
	{
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
		    parent::__construct($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
		     echo $e->getMessage();
		}
	}
	public function select($sql,$data=array() ,$fetchstyle = PDO::FETCH_ASSOC)
	{
		$stmt = $this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindParam($key,$value);
		}
		$stmt->execute();
		return $stmt->fetchAll($fetchstyle);
	}

	public function insert($table,$data)
	{
		$keys = implode(',',array_keys($data));
		$values = ':'.implode(', :',array_keys($data));

		$sql = "INSERT INTO $table($keys) VALUES($values)";
		$stmt  = $this->prepare($sql);
		/*foreach ($data as $key => $value) {
			$stmt->bindParam(":$key",$value);
		}*/
		return $stmt->execute($data);
	}
	public function update($table,$data,$condition)
	{
		$keys = null;
		foreach ($data as $key => $value) {
			$keys .= "$key=:$key,";
		}
		$keys = rtrim($keys,",");
		//echo '\n'.$keys.' \n';

		$sql = "UPDATE $table SET $keys WHERE $condition";
		$stmt = $this->prepare($sql);

		/*foreach ($data as $key => $value) {
			//echo $key.'  = '.$value.'<br/>';
			$stmt->bindParam(":$key",$value);
		}*/
		return  $stmt->execute($data);
	}
	public function delete($table ,$condition,$limits=1 )
	{

		$sql = "DELETE FROM $table WHERE $condition Limit $limits";
		return $this->exec($sql);
	}
	public function ChackUser($sql,$username,$password)
	{
		$stmt = $this->prepare($sql);
		$stmt->execute(array($username,$password));
		return $stmt->rowCount();
	}
	public function UserValue($sql,$username,$password)
	{
		$stmt = $this->prepare($sql);
		$stmt->execute(array($username,$password));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}