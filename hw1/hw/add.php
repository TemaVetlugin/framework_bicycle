<?php

	include_once('functions.php');
    
	include_once('logs.php');	
?>
	<?php
    echo $_SERVER['REQUEST_METHOD'];
    $err='';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $title=trim($_POST['title']);
        $content=trim($_POST['content']);
        if(($title=='')||($content=='')){
            $err='Some fields are empty';
        }
        else if(mb_strlen($title, 'UTF8') < 2){
            $err='title must be longer than 3 letters';
        }
        else{
            
            $isCorect=true;
        }
    }
if($isCorect){
if(addarticle($_POST['title'],$_POST['content'])){
echo "It\'s sended";}
}
else{
?>
<form method="post">
    <h5>title</h5>
    <input value='<?=$title?>' type="text" name="title">
    <h5>Content</h5>
    <input value='<?=$content?>' type="text" name="content"><br><br>
    <input type="submit" value="send">
    <h4><?=$err?></h4>
</form>

<?php }?>
Form or message here
<hr>
<a href="index.php">Move to main page</a>