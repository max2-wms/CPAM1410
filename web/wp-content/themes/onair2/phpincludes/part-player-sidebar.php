<?php
/*
Package: OnAir2
Description: PLAYER SIDEBAR
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
if ( get_theme_mod( 'qt_playerbar_version', '1' ) === '1' ) {
	?>
	<div id="channelslist" class="side-nav qt-content-primary qt-right-sidebar" >
		<a href="#" class="qt-btn qt-btn-secondary button-playlistswitch-close qt-close-sidebar-right" data-activates="channelslist"><i class="icon dripicons-cross"></i></a>
		<?php  get_template_part (  'phpincludes/part-playercontainer' );  ?>
		<?php  get_template_part (  'phpincludes/part-channels-list' );  ?>
	</div>
	<?php  
}
?>