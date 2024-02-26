<?php
/*
Package: OnAir2
Description: Woocommerce template page
Version: 2.4.2
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
	<?php  
	get_template_part ('phpincludes/menu');
	get_template_part ('phpincludes/part-searchbar'); 

	$pageid = qantumthemes_universal_page_id(); 


	?>
	<div id="maincontent" class="qt-main qt-woocommerce-container">
		<?php 
		/**
		 * From V 2.5
		 */
		if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
			<hr class="qt-header-player-spacer">
		<?php } ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="qt-container qt-spacer-l">
					<?php woocommerce_content(); ?>
				</div>
			</div>
		
		<?php get_template_part ( 'phpincludes/part-sponsors' ); ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>