<?php include('header.php'); ?>

<div class="main-content">
	<div id="main_content" class="left">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
						<?php include('partials/page_title.php'); ?>

            <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>