<?php
/*
Template Name: Page Elementor Canvas
Package: OnAir2
Version: 2.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
	<?php  
	get_template_part ('phpincludes/menu');
	get_template_part ('phpincludes/part-searchbar'); 
	?>
	<div id="maincontent" class="qt-main">
		<?php 
		/**
		 * From V 2.5
		 */
		if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
			<hr class="qt-header-player-spacer">
		<?php } ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_template_part( 'phpincludes/part-header-caption-page'); ?>
				<div class="qt-container-composer">
					<div class="qt-the-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	
	<?php get_template_part ( 'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>