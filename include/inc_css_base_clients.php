<?php
$is_included = get_included_files();
if( $is_included[0] == (__FILE__) ) die('You have no permission for direct access to this file');
?>	 
<link href="<?php echo get_template_directory_uri(); ?>/include/clients/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/include/clients/css/style.css" rel="stylesheet">
   