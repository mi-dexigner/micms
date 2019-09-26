<?php if (isset($_GET['action']) && $_GET['action'] == 'delete' ) {
/**
* Think about this secures online (check the file format)
*/

	unlink('upload/'.$_GET['file']);
	die();
} ?>

<?php //print_r($_FILES); ?>


<?php //print_r($_REQUEST); ?>


<?php //print_r($_SERVER); fopen("php://input", "rb"); ?>


<?php 
//move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name'])
 ?>

<?php 
$file = $_FILES['file'];
if (filesize($file['tmp_name']) > 2000000){
die('{"error":true, "message":"Image too large"}');
}
$file = $_FILES['file'];
$name = $file['name'];
if(file_exists('upload/'.$name)){
	die('{"error":true, "message":"image exists leaves"}');
}
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name']);
$key = 'uploads/'.$_FILES['file']['name'];
$html = '<div class="file"><img src="'.$key.'">'.basename($key).'<div class="actions"><a href="'.basename($key).'" class="del">Remove</a></div></div>';
$html = str_replace('"', '\\"', $html);
die('{"error":false, "html":"'.$html.'"}');
 ?> 
