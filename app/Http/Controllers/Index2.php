<?php
/**
 *  index class
 */
class Index2 extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$data = array();
		$post = $this->load->model('Post');
		$data['allpost'] = $post->getAllPost('post');

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist('category');

		$data['latestpost'] = $post->latestPost('post',5);


		$this->load->view('home',$data);
	}
	public function viewSingle($id)
	{
		$data = array();
		$postTable = 'post';
		$cat ='category';
		$post = $this->load->model('Post');
		$data['postById'] = $post->getPostById($postTable,$cat,$id);

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist('category');
		$data['latestpost'] = $post->latestPost('post',5);
		$this->load->view('single',$data);
	}
	public function viewCategoryPost($id)
	{
		$data = array();
		$postTable = 'post';
		$cat ='category';
		$post = $this->load->model('Post');
		$data['postBycat'] = $post->getPostByCategory($postTable,$cat,$id);

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist('category');
		$data['latestpost'] = $post->latestPost('post',5);

		$this->load->view('viewCategoryPost',$data);

	}
	public function search()
	{
		$data = array();
		$keyword   = $_REQUEST['searchKey'];
		$id        = $_REQUEST['catId'];

		$postTable = 'post';
		$post = $this->load->model('Post');
		$data['searchPost'] = $post->searchPost($postTable,$keyword,$id);

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist('category');
		$data['latestpost'] = $post->latestPost('post',5);

		$this->load->view('searchResult',$data);

	}
}