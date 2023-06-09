<div class="form">
<form method="post">
    <h3>Title</h3>
    <input value='<?=$title?>' class="string" type="text" name="title">
    <h3>Content</h3>
    <input value='<?=$content?>' class="string" type="text" name="content">
    <h3>Chose cattegory</h3>
    <?php foreach($cats as $cat){?>
    <input value='<?=$cat['cat_id']?>'  class="list" type="radio" name="cat">  
       <?php echo $cat['category'];}?><br><br>
    <input class="btn" type="submit" value="send">
    <h4 class="err"><?=$err?></h4>
</form>
</div>
<a class="home" href="<?=HOME_PATH?>">Move to main page</a>