 <?php
/*
*
*   Special header with parallax for pages
*
*/

/*
//For further functions 
if(!wp_is_mobile() && is_page() && get_query_var('page') == ""){ // not for mobile
    global $post;
    $id = $post->ID;
    $qw_add_parallax_header = get_post_meta($id, 'qw_add_parallax_header', true);
    $qw_add_parallax_header_image = get_post_meta($id, 'qw_add_parallax_header_image', true);
    $qw_parallax_header_content = get_post_meta($id, 'qw_parallax_header_content', true);
    

    if($qw_add_parallax_header == '1' && $qw_add_parallax_header_image != ''){
        $image_attributes = wp_get_attachment_image_src( $qw_add_parallax_header_image, 'full' ); // returns an array
        if( $image_attributes ) {
            ?>
                <div class="parallax-container hide-on-small-only z-depth-1   showparallax-imgholder hide-on-med-and-down"  <?php  if($image_attributes !=''){ ?> data-holderClass="showParallax hide-on-med-and-down" data-image="<?php echo esc_js(esc_attr($image_attributes[0])); ?>" <?php } ?>>
                    <div class="container qw-vp">
                        
                            <div class="qw-vc text-shadow">

                            <?php
                            echo  wp_kses_post(html_entity_decode (stripslashes($qw_parallax_header_content)));
                            ?>
                            </div>
                       
                    </div>
                </div>
                <?php  
        }
    }
}
*/


?>