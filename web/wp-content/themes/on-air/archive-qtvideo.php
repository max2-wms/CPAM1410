<?php
/**
 * Video Archive Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            echo esc_attr__("Videos","_s");
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
            /*
            *
            *   Ready for different custom post type archives
            *
            */
            $n = 0;
            while ( have_posts() ) : the_post(); 
                $n = $n+1;
                global $post;
                get_template_part("part","qtvideo-item");
                if($n % 4 == 0 ){
                    ?>

                    
                    <hr class="canc">


                    <?php
                }
            endwhile; // end of the loop. 
        
            ?>

        </div>
        <footer class="paper z-depth-1 qw-padded">
        <?php
 
            page_navi( array(
                'prev_text'          => __( 'Previous page', '_s' ),
                'next_text'          => __( 'Next page', '_s' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', '_s' ) . ' </span>',
            ) );
        ?>
        
        </footer>

        </div>
    </div>
</div>
<?php get_footer(); ?>