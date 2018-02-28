<?php
/**
 * Single Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php while ( have_posts() ) : the_post(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection' ); ?>>
<header class=" qw-header z-depth-1">
    <div class="container ">
        <?php get_template_part ('inc/breadcrumb'); ?>
        <div class="videocontainer">
        <?php  
        global $wp_embed;
        global $post;
        $videoUrl = get_post_meta( $post->ID, '_videolove_url_key', true );
        $post_embed = $wp_embed->run_shortcode('[embed]'.esc_attr(esc_url($videoUrl)).'[/embed]');
        echo esc_attr('').($post_embed);
        ?>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?> " >
            <main class="qw-content qw-relative z-depth-1 qw-bottom30" id="qwSingleContainer">
                <?php
                    if ( has_post_thumbnail( ) ){
                        the_post_thumbnail( 'full',array('class'=>'img-forcefull') );
                    }
                ?>  
                <div class="paper qw-padded ">
                    <div class="qw-thecontent">
                        <h1 class="qw-content-title grey-text">
                            <?php the_title(); ?>
                        </h1>
                        <hr class="qw-separator triangle right small">
                        <?php the_content(); ?>
                        <p class="qw-categories"><?php  echo esc_attr__("In: ", "_s").get_the_term_list( $post->ID, 'vdl_filters', '', ' / ', '' );  ?></p>
                        <hr class="qw-separator triangle right small qw-top30">
                        <?php if ( comments_open() || '0' != get_comments_number() ){  comments_template(); } ?>
                    </div>
                </div>
            </main>
        </div>
        <?php get_template_part ('sidebar'); ?>
    </div>
</div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>