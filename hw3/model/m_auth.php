<?php
function validateUsers(&$store){
    extract($store);
    if(($email=='')||($nickname=='')||($password=='')||($rePassword=='')){
        $err='Some fields are empty';
    }
    else if(mb_strlen($email, 'UTF8') < 2){
        $err='Title must be longer than 3 letters';
    }
    else if(mb_strlen($password, 'UTF8') < 4){
        $err='Password is too short';
    }
    else if($password!==$rePassword){
        $err='passwords don\'t match';
    }
    else{
    $store['email']=htmlspecialchars($store['email']);
    $store['nickname']=htmlspecialchars($store['nickname']);
    $store['password']=htmlspecialchars($store['password']);
    $store['password']=password_hash($store['password'], PASSWORD_BCRYPT);
    unset($store['rePassword']);
    }
    return $err;
}

function addUser($store){
    $pdo=DbConnect();
    echo "+";
    $sql="INSERT INTO users (email, nickname, password) VALUES (:email, :nickname, :password)";
    $query=$pdo->prepare($sql);
    foreach($store as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($store);
    $last_id=$pdo->lastInsertId();echo "+";
    return $last_id;
    
}

function getToken($user_id){
    $token=substr(bin2hex(random_bytes(127)),0,127);
    echo $token;

    $pdo=DbConnect();
    $sql="INSERT INTO tokens (user_id, token) VALUES (:user_id, :token)";
    $store=[
        'user_id'=>$user_id,
        'token'=>$token
    ];
    $query=$pdo->prepare($sql);
    foreach($store as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($store);

    return $token;
}

function getUserId($token){
    $pdo=DbConnect();
    $sql="SELECT * FROM tokens WHERE `token`='$token'";
    $query=$pdo->prepare($sql);
    $query->execute();
    if(!$user=$query->fetch())
    $user=[];
    return $user['user_id'];
    // return 1;
}

function findUserEmail($email){
    $pdo=DbConnect();
    $sql="SELECT * FROM users WHERE `email`='$email'";
    $query=$pdo->prepare($sql);
    $query->execute();
    if(!$user=$query->fetch())
    $user=[];
    return $user;
}

function emailValidate($userData, &$err){
    $err='';    
    
    $foundUser=findUserEmail($userData['email']);echo '+';
    if(($userData['email']=='')||($userData['password']=='')){
        $err='Some fields are empty';
        echo '+';
    }
    else if(empty($foundUser)){
        $err='There is no user with this email';
        echo '+';
    }
    else if(password_verify($userData['password'],$foundUser['password'])){
        $err='wrong password';
        echo '+';
    }
    echo $err;
    return $foundUser['user_id'];
}