<?php
/*
Package: OnAir2
Template Name: Page Popup Player
Description: Use this template to create a page with only the player, to be linked from the popup button
Version: 1.2.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
<?php get_template_part (  'phpincludes/part-playercontainer' );  ?>
<?php get_template_part (  'phpincludes/part-channels-list' );  ?>
<?php if(is_active_sidebar( 'popupwidgets' ) ){ ?>
    <div class="qt-container qt-vertical-padding-s">
    	<?php dynamic_sidebar( 'popupwidgets' ); ?>
    </div>
<?php } ?>
<?php get_footer(); ?>