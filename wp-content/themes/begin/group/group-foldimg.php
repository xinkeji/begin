<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_foldimg')) { ?>
<div class="g-row g-line foldimg-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="foldimg-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option('foldimg_t') == '' ) { ?>
					<h3><?php echo co_get_option( 'foldimg_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('foldimg_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'foldimg_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="foldimg-wrap<?php if ( co_get_option( 'foldimg_fl' ) ) { ?> foldimg-one<?php } else { ?> foldimg-two<?php } ?>">
				<?php 
					$foldimg = ( array ) co_get_option( 'group_foldimg_item' );
					foreach ( $foldimg as $items ) {
				?>
					<div class="foldimg-main">
						<span class="foldimg-mask"></span>

						<?php if ( ! empty( $items['group_foldimg_img'] ) ) { ?>
							<section class="foldimg-img" <?php aos_g(); ?>>
								<figure class="foldimg-bg" style="background-image: url(<?php echo $items['group_foldimg_img']; ?>) !important;"></figure>
							</section>
						<?php } ?>
		
						<section class="foldimg-inc">
							<?php if ( ! empty( $items['group_foldimg_title'] ) ) { ?>
								<div class="foldimg-text">
									<?php echo $items['group_foldimg_title']; ?>
								</div>
							<?php } ?>

							<?php if ( ! empty( $items['group_foldimg_des'] ) ) { ?>
								<div class="foldimg-title sanitize">
								<?php echo wpautop( $items['group_foldimg_des'] ); ?>
								</div>
							<?php } ?>

							<?php if ( ! empty( $items['group_foldimg_btn'] ) ) { ?>
								<div class="foldimg-more">
									<a href="<?php echo $items['group_foldimg_url']; ?>" target="_blank" rel="external nofollow"><?php echo $items['group_foldimg_btn']; ?></a>
								</div>
							<?php } ?>
						</section>
					</div>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 推荐' ); ?>
	</div>
</div>
<?php } ?>