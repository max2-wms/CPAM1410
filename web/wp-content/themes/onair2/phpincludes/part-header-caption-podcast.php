<?php
/*
Package: OnAir2
Description: Header template for PODCAST
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
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
        if($_podcast_artist !== ''){
        ?>
            <h4 class="qt-subtitle">
                 <?php echo esc_attr($_podcast_artist); ?>
            </h4>
        <?php  
        }
        ?>
        
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER PODCAST END ========================= -->
<?php } ?>