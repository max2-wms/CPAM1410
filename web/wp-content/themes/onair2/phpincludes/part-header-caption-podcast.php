<?php
/*
Package: OnAir2
Description: Header template for PODCAST
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
<!-- HEADER PODCAST ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container">
        <ul class="qt-tags">
            <li>
                <?php  echo qantumthemes_get_the_term_list( $post->ID, 'podcastfilter', '', '</li><li>', '' );  ?>
            </li>
        </ul>
        <h1 class="qt-caption qt-spacer-s"">
            <?php the_title(); ?>
        </h1>
        <?php  
        $_podcast_artist = get_post_meta(get_the_ID(), '_podcast_artist', true);
        $_podcast_date = get_post_meta(get_the_ID(), '_podcast_date', true);
        if($_podcast_artist !== '' || $_podcast_date !== ''){

            if($_podcast_date !== ''){
                $_podcast_date = date_i18n( get_option( "date_format", "d M Y" ) , strtotime($_podcast_date));
            }
        ?>
            <h4 class="qt-subtitle">
                 <?php echo esc_attr($_podcast_artist.' '.$_podcast_date); ?>
            </h4>
        <?php  
        }
        ?>
        
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER PODCAST END ========================= -->
<?php } ?>