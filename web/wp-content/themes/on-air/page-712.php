<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>           
            <div class="page_title super_long_banner">&raquo;&nbsp;<?php the_title(); ?></div>
            <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
        
        <?php $count = 0; ?>
        <?php $the_query = new WP_Query( "cat=10&posts_per_page=15" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        	<?php $count++; ?>
            	<div class="track">
                    <h4 class="heading uppercase no_margins"><?php the_title(); ?></h4>
                    
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_first_image (get_the_ID(), true, array(150, 92)); ?>
                    </a>
                    
                    <div class="">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="clear"></div>
            	</div>
            <?php if( $count % 3 == 0 ) echo "<br />";?>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>