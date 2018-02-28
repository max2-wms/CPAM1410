<!-- ====================================================== normal post ====================================================== -->

<div class="s12 m6 l3 col" id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,5); ?>s, after 0.5s" >
    <div class="card small chart">
        <div class="activator card-image waves-effect waves-block waves-light maincolor">
          <?php if (has_post_thumbnail()){ ?>
            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
            <?php } ?>
        </div>
        <div class="card-content">
            <p class="card-title activator  "><i class="mdi-navigation-more-vert right "></i><?php the_title(); ?></p>

            <p class="center-align card-footer">
              <a class="cbp-vm-icon waves-effect waves-light btn accentcolor" href="<?php echo esc_url(esc_attr(get_permalink($post->ID))); ?>"><span class=""><?php echo esc_attr__("Read","_s"); ?></span></a>
              
            </p>
        </div>
        <div class="card-reveal">
          <span class="card-title textcolor"><i class="mdi-navigation-close right "></i><?php the_title(); ?></span>
          <?php the_excerpt();?>
          <p>
            <a href="<?php esc_url(the_permalink()); ?>" class=""><?php echo esc_attr__("Listen", "_s"); ?><i class="mdi-content-forward"></i></a>
          </p>
        </div>
    </div>
</div>