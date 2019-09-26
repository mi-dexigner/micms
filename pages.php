<?php
if(is_file("include/inc_head.php")){
require_once("include/inc_head.php");
}else{
  echo "please check the configure files";
}

if(isset($_REQUEST['p']) ){
 $pid = $_REQUEST['p'];
 if(is_file(VIEW.'functions.php')){
  include(VIEW.'functions.php');
  }else{
    echo 'please must be file name using <b>themename/functions.php</b><br/>';
  }
#$nav = post_type('pages',1,'','Order By menu_orders ASC');
$nav = menu();
if(is_file(VIEW.'header.php')){
  include(VIEW.'header.php');
  }else{
    echo 'please must be file name using <b> template/header.php </b><br/>';
  } 
    
$pageQ = "SELECT id, slug FROM `posts` WHERE post_type = 'pages' AND slug = '$pid'";
$pageR = mysqli_query($db,$pageQ);
$pagesRow = mysqli_fetch_assoc($pageR);
$defaultPageId = $pagesRow['id'];
 $pagecount = mysqli_num_rows($pageR);
$defaultpostQ = "SELECT default_id,post_id,default_value,website_type FROM `defaultpage` WHERE post_id  = $defaultPageId AND value = 1";
   
$defaultpostR = mysqli_query($db,$defaultpostQ);
$defaultpostrow = mysqli_fetch_assoc($defaultpostR);
$defaultpostcount = mysqli_num_rows($defaultpostR);
if($defaultpostcount > 0){
  $sliders =  post_type('slider',1,'','Order By menu_orders ASC');
  if(is_file(VIEW.'slider.php')){
  include(VIEW.'slider.php');
  }else{
    echo 'please must be file name using <b>template/slider.php</b><br/>';
  }
  if(is_file(VIEW.'front-page.php')){
  include(VIEW.'front-page.php');
  }else{
    echo 'please must be file name using <b>template/front-page.php</b> <br/>';
  }
    
    

}
else{
if($pagecount > 0){
$postID = $pagesRow['id'];
$metapostQ = "SELECT meta_value  FROM `postmeta` WHERE post_id = $postID ";
$metapostR = mysqli_query($db,$metapostQ);
$metapostrow = mysqli_fetch_assoc($metapostR);
$metapostcount = mysqli_num_rows($metapostR);
$metapostrow['meta_value'];
if($metapostrow['meta_value'] !='default' && $metapostcount > 0){
$value = VIEW.$metapostrow['meta_value'];
if(is_file($value)){
 $pageQ = "SELECT p.id,p.title,p.body AS content, p.slug AS url,p.images AS featured, DATE_FORMAT(p.created_at, '%D %b %Y%r') AS dated, u.FirstName AS fname, u.LastName AS lname   FROM `posts` p LEFT JOIN users u  ON u.ID = p.userId WHERE post_type = 'pages' AND website_type = 1 AND p.slug = '$pid'";
$pageR = mysqli_query($db,$pageQ);
  $pages = array();
  while($pageRow = mysqli_fetch_assoc($pageR)):
$pages[] = $pageRow;
endwhile;
$pages = json_decode(json_encode($pages));
 if(is_file($value)){
  include($value);
  }else{
    echo 'please must be file name using <b>'.$value.'</b><br/>';
  }

 }
}else{
  $pageQ = "SELECT p.id,p.title,p.body AS content, p.slug AS url,p.images AS featured, DATE_FORMAT(p.created_at, '%D %b %Y%r') AS dated, u.FirstName AS fname, u.LastName AS lname   FROM `posts` p LEFT JOIN users u  ON u.ID = p.userId WHERE post_type = 'pages' AND website_type = 1 AND p.slug = '$pid'";
$pageR = mysqli_query($db,$pageQ);
  $pages = array();
  while($pageRow = mysqli_fetch_assoc($pageR)):
$pages[] = $pageRow;
endwhile;
$pages = json_decode(json_encode($pages));
if(is_file(VIEW.'pages.php')){
  include(VIEW.'pages.php');
  }else{
    echo 'please must be file name using <b>template/pages.php</b><br/>';
  }
}
}else{
  redirect('/');
}

}
if(is_file(VIEW.'footer.php')){
  include(VIEW.'footer.php');
  }else{
    echo 'please must be file name using <b>template/footer.php</b><br/>';
  }

    
 /* end if statement $_REQUEST['p'] */   
}else{
    /* Default Home page setting */
  if(is_file(VIEW.'functions.php')){
  include(VIEW.'functions.php');
  }else{
    echo 'please must be file name using <b>themename/functions.php</b><br/>';
  }   
   $nav = menu();
if(is_file(VIEW.'header.php')){
  include(VIEW.'header.php');
  }else{
    echo 'please must be file name using <b>template/header.php</b><br/>';
  }
  $sliders = post_type('slider',1,'','Order By title ASC');
  if(is_file(VIEW.'slider.php')){
  include(VIEW.'slider.php');
  }else{
    echo 'please must be file name using <b>template/slider.php</b><br/>';
  }
  if(is_file(VIEW.'front-page.php')){
  include(VIEW.'front-page.php');
  }else{
    echo 'please must be file name using <b>template/front-page.php</b> <br/>';
  }
  if(is_file(VIEW.'footer.php')){
  include(VIEW.'footer.php');
  }else{
    echo 'please must be file name using <b>template/footer.php</b><br/>';
  }
    
}
