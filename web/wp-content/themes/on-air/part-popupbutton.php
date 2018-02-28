<?php  

/**
 *
 *  Popup Player Button
 *  
 */

if( get_theme_mod('QT_popup_enabled' ) == '1' && get_theme_mod('QT_popup_url') != ''){
   

    ?>

    <a href="<?php echo esc_url(esc_attr(get_theme_mod('QT_popup_url'))); ?>" rel="height:<?php echo esc_attr(get_theme_mod('QT_popup_height')); ?>,width:<?php echo esc_attr(get_theme_mod('QT_popup_width')); ?>" target="_blank" class="<?php if(!wp_is_mobile()){ ?>popupwindow <?php } ?>qwPopupWindow mdi-maps-layers btn btn-large waves-effect waves-light accentcolor">
    <?php echo esc_attr(get_theme_mod('QT_popup_text', 'Popup Player' ));  ?>
    </a>

    <?php
    

}


?>