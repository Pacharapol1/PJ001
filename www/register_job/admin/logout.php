<?php
	session_start();
	session_destroy();
	setcookie("cookie_status", '');
	header("location:index.php");
?>