<?php 
if(is_file("config/config.php")){
require_once("config/config.php");
}else{
	echo "please check the configure files"; 
} 
if(isset($_REQUEST['name'])){
	$name = $_REQUEST['name'];	
		$website_typeQ = "SELECT id,name FROM `website_type` WHERE name = '$name'";
		$website_typeR = mysqli_query($db,$website_typeQ);
		$website_typeRow = mysqli_fetch_assoc($website_typeR);
		$web =  $website_typeRow['id'];
		$webCOunt = mysqli_num_rows($website_typeR);
		if($webCOunt > 0){
			$defaultQ = "SELECT default_id,post_id,default_value,website_type FROM `defaultpage` WHERE website_type  = $web AND value = 1";
			$defaultR = mysqli_query($db,$defaultQ);
			$defaultRow = mysqli_fetch_assoc($defaultR);
			 $defaultCOunt = mysqli_num_rows($defaultR);
				if($defaultCOunt > 0){

				include 'pages.php';
				}else{ 
			include 'blog.php';
						}
		
		}else{
			
			redirect('404.php');
		}
	
}
?>
 
