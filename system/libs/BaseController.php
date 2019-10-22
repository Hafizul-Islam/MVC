<?php 
/**
 * Base  Controller
 */
class BaseController
{
	protected $load = array();
	function __construct()
	{
		$this->load = new Load();
	}
}