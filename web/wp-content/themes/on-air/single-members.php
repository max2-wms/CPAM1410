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


                            <?php 
                            $social = array(
                                            'QT_facebook',
                                            'QT_amazon',
                                            'QT_blogger',
                                            'QT_behance',
                                            'QT_bebo',
                                            'QT_flickr',
                                            'QT_pinterest',
                                            'QT_rss',
                                            'QT_triplevision',
                                            'QT_tumblr',
                                            'QT_twitter',
                                            'QT_vimeo',
                                            'QT_wordpress',
                                            'QT_whatpeopleplay',
                                            'QT_youtube',
                                            'QT_soundcloud',
                                            'QT_myspace',
                                            'QT_googleplus',
                                            'QT_itunes',
                                            'QT_juno',
                                            'QT_lastfm',
                                            'QT_linkedin',
                                            'QT_mixcloud',
                                            'QT_resident-advisor',
                                            'QT_reverbnation'

                                            );
                           
                            foreach($social as $s){
                                $slink = get_post_meta($post->ID,$s,true);    
                                if($slink != ''){
                                    echo '<a href="'.esc_url($slink).'" class="qw_social icon-l" target="_blank"><span class="qticon-'.str_replace("QT_","",$s).' white-text"></span></a>';
                                }
                            }
                            ?>


                    </h1>
                    <?php
                    $subtitle = get_post_meta($post->ID,'member_role',true);
                    if($subtitle != ''){
                    ?>
                    <h3 class="qw-parallax-subtitle maincolor qw-nf"><?php echo esc_attr($subtitle); ?></h3><hr class="canc">
                    <?php
                    }
                    ?>
                   
                </div>
            </div>

             <p class="text-center qw-scrollbutton-sticked">
                        <a class="btn-floating btn-large waves-effect waves-light accentcolor smoothscroll icon-l" href="#qwMainContent" ><i class="mdi-hardware-keyboard-arrow-down icon-l"></i></a>
                    </p>

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
                            <?php the_content(); ?>
                            <p class="qw-categories text-right italic"><?php  the_title(); ?>, <?php echo get_the_term_list( $post->ID, 'membertype', '', ' / ', '' );  ?></p>
                        </div>
                    </div>
                    
              
                    
                </div>
            </div>
            <?php get_template_part ('sidebar'); ?>
        </div>
    </div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>