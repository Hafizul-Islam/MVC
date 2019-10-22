<?php
/**
 * User Controller
 */
class UserController extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Session::chackSession();
	}
	public function index()
	{
		$data = array();
		$usermodel = $this->load->model('User');
		$data['users'] = $usermodel->userList('users');
		$this->load->view('Admin/usersList',$data);
	}
	public function create()
	{
		$this->load->view('Admin/addUser');
	}
	public function store()
	{
		if(!$_POST){
			header("Location: ".BASE_URL."UserController/create");
		}
		$input = $this->load->validation('ValidationController');
		$input->_SET('username')->isEmpty()->length(5,20);
		$input->_SET('password')->isEmpty();
		$input->_SET('lavel')->isCategoryEmpty();

		if($input->submit()){
			$table = 'users';
			
			$username      = $input->values['username'];
			$password    = $input->values['password'];
			$lavel = $input->values['lavel'];

			$data = array(
				'username'      => $username,
				'password'      => $password,
				'lavel'         => $lavel
			);
			$usermodel = $this->load->model('User');
			$result = $usermodel->insertUser($table,$data);
	
			if($result==1){
				$data['msg'] = 'New User Added successfuly';
			}else{
				$data['msg'] = 'New User Not added';
			}

			$data['users'] = $usermodel->userList('users');
			$this->load->view('Admin/usersList',$data);
		}else{
			$data = array();
			$data['postErrors']  = $input->errors;

			$this->load->view('Admin/usersList',$data);
			
		}

	}
	public function destroy($id=null)
	{
		$table = 'users';
		$condition = "id=$id";
		$usermodel = $this->load->model('User');
		$result = $usermodel->deleteUser($table,$condition);

		$data = array();
		if($result==1){
			$data['msg'] = 'User Deleted successfuly';
		}else{
			$data['msg'] = 'User Deleted failed';
		}
		
		$data['users'] = $usermodel->userList('users');
		$this->load->view('Admin/usersList',$data);
	}
}