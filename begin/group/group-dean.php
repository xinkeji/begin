<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'dean' ) ) { ?>
<div class="g-row g-line deanm-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="deanm">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'dean_t' ) == '' ) { ?>
					<h3><?php echo co_get_option( 'dean_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option( 'dean_des' ) == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'dean_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="deanm-main">
				<?php 
					$deanm = ( array ) co_get_option( 'group_dean_item' );
					foreach ( $deanm as $items ) {
				?>
					<div class="deanm deanmove begd edit-buts deanmove-<?php echo co_get_option( 'deanm_f' ); ?> <?php if ( ! co_get_option( 'deanm_fm' ) ) { ?> deanm-jd<?php } else { ?> deanm-fm<?php } ?>">
						<div class="deanm-box">

								<div class="de-a" <?php aos_b(); ?>>
									<?php if ( ! empty( $items['group_dean_t1'] ) ) { ?>
										<?php echo $items['group_dean_t1']; ?>
									<?php } ?>
								</div>
					
							<div class="deanquan begd">
								<div class="de-back lazy">
									<?php if ( ! empty( $items['group_dean_img'] ) ) { ?>
										<div class="thumbs-de-back" style="background-image: url(<?php echo $items['group_dean_img']; ?>);" <?php aos_g(); ?>></div>
									<?php } ?>
									<?php if ( ! empty( $items['group_dean_title'] ) ) { ?>
										<div class="de-b"><?php echo $items['group_dean_title']; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="clear"></div>
							<?php if ( ! empty( $items['group_dean_t2'] ) ) { ?>
								<div class="de-c" <?php aos_b(); ?>><?php echo $items['group_dean_t2']; ?></div>
							<?php } ?>

							<?php if ( !empty( $items['group_dean_btn'] ) ) { ?>
								<div class="de-button" <?php aos_b(); ?>>
									<a class="dah fd" href="<?php echo $items['group_dean_url']; ?>" target="_blank" rel="external nofollow"><?php echo $items['group_dean_btn']; ?></a>
								</div>
							<?php } else { ?>
								<div class="de-button-seat"></div>
							<?php } ?>
							<div class="deanm-bottom"></div>
						</div>
					</div>
					<div class="clear"></div>
				<?php } ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 服务项目' ); ?>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>