<?php
	include_once('model/m_functions.php');
	$cat=getCat(URL_PARAMS['cat_id']);
	if(($cat['cat_user_id']==$_SESSION['user_id'])&&isset($_SESSION['user_id']))
	{
		$catAuthor=true;
	}
	else{
		$catAuthor=false;
	}
	if(!empty($cat)){
		$articles = getCatArticles(URL_PARAMS['cat_id']);
	
		if(empty($articles)){
			//include('errors/404.php');
			$content=template('v_emptyCat',['cat'=>$cat]);
		}
		//include('view/v_main.php')
		else{
			
			$content=template('v_catMain', [
				'articles'=>$articles,
				'cat'=>$cat,
				'catAuthor'=>$catAuthor
			]);
			
		}
		$fullTitle='Main Page';
		$cats=getCats();
		$left=template('v_left',['cats'=>$cats]);
		$fullContent=template('base/v_2cols', [
			'left'=>$left,
			'content'=>$content
		]);
	}
    else{
		$fullTitle="ERROR 404";
		$fullContent=template('errors/404');
	}
	
?>