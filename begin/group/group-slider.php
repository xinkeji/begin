<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_slider' ) ) { ?>
<div class="g-row slider-row">
	<?php if ( ! co_get_option( 'group_only_img' ) ) { ?>
		<?php if ( ! co_get_option( 'group_slider_video' ) ) { ?>
			<div id="slider-group" class="owl-carousel slider-group">
				<?php 
					$post = ( array ) co_get_option( 'slider_group' );
					foreach ( $post as $items ) {
				?>
					<?php if ( ! empty( $items['slider_group_img'] ) ) { ?>
						<div class="slider-group-main">
							<a href="<?php echo $items['slider_group_url']; ?>" rel="bookmark">
								<div class="group-big-img big-back-img<?php if ( co_get_option( 'group_blur' ) ) { ?> big-blur<?php } ?>" style="background-image: url('<?php echo $items['slider_group_img']; ?>');height:<?php echo co_get_option('big_back_img_h'); ?>px;"></div>
							</a>

							<div class="slider-group-main-box">
								<?php if ( $items['slider_group_small_img'] ) { ?>
									<div class="group-small-img-area group-act2">
										<div class="group-small-img">
											<img src="<?php echo $items['slider_group_small_img']; ?>">
										</div>
									</div>
								<?php } ?>
	
	
								<div class="slider-group-mask">
									<div class="group-slider-main<?php if ( $items['slider_group_c'] ) { ?> g-s-c<?php } ?><?php if ( ! $items['slider_group_small_img'] ) { ?> g-s-l<?php } ?>">
										<div class="group-slider-content">
											<p class="gt1 s-t-a group-act1"><?php echo $items['slider_group_title_a']; ?></p>
											<p class="gt2 s-t-b group-act2"><?php echo $items['slider_group_title_b']; ?></p>
											<p class="gt1 s-t-c group-act3"><?php echo $items['slider_group_title_c']; ?></p>
										</div>


										<?php if ( $items['slider_group_btu'] ) { ?>
											<div class="group-img-more group-act4"><a href="<?php echo $items['slider_group_btu_url']; ?>" rel="bookmark" target="_blank"><?php echo $items['slider_group_btu']; ?></a></div>
										<?php } ?>


									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>

			<div class="group-lazy-img ajax-owl-loading">
				<div class="group-big-img big-back-img<?php if ( co_get_option( 'group_blur' ) ) { ?> big-blur<?php } ?>" style="background-image: url('<?php echo co_get_option( 'slider_group_occupy' ); ?>');height:<?php echo co_get_option( 'big_back_img_h' ); ?>px;"></div>
			</div>

		<?php } else { ?>
			<div class="group-slider-video-box slider-videos">
				<?php
					$attr = array(
						'src'        => co_get_option( 'group_slider_video_url' ),
						'poster'     => co_get_option( 'group_slider_video_img' ),
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
			<?php if ( co_get_option( 'group_slider_video_url' ) ) { ?>
				<a data-fancybox href="<?php echo co_get_option( 'group_slider_video_url' ); ?>">
			<?php } else { ?>
				<a href="<?php echo co_get_option( 'group_slider_img_url' ); ?>" rel="external nofollow" >
			<?php } ?>
			<div class="group-big-img big-back-img<?php if ( co_get_option( 'group_blur' ) ) { ?> big-blur<?php } ?>" style="background-image: url('<?php echo co_get_option( 'group_slider_img' ); ?>');height:<?php echo co_get_option( 'big_back_img_h' ); ?>px;"></div>
			<?php if ( co_get_option( 'group_slider_video_url' ) ) { ?><div class="slider-video-ico"></div><?php } ?></a>
		</div>

	<?php } ?>
	<?php if ( co_get_option( 'slide_progress' ) && ! co_get_option( 'group_slider_video' ) && ! co_get_option( 'group_only_img' ) ) { ?><div class="slide-mete"><div class="slide-progress"></div></div><?php } ?>
	<?php be_help( $text = '公司主页 → 公司幻灯' ); ?>
</div>
<?php } ?>