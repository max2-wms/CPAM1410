<?php
/**
 *  Template Name: Team Members
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

            $args = array(
                'post_type' => 'members',
                'posts_per_page' => 20,
                'post_status' => 'publish',
                'orderby' => array ( 'menu_order' => 'ASC', 'date' => 'DESC'),
                'suppress_filters' => false,
                'paged' => $paged
            );
            $wp_query = new WP_Query( $args );
            $n = 0;
            if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
                $n = $n+1;
                get_template_part("part","members-item");
                if($n % 4 == 0 ){
                    ?> <hr class="canc"> <?php
                }
            endwhile; endif;

/*

            $args = array(
                'sort_order' => 'ASC',
                'hierarchical' => 0,
                'orderby' => 'menu_order',
                'post_type' => 'members',
                // 'posts_per_page' => -1,
                'paged'=> $paged,
                'post_status' => 'publish'
            ); 

            global $wp_query;
            $wp_query = new WP_Query( $args );


            query_posts('posts_per_page=999&orderby=menu_order&post_status=publish&sort_order=ASC&post_type=members&paged=' . $paged); 

            
            $n = 0;

            while ( $wp_query->have_posts() ):
                $n = $n+1;
                $wp_query->the_post();
                setup_postdata( $post );             
                global $post;
                get_template_part("part","members-item");
                if($n % 4 == 0 ){
                    ?> <hr class="canc"> <?php
                }
            endwhile; // end of the loop. */
            ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>