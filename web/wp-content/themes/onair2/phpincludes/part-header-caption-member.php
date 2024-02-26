<?php
/*
Package: OnAir2
Description: Header template for Members template
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
<!-- HEADER MEMBERS ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container">
        <ul class="qt-tags">
            <li>
                <?php  echo qantumthemes_get_the_term_list( $post->ID, 'membertype', '', '</li><li>', '' );  ?>
            </li>
        </ul>
        <h1 class="qt-caption qt-spacer-s">
            <?php the_title(); ?>
            <?php  
            $role = get_post_meta(get_the_ID(), 'member_role', true);
            if($role !== ''){
            ?>
                 <?php echo esc_attr(" / ".$role); ?>
            <?php  
            }
            ?>
        </h1>
        <ul class="qt-menu-social qt-spacer-s">
            <?php get_template_part( 'phpincludes/part','singlesocial-members'); ?>
        </ul>
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER MEMBERS END ========================= -->
<?php } ?>