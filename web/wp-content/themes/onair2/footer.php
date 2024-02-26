<?php
/*
Package: OnAir2
Version: 3.4.1
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

		wp_reset_query();
		wp_reset_postdata();
		
		if(get_theme_mod( 'qt_auto_updater' )){
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
			?>
			<div id="qtcurrentpermalink"  data-permalink="<?php echo esc_url( $actual_link); ?>">
				<?php
				// Nothing here. Used by javascript for auto refresh 
				?>
			</div>
			<?php 
		} 
		
		wp_footer(); 
		?>
	</body>
</html>