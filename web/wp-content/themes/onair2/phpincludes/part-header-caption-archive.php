<?php
/*
Package: OnAir2
Description: Header template for posts
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
    ?>
    <!-- HEADER CAPTION ========================= -->
    <div class="qt-pageheader qt-negative">
        <div class="qt-container">
            <h1 class="qt-caption qt-spacer-s">
                <?php get_template_part('phpincludes/part-archivetitle' ); ?>
            </h1>
            <h4 class="qt-subtitle">
                <?php 
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                if($paged > 1) {
                    echo esc_attr__("Page: ","onair2").esc_attr($paged);
                }
                ?>
            </h4>
        </div>
        <?php get_template_part('phpincludes/part-background-image-header' ); ?>
    </div>
    <!-- HEADER CAPTION END ========================= -->
<?php } ?>
