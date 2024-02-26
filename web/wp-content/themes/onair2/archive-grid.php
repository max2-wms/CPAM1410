<?php
/*
Template Name: Blog Grid
Package: OnAir2
Version: 3.3.7
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

/**
 * [$paged current paged number]
 * @var [int]
 */
$paged = qantumthemes_get_paged();

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
		<!-- ======================= HEADER SECTION ======================= -->
		<?php get_template_part( 'phpincludes/part-header-caption-archive'); ?>
		<?php 
        /**
         *
         *  This template can be used also as page template.
         *  In this case we show the page content only if is a page and is page 1
         * 
         */
        if(is_singular() || is_home() || is_front_page()){
            if($paged == 1){
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();                     
                endwhile; endif;
                wp_reset_postdata();
            }
        }
        ?>
		<!-- ======================= CONTENT SECTION ======================= -->
		<div class="qt-container qt-vertical-padding-l ">
			<div class="row">
				
				
					<?php 
					if(is_page()){
	                    /**
	                     * [$args Query arguments]
	                     * @var array
	                     */
	                    $args = array(
	                        'post_type' => 'post',
	                        'post_status' => 'publish',
	                         'posts_per_page' => 12,
	                        'suppress_filters' => false,
	                        'paged' => $paged
	                    );

	                    /**
	                     * [$wp_query execution of the query]
	                     * @var WP_Query
	                     */
	                    $wp_query = new WP_Query( $args );
	                    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
	                        $post = $wp_query->post;
	                        setup_postdata( $post );
	                        ?>
	                            <div id="post-<?php the_ID(); ?>" <?php post_class( "col s12 m4 l4" ); ?>">
	                                <?php get_template_part ( 'phpincludes/part-archive-item-post-vertical' ); ?>
	                            </div>
                            <?php
	                    endwhile; else: ?>
	                        <h3><?php echo esc_attr__("Sorry, nothing here","onair2")?></h3>
	                    <?php endif;
	                    wp_reset_postdata();
	                } else {
	                    if ( have_posts() ) : while ( have_posts() ) : the_post();
	                        setup_postdata( $post );
	                        ?>
	                            <div id="post-<?php the_ID(); ?>" <?php post_class( "col s12 m4 l4" ); ?>">
	                                <?php get_template_part ( 'phpincludes/part-archive-item-post-vertical' ); ?>
	                            </div>
                            <?php
	                    endwhile; else: ?>
	                        <h3><?php echo esc_attr__("Sorry, nothing here","onair2")?></h3>
	                    <?php endif;
	                }
                    ?>
				
			</div>
		</div>
		<div class="qt-pagination qt-content-primary">
			 <?php get_template_part ( 'phpincludes/part-pagination' ); ?>
		</div>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/part-sponsors' ); ?>
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>