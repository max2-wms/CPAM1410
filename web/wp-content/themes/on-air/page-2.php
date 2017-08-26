<?php include('header.php'); ?>

<div class="main-content">
	<div id="main_content" class="left">
		<a id="small_banner" href="<?php echo get_page_link(2); ?>"><span class="page_title">Nouvelles</span></a>
		
		<?php $the_query = new WP_Query( "cat=3, 4, 5, 6&posts_per_page=5" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="post">
                <h4 class="heading uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                
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

                <a href="<?php the_permalink(); ?>">En savoir plus...</a>
                
                <div class="clear"></div>
                
                <div class="h_line"></div>
            </div>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
        <a href="<?php echo get_page_link(12); ?>"><?php echo $lang['read all']; ?></a>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>