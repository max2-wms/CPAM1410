  <?php 
  /*
  *
  *   This creates the tracklist of the single charts
  *
  */

    //global $post;
   // global $post;
   // 
   // 
   if(!function_exists('qp_get_group')){
    function qp_get_group( $group_name , $post_id = NULL ){
        global $post;     
        if(!$post_id){ $post_id = $post->ID; }
        $post_meta_data = get_post_meta($post_id, $group_name, true);  
        return $post_meta_data;
    }}

    $events= qp_get_group('track_repeatable');   
    if(is_array($events)){
        $pos = 1;
        foreach($events as $event){ 
            $neededEvents = array('releasetrack_track_title','releasetrack_scurl','releasetrack_buyurl','releasetrack_artist_name','releasetrack_img');
            foreach($neededEvents as $n){
                if(!array_key_exists($n,$events)){
                    $events[$n] = '';
                }
            }
           
            ?>
            

            <div class="qw-chart-row grey lighten-4" id="chartItem<?php echo esc_attr($pos); ?>" data-sr="enter left move 120px, wait 0s, after 0.5s" >
                <div class="maincolor qw-chart-position"><?php echo esc_attr($pos); ?></div>

               

                 <?php 
                if($event['releasetrack_buyurl'] != ''){
                    ?>
                    <a href="<?php echo esc_url($event['releasetrack_buyurl']); ?>" class="qw-chart-buy  maincolor-text tooltipped"  target="_blank" data-position="left" data-tooltip="<?php echo esc_attr__("Go to shop","_s") ?>">
                    <i class="mdi-action-add-shopping-cart"></i>
                    </a>
                    <?php
                }   
                ?>

                <?php 
                if($event['releasetrack_scurl'] != ''){
                    ?>
                    <a href="#" class="qw-chart-play accentcolor tooltipped" data-toggleclass="hidden" data-target="chartPlayer<?php echo esc_attr($pos); ?>" data-position="right" data-tooltip="<?php echo esc_attr__("Listen","_s") ?>" data-triggerresize="1">
                    <i class="mdi-av-play-arrow"></i>
                    </a>
                    <?php
                }   
                ?>

                 <?php 
                if($event['releasetrack_img'] != ''){
                    $img = wp_get_attachment_image_src($event['releasetrack_img'],'small');
                    ?>
                    <img src="<?php echo esc_url($img[0]); ?>" class="qw-chart-cover" alt="Cover">
                    <?php
                }   
                ?>

                <h4 class="grey-text darken-3"><?php echo esc_attr($event['releasetrack_track_title']); ?></h4>
                <p class="black-text"><?php echo esc_attr($event['releasetrack_artist_name']); ?></p>
                
                <?php if($event['releasetrack_scurl'] != ''){ ?>
                <div class="qw-music-player hidden" id="chartPlayer<?php echo esc_attr($pos); ?>">
                    <?php  
                    
                        $regex_soundcloud = "/soundcloud.com/";                       
                        $regex_mp3 = "/.mp3/";
                        $regex_youtube = "/youtube.com/";

                        if(preg_match ( $regex_soundcloud , $event['releasetrack_scurl'] )){
                            echo do_shortcode('[soundcloud params="auto_play=false&show_comments=true"  width="100%" url="'.esc_url($event['releasetrack_scurl']).'"]');
                        } else if (preg_match ( $regex_mp3 , $event['releasetrack_scurl'] )) {
                            echo do_shortcode('[audio src="'.esc_url($event['releasetrack_scurl']).'"]');
                        } else if (preg_match ( $regex_youtube , $event['releasetrack_scurl'] )) {
                            echo '<a href="'. esc_url( $event['releasetrack_scurl'] ) .'">Video</a>';
                        }
                    
                    ?>
                </div>
                <?php } ?>
            </div>

            <?php 
            $pos = $pos+1;
    }//foreach
}//end debuf if
wp_reset_query();


