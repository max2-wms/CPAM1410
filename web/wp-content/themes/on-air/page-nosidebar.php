<?php
/**
 *  Template Name: Page No Sidebar
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php while ( have_posts() ) : the_post(); ?>
<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection' ); ?>>
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

    if($qw_headerslideshow != '' || $qw_headerschedule != ''){
        ?><div class="qw-extraheader"><?php

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
<div class="container qw-top30 qw-bottom30">
    <main class="qw-content qw-relative z-depth-1" id="qwSingleContainer">
        <div class="paper qw-padded ">
            <div class="qw-thecontent">
            
                <?php if($qw_hidetitle != '1'){ ?>
                    <h1 class="qw-content-title grey-text">
                        <?php the_title(); ?>
                    </h1>
                <?php } ?>

                <?php the_content(); ?>
            </div>
           
        </div>
        <?php if ( comments_open() || '0' != get_comments_number() ){  ?>
            <div class="paper qw-padded">
                <?php comments_template();   ?>
            </div>
        <?php } ?>
    </main>
</div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>