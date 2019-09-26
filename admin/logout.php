<?php
	//include("Common.php");
	session_start();
	unset($_SESSION["Login"]);
	unset($_SESSION["UserID"]);
	unset($_SESSION["UserFullName"]);
	unset($_SESSION["RoleID"]);
	unset($_SESSION["EmailAddress"]);
	unset($_SESSION["Photo"]);
	unset($_SESSION["LockScreen"]);
	header("Location: index.php");
?>
