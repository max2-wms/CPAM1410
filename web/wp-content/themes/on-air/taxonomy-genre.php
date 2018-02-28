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
            get_template_part("part","archivetitle");
            ?>
        </h2>
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>
  
</header>

<div class="container">
    <div class="row">
        <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" id="qwArchiveContainer">
        


        <div class="row">

            
            <?php
    
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }

            $term = '';
            $taxonomy_name = 'genre';
            if (is_tax($taxonomy_name)) {
                 $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            }

            $args = array(
                'sort_order' => 'ASC',
                'sort_column' => 'menu_order',
                'hierarchical' => 0,
                'orderby' => 'menu_order',
                'post_type' => 'shows',
                'posts_per_page' => 12,
                'paged'=> $paged,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy_name,
                        'field'    => 'slug',
                        'terms'    => $term,
                    ),
                )
            ); 


            $wp_query = new WP_Query( $args );
            $n = 0;
            while ( $wp_query->have_posts() ):
                $n = $n+1;
                $wp_query->the_post();
                setup_postdata( $post ); 
                
                global $post;
                get_template_part("part","show-small");
               
            endwhile; // end of the loop. 
                
            ?>



        </div>
        <footer class="paper z-depth-1 qw-padded">
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
        <?php get_template_part ('sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>