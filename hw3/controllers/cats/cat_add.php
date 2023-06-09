<?php
	include_once('model/m_functions.php');
    include_once('core/arr.php');

?>
	<?php
    
    $cat=trim($_POST['title']);
    $err='';
   
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if(mb_strlen($cat, 'UTF8') < 2){
            $err='Category must be longer than 3 letters';
        }
        else if(mb_strlen($cat, 'UTF8') > 20){
            $err='Category must not be longer than 20 letters';
        }
        if($err==''){
           
            $last_id=addCategory($cat,$_SESSION['user_id']);
            $path=HOME_PATH."cat/".$last_id;
            header("location: $path");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'||$err!=''){
        $title=$cat;
        $fullTitle='Add category';
        $fullContent=template('v_catForm', [
            'title'=>$cat,
            'err'=>$err
        ]);
        //include('view/v_form.php');
    }
?>