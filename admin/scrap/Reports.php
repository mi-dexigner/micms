<?php include("Common.php"); ?>
<?php include("CheckAdminLogin.php"); ?>
<?php 

	$action = "";
	$msg = "";
	if(isset($_POST["action"]))
		$action = $_POST["action"];

if(!isset($_SESSION['ClientIDReports']))
$_SESSION['ClientIDReports']=0;

if(!isset($_SESSION['LocationReports']))
$_SESSION['LocationReports']=0;

if(!isset($_SESSION['QuestionReports']))
$_SESSION['QuestionReports']=0;

if(!isset($_SESSION['GenderReports']))
$_SESSION['GenderReports']=2;

if(!isset($_SESSION['AgeReports']))
$_SESSION['AgeReports']=0;

if(!isset($_SESSION['OverviewReports']))
$_SESSION['OverviewReports']=0;
	
$TillDate=date("Y-m-d");
$d=strtotime("-1 Month");		
$FromDate=date("Y-m-d", $d);

if(!isset($_SESSION['FromDateReports']))
$_SESSION['FromDateReports']=$FromDate;

if(!isset($_SESSION['TillDateReports']))
$_SESSION['TillDateReports']=$TillDate;

$e=strtotime($_SESSION['FromDateReports']);
$SearchFrom = date("jS F Y",$e);
$e=strtotime($_SESSION['TillDateReports']);
$SearchTill = date("jS F Y",$e);

if(isset($_REQUEST["ClientID"]))
		$_SESSION['ClientIDReports']=trim($_REQUEST["ClientID"]);
if(isset($_REQUEST["Location"]))
		$_SESSION['LocationReports']=trim($_REQUEST["Location"]);
if(isset($_REQUEST["Question"]))
		$_SESSION['QuestionReports']=trim($_REQUEST["Question"]);
if(isset($_REQUEST["Gender"]))
		$_SESSION['GenderReports']=trim($_REQUEST["Gender"]);
if(isset($_REQUEST["Age"]))
		$_SESSION['AgeReports']=trim($_REQUEST["Age"]);
if(isset($_REQUEST["Overview"]))
		$_SESSION['OverviewReports']=trim($_REQUEST["Overview"]);
if(isset($_REQUEST["FromDate"]))
		$_SESSION['FromDateReports']=trim($_REQUEST["FromDate"]);
