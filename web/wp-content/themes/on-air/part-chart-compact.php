  <?php 
  /*
  *
  *   This creates the tracklist of the single charts
  *
  */

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

    $tracksquantity = $post->tracksquantity;
    
    $events= qp_get_group('track_repeatable');   

    $n = 0;

    if(is_array($events)){
        $pos = 1;
        foreach($events as $event){ 

            $n = $n+1;


            if($pos > $tracksquantity) {
                break;
            }

            
            $neededEvents = array('releasetrack_track_title','releasetrack_scurl','releasetrack_buyurl','releasetrack_artist_name','releasetrack_img');
            foreach($neededEvents as $n){
                if(!array_key_exists($n,$events)){
                    $events[$n] = '';
                }
            }
           
            ?>


            <?php 
            $img = '';
            if($event['releasetrack_img'] != ''){
                $img = wp_get_attachment_image_src($event['releasetrack_img'],'small');
                $img = ' background-image:url('.esc_attr($img[0]).');background-size:cover; ';
            }   
            ?>
            

            <div class="qw-chart-row compact grey lighten-4" id="chartItem<?php echo esc_attr($pos); ?>" data-sr="enter left move 120px, wait 0s, after 0.5s" >
                

                <div class="maincolor qw-chart-position"
                style="<?php echo $img; ?>">

                <?php echo esc_attr($pos); ?>

                </div>

               

                 <?php 
                if($event['releasetrack_buyurl'] != ''){
                    ?>
                    <a href="<?php echo esc_url($event['releasetrack_buyurl']); ?>" class="qw-chart-buy  maincolor-text tooltipped"  target="_blank" data-position="left" data-tooltip="<?php echo esc_attr__("Go to shop","_s") ?>">
                    <i class="mdi-action-add-shopping-cart"></i>
                    </a>
                    <?php
                }   
                ?>

               

                <h4 class="grey-text darken-3"><?php echo esc_attr($event['releasetrack_track_title']); ?></h4>
                <p class="black-text"><?php echo esc_attr($event['releasetrack_artist_name']); ?></p>
                
                
            </div>

            <?php 
            $pos = $pos+1;
    }//foreach
}//end debuf if
wp_reset_query();


