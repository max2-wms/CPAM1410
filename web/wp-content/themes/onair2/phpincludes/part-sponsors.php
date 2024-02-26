<?php
/*
Package: OnAir2
Description: SLIDESHOW SPONSORS
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

$qt_footer_sponsors = qantumthemes_footer_sponsors(); // get the setting from the post meta (functions.php)
if($qt_footer_sponsors == 1){
?>
<!-- SLIDESHOW SPONSORS ================================================== -->
<div class="qt-vertical-padding-m qt-sponsors <?php if(get_theme_mod('qt_sponsor_fx', 0 )){  ?>qt-sponsor-fx<?php } ?>">
    <div class="qt-slickslider-container qt-slickslider-externalarrows qt-slickslider-fullscreen">
        <div class="row">
            <div class="qt-slickslider qt-slickslider-multiple qt-text-shadow " data-slidestoshow="6" data-slidestoshowipad="3" data-variablewidth="false" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="true" data-arrowsmobile="false"  data-centermodemobile="true" data-dotsmobile="false"  data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
                <?php  
                /**
                 * [$args Query arguments]
                 * @var array
                 */
                $args = array(
                    'post_type' => 'qtsponsor',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => array ( 'menu_order' => 'ASC', 'date' => 'DESC'),
                    'suppress_filters' => false,
                    'paged' => 1
                );
                /**
                 * [$wp_query execution of the query]
                 * @var WP_Query
                 */
                $wp_query = new WP_Query( $args );
                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    if (has_post_thumbnail()){ ?>
                    <div class="qt-item">
                        <a href="<?php echo esc_attr(get_post_meta($post->ID, "linkurl", true)); ?>" target="_blank" rel="nofollow" class="qt-sponsor" >
                             <?php the_post_thumbnail( 'full',  array( 'title' => get_the_title(), 'alt' => get_the_title() ) ); ?>
                        </a>
                    </div>
                    <?php 
                    } 
                endwhile; endif;
                wp_reset_postdata();
                ?>            
            </div>
        </div>
    </div>
    <hr class="qt-spacer-s">
</div>
 <!-- SLIDESHOW SPONSORS END ================================================== -->
 <?php } ?>