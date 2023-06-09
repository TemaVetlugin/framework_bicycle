<?php

namespace Modules\Articles\Controllers;

use System\Contracts\IStorage;
use Modules\_base\Controller as BaseController;
use Modules\Articles\Models\Index as ModelsIndex;
use System\Exceptions\ExcValidation;
use System\FileStorage;
use System\Template;

class Index extends BaseController{
	protected ModelsIndex $model;

	public function __construct(){
		$this->model = ModelsIndex::getInstance();
	}

	public function index(){
		$articles = $this->model->all();
		
		$this->title = 'Home page';
		$this->content = Template::render(__DIR__ . '/../Views/v_all.php', [
			'articles' => $articles
		]);
	}

	public function item(){
		$this->title = 'Article page';
		$id = (int)$this->env[1];
		$article = $this->model->get($id);

		$this->content = Template::render(__DIR__ . '/../Views/v_item.php', [
			'article' => $article
		]);
	}

	public function add(){
		
		try{
			$this->model->add(['title' => '', 'content' => '']);
		}
		catch(ExcValidation $e){
			$this->content = 'cant add article';
		}
	}

	public function edit(int $id, array $fields){
		
		try{
			$this->model->edit($id, $fields);
		}
		catch(ExcValidation $e){
			$this->content = 'cant add article';
		}
	}

	public function remove(int $id){
		try{
			$this->model->remove($id);
		}
		catch(ExcValidation $e){
			$this->content = 'cant add article';
		}
	}
}