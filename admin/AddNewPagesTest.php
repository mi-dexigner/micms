<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php");
$msg = '';
$post_type = 'pages';
$status =1;
$dbpath = '';
$tmpLoc = '';
$userId = $_SESSION['UserID'];
if(isset($_POST['submit']) && $_POST['submit']){
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];
	$website_type = $_POST['website_type'];
	$template = $_POST['template'];
	$increment='';

	$numOfMatches = mysqli_query($db, "SELECT slug FROM posts WHERE slug LIKE '$slug%'");
	while(mysqli_fetch_array($numOfMatches)){
		$increment++;
	}

	if($increment > 0 || $increment = ''){
		 $slug .= '-'.$increment;

	}
	else{
		 $slug = $slug;
	}
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
		else if($website_type != 0)
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Website.</b>
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
    move_uploaded_file($tmpLoc,$dbpath);
  }

	 $insertPage = "INSERT INTO posts (title, slug, body,images,website_type,userId,post_type,status) VALUES ('$title', '$slug', '$body','$dbpath','$website_type',$userId,'$post_type',$status) ";
	$result = mysqli_query($db, $insertPage);
	$idd = mysqli_insert_id($db);
	if(!empty($template)){
		$postmeta = "INSERT INTO postmeta (post_id, meta_value) VALUES ($idd,'$template') ";
	 	 mysqli_query($db, $postmeta);

	}
	if($result){
		$msg='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Post has been added.</b>
		</div>';
		//redirect("AddNewPost.php");
	}else{
		$msg='<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Post has not be added.</b>
		</div>';
		//redirect("AddNewPost.php");

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

    <title>Add New Post</title>

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
                <h3>Add New Post</h3>
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
                    <h2>Insert Form</h2>
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
						  	<img id="imagePreview" class="thumbnail" style="width: 100%; height: auto; display: block;">
						  <input type="file" name="flPage" class="form-control col-md-7 col-xs-12" id="imgInp" />
						  <p class="help-block">Image types allowed: jpg, jpeg, gif, png.</p>
						  </div>
						</div>
	         <div class="form-group item">
	<label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<input type="text" name="title" id="title" autocomplete="off" class="form-control"  required="required" />
		</div>
	</div>
		  <div class="form-group item">
	<label for="slug" class="control-label col-md-3 col-sm-3 col-xs-12">Slug</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="input-group">
		<span class="input-group-addon">http://example.com/home</span>
	<input type="text" name="slug" id="slug" readonly="readonly" class="form-control" />
	</div>
</div>
	</div>
	<div class="form-group item">
<label for="website_type" class="control-label col-md-3 col-sm-3 col-xs-12">Website <span class="required">*</span>:</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select class="form-control" id="website_type" name="website_type"  required="required">
<option value="0">Please Select Website</option>
<?php
$website_typeQ = mysqli_query($db, "SELECT * FROM website_type ORDER BY label");
while($website = mysqli_fetch_assoc($website_typeQ)): ?>
  <option value="<?=$website['id'];?>"><?=$website['label'];?></option>
<?php endwhile; ?>
</select>
</div></div>
<?php if(!empty(glob("../template/page-*.php"))){ ?>
	<div class="form-group item">
<label for="template" class="control-label col-md-3 col-sm-3 col-xs-12">Template:</label>
<div class="col-md-6 col-sm-6 col-xs-12">

<select class="form-control" id="template" name="template"  >
<option value="default">Default Template</option>
<?php
foreach (glob("../template/page-*.php") as $filename) {
$str = file($filename);
$pattern = "/Page Template/";
$linesFound = preg_grep($pattern, $str);
$find = implode(':',$linesFound);
$findp = explode(":",$find);
$file = str_replace('*', '',$findp[1]);
$ext = str_replace('../template/', '',$filename); ?>

<option value="<?php echo str_replace('../template/', '',$filename); ?>"><?php echo $findp[0]; ?></option>
<?php } ?>
</select>
</div></div><?php } ?>
	<div class="item form-group">
	<label for="" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<textarea name="body" id="body" class="form-control" rows="6"></textarea>
	</div>
</div>

	<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="pages.php" class="btn btn-primary">Cancel</a>
                          <input type="submit" name="submit" class="btn btn-success"/>
													<div id="autoSave"></div>
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

 });
// auto save data
 $(document).ready(function(){
function autoSave(){
var post_title = $('#title').val();
var post_content = $('#body').val();
var post_id = $('#id').val();
	if(post_title != ''){
		$.ajax({
			url:"save_post.php",
			method : "POST",
			data:{title:post_title,body:post_content},
			dataType:"text",
			success:function(data){
				if(data !=''){
					$('#post_title').val(data);
				}
				$('#autoSave').text("Post save as draft");
				setInterval(function(){
					$('#autoSave').text('');
				},2000);
			}
		});
	}
}

setInterval(function(){
	autoSave();
},10000)

 });
    </script>
    <!-- /validator -->
  </body>
</html>
