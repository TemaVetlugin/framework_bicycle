<?php 
function DbConnect() : PDO{
static $db ;
if($db===NULL){
$db = NEW PDO('mysql:host=localhost;dbname=hw_3_shish;charset=utf8','artem','root',[
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
]);}

return $db;}



// $pdo=DbConnect();
// $res=$pdo->query('SELECT CONNECTION_ID()')->fetch();
// var_dump($res);
// echo '1';

