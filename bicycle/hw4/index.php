<?php

use Exceptions\AccessException;
use Router\Router;
try{
include_once('init.php');
}
catch(Throwable $e){
    echo $e->getMessage();
}

const BASE_URL = '/second/bicycle/hw4/';

$router = new Router(BASE_URL);
try{
    $router->addRoute('', 'Articles\ArticlesController');
    $router->addRoute('article/1', 'Articles\ArticlesController', 'item');
    $router->addRoute('article/2', 'Articles\ArticlesController', 'item');
    $router->addRoute('article/menu', 'Articles\ArticlesController', 'menu'); // e t.c post/99, post/100 lol :))

    
    $uri = $_SERVER['REQUEST_URI'];
    // echo $uri;
    try{
    $activeRoute = $router->resolvePath($uri);
    }
    catch(Throwable $e){
        echo $e->getMessage();
    }
    
    
    $c = $activeRoute['controller'];
    $m = $activeRoute['method'];
        $c->$m();
    
    $html = $c->render();
    echo $html;
}catch(AccessException $e){
    echo $e->getMessage();
}

?>
<hr>
Menu
<a href="<?=BASE_URL?>">Home</a>
<a href="<?=BASE_URL?>article/1">Art 1</a>
<a href="<?=BASE_URL?>article/2">Art 2</a>
<a href="<?=BASE_URL?>article/menu">AdminPath</a>