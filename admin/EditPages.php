<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php");; 
$msg = '';
$post_type = 'pages';
$title = '';
$slug = '';
$body = '';
$image = '';
$status =1;
$website_type = 1;
$template = '';
$dbpath = '';
$tmpLoc = '';
$result = '';
$old = '';
$userId = $_SESSION['UserID'];
$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);

if(isset($_POST['submit']) && $_POST['submit']){
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];
	$website_type = $website_type;
	if(!empty($_POST['template'])){
		$template = $_POST['template'];
	}
	$increment='';

	/*$numOfMatches = mysqli_query($db, "SELECT slug FROM posts WHERE slug LIKE '$slug%'");
	$numOfMatchesCount = mysqli_num_rows($numOfMatches);
	if($numOfMatchesCount !=1){
		echo 'true';
	}*/
	/*while(mysqli_fetch_array($numOfMatches)){
		$increment++;
	}

	if($increment > 0 || $increment = ''){
		 $slug .= '-'.$increment;

	}
	else{
		 $slug = $slug;
	}*/


		if($title == "" || $slug == "" || $body == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Fill * Mandatory Fields</b>
			</div>';
		}
	else if($title == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Title.</b>
			</div>';
		}
		else if($slug == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Slug.</b>
			</div>';
		}
		else if($body == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Content.</b>
			</div>';
		}
		
if ($_FILES['flPage']['name'] !='') {
	ini_set('memory_limit', '-1');
    $images = $_FILES['flPage'];
    $name = $images['name'];
    $nameArray = explode('.',$name);
    $fileName = $nameArray[0];
    $fileExt = $nameArray[1];
    $mime = explode('/',$images['type']);
    $mimeType = $mime[0];
    $mimeExt = $name[1];
    $tmpLoc = $images['tmp_name'];
    $fileSize = $images['size'];
    $allowed = array('png','jpg','jpeg','gif');
    $uploadName = md5(microtime()).'.'.$fileExt;

    $uploadPath = 'upload';

    if(!is_dir($uploadPath))
	mkdir($uploadPath,0777,true);
	$dbpath = $uploadPath.'/'.$uploadName;
	$q = "SELECT images FROM posts WHERE  id = $ID ";
$r = mysqli_query($db, $q);
$old = mysqli_fetch_assoc($r);
if(isset($old['images'])){
$q = "UPDATE posts SET images = '$dbpath' WHERE id = $ID";
$r = mysqli_query($db, $q);
}

    if ($mimeType != 'image') {
      $msg= '<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>The File must be an Image</div>';
    }
    if (!in_array($fileExt, $allowed)) {
      $msg= '<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>The file extension must be a png, jpg, jpeg or gif</div>';
    }
    if ($fileSize > 25000000) {
        $msg='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>The file size must be under 25mb</div>';
    }
    if ($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')) {
      $msg='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>File extension does mot match the file</div>';
    }



  }


if(!empty($_FILES)){
	$tmpLoc = $_FILES['flPage']['tmp_name'];
	move_uploaded_file($tmpLoc ,$dbpath);
	@$deleteFile = 'admin/'.$old['images'];
	if(@$old['images'] != '') {

		if(!is_dir($deleteFile)) {

			unlink($deleteFile);

		}

    }


  }

  $templateQ = "SELECT post_id from postmeta where post_id = '".$ID."'";
  $resulttemplate = mysqli_query($db, $templateQ);
 $templateCount = mysqli_num_rows($resulttemplate);
$date = 'now()';
echo $updatePage = "UPDATE posts SET title = '$title', slug = '$slug', body = '$body', website_type = $website_type ,created_updated = $date WHERE id = $ID";

