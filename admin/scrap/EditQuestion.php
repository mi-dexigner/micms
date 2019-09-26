<?php
include_once("Common.php");
include("CheckAdminLogin.php");


	$msg="";
	$Status=1;
	$ID=0;
	$Question="";
	$Answer1="";
	$Visibility1=1;
	$Answer2="";
	$Visibility2=1;
	$Answer3="";
	$Visibility3=1;
	$Answer4="";
	$Visibility4=1;
	$Answer5="";
	$Visibility5=1;
	$ClientID=0;
	
	$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);
		
if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
{			
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);
	if(isset($_POST["Status"]) && ((int)$_POST["Status"] == 0 || (int)$_POST["Status"] == 1))
		$Status=trim($_POST["Status"]);		
	if(isset($_POST["ClientID"]))
		$ClientID=trim($_POST["ClientID"]);
	if(isset($_POST["Question"]))
		$Question=trim($_POST["Question"]);
	if(isset($_POST["Answer1"]))
		$Answer1=trim($_POST["Answer1"]);
	if(isset($_POST["Visibility1"]) && ((int)$_POST["Visibility1"] == 0 || (int)$_POST["Visibility1"] == 1))
		$Visibility1=trim($_POST["Visibility1"]);
	if(isset($_POST["Answer2"]))
		$Answer2=trim($_POST["Answer2"]);
	if(isset($_POST["Visibility2"]) && ((int)$_POST["Visibility2"] == 0 || (int)$_POST["Visibility2"] == 1))
		$Visibility2=trim($_POST["Visibility2"]);	
	if(isset($_POST["Answer3"]))
		$Answer3=trim($_POST["Answer3"]);
	if(isset($_POST["Visibility3"]) && ((int)$_POST["Visibility3"] == 0 || (int)$_POST["Visibility3"] == 1))
		$Visibility3=trim($_POST["Visibility3"]);
	if(isset($_POST["Answer4"]))
		$Answer4=trim($_POST["Answer4"]);
	if(isset($_POST["Visibility4"]) && ((int)$_POST["Visibility4"] == 0 || (int)$_POST["Visibility4"] == 1))
		$Visibility4=trim($_POST["Visibility4"]);
	if(isset($_POST["Answer5"]))
		$Answer5=trim($_POST["Answer5"]);
	if(isset($_POST["Visibility5"]) && ((int)$_POST["Visibility5"] == 0 || (int)$_POST["Visibility5"] == 1))
		$Visibility5=trim($_POST["Visibility5"]);
	
		if($Question == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Question.</b>
			</div>';
		}
		else if($Answer1 == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Answer 1.</b>
			</div>';
		}
		else if($Visibility1 == 0)
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Visible Answer 1.</b>
			</div>';
		}
		else if($Answer2 == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Answer 2.</b>
			</div>';
		}
		else if($Visibility2 == 0)
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Visible Answer 2.</b>
			</div>';
		}
		else if($ClientID == 0)
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Select Client.</b>
			</div>';
		}

	if($msg=="")
	{

		$query="UPDATE questions SET DateModified=NOW(),
				ClientID='".(int)$ClientID . "',
				Question = '" . dbinput($Question) . "',
				Answer1 = '" . dbinput($Answer1) . "',
				Visibility1='".(int)$Visibility1 . "',
				Answer2 = '" . dbinput($Answer2) . "',
				Visibility2='".(int)$Visibility2 . "',
				Answer3 = '" . dbinput($Answer3) . "',
				Visibility3='".(int)$Visibility3 . "',
				Answer4 = '" . dbinput($Answer4) . "',
				Visibility4='".(int)$Visibility4 . "',
				Answer5 = '" . dbinput($Answer5) . "',
				Visibility5='".(int)$Visibility5 . "',
				Status='".(int)$Status . "',
				PerformedBy = '" . dbinput($_SESSION['UserID']) . "' Where ID = ".$ID."";
		mysql_query($query) or die (mysql_error());
		// echo $query;
		//$ID = mysql_insert_id();
		$_SESSION["msg"]='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Question has been Updated.</b>
		</div>';		
		
		redirect($_SERVER["PHP_SELF"].'?ID='.$ID);	
	}
		

}
else
{
	$query="SELECT * FROM questions WHERE  ID='" . (int)$ID . "'";
	
	$result = mysql_query ($query) or die(mysql_error()); 
	$num = mysql_num_rows($result);
	
	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Question ID.</b>
		</div>';
		redirect("Questions.php");
	}
	else
	{
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		
		$ID=$row["ID"];
		$ClientID=$row["ClientID"];
		$Question=$row["Question"];
		$Answer1=$row["Answer1"];
		$Visibility1=$row["Visibility1"];
		$Answer2=$row["Answer2"];
		$Visibility2=$row["Visibility2"];
		$Answer3=$row["Answer3"];
		$Visibility3=$row["Visibility3"];
		$Answer4=$row["Answer4"];
		$Visibility4=$row["Visibility4"];
		$Answer5=$row["Answer5"];
		$Visibility5=$row["Visibility5"];
		$Status=$row["Status"];
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

    <title>Edit Question</title>

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
                <h3>Edit Question</h3>
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
                    <h2>Update Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="Questions.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  <?php
		  		//echo $msg;
				if(isset($_SESSION["msg"]))
				{
					echo $_SESSION["msg"];
					$_SESSION["msg"]="";
				}
				?>
                  <div class="x_content">

                    <form id="frmPages" action="<?php echo $_SERVER["PHP_SELF"];?>?ID=<?php echo $ID; ?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
					  <input type="hidden" name="action" value="submit_form" />
					  <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                      <span class="section">Fill All Mandatory Fields</span>

					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Client <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="ClientID" id="ClientID" required="required" class="form-control">
							<?php
							 $query = "SELECT ID,FirstName,LastName FROM client_users Where Status = 1 ORDER BY FirstName ASC";
							$res = mysql_query($query);
							$num = mysql_num_rows($res);
							if($num > 0)
							{
								while($row = mysql_fetch_array($res))
								{
								echo '<option '.($ClientID == $row['ID'] ? 'selected' : '').' value="'.$row['ID'].'">'.$row['FirstName'].' '.$row['LastName'].'</option>';
								} 
							}
							else
							{
								echo '<option value="0">Client Not Found! (Add Client Before Create Any Question)</option>';
							}
							
							?>
						  </select>
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Question">Question <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="3" id="Question" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="Question" required="required"><?php echo $Question; ?></textarea>
                        </div>
                      </div>
					  
					  <br><br>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Answer1">Answer 1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Answer1" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Answer1" required="required" type="text" value="<?php echo $Answer1; ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Visibility</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Visibility1" value="1" <?php echo ($Visibility1 == '1' ? 'checked' : ''); ?>> &nbsp; Yes &nbsp;
							</label>
							<label>
							  <input type="radio" name="Visibility1" value="0" <?php echo ($Visibility1 == '0' ? 'checked' : ''); ?>> &nbsp; No &nbsp;
							</label>
						</div>
					  </div>
					  
					   <br><br>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Answer2">Answer 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Answer2" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Answer2" required="required" type="text" value="<?php echo $Answer2; ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Visibility</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Visibility2" value="1" <?php echo ($Visibility2 == '1' ? 'checked' : ''); ?>> &nbsp; Yes &nbsp;
							</label>
							<label>
							  <input type="radio" name="Visibility2" value="0" <?php echo ($Visibility2 == '0' ? 'checked' : ''); ?>> &nbsp; No &nbsp;
							</label>
						</div>
					  </div>
					  
					  <br><br>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Answer3">Answer 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Answer3" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Answer3" type="text" value="<?php echo $Answer3; ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Visibility</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Visibility3" value="1" <?php echo ($Visibility3 == '1' ? 'checked' : ''); ?>> &nbsp; Yes &nbsp;
							</label>
							<label>
							  <input type="radio" name="Visibility3" value="0" <?php echo ($Visibility3 == '0' ? 'checked' : ''); ?>> &nbsp; No &nbsp;
							</label>
						</div>
					  </div>
					  
					  <br><br>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Answer4">Answer 4</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Answer4" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Answer4" type="text" value="<?php echo $Answer4; ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Visibility</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Visibility4" value="1" <?php echo ($Visibility4 == '1' ? 'checked' : ''); ?>> &nbsp; Yes &nbsp;
							</label>
							<label>
							  <input type="radio" name="Visibility4" value="0" <?php echo ($Visibility4 == '0' ? 'checked' : ''); ?>> &nbsp; No &nbsp;
							</label>
						</div>
					  </div>
					  
					  <br><br>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Answer5">Answer 5</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Answer5" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Answer5" type="text" value="<?php echo $Answer5; ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Visibility</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Visibility5" value="1" <?php echo ($Visibility5 == '1' ? 'checked' : ''); ?>> &nbsp; Yes &nbsp;
							</label>
							<label>
							  <input type="radio" name="Visibility5" value="0" <?php echo ($Visibility5 == '0' ? 'checked' : ''); ?>> &nbsp; No &nbsp;
							</label>
						</div>
					  </div>
					  
					  <br><br>
					  
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Status" value="1" <?php echo ($Status == '1' ? 'checked' : ''); ?>> &nbsp; Active &nbsp;
							</label>
							<label>
							  <input type="radio" name="Status" value="0" <?php echo ($Status == '0' ? 'checked' : ''); ?>> &nbsp; Deactive &nbsp;
							</label>
						</div>
					  </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="Questions.php" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
  </body>
</html>