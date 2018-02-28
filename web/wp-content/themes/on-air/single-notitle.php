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
<!-- 
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>
</header>
-->
<div class="container">
    <div class="row">
        <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?> " >
         
            <main class="qw-content qw-relative z-depth-1 qw-bottom30" id="qwSingleContainer">
               
                <div class="qw-badge top right maincolor dark">
                    <?php echo esc_attr(the_category(' '));  ?>
                </div>
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
                        <p class="qw-taxonomy-box">

                            <i class="mdi-action-today"></i><?php the_time('j F Y') ?>
                            <i class="mdi-image-style"></i><?php the_category(' '); ?>
                            
                        </p>

                        <hr class="qw-separator triangle right small">

                        <?php the_content(); ?>
                        <hr class="qw-separator triangle right small qw-top30">
                         <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_attr__( 'Pages:', '_s' ),
                                'after'  => '</div>',
                            ) );
                        ?>


                        <p class="qw-taxonomy-box">
                            <i class="mdi-social-person"></i><?php the_author_posts_link(); ?>
                            <i class="mdi-action-label"></i><?php the_tags(' '); ?>
                        </p>

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