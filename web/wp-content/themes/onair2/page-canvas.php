<?php
/*
Template Name: Empty canvas
Package: OnAir2
Description: Empty template with just the player
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
    <div id="maincontent" class="qt-main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content();?>
            </div>
        <?php endwhile; endif;?>
    </div><!-- .qt-main end -->
    <?php get_template_part ('phpincludes/part-player-sidebar'); ?>
<?php get_footer(); ?>