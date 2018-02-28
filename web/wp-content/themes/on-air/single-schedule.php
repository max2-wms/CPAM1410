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
           
        <?php get_template_part("part","schedule"); ?>
        
    </div>


</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>