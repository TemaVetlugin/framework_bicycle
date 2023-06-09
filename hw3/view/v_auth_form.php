<div class="form">
<form method="post">
    <h3>Email</h3>
    <input value='<?=$userData['email']?>' class="string" type="text" name="email">
    <?php if($reg){?>
    <h3>Nickname</h3>
    <input value='<?=$userData['nickname']?>' class="string" type="text" name="nickname">
    <?php }?>
    <h3>Password</h3>
    <input value='' class="string" type="text" name="password">
    <?php if($reg){?>
    <h3>Repeat password</h3>
    <input value='' class="string" type="text" name="rePassword">
    <?php }?>
    <br><br><input type="checkbox" name="remember" >Remember me
    <br>
    <input class="btn" type="submit" value="send">
    <h4 class="err"><?=$err?></h4>
</form>
</div>
<a class="home" href="<?=HOME_PATH?>">Move to main page</a>