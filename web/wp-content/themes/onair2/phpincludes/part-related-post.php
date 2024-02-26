<?php  

$posttype = 'post';
$taxonomy = 'category';
$posts_per_page = 3;


/**
*
*  Basic query preparation
*  
*/
$argsList = array(
	'post_type' => $posttype,
	'posts_per_page' => $posts_per_page,
	'orderby' => array(  'menu_order' => 'ASC' ,    'post_date' => 'DESC'),
	'post_status' => 'publish',
	'post__not_in'=>array(get_the_id()),
	'meta_query'   => array(
		array(
				'key' => '_thumbnail_id',
				'compare' => 'EXISTS'
			),
		)
);  



/**
*
*  Check if we have a taxonomy result and add to query
*  
*/
$terms = get_the_terms( get_the_id()  , $taxonomy, 'string');
$term_ids = false;
if( !is_wp_error( $terms ) ) {
	if(is_array($terms)) {
		$term_ids = wp_list_pluck($terms,'term_id');
		if ($term_ids) {
			$argsList['tax_query'] =  array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'id',
					'terms' => $term_ids,
					'operator'=> 'IN'
				)
			);
		}
	}
}

$the_query = new WP_Query($argsList);


?>

<!-- ======================= RELATED SECTION ======================= -->
<div class="qt-content-primary qt-negative qt-related-section qt-vertical-padding-l">
	<div class="qt-container">
		<h5 class="qt-caption-small"><span><?php echo esc_attr__("Related posts", "onair2"); ?></span></h5>
		<div class="qt-related-list row">
			<?php
			/**
			 *
			 *
			 *  Creates a list of posts
			 *
			 * 
			 */
			if ( $the_query->have_posts() ) : 
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
					setup_postdata( $post ); 
					?>
						<div class="col s12 m4 l4">
							<?php get_template_part ('phpincludes/part', 'archive-item-post-vertical' );  ?>
						</div>
					<?php
				endwhile; 
			endif; 
			?>
		</div>
	</div>
</div>
<?php  
wp_reset_postdata();