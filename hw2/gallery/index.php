<?php 
$images=scandir("images");
//var_dump($images);
$files=array_filter($images, function($file){
    return is_file("images/$file") && preg_match('/.*\.jpg$/',$file);
});
echo '<br>';
//var_dump($files);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallery</title>
</head>
<body>
<?php    
foreach($files as $image){?>
    <img src="images/<?=$image?>" width="300px" alt="+">
<?php 
}
?>
<br>
<a href="add.php">add</a>
</body>
</html>