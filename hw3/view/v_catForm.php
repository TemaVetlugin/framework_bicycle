<div class="form">
<form method="post">
    <h3>Enter category</h3>
    <input value='<?=$title?>' class="string" type="text" name="title">
    <br><br>
    <input class="btn" type="submit" value="send">
    <h4 class="err"><?=$err?></h4>
</form>
</div>
<a class="home" href="<?=HOME_PATH?>">Move to main page</a>