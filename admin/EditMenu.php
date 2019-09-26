<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php"); 
$msg = '';
$menu_status =1;
$post_id = '';
$menu_label ='';
$menu_parent ='';
$userId = $_SESSION['UserID'];
$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);

if(isset($_POST['submit']) && $_POST['submit']){
		$post_id = db_escape($db,$_POST['post_id']);
  $menu_label = db_escape($db,$_POST['menu_label']);
  $menu_parent = db_escape($db,$_POST['menu_parent']);
  $menu_status = db_escape($db,$_POST['menu_status']);


			if($name == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Enter the Name</b>
			</div>';
		}



$date = 'now()';
echo $updatePage = "UPDATE menu SET name = '$name', status = '$status', col1 = '$col1', col2 = '$col2' ,user=$user, dateUpdate = $date, head_id = $head_id WHERE id = $ID";

$result = mysqli_query($db, $updatePage);




	if($result){
		$_SESSION["msg"] ='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Heading has been Updated.</b>
		</div>';
		redirect("heading.php");
	}else{
		$msg='<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Page Heading has not be Updated.</b>
		</div>';

	}
}
else{
	$query="SELECT * FROM menu WHERE  menu_id='" . (int)$ID . "'";

	$result = mysqli_query ($db,$query) or die(mysqli_error());
	$num = mysqli_num_rows($result);

	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Menu ID.</b>
		</div>';
		redirect("menu.php");
	}
	else
	{
		$row = mysqli_fetch_array($result);

		$id     =  $row["menu_id"];
		$name   =  $row["menu_label"];
		$status =  $row["menu_status"];
		$postid =  $row["post_id"];
		$parent =  $row["menu_parent"];

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

    <title>Edit Page Head</title>

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
                <h3>Edit Page Head</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Updated Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="head.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
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

	    <div class="form-group item">
  <label for="menu_label" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Name <span class="required">*</span></label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="menu_label" id="menu_label" class="form-control"  value="<?php echo $name; ?>" required="required" />
    </div>
  </div>
	
      <div class="form-group item">
  <label for="head_id" class="control-label col-md-3 col-sm-3 col-xs-12">Page Name</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <select class="form-control" id="post_id" name="post_id"  >
<option value="">Please Select the Page Name</option>
<?php
echo $qq = "SELECT id,title FROM posts WHERE post_type != 'slider'";
$r = mysqli_query($db, $qq);
while ($rows = mysqli_fetch_assoc($r)) {
?>

<option value="<?php echo $rows['id'] ?>" <?php if($rows['id'] == $postid){echo "SELECTED"; } ?>><?php echo $rows['title'] ?></option>
<?php } ?>
</select>
    </div>
  </div>
    <div class="form-group item">
  <label for="head_id" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Parent</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <select class="form-control" id="menu_parent" name="menu_parent"  >
<option value="0">Please Select the Menu Parent</option>
<?php
 
$qq = "SELECT menu_id,menu_label FROM menu WHERE menu_parent = 0";
$r = mysqli_query($db, $qq);
$pcount= mysqli_num_rows($r);


while ($rows = mysqli_fetch_assoc($r)) {
?>
<option value="<?php echo $rows['id'] ?>" <?php if($rows['id'] == $parent){echo "SELECTED"; } ?>><?php echo $rows['title'] ?></option>
<?php } ?>
</select>
    </div>
  </div>

   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
              <label>
                <input type="radio" name="status" value="1" <?php echo ($status == '1' ? 'checked' : ''); ?>> &nbsp; Active &nbsp;
              </label>
              <label>
                <input type="radio" name="status" value="0" <?php echo ($status == '0' ? 'checked' : ''); ?>> &nbsp; Deactive &nbsp;
              </label>
            </div>
            </div>

	<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="Heading.php" class="btn btn-primary">Cancel</a>
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
    
    <!-- /validator -->
  </body>
</html>
