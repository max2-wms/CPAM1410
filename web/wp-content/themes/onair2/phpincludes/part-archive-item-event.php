<?php
/*
Package: OnAir2
Description: Item of the event archive
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

$date = ( get_post_meta( get_the_ID(), 'eventdate', true ) != "")? get_post_meta( get_the_ID(), 'eventdate', true ) : date("Y-m-d") ;
$d = explode('-',$date);
$day = date( "d", strtotime( $date ));
$monthyear = date( "M Y", strtotime( $date ));
$monthyear=esc_attr(date_i18n("M Y",strtotime($date)));

?>
<!-- EVENT ========================= -->
<div class="qt-part-archive-item qt-item-event qt-text-white qt-card-s">
	<div class="qt-item-header">
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<div class="row">
					<div class="col s12 m2">
						<h4 class="qt-date ">
							<span class="qt-day">
								<?php echo esc_attr($day );?>
							</span>
							<span class="qt-month">
								<?php echo esc_attr( $monthyear ); ?>
							</span>
						</h4>
					</div>
					<div class="col s12 m8 qt-titles">
						<div class="qt-vc">
							<div class="qt-vi">
								<h5 class="qt-spacer-xs">
									<?php 
										/**
										 * City and town
										 */
										echo esc_attr(get_post_meta( get_the_ID(), 'qt_location',true)); 

										$city = get_post_meta(get_the_ID(), 'qt_city',true);
										if($city != ''){
											?> [<?php
											echo esc_attr(get_post_meta(get_the_ID(), 'qt_city',true));
											?>]<?php
										}
									?>
                        		</h5>
						  		<h3 class="qt-spacer-xs qt-ellipsis qt-t qt-title">
									<a href="<?php the_permalink(); ?>" class="qt-text-shadow"><?php the_title(); ?></a>
								</h3>
							</div>
						</div>
					</div>
					<div class="col s12 m2">
						<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary bottom right"><i class="dripicons-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
     	<?php } ?>
	</div>
</div>
<!-- EVENT END ========================= -->