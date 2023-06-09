<?php

	include_once('functions.php');	
	include_once('logs.php');		

	if(removeArticle($_GET['id'])){
		echo 'YAES SIRRRRR';
	}
	else{
		echo 'something is wrong';
	}
?>
Message about result
<hr>
<a href="index.php">Move to main page</a>