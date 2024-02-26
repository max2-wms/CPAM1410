<?php
/*
Package: OnAir2
Description: Post metas for archives with author thumbnail and date
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<div class="qt-item-metas">
	<?php 
	$authorurl = get_the_author_meta( 'picture' , get_the_author_meta('ID') );
	if($authorurl != '') {
	?>
		<a class="qt-author-thumb" href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta('ID') ) ); ?>">
			<img src="<?php echo esc_url($authorurl); ?>" alt="<?php echo esc_attr__("Author","onair2"); ?>" width="30" height="30">
		</a>
	<?php } ?>
	<div class="qt-texts">
		<p class="qt-author qt-ellipsis"><?php the_author_posts_link();  ?></p>
		<p class="qt-date"><?php echo qantumthemes_international_date(); ?></p>
	</div>
</div>