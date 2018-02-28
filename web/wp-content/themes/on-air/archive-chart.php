<?php
/**
 * Archive Template
 *
 */




?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<div class="qw-mainsection">
<?php if(  '1' !== get_post_meta(get_the_ID(), 'qw_hidetitle', true)): ?>

<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } 
            echo esc_attr__("Charts","_s");  
            ?>
        </h2>
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>
</header>

<?php else: ?>

<div class="canc qw-top30"></div>

<?php endif; ?>


<div class="container">
    <div class="row">
        <div class="col s12 m12 l12" id="qwArchiveContainer">
        <div class="row">
           
            <?php
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }


            if(is_page()){
                if($paged == 1){
                    ?>
                     <div class="col s12 m12 l12">
                    <?php the_content(); ?>
                    </div>
                    <?php  
                }   
            }
            


            query_posts('posts_per_page=12&post_status=publish&sort_order=ASC&post_type=chart&paged=' . $paged); 
            $n = 0;
            while ( $wp_query->have_posts() ):
                $n = $n+1;
                $wp_query->the_post();
                setup_postdata( $post );             
                global $post;
                get_template_part("part","chart-item");
                if($n % 4 == 0 ){
                    ?> <hr class="canc"> <?php
                }
            endwhile; // end of the loop. 
            ?>
        </div>
        <footer class="paper z-depth-1 qw-padded">
            <?php
            // Previous/next page navigation.
            page_navi(  );
            ?>
        </footer>

        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>