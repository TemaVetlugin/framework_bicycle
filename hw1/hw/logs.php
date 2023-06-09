<?php 
include_once('functions.php');
$dt=date("y-m-d");
$log=$dt.'~'.$_SERVER['REQUEST_URI'].'~'.$_SERVER['HTTP_REFERER']."\n";

if(Find($log,'"','@','`',"'",'<','>','%','\\','{','}','$')){
    file_put_contents("logs/$dt.txt", $log, FILE_APPEND);
}
else{
    echo 'YOur logs are shit! gooh';
}