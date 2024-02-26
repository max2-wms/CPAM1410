<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left">		   
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
            <div class="page_title super_long_banner">&raquo;&nbsp;<?php the_title(); ?></div>
        <?php endwhile; else: endif; ?>
            
		<?php $the_query = new WP_Query( "cat=7" ); ?>
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
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>