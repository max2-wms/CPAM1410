<?php
/**
 *  Template Name: Page Popup Player
 *
 */
?>
<?php 
//header('X-UA-Compatible: IE=edge,chrome=1'); 
$mobile = 'qw-is_desktop';
if(wp_is_mobile()){
    $mobile = 'qw-is_mobile';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?php echo esc_attr( get_bloginfo( 'charset') ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(array("deskcolor", "popupplayerBody", "qw-headerbar-".get_theme_mod("QT_header_bar","1")), $mobile ); ?> id="theBody">
        <div id="qtMainContainer" class="qw-main-container">



				<?php  
				$header_image = get_theme_mod("QT_header_background");
				/*
				*
				*   If the header image is replaced by a special header for this page:
				*
				*/
				$qw_parallax_header_content = '';
				if(is_page()){ 
				    global $post;
				    $id = $post->ID;
				    $qw_add_parallax_header = get_post_meta($id, 'qw_add_parallax_header', true);
				    $qw_add_parallax_header_image = get_post_meta($id, 'qw_add_parallax_header_image', true);
				    $qw_parallax_header_content = get_post_meta($id, 'qw_parallax_header_content', true);
				    

				    if($qw_add_parallax_header == '1' && $qw_add_parallax_header_image != ''){

				        $image_attributes = wp_get_attachment_image_src( $qw_add_parallax_header_image, 'full' ); // returns an array

				        if( $image_attributes ) {
				            $header_image = $image_attributes[0];
				             
				        }
				    }
				}

				?>
		        <div class="qw-headercontainer maincolor dark qw-parallax-background-css z-depth-1" data-speed="2" data-type="background" data-qwbgimg="<?php echo esc_attr(esc_js($header_image)); ?>"> 
		            
		            <?php
		                 echo qt_showlogo();
		            ?>
		            <?php if($qw_parallax_header_content != ''){ ?>
		            <div class="container qw-vp">
		                <div class="qw-vc text-shadow">
		                    <?php
		                    echo qt_showlogo_menubar();

		                    
		                    ?>
		                </div> 
		            </div>
		            <?php } ?>
		        </div><?php /*qw-headercontainer*/ ?>




		        <div class="qw-headernav">
	                <nav class="qw-animated " role="navigation" id="qwMainNavbar">
	                    <div class=" qw-wrapper">
	                        <div class="container qw-block-100p ">
	                            <div class="nav-wrapper maincolor  z-depth-2">
	                                <?php echo qt_showlogo_menubar();  ?>
	                                <div class="qw-block-right">
	                                    <div class="qw-vp">
	                                        <div class="qw-vc qw-themusicplayer-dynamicplace">
	                                            <?php get_template_part('part','musicplayer');   ?>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="canc"></div>
	                            </div>
	                        </div>
	                    </div>
	                    
	                </nav>
                </div>
                <?php get_template_part('part-parallax-header'); ?>
            </div>

            <div class="PopupContent">
				<?php  the_content(); ?>
				 <?php  if(is_active_sidebar( 'popupwidgets' ) ){ dynamic_sidebar( 'popupwidgets' );} ?>
			</div>
 		 </div>
        <?php wp_footer(); ?>
    </body>
</html>