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
		if($webCOunt > 0){}
	if($web == 1):
  if(is_file('template/header.php')){
  include('template/header.php');
  }else{
    echo 'please must be file name using <b>template/header.php</b><br/>' ;
  }
  if(is_file('template/blog.php')){
  include('template/blog.php');
  }else{
	  echo 'please must be file name using <b>template/blog.php</b><br/>' ;
  }
  if(is_file('template/footer.php')){
  include('template/footer.php');
  }else{
    echo 'please must be file name using <b>template/footer.php</b><br/>' ;
  }
  
  endif; 
  
  
  if($web == 2):
$postQ = "SELECT p.id,p.title,p.body AS content, p.slug AS url, DATE_FORMAT(p.created_at, '%D %b %Y%r') AS dated, u.FirstName AS fname, u.LastName AS lname   FROM `posts` p LEFT JOIN users u  ON u.ID = p.userId WHERE post_type = 'posts' AND website_type = $web";
$postR = mysqli_query($db,$postQ);
$posts = array();
while($postRow = mysqli_fetch_assoc($postR)):
$posts[] = $postRow;
endwhile;
   if(is_file('template/header-two.php')){
  include('template/header-two.php');
  }else{
	  echo 'please must be file name using <b>template/header-two.php</b><br/>'; 
  }
    if(is_file('template/blog-two.php')){
  include('template/blog-two.php');
  }else{
	  echo 'please must be file name using <b>template/blog-two.php</b><br/>'; 
  }
    if(is_file('template/footer-two.php')){
  include('template/footer-two.php');
  }else{
    echo 'please must be file name using <b>template/footer-two.php</b><br/>'; 
  }
  endif; 
  
  
  if($web == 3):
  if(is_file('template/header-three.php')){
  include('template/header-three.php');
  }else{
    echo 'please must be file name using <b>template/header-three.php</b><br/>'; 
  }
   if(is_file('template/blog-three.php')){
  include('template/blog-three.php');
  }else{
	  echo 'please must be file name using <b>template/blog-three.php</b><br/>'; 
  }
    if(is_file('template/footer-three.php')){
  include('template/footer-three.php');
  }else{
    echo 'please must be file name using <b>template/footer-three.php</b><br/>'; 
  }
  endif; 
  
  
  }
  
  
  
  ?>



