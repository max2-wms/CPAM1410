<?php
/*
Package: OnAir2
Description: Post vertical
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST VERTICAL ITEM ========================= -->
<div class="qt-part-archive-item qt-vertical">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php  
					$quantity = 1;
					$category = get_the_category(); 
					if( count($category) > 0 ){
						$category = get_the_category(); 
						$limit = $quantity - 1 ;
						foreach($category as $i => $cat){
							if($i > $limit){	
								continue;
							}
							?>
							<li>
								<a href="<?php echo get_category_link($cat->term_id ); ?>" class="qt-catid-<?php echo esc_attr($cat->term_id ); ?>">
									<?php echo esc_html($cat->cat_name); ?>
								</a>
							</li>
							<?php
						}
					}
					?>
				</li>
			</ul>
			<div class="qt-feedback">
				<?php 
	    		/**
	    		 *  Display item counters. see functions.php
	    		 */
	    		qantumthemes_item_counters($post->ID, true); 
	    		?>
	    	</div>
	    </div>

		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<h3 class="qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow">
						<?php the_title(); ?>
					</a>
				</h3>
			</div>
		</div>

		<div class="qt-header-bottom">
			<?php get_template_part('phpincludes/part-item-metas' ); ?>
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="<?php qantumthemes_format_icon_class($post->ID); ?>"></i></a>
		</div>
		<?php 
		/**
		 *
		 *	Featured image background
		 * 
		 */
		if (has_post_thumbnail()){ ?>
	        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
	            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
	        </div>
     	<?php } ?>
	</div>
</div>
<!-- POST VERTICAL ITEM END ========================= -->
