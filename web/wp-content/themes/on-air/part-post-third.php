<!-- ====================================================== normal post ====================================================== -->
<div class="s12 m4 l4 col" id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,9); ?>s, after 0.5s" >
    <div class="card small">
        <div class="activator card-image waves-effect waves-block waves-light maincolor">
          <?php if (has_post_thumbnail()){ ?>
            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
            <?php } ?>
            <div class="qw-badge top left maincolor dark"><?php echo esc_attr(the_category(' '));  ?></div>
            <p class="qw-small qw-badge down  left white-text">
                <span class="qw-fleft lighten-2"><i class="mdi-communication-messenger"></i>   <?php comments_number( 'no responses', 'one response', '% responses' ); ?>. </span>
                <span class="qw-fleft lighten-2 qw-left-15"><i class="mdi-action-today"></i> <?php echo get_the_time(get_option( 'date_format' )); ?> </span>
                <span class="qw-fleft lighten-2 qw-left-15"><i class="mdi-action-account-circle"></i>  <?php echo get_the_author(); ?> </span>
            </p>
        </div>
        <div class="card-content">
            <p class="card-title activator  "><i class="mdi-navigation-more-vert right "></i><?php the_title(); ?></p>
            <p class="right-align card-footer">
                <a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr__("Read", "_s"); ?> <i class="mdi-content-forward"></i></a>
            </p>
        </div>
        <div class="card-reveal">
          <span class="card-title textcolor"><i class="mdi-navigation-close right "></i><?php the_title(); ?></span>
          <?php the_excerpt();?>
          <p>
            <a href="<?php esc_url(the_permalink()); ?>" class=""><?php echo esc_attr__("Read", "_s"); ?><i class="mdi-content-forward"></i></a>
          </p>
        </div>
    </div>
</div>