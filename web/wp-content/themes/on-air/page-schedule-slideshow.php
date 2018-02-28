<?php
/**
 *  Template Name: Page Schedule And Show Slider
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php while ( have_posts() ) : the_post(); ?>
<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection' ); ?>>
 
<div class="container qw-top30 qw-bottom30">
     <?php
        echo do_shortcode("[showslider]");
        ?> 

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