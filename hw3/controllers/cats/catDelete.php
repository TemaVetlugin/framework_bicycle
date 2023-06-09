<?php
	include_once('model/m_functions.php');	

	if(removeCat(URL_PARAMS['cat_id'])){
		echo 'YAES SIRRRRR';
		$path=HOME_PATH;
		header("location: $path");
	}
	else{
		echo 'something is wrong';
	}
?>
