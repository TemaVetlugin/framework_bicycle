<?php

// use Exceptions\AccessExceptions;
namespace Articles;
use Storage\IStorage;
use Storage\FileStorage;
use Exceptions\AccessException;

class ArticlesController implements IController{
	protected string $title = '';
	protected string $content = '';
	protected array $env;
	protected IStorage $storage;

	public function __construct(){
		$this->storage = FileStorage::getInstance('db/articles.txt'); // yes-yes, without DI it is trash
	}

	public function setEnviroment(array $urlParams) : void{
		$this->env = $urlParams;
	}

	public function index(){
		$this->title = 'Home page';
		$this->content = 'Articles list';
	}

	public function menu(){
		if(mt_rand(0,4)<2){
			
			throw new AccessException('You are not an admin');
		}
		$this->title = 'you\'re a admin';
		$this->content = 'Congrats';
	}

	public function item(){
		$this->title = 'Article page';
		$id = (int)$this->env[1];
		$article = $this->storage->get($id);

		$this->content = "
			<h2>{$article['title']}</h2>
			<div>{$article['content']}</div>
		";
	}

	public function render() : string{
		return "<h1>{$this->title}</h1><div>{$this->content}</div>";
	}
}