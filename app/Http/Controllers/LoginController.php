<?php 
/**
 * Login controller 
 */
class LoginController extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		Session::init();
		if(Session::get('login')==true){
			header("Location:".BASE_URL."AdminController/index");

		}
		$this->load->view('login');
	}
	public function loginAuth()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$table = "users";
		$userModel = $this->load->model('User');

		$chack = $userModel->userChack($table,$username,$password);
		if($chack > 0){
			$result = $userModel->userData($table,$username,$password);
			Session::init();
			Session::set('login',true);
			Session::set('username',$result[0]['username']);
			Session::set('userid',$result[0]['id']);
			Session::set('lavel',$result[0]['lavel']);
			header("Location:".BASE_URL."AdminController/index");

			//echo $result[0]['username'];

		}else{
			header("Location:".BASE_URL."LoginController/login");
		}
	}
	public function logOut()
	{
		Session::init();
		Session::destroy();
		header("Location:".BASE_URL."LoginController/login");
	}
}