<?php
$is_included = get_included_files();
if( $is_included[0] == (__FILE__) ) die('You have no permission for direct access to this file');
?>	 
<link href="<?php echo get_template_directory_uri(); ?>/include/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/include/css/bootstrap_extensions.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/include/css/addons.css" rel="stylesheet">   
<link href="<?php echo get_template_directory_uri(); ?>/include/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/include/css/bootstrap_responsive_extensions.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/include/js/html5shiv.js"></script>
    <![endif]-->