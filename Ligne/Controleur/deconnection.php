<?php
    session_start();
    $_SESSION['login']=false;
    session_destroy();
    $_SESSION['login']=false;
	header("Location:../login.php");
?>