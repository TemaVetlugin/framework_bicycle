<?php

include_once('model/m_functions.php');	

	$id = URL_PARAMS['id'];
	$article = getArticle($id);
	print_r($article);
	echo $article['user_id'];
	if(($article['user_id']===$_SESSION['user_id'])&&isset($_SESSION['user_id']))
	{
		$articleAuthor=true;
		//echo '+';
	}
	else{
		$articleAuthor=false;
	}

	if(empty($article)){
		//include('errors/404.php');
		
		$fullTitle="ERROR 404";
		$fullContent=template('errors/404');
	}
	else{
		$fullTitle=$article['title'];
		$content=template('v_article', [
			'article'=>$article,
			'id'=>$id,
			'articleAuthor'=>$articleAuthor
		]);
		$cats=getCats();
		$left=template('v_left',['cats'=>$cats]);
		$fullContent=template('base/v_2cols', [
			'left'=>$left,
			'content'=>$content
		]);
	}
	//include('view/v_article.php');
	
?>
