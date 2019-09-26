<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php");
$msg = '';
$menu_status =1;
$post_id = '';
$menu_label ='';
$menu_parent ='';
$userId = $_SESSION['UserID'];
if(isset($_POST['submit']) && $_POST['submit']){
	$post_id = db_escape($db,$_POST['post_id']);
	$menu_label = db_escape($db,$_POST['menu_label']);
	$menu_parent = db_escape($db,$_POST['menu_parent']);
	$menu_status = db_escape($db,$_POST['menu_status']);

	
	if(empty($menu_label))
		{
			$msg .='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Enter the Menu Name</b>
			</div>';
		}else{

$insertPage = "INSERT INTO  menu ( post_id,menu_label,menu_parent, menu_status,userId) VALUES ('$post_id','$menu_label', '$menu_parent','$menu_status','$userId') ";

	$result = mysqli_query($db, $insertPage);

	if($result){
		$msg .='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Menu has been added.</b>
		</div>';
		redirect("menu.php");
	}else{
		$msg .='<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Menu has not be added.</b>
		</div>';
	redirect("menu.php");

	}



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

    <title>Add New Menu</title>

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
                <h3>Add New Menu</h3>
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
            	<?php if(isset($msg)){ echo $msg;} ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Insert Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="menu.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>

	
	         <div class="form-group item">
	<label for="menu_label" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Name <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<input type="text" name="menu_label" id="menu_label" class="form-control"  required="required" />
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

<option value="<?php echo $rows['id'] ?>"><?php echo $rows['title'] ?></option>
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
<option value="<?php echo $rows['menu_id'] ?>"><?php echo $rows['menu_label'] ?></option>
<?php echo $qqq = "SELECT menu_id,menu_label FROM menu WHERE menu_parent =  ".$rows['menu_id'];
$rr = mysqli_query($db, $qqq); ?>
<?php while ($rowss = mysqli_fetch_assoc($rr)) {
?>
<option value="<?php echo $rowss['menu_id'] ?>">--------<?php echo $rowss['menu_label'] ?></option>
<?php echo $qqqq = "SELECT menu_id,menu_label FROM menu WHERE menu_parent =  ".$rowss['menu_id'];
$rrr = mysqli_query($db, $qqqq); ?>
<?php while ($rowsss = mysqli_fetch_assoc($rrr)) {
?>
<option value="<?php echo $rowsss['menu_id'] ?>">--------------<?php echo $rowsss['menu_label'] ?></option>
<?php } ?>
<?php } ?>
<?php } ?>

</select>
    </div>
  </div>

   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_status">Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
              <label>
                <input type="radio" name="menu_status" value="1" <?php echo ($menu_status == '1' ? 'checked' : ''); ?>> &nbsp; Active &nbsp;
              </label>
              <label>
                <input type="radio" name="menu_status" value="0" <?php echo ($menu_status == '0' ? 'checked' : ''); ?>> &nbsp; Deactive &nbsp;
              </label>
            </div>
            </div>
	


	<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="menu.php" class="btn btn-primary">Cancel</a>
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
