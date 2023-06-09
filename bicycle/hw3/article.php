<?php

class Article{
	protected int $id; 
	public string $title; 
	public string $content; 
	protected InterfaceStorage $storage;

	public function __construct(InterfaceStorage $storage){
		$this->storage = $storage;
	}

	public function create(string $title, string $content){
		$fields=['title'=>$title, 'content'=>$content];
		if(self::isValid($fields)){
			$this->id = $this->storage->create($fields);
			
		}
		
	}

	public function load(int $id){
		$data = $this->storage->get($id);

		if($data === null){
			throw new Exception("article with id=$id not found");
		}

		$this->id = $id;
		$this->title = $data['title'];
		$this->content = $data['content'];
	}
	public function remove(int $id):bool{
		$this->storage->remove($id);
		return 1;
	}

	public function save(){
		$fields=[
			'title' => $this->title,
			'content' => $this->content
		];
		if(self::isValid($fields)){
			$this->storage->update($this->id, $fields);
		}
	}

	public function isValid(array $fields):bool{
		if((mb_strlen($fields['title'], 'UTF8') < 2)||(mb_strlen($fields['content'], 'UTF8') < 2)){
			echo '+';
			return 0;
		}
		else{
			return 1;
		}
	}

}
