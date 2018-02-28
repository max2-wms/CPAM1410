<?php
if(get_theme_mod('QT_player_enable') == 'yes') {
    
    /*
    *
    *   We are now going to embed 3 possible type of players:
    *   Featured theme player, native Wordpress player or external javascript player
    **
    */
    global $optarray;
    if(array_key_exists('QT_player_type', $optarray)){
            if($optarray['QT_player_type'] != ''){

                $player_type = $optarray['QT_player_type'];
                switch ($player_type){
                    case "javascript":                                          
                        $htmlplayer = '';
                        if(array_key_exists('QT_player_html', $optarray)){
                            if($optarray['QT_player_html'] != ''){
                                $htmlplayer = $optarray['QT_player_html'];                                  
                            }
                        }
                        if($htmlplayer != ""){
                            ?>
                            <div class="qw-vp"><div class="qw-vc"><script src="<?php echo esc_attr(esc_url($htmlplayer)); ?>"></script></div></div>
                            <?php
                        } else {
                           echo 'Missing javascript player URL in theme options.';
                        }
                        break;
                    case "featured":
                        if(get_theme_mod("QT_player_url") != ""){
                            get_template_part('part','musicplayer');    
                        }else {
                           echo 'Missing mp3 radio url in theme options.';
                        }
                        break;

                    case "360player":
                    default:
                        if(get_theme_mod("QT_player_url") != ""){
                            get_template_part('part','360player');    
                        }else {
                           echo 'Missing mp3 radio url in theme options.';
                        }
                        break;
                }
        } else {
            echo 'Missing Player Type in the options.';
        }
    }                            
}



?>