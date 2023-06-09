<?php 

Interface IIStorage{
	public function add(string $key, mixed $data) : void;
	public function remove(string $key) : void;
	public function contains(string $key) : bool;
	public function get(string $key) : mixed;
}

class Storage implements IIStorage, JsonSerializable{
    protected $storage = [];

    public function add(string $key, mixed $data) : void{
        $this->storage[$key]=$data;
    }
	public function remove(string $key) : void{
        unset($this->storage[$key]);
    }
	public function contains(string $key) : bool{
        return array_key_exists($key, $this->storage);
    }
	public function get(string $key) : mixed{
        return $this->storage[$key];
    }
    public function show(){
        print_r($this->storage);
    }
    public function jsonSerialize() {
        return implode('. ',$this->storage);
    }
}

class Animal implements JsonSerializable{
	public $name;
	public $health;
	public $alive;
	protected $power;

	public function __construct(string $name, int $health, int $power){
		$this->name = $name;
		$this->health = $health;
		$this->power = $power;
		$this->alive = true;
	}

	public function calcDamage(){
		return $this->power * (mt_rand(100, 300) / 200);
	}

	public function applyDamage(int $damage){
		$this->health -= $damage;

		if($this->health <= 0){
			$this->health = 0;
			$this->alive = false;
		}
	}
    public function jsonSerialize() {
        return $this->name;
    }
}

class JSONLogger{
	protected array $objects = [];

	public function addObject(JsonSerializable $obj) : void{
		$this->objects[] = $obj;
	}

	public function log(string $betweenLogs = ', ') : string{
		$logs = array_map(function($obj){
			return $obj->jsonSerialize();
		}, $this->objects);

		return implode($betweenLogs, $logs);
	}
}

$stor=new Storage;
$stor->add('test2', 'hello world');
$stor->add('test3', 'hello world2');
$stor->add('test55', 'hello world3');
// $stor->add('test1', 'hello world1');
// $stor->add('test23', 'hello world23');
// $stor->add('test3', 'hello world3');
// $stor->show();
// echo $stor->get('test');
// echo $stor->contains('test');
// $stor->remove('test23');
// echo '<pre>';
// $stor->show();
// echo '</pre>';
$animal=new Animal('Vasya', 100, 100);

$core=new JSONLogger;
$core->addObject($stor);
$core->addObject($animal);
echo $core->log();