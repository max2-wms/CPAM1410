<?php
/*
Package: OnAir2
Description: Normal single page template with sidebar
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
Template Name: Test: current day
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
				<!-- ======================= HEADER SECTION ======================= -->
				<?php get_template_part( 'phpincludes/part-header-caption-page'); ?>
				<!-- ======================= CONTENT SECTION ======================= -->
				<div class="qt-container qt-spacer-l">
					<div class="row">
					   
						<div class="col s12 m12 l8">
							<div class="qt-the-content">
								Today's day of the week is: <?php echo current_time("D"); ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>