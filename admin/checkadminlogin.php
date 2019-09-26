<?php
	if(isset($_SESSION['EmployeeLogin']))
		redirect("logout.php");
	if(!isset($_SESSION['Login']) || $_SESSION["Login"] == false)
		redirect("login.php");
	if($_SESSION["LockScreen"]==true)
		redirect("lockscreen.php");
	$self = $_SERVER['PHP_SELF'];
?>