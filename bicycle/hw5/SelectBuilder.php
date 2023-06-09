<?php

class SelectBuilder{
	public string $table;
	protected string $columns='*';
	protected string $where='';
	protected string $order='';
	protected array $fields=['id_message', 'name', 'text', 'dt_add', 'status', 'id_cat'];

	public function __construct(string $table){
		$this->table = $table;
		return $this;
	}

	public function addFields( array $needles){
		
		if(self::isCorrect($needles)){
			$this->columns=implode(', ', $needles);
		}
		//echo $this->columns;
		return $this;
	}

	public function where( string $param){
		$needles=[$param];
		if(self::isCorrect($needles)){
			$this->where="WHERE $param = :$param";
		}
		//echo $this->columns;
		return $this;
	}

	public function orderBy( string $param, bool $desc=false){
		$needles=[$param];
		$add='';
		if($desc){$add='DESC';}
		if(self::isCorrect($needles)){
			$this->order="ORDER BY $param $add";
		}
		//echo $this->columns;
		return $this;
	}

	protected function isCorrect(array $needles): bool{
		$correct=true;
		foreach($needles as $needle){
			if(!in_array($needle, $this->fields)){
				$correct=false;
			}
		}
		return $correct;
	}

	public function __toString(){
		
		return "SELECT {$this->columns} FROM {$this->table} {$this->where} {$this->order}";
	}
}