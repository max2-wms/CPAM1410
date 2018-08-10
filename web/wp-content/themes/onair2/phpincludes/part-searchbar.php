<?php
/*
Package: OnAir2
Description: SEARCH FORM
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- SEARCH FORM ========================= -->
<div id="qtsearchbar"  class="qt-searchbar qt-content-primary qt-expandable <?php if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?> qt-topplayer-space <?php } ?>">
	<div class="qt-expandable-inner">
		<form method="get" class="qt-inline-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<div class="row qt-nopadding">
				<div class="col s12 m8 l9">
					<input placeholder="<?php echo esc_attr_x( 'Type and press enter &hellip;', 'placeholder', "onair2" ); ?>" value="<?php echo esc_attr(get_search_query());  ?>" name="s" type="text" class="validate qt-input-l">
				</div>
				<div class="col s12 m3 l2">
					<input type="submit" value="<?php echo esc_attr__("Search", "onair2"); ?>" class="qt-btn qt-btn-primary qt-btn-l qt-fullwidth">
				</div>
				<div class="col s12 m1 l1">
					<a href="#!" class="qt-btn qt-btn-l qt-btn-secondary qt-fullwidth aligncenter" data-expandable="#qtsearchbar"><i class="dripicons-cross"></i></a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- SEARCH FORM END ========================= -->
