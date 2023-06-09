<div class="content">
	
		<div class="article">
			<h1 class="offset"><?=$article['title']?></h1>
			<h4 class="offset"><?=$article['category']?></h4>
			<div class="offset"><?=$article['content']?></div>
			<?php 
			if($articleAuthor){?>
			<a class="homerun" href="<?=HOME_PATH?>delete/<?=$id?>">Remove</a>
			<a class="homerun" href="<?=HOME_PATH?>edit/<?=$id?>">Edit</a>
			<?php }?>
		</div>
	
</div>
<a class="home" href="<?=HOME_PATH?>">Move to main page</a>