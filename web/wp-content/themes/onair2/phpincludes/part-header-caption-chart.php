<?php
/*
Package: OnAir2
Description: Header template for charts
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
<!-- HEADER CAPTION ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container">
        <ul class="qt-tags">
            <li>
            <?php  echo qantumthemes_get_the_term_list( get_the_ID(), 'chartcategory', '', '</li><li>', '' );  ?>
            </li>
        </ul>
        <h1 class="qt-caption qt-spacer-s">
            <?php the_title(); ?>
        </h1>
        <h4 class="qt-subtitle">
            <?php echo esc_attr__("Created on ", "onair2"); ?>
            <?php echo qantumthemes_international_date(); ?>
        </h4>
    </div>
     <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER CAPTION END ========================= -->
<?php } ?>