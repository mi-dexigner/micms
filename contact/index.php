<?php 

if(is_file("../include/inc_head.php")){
require_once("../include/inc_head.php");
}else{
  echo "please check the configure files"; 
}

$file = 'templateDetails.xml';
if(!$xml = simplexml_load_file($file)) {
    exit('Failed to open '.$file);
}
    vd($xml);

 echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;
 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	
 </body>
 </html>