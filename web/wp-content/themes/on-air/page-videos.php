<?php
/**
 *  Template Name: Video Archive
 *
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
<div class="canc qw-top30"></div>
<?php } ?>

<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection' ); ?>>
    <?php
    /*
    *
    *   Special header with slider and schedule
    *
    */
     if(($qw_headerslideshow != '' || $qw_headerschedule != '') && ( get_query_var('page') == "")){
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
    <div class="container" id="qwArchiveContainer">
        <div class="row">
        <?php
        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
        elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
        else { $paged = 1; }
        query_posts('posts_per_page=12&post_status=publish&sort_order=ASC&post_type=qtvideo&paged=' . $paged); 
        $n = 0;
        while ( $wp_query->have_posts() ):
            $n = $n+1;
            $wp_query->the_post();
            setup_postdata( $post );             
            global $post;
            get_template_part("part","qtvideo-item");
            if($n % 4 == 0 ){
                ?> <hr class="canc"> <?php
            }
        endwhile; // end of the loop. 
        ?>
        </div>
        <footer class="paper z-depth-1 qw-padded qw-bottom30">
         <?php
            page_navi( array(
                'prev_text'          => __( 'Previous page', '_s' ),
                'next_text'          => __( 'Next page', '_s' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_attr__( 'Page', '_s' ) . ' </span>',
            ) );
            wp_reset_query();
        ?>
        </footer>
    </div>
</section>
<?php get_footer(); ?>