if(isset($_REQUEST["TillDate"]))
		$_SESSION['TillDateReports']=trim($_REQUEST["TillDate"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reports</title>

	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
		<?php include_once("Sidebar.php"); ?>
		
		
		<?php include_once("Header.php"); ?>

       
		
		
        <!-- page content -->
        <div class="right_col" role="main" style="min-height:0px; !important">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reports <small>Details of Feedbacks</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
                  <div class="form-group">
					<div class="col-md-12 col-sm-12 col-xs-12">
					  <div id="gender" class="btn-group" data-toggle="buttons">
						<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						  <input type="radio" name="gender" value="male" data-parsley-multiple="gender"> &nbsp; Row Data &nbsp;
						</label>
						<label onclick="location.href='ReportsGraphs.php'" class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						  <input type="radio" name="gender" value="female" data-parsley-multiple="gender"> Graphs
						</label>
					  </div>
					</div>
				  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Search Filters</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="<?php echo $self;?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						
					  <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">From Date</label>
                        <div class="col-md-5 col-sm-5 col-xs-6">
                          <input name="FromDate" value="<?php echo $_SESSION['FromDateReports']; ?>" style="color:#999;" id="birthday" class="form-control col-md-7 col-xs-12" type="date">
                        </div>
						<label class="control-label col-md-1 col-sm-1 col-xs-6">Till Date</label>
                        <div class="col-md-5 col-sm-5 col-xs-6">
                          <input name="TillDate" value="<?php echo $_SESSION['TillDateReports']; ?>" style="color:#999;" id="birthday" class="form-control col-md-7 col-xs-12" type="date">
                        </div>
                      </div>	
					  <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">Client</label>
                        <div class="col-md-5 col-sm-5 col-xs-6">
                          <select name="ClientID" class="select2_single1 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['ClientIDReports'] == '0' ? 'selected' : ''); ?> value="0">Feedback of All Clients</option>
                            <?php
							$query = "SELECT ID,FirstName,LastName FROM client_users where ID <> 0 ORDER BY FirstName ASC";
							$res = mysql_query($query);
							while($row = mysql_fetch_array($res))
							{
							echo '<option '.($_SESSION['ClientIDReports'] == $row['ID'] ? 'selected' : '').' value="'.$row['ID'].'">'.$row['FirstName'].' '.$row['LastName'].'</option>';
							} 
							?>
                          </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">Location</label>
                        <div class="col-md-5 col-sm-5 col-xs-6">
                          <select name="Location" class="select2_single2 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['LocationReports'] == '0' ? 'selected' : ''); ?> value="0">Feedback of All Locations</option>
                            <?php
							$query = "SELECT l.ID,l.Name,c.FirstName,c.LastName FROM locations l LEFT JOIN client_users c ON l.ClientID = c.ID where l.ID <> 0 ".($_SESSION['ClientIDReports'] != 0 ? ' AND c.ID = '.$_SESSION['ClientIDReports'].'' : '')." ORDER BY c.FirstName,l.Name ASC";
							$res = mysql_query($query);
							while($row = mysql_fetch_array($res))
							{
							echo '<option '.($_SESSION['LocationReports'] == $row['ID'] ? 'selected' : '').' value="'.$row['ID'].'">'.$row['Name'].' '.($_SESSION['ClientIDReports'] == 0 ? '('.$row['FirstName'].' '.$row['LastName'].')' : '').'</option>';
							} 
							?>
                          </select>
                          </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">Question</label>
                        <div class="col-md-11 col-sm-11 col-xs-6">
                          <select name="Question" class="select2_single3 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['QuestionReports'] == '0' ? 'selected' : ''); ?> value="0">Feedback of All Questions</option>
                            <?php
							$query = "SELECT l.ID,l.Question,c.FirstName,c.LastName FROM questions l LEFT JOIN client_users c ON l.ClientID = c.ID where l.ID <> 0 ".($_SESSION['ClientIDReports'] != 0 ? ' AND c.ID = '.$_SESSION['ClientIDReports'].'' : '')." ORDER BY c.FirstName,l.Question ASC";
							$res = mysql_query($query);
							while($row = mysql_fetch_array($res))
							{
							echo '<option '.($_SESSION['QuestionReports'] == $row['ID'] ? 'selected' : '').' value="'.$row['ID'].'">'.$row['Question'].' '.($_SESSION['ClientIDReports'] == 0 ? '('.$row['FirstName'].' '.$row['LastName'].')' : '').'</option>';
							} 
							?>
                          </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">Gender</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select name="Gender" class="select2_single4 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['GenderReports'] == '2' ? 'selected' : ''); ?> value="2">Both Genders</option>
                            <option <?php echo ($_SESSION['GenderReports'] == '1' ? 'selected' : ''); ?> value="1">Male</option>
							<option <?php echo ($_SESSION['GenderReports'] == '0' ? 'selected' : ''); ?> value="0">Female</option>
                          </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-6">Age</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select name="Age" class="select2_single5 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['AgeReports'] == '0' ? 'selected' : ''); ?> value="0">All Ages</option>
                            <option <?php echo ($_SESSION['AgeReports'] == '1' ? 'selected' : ''); ?> value="1">Below 20 Age</option>
							<option <?php echo ($_SESSION['AgeReports'] == '2' ? 'selected' : ''); ?> value="2">21 to 40 Age</option>
							<option <?php echo ($_SESSION['AgeReports'] == '3' ? 'selected' : ''); ?> value="3">Above 40 Age</option>
                          </select>
                        </div>
						<label class="control-label col-md-1 col-sm-1 col-xs-6">Overview</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select name="Overview" class="select2_single6 form-control" tabindex="-1">
                            <option <?php echo ($_SESSION['OverviewReports'] == '0' ? 'selected' : ''); ?> value="0">Both Filled and Unfilled</option>
                            <option <?php echo ($_SESSION['OverviewReports'] == '1' ? 'selected' : ''); ?> value="1">Filled Overviews</option>
							<option <?php echo ($_SESSION['OverviewReports'] == '2' ? 'selected' : ''); ?> value="2">Unfilled Overviews</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
						<div class="col-md-11 col-sm-11 col-xs-12">
                          <h3>Search Result From <span class="dark"><?php echo $SearchFrom; ?></span> Till <span class="dark"><?php echo $SearchTill; ?></span></h3>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-12 pull-right">
                          <button type="submit" class="btn btn-success">Filter It</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
			<!-- top tiles -->
			  <div class="row tile_count" style="text-align:center;">
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-envelope"></i> Total Feedbacks</span>
				  <div class="count dark"><?php echo total_feedbacks_report(1,0,0,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-male"></i> Male Feedbacks</span>
				  <div class="count green"><?php echo total_feedbacks_report(0,1,0,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-female"></i> Female Feedbacks</span>
				  <div class="count green"><?php echo total_feedbacks_report(0,0,1,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Below 20 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks_report(0,0,0,1,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 20 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks_report(0,0,0,0,1,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 40 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks_report(0,0,0,0,0,1,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
			  </div>
			<!-- /top tiles -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Feedbacks</h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a onClick="javascript:doDelete()" class="btn btn-default active"><i class="fa fa-trash"></i> Bulk Delete</a></li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
				   <?php
						echo $msg;
						if(isset($_SESSION["msg"]) && $_SESSION["msg"]!="")
						{
							echo $_SESSION["msg"];
							$_SESSION["msg"]="";
						}
					?>
                  <div class="x_content">
					<?php 
					$query="SELECT f.ID,f.Gender,f.AgeGroup,f.Name,f.Phone,f.EmailAddress,f.Message,DATE_FORMAT(f.DateAdded, '%D %b %Y<br>%r') AS Added
					FROM feedbacks f LEFT JOIN feedbacks_details fd ON fd.FeedbackID = f.ID WHERE f.ID <>0 AND (f.DateAdded BETWEEN '".$_SESSION['FromDateReports']."' AND '".$_SESSION['TillDateReports']."') ".($_SESSION['ClientIDReports'] != 0 ? ' AND f.ClientID = '.$_SESSION['ClientIDReports'].'' : '')." ".($_SESSION['LocationReports'] != 0 ? ' AND f.LocationID = '.$_SESSION['LocationReports'].'' : '')." ".($_SESSION['QuestionReports'] != 0 ? ' AND fd.QuestionID = '.$_SESSION['QuestionReports'].'' : '')." ".($_SESSION['GenderReports'] != 2 ? ' AND f.Gender = '.$_SESSION['GenderReports'].'' : '')." ".($_SESSION['AgeReports'] != 0 ? ' AND f.AgeGroup = '.$_SESSION['AgeReports'].'' : '')." ".($_SESSION['OverviewReports'] != 0 ? ($_SESSION['OverviewReports'] == 1 ? ' AND f.Message <> ""' : 'AND f.Message = ""') : '')." GROUP BY f.ID ORDER BY f.ID DESC";
					$result = mysql_query ($query) or die(mysql_error()); 
					$num = mysql_num_rows($result);
					?>
					<form id="frmPages"  method="post" action="<?php echo $self;?>">
					<input type="hidden" id="action" name="action" value="" />
					<input type="hidden" id="DeleteID" name="DeleteID" value="" />
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap bulk_action" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <!--<th class="no-sort" style="text-align:center"><input type="checkbox" name="chkAll" class="checkUncheckAll"></th>-->
                          <th>NAME</th>
                          <th>EMAIL</th>
						  <th>PHONE</th>
						  <th>GENDER</th>
						  <th>AGE</th>
						  <th>OVERVIEW</th>
                          <th>ADDED</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
						<?php
							if($num==0)
							{
						?>
								<tr class="noPrint">
								  <td colspan="11" align="center" class="error"><b>No Feedback listed.</b></td>
								</tr>
							<?php 
							}
							else
							{
							?>
								
						<?php
							while($row = mysql_fetch_array($result,MYSQL_ASSOC))
							{
						?>
                        <tr>
						  <!--<td align="center" class="noPrint"><?php //echo ($_SESSION['RoleID'] == 1 ? '<input class="chkIds" type="checkbox" name="ids[]" value="'.$row["ID"].'" />' : ''); ?>
							<input type="hidden" name="ids1[]" value="<?php //echo $row["ID"]; ?>"></td>-->
						  <td><?php echo dboutput($row["Name"]); ?></td>
						  <td><?php echo dboutput($row["EmailAddress"]); ?></td>
						  <td><?php echo dboutput($row["Phone"]); ?></td>
						  <td><?php if(dboutput($row["Gender"])=='1'){echo 'Male';}else{echo 'Female';} ?></td>
						  <td><?php if(dboutput($row["AgeGroup"])=='1'){echo 'Blow 20';}else if(dboutput($row["AgeGroup"])=='2'){echo 'Between 21 to 40';}else if(dboutput($row["AgeGroup"])=='3'){echo '40 Above';} ?></td>
						  <td><?php echo dboutput($row["Message"]); ?></td>
						  <td><?php echo $row["Added"]; ?></td>
						  <td align="center" class="noPrint"><button class="btn bg-navy btn-xs" type="button" onClick="location.href='ViewFeedback.php?ID=<?php echo $row["ID"]; ?>'"><i class="fa fa-eye"></i></button></td>
						</tr>
                        <?php				
								}
							} 
						?>
                      </tbody>
                    </table>
					</form>
                  </div>
                </div>
              </div>
            </div>
			<!-- top tiles -->
			
			  <div class="row tile_count" style="text-align:center;">
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-envelope"></i> Total Questions</span>
				  <div class="count dark"><?php echo total_question_report(1,0,0,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-male"></i> Male Questions</span>
				  <div class="count green"><?php echo total_question_report(0,1,0,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-female"></i> Female Questions</span>
				  <div class="count green"><?php echo total_question_report(0,0,1,0,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Below 20 Age Questions</span>
				  <div class="count"><?php echo total_question_report(0,0,0,1,0,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 20 Age Questions</span>
				  <div class="count"><?php echo total_question_report(0,0,0,0,1,0,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 40 Age Questions</span>
				  <div class="count"><?php echo total_question_report(0,0,0,0,0,1,$_SESSION['ClientIDReports'],$_SESSION['LocationReports'],$_SESSION['QuestionReports'],$_SESSION['GenderReports'],$_SESSION['AgeReports'],$_SESSION['OverviewReports'],$_SESSION['FromDateReports'],$_SESSION['TillDateReports']); ?></div>
				</div>
			  </div>
			<!-- /top tiles -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Questions</h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a onClick="javascript:doDelete()" class="btn btn-default active"><i class="fa fa-trash"></i> Bulk Delete</a></li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
				   <?php
						echo $msg;
						if(isset($_SESSION["msg"]) && $_SESSION["msg"]!="")
						{
							echo $_SESSION["msg"];
							$_SESSION["msg"]="";
						}
					?>
                  <div class="x_content">
					<?php 
					$query="SELECT f.Gender,f.AgeGroup,q.Question,fd.Answer,f.EmailAddress,DATE_FORMAT(f.DateAdded, '%D %b %Y<br>%r') AS Added
					FROM feedbacks_details fd LEFT JOIN feedbacks f ON fd.FeedbackID = f.ID LEFT JOIN questions q ON fd.QuestionID = q.ID WHERE f.ID <>0 AND (f.DateAdded BETWEEN '".$_SESSION['FromDateReports']."' AND '".$_SESSION['TillDateReports']."') ".($_SESSION['ClientIDReports'] != 0 ? ' AND f.ClientID = '.$_SESSION['ClientIDReports'].'' : '')." ".($_SESSION['LocationReports'] != 0 ? ' AND f.LocationID = '.$_SESSION['LocationReports'].'' : '')." ".($_SESSION['QuestionReports'] != 0 ? ' AND fd.QuestionID = '.$_SESSION['QuestionReports'].'' : '')." ".($_SESSION['GenderReports'] != 2 ? ' AND f.Gender = '.$_SESSION['GenderReports'].'' : '')." ".($_SESSION['AgeReports'] != 0 ? ' AND f.AgeGroup = '.$_SESSION['AgeReports'].'' : '')." ".($_SESSION['OverviewReports'] != 0 ? ($_SESSION['OverviewReports'] == 1 ? ' AND f.Message <> ""' : 'AND f.Message = ""') : '')." ORDER BY f.ID DESC";
					$result = mysql_query ($query) or die(mysql_error()); 
					$num = mysql_num_rows($result);
					?>
					<form id="frmPages"  method="post" action="<?php echo $self;?>">
					<input type="hidden" id="action" name="action" value="" />
					<input type="hidden" id="DeleteID" name="DeleteID" value="" />
                    <table id="datatable-buttons2" class="table table-striped table-bordered dt-responsive nowrap bulk_action" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <!--<th class="no-sort" style="text-align:center"><input type="checkbox" name="chkAll" class="checkUncheckAll"></th>-->
                          <th>EMAIL</th>
                          <th>QUESTION</th>
						  <th>ANSWER</th>
						  <th>GENDER</th>
						  <th>AGE</th>
                          <th>ADDED</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php
							if($num==0)
							{
						?>
								<tr class="noPrint">
								  <td colspan="11" align="center" class="error"><b>No Questions listed.</b></td>
								</tr>
							<?php 
							}
							else
							{
							?>
								
						<?php
							while($row = mysql_fetch_array($result,MYSQL_ASSOC))
							{
						?>
                        <tr>
						  <!--<td align="center" class="noPrint"><?php //echo ($_SESSION['RoleID'] == 1 ? '<input class="chkIds" type="checkbox" name="ids[]" value="'.$row["ID"].'" />' : ''); ?>
							<input type="hidden" name="ids1[]" value="<?php //echo $row["ID"]; ?>"></td>-->
						  <td><?php echo dboutput($row["EmailAddress"]); ?></td>
						  <td><?php echo dboutput($row["Question"]); ?></td>
						  <td><?php echo dboutput($row["Answer"]); ?></td>
						  <td><?php if(dboutput($row["Gender"])=='1'){echo 'Male';}else{echo 'Female';} ?></td>
						  <td><?php if(dboutput($row["AgeGroup"])=='1'){echo 'Blow 20';}else if(dboutput($row["AgeGroup"])=='2'){echo 'Between 21 to 40';}else if(dboutput($row["AgeGroup"])=='3'){echo '40 Above';} ?></td>
						  <td><?php echo $row["Added"]; ?></td>
						</tr>
                        <?php				
								}
							} 
							mysql_close($dbh);
						?>
                      </tbody>
                    </table>
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
	
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
	
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
	<!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single1").select2({
          placeholder: "Feedbacks of All Clients",
          allowClear: true
        });
		$(".select2_single2").select2({
          placeholder: "Feedbacks of All Locations",
          allowClear: true
        });
		$(".select2_single3").select2({
          placeholder: "Feedbacks of All Questions",
          allowClear: true
        });
		$(".select2_single4").select2({
          placeholder: "Both Genders",
          allowClear: true
        });
		$(".select2_single5").select2({
          placeholder: "All Ages",
          allowClear: true
        });
		$(".select2_single6").select2({
          placeholder: "Both Filled and Unfilled",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
	<!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Blfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
				"order": [[ 0, "asc" ]],
				"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 7 ] } ],
				"iDisplayLength": 10,
				"aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],
            });
          }
        };
		
		var handleDataTableButtons2 = function() {
          if ($("#datatable-buttons2").length) {
            $("#datatable-buttons2").DataTable({
              dom: "Blfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
				"order": [[ 0, "asc" ]],
				"aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
				"iDisplayLength": 10,
				"aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
			  handleDataTableButtons2();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

      //  $('#datatable-responsive').DataTable();
		
		$('#datatable-responsive').DataTable({
				"order": [[ 1, "asc" ]],
				"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 8 ] } ],
				"iDisplayLength": 10,
				"aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
			});

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
	


  </body>
</html>