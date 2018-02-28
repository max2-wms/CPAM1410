<?php
/**
 * Single Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            echo esc_attr__("Page not found", "_s");
            ?>
        </h2>
    
        <div class="qw-breadcrumb grey-text lighten-2 ">
            <p class="container"><?php get_template_part ('inc/breadcrumb'); ?></p>
        </div>
    </div>
</header>
<div class="container ">
    <div class="paper qw-padded z-depth-1">
         <div class="qw-thecontent">
            <h4 ><?php echo esc_attr__("You can make a new search here:","_s"); ?></h4>
            <?php get_template_part("searchform"); ?>
        </div>
    </div>
    <div class="row qw-top30">
        <div class="col s12 m12 l8 " >

            <main class="qw-content qw-relative" id="qwSingleContainer">

               

                      
                 <div class="paper qw-padded qw-bottom30 z-depth-1">
                        <h4 class="qw-nomargin"><?php echo esc_attr__("Or check our latest news:","_s"); ?></h4>
                </div>
                <?php
                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                else { $paged = 1; }
                query_posts('posts_per_page=8&paged=' . $paged); 

                ?>
                <?php  get_template_part('loop','archive-2cols'); ?>





            </main>
        </div>
        <?php get_template_part ('sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>