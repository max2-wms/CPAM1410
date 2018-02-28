<?php
/*
Template Name: Blog + Show Slider
*/
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php 
global $post;
$id = $post->ID;
$qw_headerslideshow = get_post_meta($id, 'qw_headerslideshow', true);
$qw_headerschedule = get_post_meta($id, 'qw_headerschedule', true);
$qw_hidetitle = get_post_meta($id, 'qw_hidetitle', true);
?>
<div class="canc <?php if($qw_headerslideshow == ''){ ?> qw-top30 <?php } ?>"></div>
<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection qw-page-section qw-top30' ); ?>>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" id="qwArchiveContainer">
            <?php 
            if(get_query_var('page') == ""){
                echo do_shortcode("[showslider]");     
            }
            

            ?>

            <?php if($qw_hidetitle != '1'){ ?>
            <div class="paper z-depth-1 ">
                <div class="container ">
                    <h2 class="qw-header-title-small grey-text ">
                        <?php
                        the_title();
                        ?>
                    </h2>

                </div>
            </div>
            <?php  } ?>


             <div class="paper z-depth-1 ">
                <div class="container ">
                     <?php the_content(); ?>

                </div>
            </div>

           

            <?php
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }

             $cattxt = '';
            $cat = get_post_meta( get_the_ID(), 'qw_news_cat', true );
            if( $cat != '' && $cat != 0 ){  $cattxt = '&cat=' . $cat; }
            query_posts('posts_per_page=10&paged=' . $paged . $cattxt); 

            ?>
            <?php  get_template_part('loop','archive-2cols'); ?>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>