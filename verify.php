<?php 
if(is_file("include/inc_head.php")){
require_once("include/inc_head.php");
}else{
  echo "please check the configure files"; 
}
?>
<base href="<?php echo BASE_URL; ?>" class="siteName" />

<?php
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
   $email =db_escape($db,$_GET['email']); // Set email variable  
   $hash = db_escape($db,$_GET['hash']); // Set hash variable

   $VerifyQ = "SELECT email, hash, status FROM registered WHERE email='".$email."' AND hash='".$hash."' AND status='inactive'";
   $VerifyR = mysqli_query($db,$VerifyQ ) ; 
  
		$match  = mysqli_num_rows($VerifyR);
	
if($match > 0){
    // We have a match, activate the account
   $VerifyUpdateQ = "UPDATE registered SET status='active' WHERE email='".$email."' AND hash='".$hash."' AND status='inactive'";
 mysqli_query($db,$VerifyUpdateQ);
 echo '<div class="alert alert-success">Your account has been activated, you can now login</div>';
 echo '<script>window.setTimeout(function(){
     var site_url = document.getElementsByTagName("base")[0].getAttribute("href"); 
            // Move to a new location or you can do something else
            window.location.href = site_url+"clients/index.php";
    
        }, 5000);</script>';
}else{
    // No match -> invalid url or account has already been activated.
 echo '<div class="alert alert-warning">The url is either invalid or you already have activated your account.</div>';
}

		
}else{
    // Invalid approach
 echo '<div class="alert alert-warning">Invalid approach, please use the link that has been send to your email</div>';
}

 ?>