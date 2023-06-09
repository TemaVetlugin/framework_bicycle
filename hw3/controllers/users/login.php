<?php
    $fields=['email',  'password'];
    $userData = extractFields($_POST, $fields);
    
    $err=='';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        
        $user_id=emailValidate($userData,$err);
        if($err==''){
            
            $path=HOME_PATH;
            $_SESSION['user_id']=$user_id;
            if(isset($_POST['remember'])){
                $token=getToken($user_id);
                setcookie('token', $token, time()+(3600*24*30), '/');
            }
            header("location: $path");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'||$err!=''){
        
        $fullTitle='Registration';
        $fullContent=template('v_auth_form', [
            'userData'=>$userData,
            'reg'=>$reg,
            'err'=>$err
        ]);
        //include('view/v_form.php');
    }
?>