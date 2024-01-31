<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_assist' ) ) { ?>
<div class="g-row g-line group-assist-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-assist-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'group_assist_t') == '' ) { ?>
					<h3><?php echo co_get_option( 'group_assist_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('group_assist_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'group_assist_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="group-assist-wrap">
				<?php 
					$i = 0;
					$assist = ( array ) co_get_option( 'group_assist_item' );
					foreach ( $assist as $items ) {
					$i++;
				?>
					<div class="group-assist-main-box">
						<div class="group-assist-main ms">
							<?php if ( ! empty( $items['group_assist_url'] ) ) { ?>
								<a href="<?php echo $items['group_assist_url']; ?>" rel="bookmark">
							<?php } ?>

							<div class="group-assist" <?php aos_b(); ?>>
								<div class="group-assist-content">
									<h4 class="group-assist-title gat">
										<?php if ( ! empty( $items['group_assist_title'] ) ) { ?>
											<?php if ( co_get_option( 'group_assist_number' ) ) { ?><span class="group-assist-n"><?php echo $i; ?></span><?php } ?><?php echo $items['group_assist_title']; ?>
										<?php } ?>
									</h4>

									<div class="group-assist-des">
										<?php if ( ! empty( $items['group_assist_des'] ) ) { ?>
											<?php echo $items['group_assist_des']; ?>
										<?php } ?>
									</div>

								</div>
								<div class="group-assist-ico">
									<?php if ( ! empty( $items['group_assist_ico'] ) ) { ?>
										<i class="<?php echo $items['group_assist_ico']; ?>" style="color:<?php echo $items['group_assist_color']; ?>"></i>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
							<?php if ( ! empty( $items['group_assist_url'] ) ) { ?></a><?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 支持' ); ?>
	</div>
</div>
<?php } ?>