<?php
	include("Common.php");
	session_start();
	$_SESSION["Login"]=false;
	session_destroy();
	header("Location: ClientLogin.php");
?>