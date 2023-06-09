<?php

use PairTag as GlobalPairTag;
use SingleTag as GlobalSingleTag;

class Tag{
    protected $attrs=' ';
    protected $tag;
    public function __construct(string $tag)
    {
        $this->tag=$tag;
    }
    public function addAttr(string $attr, string $value){
        $this->attrs.=$attr."='".$value."' ";
    }
    public function render(){
        return '<'.$this->tag.$this->attrs.'>';
    }
}

class SingleTag extends Tag{
    public function __construct(string $tag)
    {
        parent::__construct($tag);
    }
}

class PairTag extends Tag{
    protected $content='';
    public function __construct(string $tag)
    {
        parent::__construct($tag);
    }
    public function appendChild(Tag $content){
        $this->content.=$content->render();
    }
    public function render(){
        return parent::render().$this->content.'</'.$this->tag.'>';
    }
}

$form=NEW PairTag('form');

$label1=NEW PairTag('label');
$img1=NEW SingleTag('img');
$img1->addAttr('src', 'https://avatars.mds.yandex.net/i?id=dc0a7ed4619680d46352bd0b3df15ca2-4234271-images-thumbs&n=13');
$img1->addAttr('alt', 'smth is wrong');
$input1=NEW SingleTag('input');
$input1->addAttr('type', 'text');
$input1->addAttr('name', 'f1');
$label1->appendChild($img1);
$label1->appendChild($input1);

$label2=NEW PairTag('label');
$img2=NEW SingleTag('img');
$img2->addAttr('src', 'https://autorating.ru/upload/medialibrary/77d/77d2d2bbc71cb27350618469097412bd.jpg');
$img2->addAttr('alt', 'smth is wrong');
$input2=NEW SingleTag('input');
$input2->addAttr('type', 'password');
$input2->addAttr('name', 'f2');
$label2->appendChild($img2);
$label2->appendChild($input2);

$input3=NEW SingleTag('input');
$input3->addAttr('type', 'submit');
$input3->addAttr('value', 'send');

$form->appendChild($label1);
$form->appendChild($label2);
$form->appendChild($input3);

echo $form->render();