<?php
/**
 * Package: OnAir2
 * Description: related show box
 * Version: 3.1.1
 * [$related_show outputs a box with a show related to current podcast]
 * @since 3.1.1
 * @var [array]
 */
$related_show = get_post_meta( get_the_id(), '_podcast_show', true );
if($related_show){
	$related_show = $related_show[0];
    $args = array(
		'post_type' => 'shows',
		'posts_per_page' => 1,
		'post_status' => 'publish',
		'post__in'=> explode(',', $related_show),
	); 
	$the_query = new WP_Query($args);
	if ( $the_query->have_posts() ) : 
		while ( $the_query->have_posts() ) : $the_query->the_post(); 
			global $post; 
			setup_postdata( $post ); 
			?>
				<div class="qt-content-primary qt-spacer-m">
					<div class="row">
						<div class="col s12 m6 l6">
							<?php if (has_post_thumbnail()){ ?>
					        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
					     	<?php } ?>
						</div>
						<div class="col s12 m6 l6">
					
					  		<h3 class="qt-ellipsis qt-t qt-title qt-spacer-s">
								<a href="<?php the_permalink(); ?>" class="qt-text-shadow qt-negative"><?php the_title(); ?></a>
							</h3>
							<h4 class="qt-ellipsis qt-t qt-title"><?php echo esc_attr(get_post_meta($post->ID,"subtitle", true)); ?></h4>
							<p><a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-s primarys qt-btn-primary"><?php esc_html_e("More info", 'onair2'); ?></a></p>

						</div>
					</div>
				</div>
			<?php
		endwhile; 
	endif; 
	wp_reset_postdata();
}
