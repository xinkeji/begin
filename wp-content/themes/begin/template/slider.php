<?php 
if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'slider' ) ) { ?>
<div class="slideshow-box<?php if ( be_get_option( 'slide_post' ) ) { ?> slide-post-box<?php } ?><?php if ( be_get_option( 'slide_post_m' ) ) { ?> slide-post-m<?php } ?>">
	<div id="slideshow" class="slideshow">
		<?php if ( ! be_get_option( 'slider_only_img' ) ) { ?>

			<?php if ( ! be_get_option( 'show_slider_video' ) ) { ?>
				<?php 
					$catimg = ( array ) be_get_option( 'slider_home' );
					echo '<div id="slider-home" class="owl-carousel slider-home slider-current be-wol">';
					foreach ( $catimg as $items ) {
						if ( ! empty( $items['slider_home_img'] ) ) {
							echo '<div class="slider-item">';

							if ( be_get_option('show_img_crop' ) ) {
								echo '<a href="' . $items['slider_home_url'] . '" rel="bookmark"><img class="owl-lazy" data-src="' . get_template_directory_uri() . '/prune.php?src=' . $items['slider_home_img'] . '&w=' . be_get_option( 'img_h_w' ) . '&h=' . be_get_option( 'img_h_h' ) . '&a=' . be_get_option( 'crop_top' ) . '&zc=1" alt="' . $items['slider_home_title'] . '" /></a>';
							} else {
								echo '<a href="' . $items['slider_home_url'] . '" rel="bookmark"><img class="owl-lazy" data-src="' . $items['slider_home_img'] . '" alt="' . $items['slider_home_title'] . '" /></a>';
							}

							if ( ! empty( $items['slider_home_title'] ) ) {
								echo '<p class="slider-home-title">' . $items['slider_home_title'] . '</p>';
							}
							echo '</div>';
						}
					}
					echo '</div>';


					echo '<div class="lazy-img ajax-owl-loading">';

					if ( be_get_option('show_img_crop' ) ) {
						echo '<img src="' . get_template_directory_uri() . '/prune.php?src=' . be_get_option( 'slider_home_occupy' ) . '&w=' . be_get_option( 'img_h_w' ) . '&h=' . be_get_option( 'img_h_h' ) . '&a=' . be_get_option( 'crop_top' ) . '&zc=1" />';
					} else {
						echo '<img src="' . be_get_option( 'slider_home_occupy' ) . '" />';
					}
					echo '</div>';
				?>
			<?php } else { ?>

				<div class="slider-video-box slider-videos">
					<?php
						$attr = array(
							'src'        => be_get_option( 'show_slider_video_url' ),
							'poster'     => be_get_option( 'show_slider_video_img' ),
							'loop'       => 'true',
							'autoplay'   => 'true',
							'muted'      => 'true',
							'class'      => 'slider-video wp-video-shortcode',
						);
						echo wp_video_shortcode( $attr );
					?>
				</div>
			<?php } ?>

		<?php } else { ?>

			<div class="load slider-play">
				<?php if ( be_get_option( 'show_slider_video_url' ) ) { ?>
					<a data-fancybox href="<?php echo be_get_option( 'show_slider_video_url' ); ?>">
				<?php } else { ?>
					<a href="<?php echo be_get_option( 'show_slider_img_url' ); ?>" rel="external nofollow" >
				<?php } ?>
				<img class="show-slider-img ms" src="<?php echo be_get_option( 'show_slider_img' ); ?>" alt="show">
				<?php if ( be_get_option( 'show_slider_video_url' ) ) { ?><div class="slider-video-ico"></div><?php } ?></a>
			</div>

		<?php } ?>

		<?php if ( be_get_option( 'slide_progress') && ! be_get_option( 'show_slider_video' ) && ! be_get_option( 'slider_only_img' ) ) { ?><div class="slide-mete"><div class="slide-progress"></div></div><?php } ?>
		<div class="clear"></div>
	</div>
	<?php if ( be_get_option( 'slide_post' ) ) { ?>
		<?php 
			$post = ( array ) be_get_option( 'slider_home_post' );
			echo '<div class="slide-post-main">';
			echo '<div class="slide-post-item">';
			foreach ( $post as $items ) {
				if ( ! empty( $items['slider_post_img'] ) ) {
					echo '<div class="slide-post">';
					echo '<a rel="external nofollow" href="' . $items['slider_post_url'] . '"><img src="' . $items['slider_post_img'] . '" alt="' . $items['slider_post_title'] . '"></a>';
					echo '<a href="' . $items['slider_post_url'] . '" rel="bookmark">';
					if ( ! empty( $items['slider_post_title'] ) ) {
						echo '<div class="slide-post-txt">';
						echo '<h3 class="slide-post-title over">' . $items['slider_post_title'] . '</h3>';
						echo '</div>';
					}
					echo '</a>';
					echo '</div>';
				}
			}
			echo '</div>';
			be_help( $text = '首页设置 → 首页幻灯 → 右侧模块' );
			echo '</div>';
		?>
	<?php } ?>
	<?php be_help( $text = '首页设置→首页幻灯' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>