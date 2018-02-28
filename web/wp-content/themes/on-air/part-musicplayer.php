<div class="qw-musicplayer" id="qwMusicPlayerContainer">
	<a class="accentcolor qw-playerbutton waves-effect waves-light tooltipped qwPlayerPlay" id="qwPlayerPlay" data-position="left" data-tooltip="<?php echo esc_attr__("Play","_s"); ?>" data-mp3="<?php echo esc_attr(esc_js(get_theme_mod("QT_player_url"))); ?>" data-autoplay="<?php echo esc_attr(esc_js(get_theme_mod("QT_player_autoplay"))); ?>" data-state="stop"  href="#" data-soundmanagerswf="<?php echo esc_url(get_template_directory_uri().'/js/soundmanager2.swf'); ?>">
		<i class="mdi-av-play-arrow"></i><!-- mdi-av-pause -->
	</a>	
	<div id="qtVolumeControl" class="qw-animated qw-volume-control maincolor dark hidden-ipad-and-down">
		<a class="qw-playerbutton maincolor z-depth-2 tooltipped" href="#" data-position="top" data-tooltip="<?php echo esc_attr__("Volume","_s"); ?>" id="theVolCursor">
			<i class="mdi-av-volume-down"></i>
		</a>
		<div class="qw-radio-name radiomarquee marquee" id="radioname"><?php echo get_bloginfo("name"); ?></div>
	</div>
	<?php  
	query_posts('posts_per_page=9999&post_status=publish&sort_order=ASC&orderby=menu_order&post_type=radiochannel&paged=1'); 
    $n = 0;
    $list = '';

    /**
     *
     *	1. Add the main channel to the playlist
     *
     * 
     */

    $list .= '<a href="#" data-mp3="'.esc_attr(esc_js(get_theme_mod("QT_player_url"))).'" class="waves-effect waves-light btn accentcolor qwPlayerPlayList"> <i class="mdi-av-play-circle-fill"></i>'.get_bloginfo("name").'</a>';

    /**
     *
     *	2. Add the new radiostation channels to the playlist
     *
     * 
     */
    while ( $wp_query->have_posts() ):
        $n = $n+1;
        $wp_query->the_post();
        setup_postdata( $post );   
        $radiourl = trim(get_post_meta($post->ID, "mp3_stream_url", true));
        if($radiourl !== ''){
        	 $list .= '<a href="#" data-mp3="'.esc_attr(esc_url($radiourl)).'"  data-toggleclass="open" data-target="channelsList" class="waves-effect waves-light btn accentcolor qwPlayerPlayList"><i class="mdi-av-play-circle-fill"></i><span>'.get_the_title().'</span></a>';
    }
    endwhile; // end of the loop. 
    wp_reset_postdata();
    wp_reset_query();

    if( $n > 0 ){
    ?>
	<a class="accentcolor qw-playerbutton tooltipped waves-effect waves-light" data-toggleclass="open" data-target="channelsList" data-position="top" data-tooltip="<?php echo esc_attr__("Other channels","_s"); ?>" data-mp3="<?php echo esc_attr(esc_js(get_theme_mod("QT_player_url"))); ?>" href="#">
	<i class="mdi-action-view-list"></i>
	</a>
	<div class="qw-radiolist" id="channelsList">
		<?php echo $list; ?>
	</div>
	<?php } ?>

</div>