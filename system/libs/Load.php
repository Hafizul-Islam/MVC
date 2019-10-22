<?php
/**
 * Load controller
 */
class Load{


	function __construct(){}
	public function view($name,$data=false)
	{
		if($data==true){
		 	extract($data);
		}
		require 'resources/views/'.$name.'.php';
	}
	public function model($model_name)
	{
		require 'app/Models/'.$model_name.'.php';
		return new $model_name();
	}
	public function validation($model_name)
	{
		require 'app/Validation/'.$model_name.'.php';
		return new $model_name();
	}
}