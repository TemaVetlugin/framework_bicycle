<?php
	include_once('model/m_functions.php');
    include_once('core/arr.php');

?>
	<?php
    $id=URL_PARAMS['id'];
    $fields=['title', 'content', 'cat'];
    
    $err='';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $validation = extractFields($_POST, $fields);
        $err=validateFields($validation);
        if($err==''){
            $last_id=editArticle($validation, $id);
            $path=HOME_PATH."article/".$last_id;
            header("location: $path");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'||$err!=''){
        $cats=getCats();
        if(empty($validation)){
        $validation=getArticle($id);}
        
        $title=$validation['title'];
        $content=$validation['content'];
        $fullTitle='Edit article';
        $fullContent=template('v_form', [
            'title'=>$title,
            'content'=>$content,
            'cats'=>$cats,
            'err'=>$err
        ]);
        //include('view/v_form.php');
    }
?>