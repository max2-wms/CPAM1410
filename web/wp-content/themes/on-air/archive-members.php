<?php
/**
 * Archive Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            echo esc_attr__("Team","_s");
            ?>
        </h2>
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>
  
</header>

<div class="container">
    <div class="row">
        <div class="col s12 m12 l12" id="qwArchiveContainer">
        <div class="row">

             <?php
    
            // if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            // elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            // else { $paged = 1; }

            // $args = array(
            //     'sort_order' => 'ASC',
            //     'hierarchical' => 0,
            //     'orderby' => 'menu_order',
            //     'post_type' => 'members',
            //     // 'posts_per_page' => -1,
            //     'paged'=> $paged,
            //     'post_status' => 'publish'
            // ); 

            // global $wp_query;
            // $wp_query = new WP_Query( $args );

            // query_posts('posts_per_page=12&orderby=menu_order&post_status=publish&sort_order=ASC&post_type=members&paged=' . $paged); 


            $n = 0;
            while ( $wp_query->have_posts() ):
                $n = $n+1;
                $wp_query->the_post();
                setup_postdata( $post ); 
                
                global $post;
                get_template_part("part","members-item");
                if($n % 4 == 0 ){
                    ?>

                    
                    <hr class="canc">


                    <?php
                }
            endwhile; // end of the loop. 
            wp_reset_query();
            ?>

        </div>
        <!-- No pagination, all members are together -->

        </div>
    </div>
</div>
<?php get_footer(); ?>