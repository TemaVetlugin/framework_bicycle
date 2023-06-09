<?php
unset($_SESSION['user_id']);
setcookie('token', $token, time()-(3600*24*30), '/');
            
$path=HOME_PATH;
header("location: $path");