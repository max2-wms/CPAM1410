<!-- ====================================================== featured post ====================================================== -->
<div class="s12 col" id="post-<?php the_ID(); ?>" data-sr="enter <?php $dr = array("right","left","top","bottom"); echo $dr[array_rand($dr)]; ?> move 70px, wait 0.<?php echo rand(1,9); ?>s, after 0.5s" >
    <div class="card sticky">
        <div class="qw-badge top right accentcolor"><?php echo esc_attr__("Featured", "_s"); ?></div>
        <div class="qw-badge top left maincolor dark"><?php echo esc_attr(the_category(' '));  ?></div>
        <div class="card-image maincolor dark">
             <?php if (has_post_thumbnail()){ ?>
            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive') ); ?>
            <?php } ?>
            <h3 class="card-title maincolor truncate"><?php the_title(); ?></h3>
        </div>
        <div class="card-content">
            <?php the_excerpt();?>
        </div>
        <div class="card-action right-align text-medium card-footer">
            <?php get_template_part("sharepage"); ?>
            <a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr__("Read", "_s"); ?> <i class="mdi-content-forward"></i></a>
        </div>
    </div>
</div>
