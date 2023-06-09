<?php

include_once('istorage.php');
include_once('article.php');
include_once('memorystorage.php');
include_once('filestorage.php');

//$ms = new MemoryStorage();
$ms = FileStorage::getInstance('articles.txt');

var_dump($ms);
echo '<br>';
$ms2 = FileStorage::getInstance('articles.txt');

var_dump($ms2);
echo '<br>';

$ms3 = FileStorage::getInstance('articles.txt');

var_dump($ms3);

$ms4 = FileStorage::getInstance('articlles.txt');
echo '<br>';
var_dump($ms4);
/* 
$art2 = new Article($ms);
$art2->load(1);
echo '<pre>';
print_r($art2);
echo '</pre>';

$art2->title = 'NZ';
$art2->save(); 
*/

// $art1 = new Article($ms);
// $art1->create();
// $art1->title = 'New art';
// $art1->content = 'Content new art';
// $art1->save();


// $art3 = new Article($ms);

// // $art3->create('firstttttttttt','hello world');
// // // $art3->load(1);
// // $art3->remove(8);
// // $art3->remove(9);
// // $art3->remove(10);
// // $art3->remove(11);
// // $art3->create('tratatat','h');
// echo '<pre>';
// print_r($art3);
// echo '</pre>';