<a href="<?=HOME_PATH?>add">Add article</a>
<hr>
<h1><?=$cat['category']?></h1>


<hr>

<div class="articles">
	<?php foreach($articles as $article){ ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<h5><?=$article['category']?></h5>
			<a href="<?=HOME_PATH?>article/<?=$article['id']?>">Read more</a>
			
		</div>
	<?php }?>
	<hr>
<?php if($catAuthor){?>
<a class="homerun" href="<?=HOME_PATH?>catDelete/<?=$cat['cat_id']?>">Remove category</a>
<a class="homerun" href="<?=HOME_PATH?>catEdit/<?=$cat['cat_id']?>">Edit category</a>
<?php }?>
</div>