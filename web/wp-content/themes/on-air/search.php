<?php
/*
Template Name: Search Page
*/
?>
<?php
/*
*
*   Ref.
*   https://codex.wordpress.org/Creating_a_Search_Page
*/

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
            echo esc_attr($total_results).esc_attr(__( ' Results for: ', '_s' )), '<span>' . esc_attr(get_search_query()) . '</span>';
            ?>
        </h2>
    

    </div>
</header>
<div class="container ">   
    <?php 
    /*
    *
    *   No results
    *
    *
    */
    if($total_results == 0){ ?>
        <div class="paper qw-padded ">
            <div class="qw-thecontent">
                <h4 class="qw-nomargin"><?php echo esc_attr__("You can make a new search here:","_s"); ?></h4>
                <?php get_template_part("searchform"); ?>
            </div>
        </div>
     <?php } ?>

        <div class="row <?php if($total_results == 0){ ?> qw-top30 <?php } ?>">
            <div class="col s12 m12 l8 " >
                <main class="qw-content qw-relative" id="qwSingleContainer">
                    <?php if($total_results == 0){ ?>
                         <div class="paper qw-padded qw-top30qw-bottom30 z-depth-1">
                                <h4 class="qw-nomargin"><?php echo esc_attr__("Or check our latest news:","_s"); ?></h4>
                        </div>
                        <div class="qw-top30">
                        <?php
                        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                        elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                        else { $paged = 1; }
                        query_posts('posts_per_page=8&paged=' . $paged); 

                        ?>
                        </div>
                        <?php  get_template_part('loop','archive-2cols'); ?>
                    <?php } else { ?>
                         <?php  get_template_part('loop','archivesearch'); ?>

                         <div class="paper qw-padded z-depth-1 qw-top30">
                            <div class="qw-thecontent">
                                <h4 class="qw-nomargin"><?php echo esc_attr__("You can make a new search here:","_s"); ?></h4>
                                <?php get_template_part("searchform"); ?>
                            </div>
                        </div>
                    <?php } ?>
                </main>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>


   
</div>
<?php get_footer(); ?>