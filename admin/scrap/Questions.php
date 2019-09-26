<?php include("Common.php"); ?>
<?php include("CheckAdminLogin.php"); ?>
<?php 
	$action = "";
	$DeleteID = 0;
	$msg = "";
	if(isset($_POST["action"]))
		$action = $_POST["action"];
	if(isset($_POST["DeleteID"]))
		$DeleteID = $_POST["DeleteID"];
if($action == "delete")
	{
		if(isset($_REQUEST["ids"]) && is_array($_REQUEST["ids"]))
		{
			foreach($_REQUEST["ids"] as $BID)
			{
				
			mysql_query("DELETE FROM questions  WHERE ID IN (" . $BID . ")") or die (mysql_error());
			
			}
						
			$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Delete All selected Questions.</b>
			</div>';
			redirect("Questions.php");
		
		}
		else
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please select Question to delete.</b>
			</div>';
		}
	}
	
if($action == "SingleDelete")
	{
		if(isset($_REQUEST["DeleteID"]))
		{
				
			mysql_query("DELETE FROM questions  WHERE ID IN (" . $DeleteID . ")") or die (mysql_error());
			
						
			$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Delete All selected Questions.</b>
			</div>';
			redirect("Questions.php");
		
		}
		else
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please select Question to delete.</b>
			</div>';
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

    <title>Questions</title>

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

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
		<?php include_once("Sidebar.php"); ?>
		
		
		<?php include_once("Header.php"); ?>

       
		<?php 
		$query="SELECT q.ID,q.Status,q.Question,c.FirstName,c.LastName,DATE_FORMAT(q.DateAdded, '%D %b %Y<br>%r') AS Added,DATE_FORMAT(q.DateModified, '%D %b %Y<br>%r') AS Updated
		FROM questions q LEFT JOIN client_users c ON q.ClientID = c.ID WHERE q.ID <>0 ORDER BY c.FirstName ASC";
		$result = mysql_query ($query) or die(mysql_error()); 
		$num = mysql_num_rows($result);
		?>
		
        <!-- page content -->
        <div class="right_col" role="main" style="min-height:0px; !important">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Questions <small>Questions of Feedback</small></h3>
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
                    <h2>Questions</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="AddNewQuestion.php" class="btn btn-default active"><i class="fa fa-plus-square"></i> Add New</a></li>
					  <li><a onClick="javascript:doDelete()" class="btn btn-default active"><i class="fa fa-trash"></i> Bulk Delete</a></li>
                    </ul>
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
					<form id="frmPages"  method="post" action="<?php echo $self;?>">
					<input type="hidden" id="action" name="action" value="" />
					<input type="hidden" id="DeleteID" name="DeleteID" value="" />
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap bulk_action" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <th class="no-sort" style="text-align:center"><input type="checkbox" name="chkAll" class="checkUncheckAll"></th>
                          <th>QUESTION</th>
						  <th>CLIENT</th>
                          <th>STATUS</th>
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
								  <td colspan="11" align="center" class="error"><b>No Question listed.</b></td>
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
						  <td align="center" class="noPrint"><input class="chkIds" type="checkbox" name="ids[]" value="<?php echo $row["ID"]; ?>" />
							<input type="hidden" name="ids1[]" value="<?php echo $row["ID"]; ?>"></td>
						  <td><?php echo dboutput($row["Question"]); ?></td>
						  <td><?php echo dboutput($row["FirstName"]).' '.dboutput($row["LastName"]); ?></td>
						  <td><?php if(dboutput($row["Status"])=='1'){echo 'Active';}else{echo 'Deactive';} ?></td>
						  <td><?php echo $row["Added"]; ?></td>
						  <td align="center" class="noPrint"><button class="btn bg-navy btn-xs" type="button" onClick="location.href='EditQuestion.php?ID=<?php echo $row["ID"]; ?>'"><i class="fa fa-pencil"></i></button><button class="btn bg-navy btn-xs" type="button" onClick="javascript:SingleDelete(<?php echo $row["ID"]; ?>)"><i class="fa fa-trash"></i></button></td>
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

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
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
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
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
				"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 2, 5 ] } ],
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
	
	<script language="javascript">
	$(document).ready(function () {				
		$(".checkUncheckAll").click(function () {
			$(".chkIds").prop("checked", $(this).prop("checked"));			
		});
	});
	var counter = 0;
	
	
	function doDelete()
	{
		if($(".chkIds").is(":checked"))
		{
			if(confirm("Are you sure to delete."))
			{
				$("#action").val("delete");
				$("#frmPages").submit();
			}
		}
		else
			alert("Please select Question to delete");
	}
	
	function SingleDelete(x)
	{
		if(confirm("Are you sure to delete."))
		{
			$("#action").val("SingleDelete");
			$("#DeleteID").val(x);
			$("#frmPages").submit();
		}
	}
	
</script>

  </body>
</html>