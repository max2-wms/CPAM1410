<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left right_border">		   
        <div class="page_title double_banner">
            <?php include('subnav1.php'); ?>
        </div>
		<?php $the_query = new WP_Query( "cat=5" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
            <h4 class="heading uppercase no_margins"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <div class="the_date"><?php the_date(); ?></div>
            
            <a href="<?php the_permalink(); ?>">
            	<?php echo get_first_image (get_the_ID(), true, array(150, 92)); ?>
            </a>
            
            <div class="news_excerpt right gap">
				<?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"><?php echo $lang['read more']; ?></a>
            </div>
            
            <div class="clear"></div>
            
            <div class="h_line"></div>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
	</div>
	
	<?php include('sidebar2.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>