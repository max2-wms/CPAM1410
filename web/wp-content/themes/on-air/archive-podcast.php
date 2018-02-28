<?php
/**
*
*   Template Name: Archive Podcast
*   Theme: ONAIR
*   File: archive-podcast.php
*   Role: Archive template to display podcast and filter taxonomy.
*   @author : QantumThemes <info@qantumthemes.com>
*
*
**/

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;


?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->

<?php if(  '1' !== get_post_meta(get_the_ID(), 'qw_hidetitle', true)): ?>

<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
           

            if(!is_page()){
                $termname = '';
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                if(is_object($term)){
                    echo esc_attr($term->name).' '.esc_attr__("podcast","_s");
                } else {
                    echo esc_attr__("Podcast","_s");  
                } 
                
            } else {
                the_title();
            }

             
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
            if(is_page()){
                $args = array(
                    'post_type' => 'podcast',
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'orderby' => 'meta_value',
                    'order'   => 'DESC',
                    'meta_key' => '_podcast_date',
                    'suppress_filters' => false,
                    'paged' => $paged
                );

                $wp_query = new WP_Query( $args );


                
                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    get_template_part("part","podcast-item");
                endwhile; else: ?>
                    <h3><?php echo esc_attr__("Sorry, nothing here","_s")?></h3>
                <?php endif;
                wp_reset_postdata();
            } else {
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    get_template_part("part","podcast-item");
                endwhile; else: ?>
                    <h3><?php echo esc_attr__("Sorry, nothing here","_s")?></h3>
                <?php endif;
                }
            ?>

        </div>
        <footer class="paper z-depth-1 qw-padded">
            <?php
            // Previous/next page navigation.
            page_navi( );
            wp_reset_postdata();
            ?>
        </footer>

        </div>
    </div>
</div>
<?php get_footer(); ?>