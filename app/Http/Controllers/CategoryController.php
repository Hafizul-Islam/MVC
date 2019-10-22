<?php
/**
 * Categoryy COntroller 
 */
class CategoryController extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Session::chackSession();
	}
	public function index()
	{
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist('category');

		$this->load->view('Admin/editCategory',$data);
	}

	public function GetCategoryById()
	{
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$id = 3;
		$data['catbyid'] = $catmodel->catById('category',$id);

		$this->load->view('categorybyid',$data);
	}
	public function create()
	{
		$this->load->view('Admin/addCategory');
	}

	public function edit($catid)
	{
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$id = $catid;
		$data['catbyid'] = $catmodel->catById('category',$id);

		$this->load->view('Admin/updateCategory',$data);
	}

	public function store()
	{
		$table = 'category';
		$name = $_POST['category_name'];
		$title = $_POST['category_title'];
		$data = array(
			'category_name' => $name,
			'category_title'   => $title
		);
		$catmodel = $this->load->model('CatModel');
		$result = $catmodel->insertcat($table,$data);

		$data = array();
		if($result==1){
			$data['msg'] = 'Category Added successfuly';
		}else{
			$data['msg'] = 'Category Not added';
		}
		$data['cat'] = $catmodel->catlist('category');
		$this->load->view('Admin/editCategory',$data);
	}
	public function update()
	{
		
		$table = 'category';
		$id = $_POST['id'];
		$name = $_POST['name'];
		$title = $_POST['title'];
		$condition = "id=$id";
		$data = array(
			'category_name' => $name,
			'category_title'   => $title
		);

		$catmodel = $this->load->model('CatModel');
		$result = $catmodel->updateCategory($table,$data,$condition);

		$data = array();
		if($result==1){
			$data['msg'] = 'Category Updated successfuly';
		}else{
			$data['msg'] = 'Category update failed';
		}

		$data['cat'] = $catmodel->catlist('category');
		$this->load->view('Admin/editCategory',$data);

	}
	public function destroy($id=null)
	{
		$table = 'category';
		$condition = "id=$id";
		$catmodel = $this->load->model('CatModel');
		$result = $catmodel->deleteByCategory($table,$condition);

		$data = array();
		if($result==1){
			$data['msg'] = 'Category Deleted successfuly';
		}else{
			$data['msg'] = 'Category Deleted failed';
		}

		$data['cat'] = $catmodel->catlist('category');
		$this->load->view('Admin/editCategory',$data);
	}
}