$result = mysqli_query($db, $updatePage);
if($templateCount == 0){

  	$postmeta = "INSERT INTO postmeta (post_id, meta_value) VALUES ($ID,'$template') ";
	 	 mysqli_query($db, $postmeta);
	 	}else{

 $updatetemplate = "UPDATE postmeta SET meta_value = '$template' WHERE post_id = '".$ID."'";
 mysqli_query($db, $updatetemplate);
}



	if($result){
		$_SESSION["msg"] ='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Post has been Updated.</b>
		</div>';
		redirect("pages.php");
	}else{
		$msg='<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Post has not be Updated.</b>
		</div>';

	}
}
else{
	$query="SELECT * FROM posts WHERE  id='" . (int)$ID . "'";

	$result = mysqli_query ($db,$query) or die(mysqli_error());
	$num = mysqli_num_rows($result);

	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Pages ID.</b>
		</div>';
		redirect("pages.php");
	}
	else
	{
		$row = mysqli_fetch_array($result);

		$ID=$row["id"];
		$title=$row["title"];
		$slug=$row["slug"];
		$website_type=$row["website_type"];
		$body=$row["body"];
		$image = $row["images"];

	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit New Post</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include_once("Sidebar.php"); ?>

        <?php include_once("Header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit New Post</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Updated Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="pages.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
<?php
		  		//echo $msg;
			 if(isset($msg))
				{
					echo $msg;

				}
				/*if(isset($_SESSION["msg"]))
				{
					echo $_SESSION["msg"];
					$_SESSION["msg"]="";
				}*/
				?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>

	<div class="item form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Photo">Photo </label>
						  <div class="col-md-6 col-sm-6 col-xs-12">
						  	<img id="imagePreview" src="<?php echo $image; ?>" class="thumbnail" style="width: 100%; display: block;">
						  <input type="file" name="flPage" class="form-control col-md-7 col-xs-12" id="imgInp" />
						  <p class="help-block">Image types allowed: jpg, jpeg, gif, png.</p>
						  </div>
						</div>
	         <div class="form-group item">
	<label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<input type="text" name="title" id="title" autocomplete="off" value="<?php echo $title; ?>" class="form-control"  required="required" />
		</div>
	</div>
		  <div class="form-group item">
	<label for="slug" class="control-label col-md-3 col-sm-3 col-xs-12">Slug</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="input-group">
		<span class="input-group-addon"><?php echo BASE_URL; ?>/</span>
	<input type="text" name="slug" id="slug" value="<?php echo $slug; ?>" readonly="readonly" class="form-control" />
	</div>
</div>
	</div>
	
<?php if(!empty(glob('../'.VIEW."page-*.php"))){ ?>
	<div class="form-group item">
<label for="template" class="control-label col-md-3 col-sm-3 col-xs-12">Template:</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php
$metaQ = "SELECT * FROM postmeta WHERE post_id = $ID";
$metaR = mysqli_query($db,$metaQ);
$metaRow = mysqli_fetch_assoc($metaR);
$parent_value = $metaRow['meta_value']; ?>
<select class="form-control" id="template" name="template"  >

<option value="default" <?php echo  (($parent_value == 0)?' selected="selected"':''); ?>>Default Template</option>
<?php
foreach (glob('../'.VIEW."/page-*.php") as $filename) {
$str = file($filename);
$pattern = "/Page Template/";
$linesFound = preg_grep($pattern, $str);
$find = implode(':',$linesFound);
$findp = explode(":",$find);
$file = str_replace('*', '',$findp[1]);
$ext = str_replace('../content/themes/default//', '',$filename);
?>

<option value="<?php echo $ext; ?>" <?php echo  (($parent_value == $ext)?' selected="selected"':''); ?>><?php echo $findp[1]; ?></option>
<?php } ?>
</select>
</div></div><?php } ?>
	<div class="item form-group">
	<label for="" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">

	<textarea name="body" id="body" class="form-control" rows="6"> <?php echo $body; ?> </textarea>
	</div>
</div>

	<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="pages.php" class="btn btn-primary">Cancel</a>
                          <input type="submit" name="submit" class="btn btn-success"/>
                        </div>
                      </div>


	</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include_once("Footer.php"); ?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="vendors/validator/validator.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- validator -->
    <script>

     jQuery(function(){

"use strict";
 $('#title').keyup(function(e){
      var str = $(this).val();
      var trims = $.trim(str);
      var slug = trims.replace(/[^a-z0-9]/gi,'-').replace(/-+/g,'-').replace(/^-|-^$/g,'');
	  $("#slug").val(slug.toLowerCase());
 });


});

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result).width(240);
                    //.height(250);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });


  tinymce.init({
   selector: 'textarea',
   height: 200,
   menubar: false,
   branding: false,
   plugins: [
     'advlist autolink lists link image charmap print preview anchor',
     'searchreplace visualblocks code fullscreen',
     'insertdatetime media table contextmenu paste code'
   ],
   toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
   // enable title field in the Image dialog
  image_title: true,
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
   // add custom filepicker only to Image dialog
  file_picker_types: 'image',
   file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }

 });
    </script>
    <!-- /validator -->
  </body>
</html>
