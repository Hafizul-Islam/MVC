<?php
/**
 * Categoryy COntroller 
 */
class PostController extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Session::chackSession();
	}
	public function index()
	{
		$data = array();
		$post = $this->load->model('Post');
		$data['postList'] = $post->getPostList('post');

		$catmodel = $this->load->model('CatModel');
		$data['cats'] = $catmodel->catlist('category');


		$this->load->view('Admin/postList',$data);
	}

	public function create()
	{
		$catmodel = $this->load->model('CatModel');
		$data['catlist'] = $catmodel->catlist('category');
		$this->load->view('Admin/addPost',$data);
	}

	public function store()
	{
		if(!$_POST){
			header("Location: ".BASE_URL."PostController/create");
		}
		$input = $this->load->validation('ValidationController');
		$input->_SET('title')->isEmpty()->length(10,300);
		$input->_SET('content')->isEmpty();
		$input->_SET('categoryId')->isCategoryEmpty();

		if($input->submit()){
			$table = 'post';
			
			$title      = $input->values['title'];
			$content    = $input->values['content'];
			$categoryId = $input->values['categoryId'];

			$data = array(
				'title'      => $title,
				'content'    => $content,
				'categoryId' => $categoryId
			);
			$postModel = $this->load->model('Post');
			$result = $postModel->insertPost($table,$data);
			echo $result;
			if($result==1){
				$data['msg'] = 'New Article Added successfuly';
			}else{
				$data['msg'] = 'New Article Not added';
			}

			$data['postList'] = $postModel->getPostList('post');
			$catmodel = $this->load->model('CatModel');
			$data['cats'] = $catmodel->catlist('category');

			$this->load->view('Admin/postList',$data);
		}else{
			$data = array();
			$data['postErrors']  = $input->errors;

			$catmodel = $this->load->model('CatModel');
			$data['catlist'] = $catmodel->catlist('category');

			$this->load->view('Admin/addPost',$data);
		}

	}

	public function edit($catid)
	{
		$data = array();
		$Postmodel = $this->load->model('Post');
		$id = $catid;
		$data['postById'] = $Postmodel->postById('post',$id);

		$catmodel = $this->load->model('CatModel');
		$data['catlist'] = $catmodel->catlist('category');
		$this->load->view('Admin/editPost',$data);
	}

	public function update($id=null)
	{
		if(!$_POST){
			header("Location: ".BASE_URL."PostController/create");
		}
		$input = $this->load->validation('ValidationController');
		$input->_SET('title')->isEmpty()->length(10,300);
		$input->_SET('content')->isEmpty();
		$input->_SET('categoryId')->isCategoryEmpty();

		if($input->submit()){
			$table = 'post';
			
			$title      = $input->values['title'];
			$content    = $input->values['content'];
			$categoryId = $input->values['categoryId'];

			$data = array(
				'title'      => $title,
				'content'    => $content,
				'categoryId' => $categoryId
			);
			$condition = "id=$id";

			$postmodel = $this->load->model('Post');
			$result = $postmodel->updatePost($table,$data,$condition);

			if($result==1){
				$data['msg'] = 'Article Updated successfuly';
			}else{
				$data['msg'] = 'Article Not Updated';
			}

			$data['postList'] = $postmodel->getPostList('post');
			$catmodel = $this->load->model('CatModel');
			$data['cats'] = $catmodel->catlist('category');

			$this->load->view('Admin/postList',$data);
		}else{
			$data = array();
			$data['postErrors']  = $input->errors;

			$catmodel = $this->load->model('CatModel');
			$data['catlist'] = $catmodel->catlist('category');

			$this->load->view('Admin/addPost',$data);
		}

	}
	public function destroy($id=null)
	{
		$table = 'post';
		$condition = "id=$id";
		$postmodel = $this->load->model('Post');
		$result = $postmodel->deletePostById($table,$condition);

		$data = array();
		if($result==1){
			$data['msg'] = 'Category Deleted successfuly';
		}else{
			$data['msg'] = 'Category Deleted failed';
		}
		
		$data['postList'] = $postmodel->getPostList('post');
		$catmodel = $this->load->model('CatModel');
		$data['cats'] = $catmodel->catlist('category');
		$this->load->view('Admin/postList',$data);
	}
}