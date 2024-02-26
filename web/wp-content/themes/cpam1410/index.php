<?php include('header.php'); ?>

<div id="content" class="inner_container">
	<div id="main_content" class="left">
		<a id="small_banner" href="<?php echo get_page_link(10); ?>"><span class="page_title"><?php echo $lang['emissions']; ?></span></a>
		<?php include('slider.php'); ?>
		
		<?php $the_query = new WP_Query( "cat=3, 4, 5, 6&posts_per_page=5" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <h4 class="heading uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>"><?php echo $lang['read more']; ?></a>
            <div class="h_line"></div>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
        <a href="<?php echo get_page_link(12); ?>"><?php echo $lang['read all']; ?></a>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>