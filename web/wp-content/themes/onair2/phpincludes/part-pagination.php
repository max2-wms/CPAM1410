<?php
/*
Package: OnAir2
Description: pagination numbering
Version: 1.2.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- PAGINATION ========================= -->
<ul class="pagination qt-container">
    <li class="special">
    	<h4 class="qt-pagination-label qt-content-primary-dark qt-caps">
    		<?php echo esc_attr__("Pages", "onair2"); ?>
    	</h4>
    </li>
	<?php  
	qantumthemes_page_navi( $wp_query);
	?>
</ul>
<!-- PAGINATION END ========================= -->
