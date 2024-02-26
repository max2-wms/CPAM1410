<?php
/*
Package: OnAir2
Description: Normal single post template with sidebar
Version: 3.4.5
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
			<!-- ======================= HEADER SECTION ======================= -->
			<?php get_template_part( 'phpincludes/part-header-caption-post'); ?>
			<!-- ======================= CONTENT SECTION ======================= -->
			<div class="qt-container qt-spacer-l">
				<div class="row">
					<div class="col s12 m12 l1 qt-pushpin-container">
						<div class="qt-pushpin">
							<?php get_template_part( 'phpincludes/sharepage' ); ?>
						</div>
						 <hr class="qt-spacer-m">
					</div>
					<div class="col s12 m8">
						<div class="qt-the-content">
							<?php the_content(); ?>
							<?php the_tags('<div class="tagcloud qt-spacer-m"><span class="qt-title">'.esc_attr__("Tagged as ", "onair2").'</span>', ' ', '</div>' ); ?> 
							<?php wp_link_pages(); ?> 
							<?php get_template_part ('phpincludes/part', 'post-author' );  ?>
						</div>
						<?php if ( comments_open() || '0' != get_comments_number() ){  ?>
							<hr class="qt-spacer-m">
							<?php  comments_template(); ?>
						<?php } ?>
						<hr class="qt-spacer-l">
					</div>
					<div class="qt-sidebar col s12 m3">
						<?php get_template_part (  'phpincludes/sidebar' ); ?>
					</div>
				</div>
			</div>
			<?php get_template_part ('phpincludes/part', 'related' );  ?>
			<!-- ======================= PREV POST SECTION ======================= -->
			<div class="qt-content-primary-dark qt-prevnext-posts qt-negative">
				<h4 class="qt-title center qt-vertical-padding-m">
					<?php echo esc_attr__("Continue reading", "onair2") ?>
				</h4>
				<div class="row qt-nopadding">
					<div class="col s12 m6 l6">
						<?php
						
						/**
						 * 
						 * Next post link
						 *
						 * 
						 */
						$next_post = get_next_post();
						if ( !empty( $next_post ) ): 
							get_template_part ('phpincludes/part', 'next-post' );  
						endif;
						?>
					</div>
					<div class="col s12 m6 l6">
						<?php
						/**
						 * 
						 * Previous post link
						 *
						 * 
						 */
						$next_post = get_previous_post();
						if ( !empty( $next_post ) ): 
							get_template_part ('phpincludes/part', 'prev-post' );  
						endif; 
						?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>