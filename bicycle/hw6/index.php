<?php

include_once('init.php');

use System\Exceptions\Exc404;
use System\Router;
use System\ModulesDispatcher;

use Modules\Articles\Module as Articles;

const BASE_URL = '/second/bicycle/hw6/';
const DB_HOST = 'localhost';
const DB_NAME = 'php1simple';
const DB_USER = 'artem';
const DB_PASS = 'root';

try{	
	$modules = new ModulesDispatcher();
	$modules->add(new Articles());
	$router = new Router(BASE_URL);

	$modules->registerRoutes($router);
/* 	 */

	$uri = $_SERVER['REQUEST_URI'];
	$activeRoute = $router->resolvePath($uri);

	$c = $activeRoute['controller'];
	$m = $activeRoute['method'];
	//$c->remove(6);
	$c->$m();
	$html = $c->render();
	echo $html;
}
catch(Exc404 $e){
	echo '404'; 
}
catch(Throwable $e){
	echo 'nice show error - ' . $e->getMessage();
}