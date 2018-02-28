<?php
/**
 *  Template Name: Page Schedule
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
    
    
    $qw_headerslideshow = get_post_meta($id, 'qw_headerslideshow', true);

    if(($qw_headerslideshow != '')){
        ?><div class="qw-extraheader container qw-top30"><?php
        
        if($qw_headerslideshow == '1'){
            ?><div class="qw-qw_headerslideshow"><?php
            echo do_shortcode("[showslider]");
            ?></div><?php
        }
        ?></div><div class="qw-top30"></div><?php
    }
    ?>

 
<div class="container qw-top30 qw-bottom30">
       
    <main class="qw-content qw-relative z-depth-1" id="qwSingleContainer">
        <div class="paper qw-padded ">
            <div class="qw-thecontent">
                 <h1 class="qw-content-title grey-text">
                    <?php the_title(); ?>
                </h1>
                <?php the_content(); ?>
            </div>
           
        </div>
          <?php if ( comments_open() || '0' != get_comments_number() ){  ?>
            <div class="paper qw-padded">
                <?php comments_template();   ?>
            </div>
        <?php } ?>
       
    </main>
    <?php
        echo do_shortcode("[showgrid]");
    ?>
</div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>