<?php 
session_start();
include_once('init.php');
//print_r($_SESSION);
if(empty($_SESSION['user_id'])&&!empty($_COOKIE['token'])){
    //echo "I\'m here<br>";
    $user_id=getUserId($_COOKIE['token']);
    $_SESSION['user_id']=$user_id;
}

if(!empty($_SESSION['user_id'])){
    $registrated=1;
}
else{
    $registrated=0;
}

$url=$_GET['querysystemurl'];
$routes=include_once('core/route.php');

$route=findRoute($url, $routes);
define('URL_PARAMS', $route['params']);

$fullTitle='error 404';
$fullContent=template('errors/404');

$cname=$route['controller'];
// var_dump($cname);
$path=checkController($cname);
include_once($path);
// var_dump($path);



$res=template(
    'base/v_header',[
    'title'=>$fullTitle,
    'content'=>$fullContent,
    'registrated'=>$registrated
    ]
);
echo $res;
//include_once('view/base/v_header.php');




//fix links and and add errors
//include_once("$path");