<?php
/*
Package: OnAir2
Description: Single chart
Version: 1.2.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
    <?php  
    get_template_part ('phpincludes/menu');
    get_template_part ('phpincludes/part-searchbar'); 
    ?>
    <div id="maincontent" class="qt-main">
        <?php 
        /**
         * From V 2.5
         */
        if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
            <hr class="qt-header-player-spacer">
        <?php } ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- ======================= HEADER SECTION ======================= -->
            <?php get_template_part( 'phpincludes/part-header-caption-page'); ?>
            <!-- ======================= CONTENT SECTION ======================= -->
            <div class="qt-container">
                <div class="row qt-vertical-padding-l ">
                    <div class="col s12 m12 l1 qt-pushpin-container">
                        <div class="qt-pushpin">
                            <?php get_template_part( 'phpincludes/sharepage' ); ?>
                        </div>
                         <hr class="qt-spacer-m">
                    </div>
                    <div class="col s12 m12 l11">
                        <!-- SCHEDULE DAY ================================================== -->
                        <div class="qt-show-schedule-day row">
                            <?php
                            $schedule_title = get_the_title( );
                            $id = get_the_ID();
                            $events= get_post_meta($id, 'track_repeatable', true);
                            if(is_array($events)){
                                $n = 0;
                                $count = 0;
                                foreach($events as $event){ 
                                    if(array_key_exists('show_id', $event)){
                                        if(array_key_exists(0, $event['show_id'])){
                                            if(is_numeric($event['show_id'][0]) && ($event['show_id'][0] !== 0)){
                                                
                                                $show_id = $event['show_id'][0];
                                                $post = get_post($show_id); 
                                                if(is_object($post)):
                                                    $count = $count+1;
                                                    $neededEvents = array('show_id','show_time','show_time_end');
                                                    foreach($neededEvents as $n){
                                                      if(!array_key_exists($n,$events)){
                                                          $events[$n] = '';
                                                      }
                                                    }

                                                    setup_postdata($post);
                                                    $show_time_d = $event['show_time'];
                                                    $show_time_end_d = $event['show_time_end'];

                                                    if($show_time_d === "24:00"){
                                                        $show_time_d === "00:00";
                                                    }

                                                    if($show_time_end_d === "24:00"){
                                                        $show_time_end_d === "00:00";
                                                    }

                                                    // 12 hours format
                                                    if(get_theme_mod('QT_timing_settings', '12') == '12'){
                                                        $toreplace = array("am", "pm");
                                                        $replacer = array('</span><span class="qt-am">am','</span><span class="qt-am">pm');
                                                        $show_time_d = date('g:i\<\/\s\p\a\n\>\<\s\p\a\n\ \c\l\a\s\s\=\"\q\t\-\a\m\"\>a', strtotime($show_time_d));
                                                    }
                                                    $now = current_time("H:i");

                                                    /**
                                                     * 
                                                     *
                                                     *  Custom description
                                                     * 
                                                     */
                                                    $custom_desc = get_post_meta($show_id , 'show_incipit', true);
                                                    if($custom_desc == ''){
                                                        $excerpt = $post->post_content;
                                                        $custom_desc = $excerpt;
                                                        $charlength = 160;
                                                        if ( mb_strlen( $excerpt ) > $charlength ) {
                                                            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
                                                            $exwords = explode( ' ', $subex );
                                                            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
                                                            if ( $excut < 0 ) {
                                                                $custom_desc = mb_substr( $subex, 0, $excut );
                                                            } else {
                                                                $custom_desc = $subex;
                                                            }
                                                        } else {
                                                            $custom_desc = $excerpt;
                                                        }
                                                        $custom_desc .= '[...]';
                                                    }
                                                    ?>
                                                    <!-- SCHEDULE SHOW ========================= -->
                                                    <div class="col s12 m4 l4">
                                                        <div class="qt-part-archive-item qt-part-show-schedule-day-item">
                                                            <div class="qt-item-header">
                                                                <div class="qt-header-mid qt-vc">
                                                                    <div class="qt-vi">
                                                                        <h4 class="qt-item-title qt-title qt-capfont">
                                                                            <a href="<?php the_permalink(); ?>" class="qt-ellipsis  qt-t"><?php the_title(); ?></a>
                                                                        </h4>
                                                                        <p class="qt-item-det">
                                                                            <span class="qt-time"><?php echo htmlspecialchars_decode(esc_attr($show_time_d) ); ?></span><span class="qt-day qt-capfont"><?php echo esc_attr($schedule_title); ?></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <a href="#" class="qt-info bottom right"><i class="dripicons-information"></i></a>
                                                                <?php 
                                                                if (has_post_thumbnail()){ ?>
                                                                    <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
                                                                        <?php the_post_thumbnail( 'qantumthemes-medium' ); ?>
                                                                    </div>
                                                                 <?php }
                                                                ?>
                                                            </div>
                                                            <div class="qt-overinfo qt-paper">
                                                                <p class="qt-item-det qt-accent">
                                                                    <span class="qt-time"><?php echo htmlspecialchars_decode(esc_attr($show_time_d) ); ?></span><span class="qt-day qt-capfont"><?php echo esc_attr($schedule_title); ?></span>
                                                                </p>
                                                                <div class="qt-more">
                                                                    <p class="qt-ellipsis-2"><?php echo wp_kses_post($custom_desc); ?></p>
                                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_attr__("Learn more", "onair2"); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- SCHEDULE SHOW END ========================= -->
                                                <?php endif; 
                                            } // is_numeric                     
                                        }
                                        
                                    } // array_key_exists
                                }//foreach
                            } else {
                                echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
                            }

                            wp_reset_postdata();
                            ?>
                        </div>
                        <!-- SCHEDULE DAY END ================================================== -->
                    </div>
                </div>
            </div>
            <!-- ======================= RELATED SECTION ======================= -->
            <?php get_template_part ('phpincludes/part', 'related' );  ?>
        </div>
        <?php endwhile; // end of the loop. ?>
    </div><!-- .qt-main end -->
    <?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
    <?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>