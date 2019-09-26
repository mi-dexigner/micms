<?php
require_once("../include/inc_head.php");
if(isset($_SESSION['Login']) && $_SESSION['Login']==true)
redirect("dashboard.php");
else
redirect("login.php");
?>

