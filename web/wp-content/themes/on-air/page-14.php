<?php include('header.php'); ?>

<div class="main-content">
	<div id="main_content" class="left">
		<?php include('partials/page_title.php'); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
            <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>