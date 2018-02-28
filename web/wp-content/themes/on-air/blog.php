<?php
/*
Template Name: Blog
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


<?php if($qw_hidetitle != '1'){ ?>
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            the_title();
            ?>
        </h2>
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>

</header>
<?php  } else { ?>

<div class="canc "></div>
<?php } ?>


<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection qw-page-section qw-top30' ); ?>>

    <?php

    /*
    *
    *   Special header with slider and schedule
    *
    */
    
    

    if(($qw_headerslideshow != '' || $qw_headerschedule != '') && get_query_var('page') == ""){
        ?><div class="qw-extraheader container"><?php
        
        if($qw_headerslideshow == '1'){
            ?><div class="qw-qw_headerslideshow"><?php
            echo do_shortcode("[showslider]");
            ?></div><?php
        }

        if($qw_headerschedule == '1'){
             ?><div class="qw-qw_headerschedule"><?php
            echo do_shortcode("[showgrid]");
            ?></div><?php
        }
        
        ?></div><div class="qw-top30"></div><?php
    }
    ?>

    <?php


    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }
    $cattxt = '';
    $cat = get_post_meta( get_the_ID(), 'qw_news_cat', true );
    if( $cat != '' && $cat != 0 ){  $cattxt = '&cat=' . $cat; }
    query_posts('posts_per_page=10&paged=' . $paged . $cattxt); 


    ?>

    <div class="container">
        <div class="row">
            <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" id="qwArchiveContainer">
            <?php  get_template_part('loop','archive'); ?>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>