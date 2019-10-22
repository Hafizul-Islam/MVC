<?php 

class Main{
	public $url ;
	public $controllerName  = "Index2";
	public $method          = "home";
	public $controllerPath  = "app/Http/Controllers/";
	public $controller;
	public function __construct(){
		$this->getUrl();
		$this->loadController();
		$this->callMethod();
	}
	public function getUrl()
	{
		$this->url = isset($_GET['url'])?$_GET['url'] : null;
		if($this->url !=null){
			$this->url = rtrim($this->url,"/");
			$this->url = explode("/",filter_var($this->url,FILTER_SANITIZE_URL));
		}else{
			unset($this->url);
		}

	/*	echo '<pre>';
		print_r($this->url);
		echo '</pre>';*/
	}
	public function loadController()
	{
		if(!isset($this->url[0])){
			include $this->controllerPath.$this->controllerName.".php";
			$this->controller = new $this->controllerName();
		}else{
			$this->controllerName = $this->url[0];
			$file = $this->controllerPath.$this->controllerName.".php";
		
			if(file_exists($file)){
				include $file;
				if(class_exists($this->controllerName)){
					$this->controller = new $this->controllerName();
				}else{
					//header("Location:".BASE_URL."Index2/home");
					echo 1;
				}
				
			}else{
				//header("Location:".BASE_URL."Index2/home");
				echo 2;
			}
		}
	}
	public function callMethod()
	{
		if(isset($this->url[2])){
			$this->method = $this->url[1];
			if(method_exists($this->controllerName, $this->method)){
				$this->controller->{$this->method}($this->url[2]);
			}else{

			}
		}else{
			if(isset($this->url[1])){
				$this->method = $this->url[1];
				if(method_exists($this->controllerName, $this->method)){
					$this->controller->{$this->method}();
				}else{
					//header("Location:".BASE_URL."Index2/home");
					echo 3;
				}
			}else{
				//header("Location:".BASE_URL."Index2/home");
				echo 4;
			}
		}
	}
}