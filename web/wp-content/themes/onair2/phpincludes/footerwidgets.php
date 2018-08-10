<?php
/*
Package: OnAir2
Description: Footer widgets
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>

 <div id="qtfooterwidgets" class="qt-footer qt-footerwidgets">

    <?php 
        $qt_footer_widgets = get_theme_mod('qt_footer_widgets', 1);
        if( 1 == $qt_footer_widgets && is_active_sidebar( 'footersidebar')){
            ?>
            <div class="qt-section qt-footer-widgets">
                <div class="qt-container">
                    <h2 class="qt-footer-logo">
                        <a href="<?php echo esc_url(get_home_url("/")); ?>" class="brand-logo qt-logo-text">
                            <?php
                            /**
                             * 
                             *
                             *  Logo or title
                             * 
                             */
                            $logo = get_theme_mod("qt_logo_footer","");

                            if($logo != ''){
                                echo '<img src="'.esc_attr($logo).'" alt="'.esc_attr__("Home","onair2").'">';
                            }else{
                                echo get_bloginfo('name');
                            }

                            ?>
                        </a>
                    </h2>


                    <div id="qtfooterwidgetscontainer" class="qt-widgets qt-widgets-footer  qt-spacer-m qt-masonry row">
                        <?php dynamic_sidebar( 'footersidebar' ); ?>
                    </div>



                </div>

                <?php  
                $image_from_customizer = get_theme_mod( 'qt_footer_backgroundimage' );
                if($image_from_customizer != '') {
                ?>
                    <div class="qt-header-bg" data-bgimage="<?php echo esc_url($image_from_customizer); ?>">
                        <img src="<?php echo esc_url($image_from_customizer); ?>" alt="<?php echo esc_attr__("Featured image","onair2"); ?>">
                    </div>
                <?php  
                }
                ?>
            </div>
    <?php  }  ?>
    

    <div class="qt-footer-bottom qt-content-primary-dark">
    	<div class="qt-container">
    		<div class="row">
    			<div class="col s12 m12 l8">
                    <?php 
                    echo html_entity_decode(html_entity_decode (esc_html( get_theme_mod('qt_footer_text', '') )) ); 
                    ?>
    				<ul class="qt-menu-footer qt-small qt-list-chevron ">
                        <?php
                        /**
                        * 
                        *
                        *  Top menu
                        * 
                        */
                        if ( has_nav_menu( 'footer' ) ) {
                            wp_nav_menu( array(
                                'theme_location' => 'footer',
                                'depth' => 1,
                                'container' => false,
                                'items_wrap' => '%3$s'
                            ) );
                        }
                        ?> 
    				</ul>
    			</div>
    			<div class="col s12 m12 l4">
    				<ul class="qt-menu-social">
	    				<?php get_template_part('phpincludes/part','social' ); ?>
                    </ul>
    			</div>
    		</div>
    	</div>
        
    </div>

</div>