<?php if (isset($_GET['action']) && $_GET['action'] == 'delete' ) {
/**
* Think about this secures online (check the file format)
http://www.hdeya.com/blog/2009/05/sorting-items-on-the-fly-ajax-using-jquery-ui-sortable-php-mysql/
*/
echo $_GET['action'];

$file = $_GET['file'];
$link = str_replace("http://localhost/riazeda/admin/dragdropimages/","",$file);
unlink($link);
	die();
} ?>

<?php //print_r($_FILES); ?>


<?php //print_r($_REQUEST); ?>


<?php //print_r($_SERVER); fopen("php://input", "rb"); ?>


<?php 
//move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name'])

//ini_set('max_execution_time', 10); //300 seconds = 5 minutes
 ?>

<?php 
$file = $_FILES['file'];
if (filesize($file['tmp_name']) > 2000000){
die('{"error":true, "message":"Image too large"}');
}
$file = $_FILES['file'];
$name = $file['name'];
$increment =0;
$ii = file_exists('uploads/'.$name);
/*	while (file_exists('uploads/'.$name)) {

	$increment++;

}
if($increment > 0 || $increment = ''){
		 $name .= '-'.$increment;

	}
	else{
		 $name = $name;
	}*/
if(file_exists('uploads/'.$name)){

for($i=0;$i<$ii;$i++){
	echo $i;
	//die('{"error":true, "message":"image exists leaves"}');
}
}
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name']);
$key = 'uploads/'.$_FILES['file']['name'];
$html = '<div class="file"><img src="'.$key.'">'.basename($key).'<div class="actions"><a href="'.basename($key).'" class="del">Remove</a></div></div>';
$html = str_replace('"', '\\"', $html);
die('{"error":false, "html":"'.$html.'"}');
 ?> 
