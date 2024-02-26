<?php
/*
Template Name: Page Contacts
Package: OnAir2
Description: PAGE CONTACTS
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
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- ======================= HEADER SECTION ======================= -->
                <?php get_template_part( 'phpincludes/part-header-caption-contacts'); ?>
                 <?php the_content(); ?>
                <div class="qt-container qt-vertical-padding-l">
                	<div class="row">
                		<div class="col s12 m8 push-m2">
                            <?php
                            /**
                             * Requires the QT Contactform plugin
                             */
                            if ( shortcode_exists( 'qt-contactform' ) ) {
                                 echo do_shortcode('[qt-contactform]' );
                            } else {
                                echo esc_attr__("Please activate QT Contactform plugin to use this function", "onair2");
                            }
                            ?>
                		</div>
                	</div>
                </div>
            </div>
         <?php endwhile; endif;?>
        <?php get_template_part ( 'phpincludes/part-sponsors' ); ?>
    </div>
    <?php get_template_part ('phpincludes/footerwidgets'); ?>
    <?php get_template_part ('phpincludes/part-player-sidebar'); ?>
<?php get_footer(); ?>