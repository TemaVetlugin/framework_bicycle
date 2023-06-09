<a href="<?=HOME_PATH?>add">Add article</a>
<hr>
<h1><?=$cat['category']?></h1>
<hr>
<h2>Статей по этой категории пока нет</h2>
<hr>

<a class="homerun" href="<?=HOME_PATH?>catDelete/<?=$cat['cat_id']?>">Remove category</a>
<a class="homerun" href="<?=HOME_PATH?>catEdit/<?=$cat['cat_id']?>">Edit category</a>

<hr>
<a class="home" href="<?=HOME_PATH?>">Move to main page</a>