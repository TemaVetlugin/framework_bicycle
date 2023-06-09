<?php

function checkController($cname){
    $path="controllers/$cname.php";
    if(!file_exists($path)){
        $path='errors/404.php';
    }
    return $path;
}

function template($path, $values=[]){
    $fullFreakenPath='view/'.$path.'.php';
    extract($values);
    ob_start();
    include($fullFreakenPath);
    return ob_get_clean();
}

function findRoute($url, $routes){
    $res=[
        'controller'=>'err/err',
        'params'=>[]
    ];
    $matches=[];
    foreach($routes as $route){

        if(preg_match($route['check'], $url, $matches)){

            $res['controller']=$route['controller'];
            foreach($route['params'] as $name=>$num){
                $res['params'][$name]=$matches[$num];
            }
        }
    }
    return $res;
}