<!-- ====================================================== normal post ====================================================== -->
<div class="s12 m12 l6 col " id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,9); ?>s, after 0.5s, reset false" >
    <div class="card small show">
        <div class="activator card-image waves-effect waves-block waves-light maincolor">
          <?php if (has_post_thumbnail()){ ?>
            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
            <?php } ?>
            <div class="qw-badge top left maincolor dark"><?php echo  get_the_term_list( $post->ID, 'genre', '', ' ', '' ) ;  ?></div>
            <p class="qw-small qw-badge down  left white-text">
                <?php
                $subtitle2 = get_post_meta($post->ID,'subtitle2',true);
                if($subtitle2 != ''){
                ?>
                <span class="qw-fleft lighten-2"><?php echo esc_attr($subtitle2); ?></span>
                <?php
                }
                ?>
                
            </p>
        </div>
        <div class="card-content">
            <p class="card-title activator  "><i class="mdi-navigation-more-vert right "></i><?php the_title(); ?></p>

             <?php
            $subtitle = get_post_meta($post->ID,'subtitle',true);
            if($subtitle != ''){
            ?>
                <p class="card-excerpt"><?php echo esc_attr($subtitle); ?></p>

            <?php } ?>

         
            <p class="right-align card-footer">
                <a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr("Discover", "_s"); ?> <i class="mdi-content-forward"></i></a>
            </p>
        </div>
        <div class="card-reveal">
          <span class="card-title textcolor"><i class="mdi-navigation-close right "></i><?php the_title(); ?></span>

          <?php the_excerpt();?>
          <p>
            <a href="<?php esc_url(the_permalink()); ?>" class=""><?php echo esc_attr("Discover", "_s"); ?><i class="mdi-content-forward"></i></a>
          </p>
        </div>
    </div>
</div>