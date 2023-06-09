
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
            echo"+";
            var_dump($cat);
            $last_id=editCategory(URL_PARAMS['cat_id'], $cat);
            echo"+";
            $path=HOME_PATH."cat/".$last_id;
            echo"+";
            header("location: $path");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'||$err!==''){
        $title=$cat;
        if($title==''){
            $cat=getCat(URL_PARAMS['cat_id']);
            $title=$cat['category'];
           
        }
        $fullTitle='Add category';
        $fullContent=template('v_catForm', [
            'title'=>$title,
            'err'=>$err
        ]);
        //include('view/v_form.php');
    }
?>