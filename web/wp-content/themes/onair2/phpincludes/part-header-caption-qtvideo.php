<?php
/*
Package: OnAir2
Description: Header template for qtvideo posts
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
?>
<!-- HEADER CAPTION ========================= -->
<div class="qt-pageheader qt-negative qt-videocontainer">
    <div class="qt-container">
        <h1 class="qt-caption qt-spacer-s">
            <?php the_title(); ?>
        </h1>
        <div class="qt-vertical-padding-m ">
            <?php  
            /**
             * Create embedded video from the meta field
             */
            global $wp_embed;
            $videoUrl = get_post_meta( $post->ID, '_videolove_url_key', true );
            $post_embed = $wp_embed->run_shortcode('[embed width="1170" height="658"]'.esc_attr(esc_url($videoUrl)).'[/embed]');
            echo do_shortcode($post_embed);
            ?>
         </div>
         <ul class="qt-tags">
            <li>
             <?php  echo qantumthemes_get_the_term_list( $post->ID, 'vdl_filters', '', '</li><li>', '' );  ?>
            </li>
        </ul>
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER CAPTION END ========================= -->
<?php } ?>