<?php


spl_autoload_register(function($class){
	require "system/libs/".$class.".php";
});
require "app/Config/config.php";

$obj = new Main();
