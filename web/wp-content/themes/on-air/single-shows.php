<?php
/**
 * Page Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<?php while ( have_posts() ) : the_post(); ?>
<section id="page-<?php the_ID(); ?>" <?php post_class( 'qw-mainsection' ); ?>>


    <?php 

     $parheader = get_post_meta($post->ID,'parallaxheader',true);
         if($parheader != ''){
             $image_attributes = wp_get_attachment_image_src( $parheader, 'full' ); // returns an array
             if( $image_attributes ) {
              ?>

            <div class="container qw-page-banner z-depth-1">
                <div class=" parallax-container qw-parallax-background-css"   data-speed="0.15" data-type="background" data-qwbgimg="<?php echo esc_attr(esc_js($image_attributes[0])); ?>" >
                    <h1 class="qw-parallax-title white-text text-shadow">
                        <?php the_title(); ?>
                    </h1>
                    <?php
                    $subtitle = get_post_meta($post->ID,'subtitle',true);
                    if($subtitle != ''){
                    ?>
                    <h3 class="qw-parallax-subtitle maincolor qw-nf"><?php echo esc_attr($subtitle); ?></h3><hr class="canc">
                    <?php
                    }
                    ?>
                    <?php
                    $subtitle2 = get_post_meta($post->ID,'subtitle2',true);
                    if($subtitle2 != ''){
                    ?>
                    <h5 class="qw-parallax-subtitle2 paper maincolor-text"><?php echo esc_attr($subtitle2); ?></h5>
                    <?php
                    }
                    ?>
                </div>
            </div>

    <?php    

        }
    }
    ?>  


    <div class="container qw-top30 qw-bottom30" id="qwMainContent">
        <div class="row">
            <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" >
                <div class="qw-content qw-relative z-depth-1" id="qwSingleContainer">
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
                            <?php
                            $subtitle = get_post_meta($post->ID,'subtitle',true);
                            if($subtitle != ''){
                            ?>
                                <h5 class="qw-subtitle maincolor-text"><?php echo esc_attr($subtitle); ?></h5>

                            <?php } ?>

                            <?php
                            $subtitle2 = get_post_meta($post->ID,'subtitle2',true);
                            if($subtitle2 != ''){
                            ?>
                                <p class="qw-subtitle2"><?php echo esc_attr($subtitle2); ?></p>
                            <?php } ?>
                            <hr class="qw-separator triangle right small">
                            

                            <?php 
                            /**
                             * NEW FROM ONAIR 1.2.6 ==========================
                             *
                             *  ADDING THE TABLE OF THE SCHEDULE IN THE SINGLE SHOW PAGE
                             *
                             *=============================================== */

                            global $current_show_ID;
                            global $show_title;
                            $current_show_ID = $post->ID;
                            $show_title = get_the_title();
                            get_template_part("part-showdate-by-title"); 
                            ?>
                            <?php the_content(); ?>


                            <h4>
                            <?php

                            // just a small program to create all the social icons
                            $social = array(
                                            'facebook',
                                            'amazon',
                                            'blogger',
                                            'behance',
                                            'bebo',
                                            'flickr',
                                            'pinterest',
                                            'rss',
                                            'triplevision',
                                            'tumblr',
                                            'twitter',
                                            'vimeo',
                                            'wordpress',
                                            'whatpeopleplay',
                                            'youtube',
                                            'soundcloud',
                                            'myspace',
                                            'googleplus',
                                            'itunes',
                                            'juno',
                                            'lastfm',
                                            'linkedin',
                                            'mixcloud',
                                            'resident-advisor',
                                            'reverbnation'

                                            );

                            foreach($social as $s){
                                    $i = get_post_meta($post->ID, $s, true);
                                    if($i != ''){
                                        echo '<a href="'.esc_url($i).'" class="qw_social "  target="_blank"><span class="qticon-'.esc_attr($s).'"></span></a>';
                                    }
                                
                            }

                            ?>
                            </h4>


                            <hr class="qw-separator triangle right small">
                            <p class="qw-categories"><?php  echo esc_attr__("In: ", "_s").get_the_term_list( $post->ID, 'genre', '', ' / ', '' );  ?></p>
                        </div>
                    </div>
                    
                    <?php if ( comments_open() || '0' != get_comments_number() ){  ?>
                        <div class="paper qw-padded">
                            <?php comments_template();   ?>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>
    </div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>