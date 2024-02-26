<?php
$related_posttype = get_post_type( get_the_id());
$related_taxonomy = esc_attr( qantumthemes_get_type_taxonomy( $related_posttype ) );
$related_posts_per_page = 3;

/**
 *
 *  Basic query preparation
 *  
 */
$argsList = array(
	'post_type' => $related_posttype,
	'posts_per_page' => $related_posts_per_page,
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

$terms = get_the_terms( get_the_id()  , $related_taxonomy, 'string');
$term_ids = false;
if( !is_wp_error( $terms ) ) {
	if(is_array($terms)) {

		// print_r($terms);
		$term_ids = wp_list_pluck($terms,'term_id');
		if ($term_ids) {
			$argsList['tax_query'] =  array(
				array(
					'taxonomy' => $related_taxonomy,
					'field' => 'id',
					'terms' => $term_ids,
					'operator'=> 'IN'
				)
			);
		}
	}
}

/**
 * 
 *  Choose item template by posttype
 *  
 */
$template_type = $related_posttype;
if($related_posttype === 'post') {
	$template_type = 'post-vertical'; // posts we want a vertical item
}

/**
 * 
 * Execute query
 * 
 */
$the_query = new WP_Query($argsList);
?>

<!-- ======================= RELATED SECTION ======================= -->
<?php if ( $the_query->have_posts() ) :?>
	<div class="qt-content-primary qt-negative qt-related-section qt-vertical-padding-l">
		<div class="qt-container">
			<h5 class="qt-caption-small">
				<span><?php echo esc_attr__("You may also like", "onair2"); ?></span>
			</h5>
			<div class="qt-related-list row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
					setup_postdata( $post ); 
					?>
					<div class="col s12 m4 l4">
						<?php get_template_part ('phpincludes/part', 'archive-item-'.$template_type );  ?>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
<?php  endif; 

wp_reset_postdata();