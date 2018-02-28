<?php
	global $post;
	$data_media = '';
	if(is_singular()) {
		$image = qw_get_thumbnail_url($post->ID);
		$data_media = '';
		if($image){
			$data_media = $image;
		}

		$title = get_the_title($post->ID);
		$data_title = '';
		if($title){
			$data_title = $title;
		}

		$description = get_excerpt_by_id($post->ID);
		$data_description = '';
		if($description){
			$data_description = str_replace("\n", " ", wp_strip_all_tags($description));
		}
		$permalink = get_the_permalink();

	} else {
		$image = '';
		$data_title = '';
		$data_description = '';
		$permalink = get_the_permalink();
	}


?>

<table class="qw-sharepage-large">
	<tr>
		<td>
			<h5><?php echo esc_attr__("Share", "_s"); ?>
		</h5>
		<td>
			<a href="#" data-type="twitter" 
			data-url="<?php echo esc_js(esc_url($permalink)); ?>" 	 
			data-description="<?php 	echo esc_js(esc_attr($data_description)); ?>" 	
			data-media="<?php 	echo esc_js(esc_attr($data_media)); ?>" 
			class="prettySocial twitter qw-left qw-sharelink tooltipped" data-position="top" data-tooltip="Share on Twitter"><span class="qticon-twitter"></span></a>
		</td><td>
			<a href="#" 
			data-type="facebook" 
			data-url="<?php echo esc_js(esc_url($permalink)); ?>" 	 
			data-description="<?php 	echo esc_js(esc_attr($data_description)); ?>"
			data-media="<?php 	echo esc_js(esc_attr($data_media)); ?>" 
			class="prettySocial facebook qw-left qw-sharelink tooltipped" data-position="top" data-tooltip="Share on Facebook"><span class="qticon-facebook"></span></a>
		</td><td>
			<a href="#" 
			data-type="googleplus" 
			data-url="<?php echo esc_js(esc_url($permalink)); ?>" 
			data-description="<?php 	echo esc_js(esc_attr($data_description)); ?>" 
			data-media="<?php 	echo esc_js(esc_attr($data_media)); ?>" 
			class="prettySocial googleplus qw-left qw-sharelink tooltipped" data-position="top" data-tooltip="Share on Google+"><span class="qticon-googleplus"></span></a>
		</td><td>
			<a href="#" data-type="pinterest" 
			data-url="<?php echo esc_js(esc_url($permalink)); ?>"  
			data-description="<?php 	echo esc_js(esc_attr($data_description)); ?>"  
			class="prettySocial pinterest qw-left qw-sharelink tooltipped" data-position="top" data-media="<?php 	echo esc_js(esc_attr($data_media)); ?>" data-tooltip="Share on Pinterest"><span class="qticon-pinterest"></span></a>
		</td>
	</tr>
</table>