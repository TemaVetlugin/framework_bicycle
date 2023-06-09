<a href="<?=HOME_PATH?>add">Add article</a>
<hr>
<div class="articles">
	<?php foreach($articles as $article){ ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<h5><?=$article['category']?></h5>
			<a href="<?=HOME_PATH?>article/<?=$article['id']?>">Read more</a>
			
		</div>
	<?php }?>
</div>