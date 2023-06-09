<?php

	print_r($_FILES);
	
	$err = '';
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$file=$_FILES['file'];
		if(!empty(preg_match('/.*\.jpg$/',$file['name']))){
			$isCorect=true;
			echo 'YEAH';
		}
	}
	else{
		$title = '';
		$content = '';
	}

?>
<div class="form">
	<?php if($isCorect){ 
		
	copy($file['tmp_name'], "images/".mt_rand(0,100000).".jpg");
		echo "SHIIIISH";
		// header('Location: index.php');
	}else{ ?>
		<form method="post" enctype="multipart/form-data">
			Title:<br>
			<input type="file" name="file">
			<button>Send</button>
			<p><?=$err?></p>
		</form>
	<?php } ?>
</div>
	

<hr>
<a href="index.php">Move to main page</a>