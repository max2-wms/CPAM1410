<?php
/*
Package: OnAir2
Description: Header template for NORML PAGES
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
?>
<!-- HEADER CAPTION ========================= -->
<div class="qt-pageheader qt-negative">
    <div class="qt-container qt-center">
        	<?php 
        	$customlogo = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'qt_header_logo', true ),'full');
        	if($customlogo) {
        		?>
        		<img src="<?php echo esc_url($customlogo[0]); ?>" alt="" class="qt-spacer-s qt-center">
        		<?php
        	} else {
        		?>
        		<h1 class="qt-caption qt-spacer-s qt-center"><?php the_title(); ?></h1>
        		<?php 
        	}
        	?>
    </div>
    <?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER CAPTION END ========================= -->
<?php } ?>