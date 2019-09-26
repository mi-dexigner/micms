<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php"); 
$msg = '';
$name = '';
$status =1;
$col1 = '';
$col2 = '';
$sort = 0;
$head_id ='';
$dateAdded ='';
$dateUpdate ='';
$user = $_SESSION['UserID'];
$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);

if(isset($_POST['submit']) && $_POST['submit']){
		$name = db_escape($db,$_POST['name']);
	$status =  db_escape($db,$_POST['status']);
	$col1 =  db_escape($db,$_POST['col1']);
  $col2 =  db_escape($db,$_POST['col2']);
  $head_id = db_escape($db,$_POST['head_id']);
	$increment='';


			if($name == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Enter the Name</b>
			</div>';
		}



$date = 'now()';
echo $updatePage = "UPDATE heading SET name = '$name', status = '$status', col1 = '$col1', col2 = '$col2' ,user=$user, dateUpdate = $date, head_id = $head_id WHERE id = $ID";

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
	$query="SELECT * FROM heading WHERE  id='" . (int)$ID . "'";

	$result = mysqli_query ($db,$query) or die(mysqli_error());
	$num = mysqli_num_rows($result);

	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Post ID.</b>
		</div>';
		redirect("heading.php");
	}
	else
	{
		$row = mysqli_fetch_array($result);

		$id=$row["id"];
		$name=$row["name"];
		$status=$row["status"];
		$col1=$row["col1"];
		$col2=$row["col2"];
    $head_id=$row["head_id"];

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
	<label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>"  required="required" />
		</div>
	</div>
    <div class="form-group item">
  <label for="col1" class="control-label col-md-3 col-sm-3 col-xs-12">Col1 </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="col1" id="col1" class="form-control" value="<?php echo $col1; ?>"  />
    </div>
  </div>
    <div class="form-group item">
  <label for="col2" class="control-label col-md-3 col-sm-3 col-xs-12">Col2</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="col2" id="col2" class="form-control" value="<?php echo $col2; ?>" />
    </div>
  </div>

     <div class="form-group item">
  <label for="head_id" class="control-label col-md-3 col-sm-3 col-xs-12">Head Name</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <select class="form-control" id="head_id" name="head_id"  >
<option value="default">Please Select the Heads</option>
<?php
echo $qq = "SELECT id,name FROM heads";
$r = mysqli_query($db, $qq);
while ($rows = mysqli_fetch_assoc($r)) {
?>

<option value="<?php echo $rows['id'] ?>" <?php echo (($rows['id'] == $head_id)? "SELECTED":''); ?>><?php echo $rows['name'] ?></option>
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
