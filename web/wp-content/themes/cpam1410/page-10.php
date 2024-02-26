<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left right_border">		   
        <div class="page_title double_banner">
            <?php include('subnav2.php'); ?>
        </div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<?php include('schedule.php'); ?>
        	<?php //the_content(); ?>
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar3.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>