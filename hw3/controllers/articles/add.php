<?php
	include_once('model/m_functions.php');
    include_once('core/arr.php');

?>
	<?php
    if(empty($_SESSION['user_id'])){
        $path=HOME_PATH.'login';
        header("location: $path");
        exit();
    }
    $fields=['title', 'content', 'cat'];
    $validation = extractFields($_POST, $fields);
    $err='';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $err=validateFields($validation);
        $validation['user_id']=$_SESSION['user_id'];
        if($err==''){
            $last_id=addarticle($validation);
            $path=HOME_PATH."article/".$last_id;
            header("location: $path");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'||$err!=''){
        $cats=getCats();
        $title=$validation['title'];
        $content=$validation['content'];
        $fullTitle='Add article';
        $fullContent=template('v_form', [
            'title'=>$title,
            'content'=>$content,
            'cats'=>$cats,
            'err'=>$err
        ]);
        //include('view/v_form.php');
    }
?>
