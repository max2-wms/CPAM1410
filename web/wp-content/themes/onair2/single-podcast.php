<?php
/*
Package: OnAir2
Description: Single podcast
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
        <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- ======================= HEADER SECTION ======================= -->
                <?php get_template_part( 'phpincludes/part-header-caption-podcast'); ?>
                <!-- ======================= CONTENT SECTION ======================= -->
                <div class="qt-container qt-spacer-l">
                    <div class="row">
                        <div class="col s12 m12 l1 qt-pushpin-container">
                            <div class="qt-pushpin">
                            <?php get_template_part( 'phpincludes/sharepage' ); ?>
                            </div>
                             <hr class="qt-spacer-m">
                        </div>
                        <div class="col s12 m12 l8">
                            <div class="qt-the-content">
                                <?php 
                                //======================= PLAYER ======================
                                $pUrl = esc_url(get_post_meta($post->ID,'_podcast_resourceurl',true));
                                if($pUrl!=''){
                                    $link = $pUrl;// str_replace("https://","http://",$pUrl);
                                    $regex_mixcloud = "/mixcloud.com/"; 
                                    $regex_soundcloud = "/soundcloud.com/";                       
                                    $regex_mp3 = "/.mp3/";
                                    $regex_youtube = "/youtube.com/";
                                    
                                    if (preg_match ( $regex_mp3 , $link  )) {
                                        echo do_shortcode('[audio src="'.esc_url($link ).'"]');
                                    } else {
                                        if (preg_match ( $regex_mixcloud , $link  )) {
                                            $link = urldecode($link);
                                            ?>
                                            <iframe data-state="0" class="mixcloudplayer" width="100%" height="140" src="//www.mixcloud.com/widget/iframe/?feed=<?php echo esc_attr($link); ?>&embed_uuid=addfd1ba-1531-4f6e-9977-6ca2bd308dcc&stylecolor=&embed_type=widget_standard" frameborder="0"></iframe><div class="canc"></div>
                                            <?php  
                                        } else {
                                            echo '<a href="'. esc_url( $link ) .'">[PODCAST]</a>';
                                        }
                                    }
                                } ?>
                                <?php the_content(); ?>

                                <?php get_template_part (  'phpincludes/part-related-podcastshow' ); ?>
                            </div>
                           <?php if ( comments_open() || '0' != get_comments_number() ){  ?>
                             <hr class="qt-spacer-m">
                                <?php  comments_template(); ?>
                            <?php } ?>
                            <hr class="qt-spacer-l">
                        </div>
                        <div class="qt-sidebar col s12 m12 l3">
                            <?php get_template_part (  'phpincludes/sidebar' ); ?>
                            <hr class="qt-spacer-l">
                        </div>
                    </div>
                </div>
                <?php get_template_part ('phpincludes/part', 'related' );  ?>
            </div>
        <?php endwhile; // end of the loop. ?>
    </div><!-- .qt-main end -->
    <?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
    <?php get_template_part ( 'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?> 