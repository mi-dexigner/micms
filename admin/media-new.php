<?php 
require_once("../include/inc_head.php");
include("checkadminlogin.php");
?>
<?php
// if (!file_exists('assets/ordersdocuments/1')) {
    // mkdir('assets/ordersdocuments/1', 0755, true);
// }


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload New Media</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/media.css" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

		<?php include_once("Sidebar.php"); ?>


		<?php include_once("Header.php"); ?>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


<?php 

//echo encryption('menu'); 

//echo cutOff('545454545454',5);


//echo get_root_url().'<br/>'.selfURL().'<br/>'.last_selfURL().'<br/>';

//echo random_cod(11);


$array = array('one', 'two', '');
if(count(array_filter($array)) == count($array)) {
    echo 'OK';
} else {
    echo 'ARR';
}
?>
            <div class="row">

                <iframe src="dragdropimages/index.php" frameborder="0" style="width: 100%; height: 100%;overflow: hidden;border: none;min-height: 316px;"></iframe>

                  <div id="filelist">
        <?php 

        foreach (glob('dragdropimages/uploads/*.*') as $key) { ?>
            <div class="file">
                <img src="<?php echo $key;?>">
                <?php echo basename($key); ?>
                <div class="actions">
                    <a href="<?php echo BASE_URL.'/admin/dragdropimages/uploads/'.basename($key); ?>" class="del">
                        Remove</a></div>
            </div>
       <?php }
         ?>

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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
<script>
    
        $(".del").on("click", function(e){
        e.preventDefault();
        var elem = $(this);
        if(confirm('Do you really want to delete this image ?')){
            $.get('dragdropimages/upload.php',{'action':'delete',file:elem.attr('href')});
            elem.parent().parent().slideUp();
        }
});
</script>
    
    </script>
  </body>
</html>
