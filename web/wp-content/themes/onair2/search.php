<?php
/*
Package: OnAir2
Description: Search results page
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
/**
 * [$paged current paged number]
 * @var [int]
 */
$paged = qantumthemes_get_paged();
global $wp_query;
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
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- ======================= CONTENT SECTION ======================= -->
			<div class="qt-container qt-vertical-padding-l ">
				<div class="qt-search-inpage">
					<h2>
						<?php printf( esc_attr(__( 'Search Results for: %s', "onair2" )), '<span>' . esc_attr(get_search_query()) . '</span>' ); ?>
			        </h2>
			        <h5>
			        	<?php echo esc_attr__("Total results:", "onair2").' '.esc_attr($wp_query->found_posts); ?>
			        	<?php 
				        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				    	?>
				        / <?php echo esc_attr__("Showing page: ","onair2").esc_attr($paged); ?> <?php echo esc_attr__("of","onair2"); ?> <?php echo esc_attr($wp_query->max_num_pages);  ?>
			       	</h5>
					<!-- SEARCH FORM ========================= -->
					<div class="qt-searchbar qt-vertical-padding-m">
						<div class="qt-expandable-inner">
							<form method="get" class="qt-inline-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<div class="row qt-nopadding">
									<div class="col s8 m9">
										<input placeholder="<?php echo esc_attr_x( 'Type and press enter &hellip;', 'placeholder', "onair2" ); ?>" value="<?php echo esc_attr(get_search_query());  ?>" name="s" type="text" class="validate qt-input-l">
									</div>
									<div class="col s4 m3">
										<input type="button" value="<?php echo esc_attr__("Search", "onair2"); ?>" class="qt-btn qt-btn-primary qt-btn-l qt-fullwidth">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- SEARCH FORM END ========================= -->
				</div>
				<div class="row">
					<div class="col s12 m12 l9">
						<?php 
	                    if ( have_posts() ) : while ( have_posts() ) : the_post();
	                        setup_postdata( $post );
	                        if(is_sticky()){
								get_template_part (  'phpincludes/part-archive-item-post-featured' );
							} else {
								get_template_part (  'phpincludes/part-archive-item-post' );
							}
	                    endwhile; else: ?>
	                        <h3><?php echo esc_attr__("Sorry, no results matching your query.","onair2")?></h3>
	                    <?php endif; ?>
						<hr class="qt-spacer-m">
					</div>
					<div class="qt-sidebar col s12 m12 l3">
						<?php get_template_part (  'phpincludes/sidebar' ); ?>
					</div>
				</div>
			</div>
			<div class="qt-pagination qt-content-primary">
				 <?php get_template_part ( 'phpincludes/part-pagination' ); ?>
			</div>
		</div>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>