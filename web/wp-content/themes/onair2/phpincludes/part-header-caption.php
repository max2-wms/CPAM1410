<?php
/*
Package: OnAir2
Description: Header template for NORML PAGES
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- HEADER CAPTION ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container">
        <h1 class="qt-caption qt-spacer-s">
            <?php the_title(); ?>
        </h1>
        <h4 class="qt-subtitle">
            <?php 
            echo esc_attr__("Written by ", "onair2"); 
            the_author_posts_link(); 
            echo esc_attr__(" on ", "onair2");
            ?>
            <?php echo qantumthemes_international_date(); ?>
        </h4>
    </div>
    <div class="qt-header-bg" data-bgimage="imagestemplate/full-1600-700.jpg">
        <img src="imagestemplate/full-1600-700.jpg" alt="Featured image" width="690" height="302">
    </div>
</div>
<!-- HEADER CAPTION END ========================= -->
