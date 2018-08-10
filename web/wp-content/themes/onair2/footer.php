<?php
/*
Package: OnAir2
Description: Footer of the html
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>      
		<?php 
		wp_reset_query();
		wp_reset_postdata();
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
		if(get_theme_mod('qt_auto_updater', '0' )){
		?>
        <div id="qtcurrentpermalink"  data-permalink="<?php echo esc_url( $actual_link); ?>">
        	<!-- Nothing here. Used by javascript for auto refresh -->
        </div>
        <?php } ?>

        

        <?php wp_footer(); ?>
    </body>
</html>
