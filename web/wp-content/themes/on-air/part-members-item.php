<!-- ====================================================== normal post ====================================================== -->
<div class="s12 m6 l3 col qw-members-item " id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,9); ?>s" >
    <div class="paper z-depth-1">


        <?php global $post; ?>
        <?php 
        if (has_post_thumbnail()){ 
            the_post_thumbnail( 'gridthumb',array('class'=>'img-responsive') ); 
        } 
        ?>
         <p class="subtitle maincolor text-center"><?php echo get_post_meta($post->ID, 'member_role', true);  ?></p>
        <div class="content">
        
           

            <h3><?php the_title(); ?></h3>
            
            
            <p class="social">
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
                    echo '<a href="'.esc_url($slink).'" class="qw_social " target="_blank"><span class="qticon-'.str_replace("QT_","",$s).' "></span></a>';
                }
            }

            ?>
            </p>
            <p class="incipit"><?php echo get_post_meta($post->ID, 'member_incipit', true);  ?></p>

            
            <a href="<?php esc_url(the_permalink()); ?>" class="btn accentcolor"><?php echo esc_attr__("More info", "_s"); ?> </a>
        </div>
    </div>

</div>