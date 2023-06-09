<?php
	include_once('model/m_functions.php');	

	if(removeArticle(URL_PARAMS['id'])){
		echo 'YAES SIRRRRR';
		$path=HOME_PATH;
		header("location: $path");
	}
	else{
		echo 'something is wrong';
	}
?>
