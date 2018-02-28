<h5><?php echo esc_attr("Scheduled on:", "_s"); ?></h5>
<table class="responsive-table bordered striped">
<?php
/**
*
*   Theme: Sonik
*   File: part-sshowdate-by-title.php
*   Role: creates a show calendar by the show title
*   @author : QantumThemes <info@qantumthemes.com>
*
*
**/
 
$query = new WP_Query();

if(!function_exists('qantumthemes_get_group')){
function qantumthemes_get_group( $group_name , $post_id = NULL ){
  	global $post; 	  
 	if(!$post_id){ $post_id = $post->ID; }
  	$post_meta_data = get_post_meta($post_id, $group_name, true);  
  	return $post_meta_data;
}}

/**
 *
 *
 *
 *	Important: this template requires a global variable containing the show name
 *
 * 
 */

global $show_title; 
global $current_show_ID;

$query->query( array(
	'post_type' => 'schedule'
	,'posts_per_page' => 200
	,'posts_status' => 'publish'
	/*,'meta_query' => array(
		array(
			'key' => 'track_repeatable',
			'value' => $show_title,
			'compare' => 'LIKE'
		)
	)*/
   )
 );

if ($query->have_posts()) :
	while ($query->have_posts()) : $query->the_post(); 
		$schedule_title = get_the_title();
		$link = get_the_permalink();
		$events= qantumthemes_get_group('track_repeatable', $post->ID);   
		if(is_array($events)){
			$text = '';
  			foreach($events as $e){ 
  				
  				if(array_key_exists('show_id', $e)){
  					
  					if( $e["show_id"][0] == $current_show_ID){ ?>
  						<?php 
  						// $text .= '<p class="text-small">';
  						if(array_key_exists('show_time', $e)){
  							$text .= '<i class="mdi-image-timer"></i> <strong>'.esc_attr($e["show_time"]).'</strong>';
  						}

  						if(array_key_exists('show_time_end', $e)){
  							$text .= ' <i class="mdi-image-timer-off"></i> <strong>'.esc_attr($e["show_time_end"]).'</strong>';
  						}
  						// $text .= '</p>';
  						?>
  					<?php 
  					}
  				}

  			}
  			if($text != ''){
				?>
				
				<tr>
					<td><a href="<?php echo esc_attr($link); ?>"><?php echo esc_attr($schedule_title); ?></a></td><td><?php echo htmlspecialchars_decode( esc_attr( $text ) ); ?></td>
					

				</tr>
				<?php
			}
  		}
  		?>
	<?php endwhile; 
endif; 
wp_reset_postdata();

?>
</table>