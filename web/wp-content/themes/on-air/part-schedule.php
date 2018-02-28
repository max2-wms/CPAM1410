<?php  

/*
*
*	get meta data ===========================================================================
*
*	======================================================================================
*/
if(!function_exists('qp_get_group')){
function qp_get_group( $group_name , $post_id = NULL ){
  	global $post; 	  
 	if(!$post_id){ $post_id = $post->ID; }
  	$post_meta_data = get_post_meta($post_id, $group_name, true);  
  	return $post_meta_data;
}}
?>
<?php global $post; ?>
<div id="<?php echo esc_js(esc_attr(get_the_id())); ?>">



   <div class="cbp-vm-switcher cbp-vm-view-list">
   	<div class="cbp-header-title">
   		<h2 class="<?php if($id_of_currentday == $tab['id']){ ?> maincolor-text <?php } ?> z-depth-1 paper qw-padded"><?php echo esc_attr(get_the_title()); ?></h2>
	</div>

	<div class="cbp-vm-options">
		<a href="#" class="cbp-vm-grid <?php if($gridlayout == 'grid'){ ?>active<?php } ?>"><i class="mdi-action-view-module"></i></a>
		<a href="#" class="cbp-vm-list <?php if($gridlayout == 'list'){ ?>active<?php } ?>"><i class="mdi-action-view-list"></i></a>
	</div>
	<ul class="cbp-vm-listcontainer">



		<?php
	   	$events= qp_get_group('track_repeatable',get_the_id());   
	    if(is_array($events)){
	    	$n = 0;
	    	$count = 0;
	      	foreach($events as $event){ 
	      		if(array_key_exists('show_id', $event)){
	      			if(array_key_exists(0, $event['show_id'])){
	      				if(is_numeric($event['show_id'][0])){

	      					/*
	      					*
	      					*	Element
	      					*
	      					*/

	      					$count = $count+1;

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




					      	$show_time_d = $show_time;
					      	$show_time_end_d = $show_time_end;


					      	// 12 hours format
					      	$show_time_d = date("g:i a", strtotime($show_time_d));
					      	$show_time_end_d = date("g:i a", strtotime($show_time_end_d));


					      	$now = current_time("H:i");
					        ?>
					          <li class="cpb-cardcont <?php if($now > $show_time && $now < $show_time_end && $id_of_currentday == $tab['id']){ ?>  cbp-vm-nowonair <?php } else { ?> cbp-vm-offair  <?php } ?> <?php if(($count%3 == 0) && $count > 1) { ?> cpb-nomargin-right <?php } ?>" >
						         <div class="card <?php if($now > $show_time && $now < $show_time_end && $id_of_currentday == $tab['id']){ ?>  maincolor <?php } ?>">
						          	<?php
						          	if(has_post_thumbnail($post->ID)){
						          		$attr = array(
											'class' => "img-responsive",
											'alt'   => trim( esc_attr(get_the_title())),
										);
										?><a class="cbp-vm-image" href="<?php echo esc_url(esc_attr(get_permalink($post->ID))); ?>" title="<?php echo esc_attr__("En savoir plus","_s").esc_attr($post->post_title); ?>"><?php
						          		the_post_thumbnail( 'schedule-thumb', $attr );
						          		?></a><?php
								    }
						          	?>



						          	<h3 class="cbp-vm-title <?php if($now > $show_time && $now < $show_time_end && $id_of_currentday == $tab['id']){ ?>  accentcolor <?php } else { ?> maincolor  <?php } ?>">
						          		<?php echo  esc_attr($post->post_title); ?>
						          	</h3>
						          	<div class="cbp-vm-time dark <?php if($now > $show_time && $now < $show_time_end && $id_of_currentday == $tab['id']){ ?>  accentcolor <?php } else { ?> maincolor  <?php } ?>"><span><i class="mdi-image-timer"></i> <?php echo esc_attr($show_time_d);?></span> <span><i class="mdi-image-timer-off"></i> <?php echo esc_attr($show_time_end_d);?></span></div>



						       
									<div class="cbp-vm-details">
										<?php
										$custom_desc = get_post_meta($post->ID, 'show_incipit', true);
										if($custom_desc == ''){
											$excerpt = $post->post_content;
											$custom_desc = $excerpt;
											$charlength = 160;
											if ( mb_strlen( $excerpt ) > $charlength ) {
												$subex = mb_substr( $excerpt, 0, $charlength - 5 );
												$exwords = explode( ' ', $subex );
												$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
												if ( $excut < 0 ) {
													$custom_desc = mb_substr( $subex, 0, $excut );
												} else {
													$custom_desc = $subex;
												}
												
											} else {
												$custom_desc = $excerpt;
											}
											$custom_desc .= '[...]';
										}
										echo wp_kses_post($custom_desc);
										?>
									</div>

									<a class="cbp-vm-icon cbp-vm-add accentcolor" href="<?php echo esc_url(esc_attr(get_permalink($post->ID))); ?>"><span class=""><?php echo esc_attr__(""En savoir plus","_s"); ?></span></a>
						          	
						          </div>
					          	

					          </li>
							<?php


						}	      				
					}

					
				wp_reset_postdata();
				}
			}//foreach
		} else {
			echo esc_attr__("Désolé, Il n'y a pas de show en ce jour","_s");
		}
		?>


	</ul>
</div>

