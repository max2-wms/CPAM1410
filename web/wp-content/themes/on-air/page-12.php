<?php include('header.php'); ?>

<div class="main-content">
    <div id="main_content" class="left">	   
        <?php include('partials/page_title.php'); ?>

		<?php $the_query = new WP_Query( "cat=3, 4, 5, 6" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
            <?php include('partials/post.php'); ?>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>