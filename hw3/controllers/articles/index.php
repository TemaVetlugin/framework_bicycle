<?php
	include_once('model/m_functions.php');
	
	if($_GET['cat_id']=='')
	{
		$articles = getArticles();
	}
	else{
		$articles = getCatArticles($_GET['cat_id']);
	}
	if(empty($articles)){
		//include('errors/404.php');
		$fullTitle="ERROR 404";
		$fullContent=template('errors/404');
	}
	//include('view/v_main.php')
	else{
		$fullTitle='Main Page';
		$content=template('v_main', [
			'articles'=>$articles
		]);
		$cats=getCats();
		$left=template('v_left',['cats'=>$cats]);
		$fullContent=template('base/v_2cols', [
			'left'=>$left,
			'content'=>$content
		]);
	}
?>

	