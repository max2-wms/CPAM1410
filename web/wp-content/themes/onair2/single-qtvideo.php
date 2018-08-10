<?php
/*
Package: OnAir2
Description: QtVideo type template
Version: 0.0.0
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
			<!-- ======================= HEADER SECTION ======================= -->
			<?php get_template_part( 'phpincludes/part-header-caption-qtvideo'); ?>
			<!-- ======================= CONTENT SECTION ======================= -->
			<div class="qt-container qt-spacer-l">
				<div class="row">
					<div class="col s12 m12 l1 qt-pushpin-container">
						<div class="qt-pushpin">
							<?php get_template_part( 'phpincludes/sharepage' ); ?>
						</div>
						 <hr class="qt-spacer-m">
					</div>
					<div class="col s12 m12 l8">
						<div class="qt-the-content">
							<?php the_content(); ?>
						</div>
						<?php if ( comments_open() || '0' != get_comments_number() ){  ?>
							<hr class="qt-spacer-m">
							<?php  comments_template(); ?>
						<?php } ?>
					</div>
					<div class="qt-sidebar col s12 m12 l3">
						<?php get_template_part (  'phpincludes/sidebar' ); ?>
					</div>
				</div>
			</div>
			<!-- ======================= RELATED SECTION ======================= -->
	        <?php get_template_part ('phpincludes/part', 'related' );  ?>
	    <?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>