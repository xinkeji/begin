<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_coop' ) ) { ?>
<div class="g-row g-line group-tool-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-coop-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'group_coop_t') == '' ) { ?>
					<h3><?php echo co_get_option('group_coop_t'); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option( 'group_coop_des' ) == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'group_coop_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>

			<div class="group-coop-main">
				<?php 
					$coop = ( array ) co_get_option( 'group_coop_item' );
					foreach ( $coop as $items ) {
				?>
					<div class="coop-items coop-<?php echo co_get_option( 'group_coop_f' ); ?>">
						<div class="group-coop-img" data-aos="zoom-in">
							<?php if ( ! empty( $items['group_coop_img'] ) ) { ?>
								<?php if ( ! empty( $items['group_coop_url'] ) ) { ?><a class="sc" rel="external nofollow" target="_blank" href="<?php echo $items['group_coop_url']; ?>"><?php } ?>
									<div class="coop40 lazy">
										<div class="bgimg" style="background-image: url(<?php echo $items['group_coop_img']; ?>) !important;"></div>
									</div>
									<?php if ( ! empty( $items['group_coop_title'] ) ) { ?>
										<div class="group-coop-title" data-aos="zoom-in"><?php echo $items['group_coop_title']; ?></div>
									<?php } ?>
								<?php if ( ! empty( $items['group_coop_url'] ) ) { ?></a><?php } ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php be_help( $text = '公司主页 → 合作' ); ?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>