<?php


/*
*
*
*	Identify current date and day
*
*/

$date = current_time("Y-m-d");


$current_dayweek = current_time("D");


/* How the comparison is made:
1. id the current day is like a specific day of the schedule, that one is the current. 
2. if no schedule has exact full date like today, we check if one has the day of the week of today
3. Else, we give up
*/

?>
<?php
if(!function_exists('qp_get_group')){
function qp_get_group( $group_name , $post_id = NULL ){
  	global $post; 	  
 	if(!$post_id){ $post_id = $post->ID; }
  	$post_meta_data = get_post_meta($post_id, $group_name, true);  
  	return $post_meta_data;
}}
?>

<?php


	
	$args           = array(

		'post_type' => 'schedule',
		 'posts_per_page' => 31,
		 'post_status' => 'publish',
 		 'orderby' => 'menu_order',
 		 'order'   => 'ASC'
	);
	$the_query_meta = new WP_Query( $args );
	global $post;
	$total = 0;
	$tabsArray = array();

	
	
	$id_of_currentday = 0;
	//$foundit = 0;

	while ( $the_query_meta->have_posts() && $id_of_currentday == 0 ):

		$active = '';
		$maincolor = '';
		$the_query_meta->the_post();
		$total++;
		setup_postdata( $post );
		
		/*
		*
		*	Create the array for making the content
		*
		**/

		$tab = array('name' => $post->post_name,
		                     'title' => $post->post_title,
		                     'id' => $post->ID);

		/*
		*
		*
		*	Find out if is a day of the calendar
		*
		*/

		$schedule_date = get_post_meta($post->ID, 'specific_day', true);
		$schedule_week_day = get_post_meta($post->ID, 'week_day', true);

		//echo 'Looking'.$post->ID.'<br>';
		/*
		1. Find which is the current day, otherwise random shows will be shown
		*/
		if($schedule_date == $date){
			$id_of_currentday = $post->ID;
			
		} else {
			/*
			2. check if is this day of the week
			*/
			
			if(is_array($schedule_week_day)){
				foreach($schedule_week_day as $day){ // each schedule can fit multiple days
					if(strtolower($day) == strtolower($current_dayweek)){
						//echo 'Found'.$post->ID;
						$id_of_currentday = $post->ID;

					}
				}
			}
		}
		
		
	endwhile;

	if($id_of_currentday != 0){
		?>
					<?php
				   	$events= qp_get_group('track_repeatable',$tab['id']);   
				    if(is_array($events)){

				    	$maximum = 6;
					    $total = 0;


					    /*
					    *
					    *	Debug
					    */
					   // print_r($events);
					    $found = 0;
				      	foreach($events as $event){ 
					      	$neededEvents = array('show_id','show_time','show_time_end');
					      	foreach($neededEvents as $n){
					          if(!array_key_exists($n,$events)){
					              $events[$n] = '';
					          }
					      	}
					      	$show_id = $event['show_id'][0];
					      	global $post;
					      	$post = get_post($show_id); 
					      	$show_time = $event['show_time'];
					      	$show_time_end = $event['show_time_end'];
					      	$now = current_time("H:i");



					      	/*
					      	*
					      	*	Time Control
					      	*
					      	*
					      	*
					      	*/
					      	if($show_time_end == "00:00"){
					      		$show_time_end = "24:00";
					      	}


					      	// We start looking from the actual moment
					      	if($show_time < $now && $now < $show_time_end  /**/ && $found == 0){
					      		$found = 1;
					          	?>
					          	 <?php echo  esc_attr($post->post_title); ?> <span class="thin grey-text text-lighten-1"><?php echo  esc_attr(get_post_meta($post->ID,'subtitle',true)); ?></span>

								<?php
							}
							wp_reset_postdata();
						}//foreach
					} else {
						echo esc_attr__("Sorry, there are no shows scheduled on this day","_s");
					}
					?>
				
		<?php

	} else {
		/* create a query to choose shows bu order */

	}


	wp_reset_postdata();
?>














    