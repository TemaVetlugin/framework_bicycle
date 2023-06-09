<?php

const DB_HOST = 'localhost';
const DB_NAME = 'php1simple';
const DB_USER = 'artem';
const DB_PASS = 'root';
try{
	
include_once('DBHelper.php');
include_once('SelectBuilder.php');

$db = DBHelper::getInstance();
// var_dump($db);
// $db1 = DBHelper::getInstance();
// var_dump($db1);
// $db2 = DBHelper::getInstance();
// var_dump($db2);
}catch(Throwable $e){
	echo $e;
}
$test=new SelectBuilder('messages');
niceDump($db->select($test->addFields(["id_message", 'name'])->orderBy('id_message')));

// var_dump(
// 	$db->select(
// 		$test->addFields(["id_message"])
// 	)
// ); 



echo '<br>'.$test->addFields(["id_message", 'name', 'text', 'dt_add'])->where('id_message')->orderBy('id_message', 1);

function niceDump($any){
	echo '<pre>';
	var_dump($any);
	echo '</pre>';
}

/* (new SelectBuilder('messages'))->order_by('id_messages DESC')->where
 */