<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
            <h2 class="uppercase heading no_margins"><?php the_title(); ?></h2>
            <div class="the_date"><?php the_date(); ?></div>
            <?php the_content(); ?>
            <br />
            
			<?php echo $lang['by'] . " ";  the_author(); ?>
            
            <div class="h_line"></div>
            
            <a href="<?php echo get_page_link(12); ?>"><?php echo $lang['read all']; ?></a>
            
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>