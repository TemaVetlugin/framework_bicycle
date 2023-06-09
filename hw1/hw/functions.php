<?php

	// your functions may be here

	/* start --- black box */
	function getArticles() : array{
		return json_decode(file_get_contents('db/articles.json'), true);
	}

	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];
		echo $articles[$id]['title'];
		saveArticles($articles);
		return true;
	}

	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function editArticle($id, $title, $content){
		$articles = getArticles();
		$articles[$id] = [
			'title' => $title,
			'content' => $content
		];
		echo $articles[$id]['title'];
		saveArticles($articles);
		return true;
	}

	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}

	function Find(string $str, string $needle, string $needle0, string $needle1,string $needle2, string $needle3, string $needle4, string $needle5, string $needle6, string $needle7, string $needle8, string $needle9):bool{
		$result= (!strpos($str, $needle)&!strpos($str, $needle0)&!strpos($str, $needle1)&!strpos($str, $needle2)&!strpos($str, $needle3)&!strpos($str, $needle4)&!strpos($str, $needle5)&!strpos($str, $needle6)&!strpos($str, $needle7)&!strpos($str, $needle8)&!strpos($str, $needle9));
		//echo $result;
		return $result; 
	}
	/* end --- black box */