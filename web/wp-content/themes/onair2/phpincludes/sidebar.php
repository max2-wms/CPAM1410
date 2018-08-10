<?php
/*
Package: OnAir2
Description: SIDEBAR WITH WIDGETS
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- SIDEBAR ================================================== -->
<div class="qt-widgets qt-sidebar-main qt-text-secondary">
	<?php if(is_active_sidebar( 'right-sidebar' ) ){ ?>
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
	<?php } ?>
</div>
<!-- SIDEBAR END ================================================== -->
