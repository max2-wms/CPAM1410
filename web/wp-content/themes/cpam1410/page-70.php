<?php get_header(); ?>  
<div class="outer_container">
	<div class="inner_container">
    	<?php $category = get_the_category(); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<div class="left_column left">
            <h3 class="uppercase ubuntu"><?php the_title(); ?></h3>
        	<?php the_content(); ?>
            </div>
          <?php endwhile; else: endif; ?>
            
            <div class="right_column right">
            	<?php $the_query = new WP_Query( "cat=3" ); ?>
        		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                	<div style="padding-top: 20px;" class="left medium_gap_right">
                    	<?php echo get_first_image (get_the_ID(), true, array(100, 100)); ?>
                    </div>
                    <div style="width: 300px;" class="left">
                        <h4 class="uppercase ubuntu"><a href="<?php the_permalink(); ?>" class="reg" rel="facebox"><?php the_title(); ?></a></h4>
                        <span class="text"><?php the_content(); ?></span><br />
                    </div>
                    <div class="clear"></div>
                <?php endwhile; ?>  
            	<?php wp_reset_postdata(); ?>
            </div>
            
            <div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>