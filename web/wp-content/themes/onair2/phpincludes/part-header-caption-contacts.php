<?php
/*
Package: OnAir2
Description: Header template for contacts page
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

/**
 * 
 * ===========================================================
 * @since  3.5.0
 * Display revolution slider selected via dropdown
 * ===========================================================
 * 
 */
get_template_part( 'phpincludes/part-revoslider-header'); 
// Revo slider template end.

/**
 * 
 * ===========================================================
 * @since  1.0
 * ===========================================================
 * 
 */

$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
?>
<!-- HEADER CONTACTS ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container">
        <h1 class="qt-caption qt-spacer-s">
           <?php the_title(); ?>
        </h1>
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER CONTACTS END ========================= -->
<?php } ?>