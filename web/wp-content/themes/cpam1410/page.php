<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
            <div class="page_title super_long_banner">&raquo;&nbsp;<?php the_title(); ?></div>
            <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>