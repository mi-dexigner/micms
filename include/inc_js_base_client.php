<?php
$is_included = get_included_files();
if( $is_included[0] == (__FILE__) ) die('You have no permission for direct access to this file');
?>
<script src="<?php echo get_template_directory_uri(); ?>/include/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/include/js/bootstrap.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/include/js/bootstrap_extensions.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/include/js/validator.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/include/clients/js/main.js"></script>