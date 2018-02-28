<?php
/**
 * SIngle podcast teplate
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php while ( have_posts() ) : the_post(); ?>


 <?php
    /*
    *
    *   Special header with slider and schedule
    *
    */
    global $post;
    $id = $post->ID;
    $qw_headerslideshow = get_post_meta($id, 'qw_headerslideshow', true);
    $qw_headerschedule = get_post_meta($id, 'qw_headerschedule', true);
    $qw_hidetitle = get_post_meta($id, 'qw_hidetitle', true);
?>

<section id="page-<?php the_ID(); ?>"  <?php post_class( 'qw-mainsection qw-page-section qw-top30' ); ?>>
    <div class="container  qw-bottom30">
        <div class="row">
            <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" >
                <main class="qw-content qw-relative z-depth-1" id="qwSingleContainer">
                    <?php
                    if ( has_post_thumbnail( ) ){
                    the_post_thumbnail( 'large',array('class'=>'img-forcefull') );
                    }
                    ?> 
                    <div class="paper qw-padded ">
                        <div class="qw-thecontent">
                             
                            <h1 class="qw-content-title grey-text">
                                <?php the_title(); ?>
                            </h1>

                            <hr class="qw-separator triangle right small">
                            <?php 
                            //======================= PLAYER ======================
                            $pUrl = esc_url(esc_attr(get_post_meta($post->ID,'_podcast_resourceurl',true)));
                            if($pUrl!=''){
                                $link = str_replace("https://","http://",$pUrl);
                                
                                $regex_soundcloud = "/soundcloud.com/";                       
                                $regex_mp3 = "/.mp3/";
                                $regex_youtube = "/youtube.com/";

                                if(preg_match ( $regex_soundcloud , $link  )){
                                    echo do_shortcode('[soundcloud params="auto_play=false&show_comments=true"  width="100%" url="'.esc_url($link ).'"]');
                                } else if (preg_match ( $regex_mp3 , $link  )) {
                                    echo do_shortcode('[audio src="'.esc_url($link ).'"]');
                                } else {
                                    echo '<a href="'. esc_url( $link ) .'">[PODCAST]</a>';
                                }

                            } ?>
                            <?php the_content(); ?>
                            
                            
                        </div>
                    </div>
                    
                    <div class="paper qw-padded">
                        <p class="qw-categories"><?php  echo esc_attr__("In: ", "_s").get_the_term_list( $post->ID, 'podcastfilter', '', ' / ', '' );  ?></p>
                    </div>
                    <div class="canc"></div>
                </main>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>
    </div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>