<!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy; <?php echo date('Y'); ?> - All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
<!-- /footer content -->

<script language="javascript">
	function doBackup()
	{
		if(confirm("Are you sure to get backup."))
		{
			$("#DBbackup").val("BackUp");
			$("#backupfrm").submit();
		}
	}
	function UnAuthorized()
	{
		alert('You Don\'t have enough Rights to Proceed this Option.')
	}
</script>