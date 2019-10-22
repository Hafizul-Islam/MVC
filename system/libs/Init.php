<?php 


	


class Init
{
	
	function __construct()
	{

		$url = $_GET['url'];
		$url = rtrim($url,'/');
		$url = explode('/', $url);

		/*echo '<pre>';
		print_r($url);
		echo '</pre>';*/

		$file =  'app/Http/Controllers/'.$url[0].'.php';

		if(file_exists($file)){
			require $file;
		}else{
			require 'app/Http/Controllers/Index2.php';
			echo 'error';
			//$controller = new Index();
			//$controller->home();
			return false;
		}

		$controller = new $url[0]();
		if(isset($url[2])){
			$controller->{$url[1]}($url[2]);
		}else{
			if(isset($url[1])){
				$controller->{$url[1]}();
			}
		}
	}
}