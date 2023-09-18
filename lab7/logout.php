<?php 

session_start();

session_destroy();

unset($_SESSION);

header("Location: http://www.sienasellbacks.com/ba13vall/lab7/login.php");

die("Session Destroyed");

?>