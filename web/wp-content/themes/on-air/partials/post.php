<div class="post">
    <h5 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    
    <?php
        $image = get_first_image( get_the_ID(), true, array(150, 92) );
    ?>
    
    <?php if ( $image !== '' ) { ?>
        <a class="post_thumbnail left" href="<?php the_permalink(); ?>">
            <?php echo get_first_image (get_the_ID(), true, array(150, 92)); ?>
        </a>
    <?php } ?>
    
    <div class="news_excerpt">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>"><?php echo $lang['read more']; ?></a>
    </div>
    
    <div class="clear"></div>
    
    <div class="h_line"></div>
</div>