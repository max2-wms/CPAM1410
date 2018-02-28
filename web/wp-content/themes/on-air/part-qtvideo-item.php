
<div class="s12 m6 l3 col qw-multimedia-item qw-top20" id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,9); ?>s, after 0.5s, reset true" >
    <div class="paper z-depth-1">


        <?php global $post; ?>
        <?php 
        if (has_post_thumbnail()){ 
            the_post_thumbnail( 'gridthumb',array('class'=>'img-responsive') ); 
        } 
        ?>
        <div class="content">
        
           

            <p class="itemtitle "><?php the_title(); ?></p>

            <?php 

            /*
            *
            * Video url  if swipebox is Active
            *
            */

            $videoUrl = get_post_meta( $post->ID, '_videolove_url_key', true );
            $swipebox = '';
            if(get_option( 'vdl_enableswipebox', '1') == '1' && $videoUrl != '' ){
                $url = $videoUrl;
                $previewclass = ' videoloveSwipebox ';

                ?> <a class="qw-disableembedding vdl-link btn tooltipped <?php echo esc_attr($previewclass); ?> maincolor" data-position="top"  data-tooltip="<?php echo esc_attr__("Play here","_s"); ?>" href="<?php echo esc_attr($url); ?>" ><i class="mdi-av-video-collection icon-l"></i></a> <?php
            }

             ?>
            
            <a href="<?php esc_url(the_permalink()); ?>" class="btn accentcolor tooltipped" data-position="top"  data-tooltip="<?php echo esc_attr__("Go to page","_s"); ?>"><i class="mdi-content-link icon-l"></i> </a>
        </div>
    </div>

</div>