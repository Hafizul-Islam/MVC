<?php 
/**
 * Admin co0ntroller 
 */
class AdminController extends BaseController 
{
	
	function __construct()
	{
		parent::__construct();
		Session::chackSession();
	}
	public function index()
	{
		$this->home();
	}
	public function home()
	{
		$this->load->view('Admin/admin');
	}
}