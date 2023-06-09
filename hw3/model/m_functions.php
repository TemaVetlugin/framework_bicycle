<?php

include_once("core/db.php");

function addarticle($store){
    $pdo=DbConnect();
    echo "+";
    $sql="INSERT INTO articles (title, content, cat_id, user_id) VALUES (:title, :content, :cat, :user_id)";
    $query=$pdo->prepare($sql);
    foreach($store as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($store);
    $last_id=$pdo->lastInsertId();echo "+";
    return $last_id;
    
}


function getArticles():array{
    $pdo=DbConnect();
    $sql='SELECT * FROM articles INNER JOIN ca USING (cat_id) ORDER BY id DESC';
    $query=$pdo->prepare($sql);
    $query->execute();
    $articles=$query->fetchAll();
    return $articles;
}

function getArticle($id):array{
    $pdo=DbConnect();
    $sql="SELECT * FROM articles INNER JOIN ca USING (cat_id) WHERE id = $id";
    $query=$pdo->prepare($sql);
    $query->execute();
    if(!$article=$query->fetch())
    $article=[];
    return $article;
}

function removeArticle($id){
    $pdo=DbConnect();
    $sql="DELETE FROM `articles` WHERE `articles`.`id` = $id";
    $query=$pdo->prepare($sql);
    $query->execute();
    return 1;
}

function editArticle($store, $id){
    $pdo=DbConnect();
    $sql="UPDATE articles SET title=:title, content=:content, cat_id=:cat WHERE id = $id";
    $query=$pdo->prepare($sql);
    
    foreach($store as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($store);
    return $id;
}

function getCats(){
    $pdo=DbConnect();
    $sql='SELECT * FROM ca ORDER BY cat_id DESC';
    $query=$pdo->prepare($sql);
    $query->execute();
    $cats=$query->fetchAll();
    return $cats;
}



function validateFields(&$store){
    $title=$store['title'];
    $content=$store['content'];
    $cat=$store['cat'];
    if(($title=='')||($content=='')||($cat=='')){
        $err='Some fields are empty';
    }
    else if(mb_strlen($title, 'UTF8') < 2){
        $err='Title must be longer than 3 letters';
    }
    else if(mb_strlen($title, 'UTF8') > 50){
        $err='Tittle is too long';
    }
    else if(mb_strlen($content, 'UTF8') > 1000){
        $err='Content is too long';
    }
    else{
    $store['title']=htmlspecialchars($store['title']);
    $store['content']=htmlspecialchars($store['content']);
    }
    return $err;
}

function getCatArticles($cat_id):array{
    $pdo=DbConnect();
    $sql="SELECT * FROM articles INNER JOIN ca USING (cat_id) WHERE cat_id=$cat_id";
    $query=$pdo->prepare($sql);
    $query->execute();
    $errs=$query->errorInfo();
    
    $articles=$query->fetchAll();
    return $articles;
}

function addCategory($cat, $user_id){
    $pdo=DbConnect();
    echo "+";
    $sql="INSERT INTO ca (category, cat_user_id) VALUES (:cat, :user_id)";
    $query=$pdo->prepare($sql);
    $params['cat']=$cat;
    $params['user_id']=$user_id;
    foreach($params as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($params);
    $last_id=$pdo->lastInsertId();echo "+";
    return $last_id;
    
}

function editCategory($cat_id, $category){
    $pdo=DbConnect();
    $sql="UPDATE ca SET category=:category WHERE cat_id = $cat_id";
    $query=$pdo->prepare($sql);
    $store=['category'=>$category];
    foreach($store as $key=>$value){
        $query->bindParam(":$key", $value);
    }
    $query->execute($store);
    return $cat_id;
    
}

function getCat($cat_id){
    $pdo=DbConnect();
    $sql="SELECT * FROM ca WHERE cat_id=$cat_id";
    $query=$pdo->prepare($sql);
    $query->execute();
    if(!$cat=$query->fetch())
    $cat=[];
    return $cat;
}

function removeCat($cat_id){
    $pdo=DbConnect();
    $sql="DELETE FROM `ca` WHERE `cat_id` = $cat_id";
    $query=$pdo->prepare($sql);
    $query->execute();
    return 1;
}