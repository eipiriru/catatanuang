<?php
	include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/db.php';
	session_start();
	session_destroy();
	header("location:".$url."");
?>