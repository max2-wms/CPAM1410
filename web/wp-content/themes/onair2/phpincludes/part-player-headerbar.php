<?php
/*
Package: OnAir2
Description: PLAYER Headerbar
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2' || get_theme_mod( 'qt_playerbar_version', '1' ) === '3'){ ?>
<div id="qtplayerheaderbar" class="qt-player-headerbar">
	<a href="#" class="dripicons-cross qt-openplayerbar qt-closeheaderplayer"></a>
	<div class="qt-player-headerbar__controls">
		<?php get_template_part( 'phpincludes/part-playercontainer' ); ?>
	</div>
	<?php  
	get_template_part (  'phpincludes/part-channels-list' );  
	?>
</div>
<?php } ?>