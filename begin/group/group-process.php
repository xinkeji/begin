<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_process')) { ?>
<div class="g-row g-line group-process-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-process-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'process_t') == '' ) { ?>
					<h3><?php echo co_get_option( 'process_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('process_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'process_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="group-process-wrap">
				<?php 
					$i = 0;
					$process = ( array ) co_get_option( 'group_process_item' );
					foreach ( $process as $items ) {
					$i++;
				?>
					<div class="process-main ess">
						<div class="group-process">
							<div class="process-round<?php if ( co_get_option( 'process_turn' ) ) { ?> round round-<?php echo $i; ?><?php } ?>" style="border<?php if ( co_get_option( 'process_turn' ) ) { ?>-left<?php } ?>: 5px solid <?php echo $items['group_process_color']; ?>"></div>
							<div class="group-process-order ces" <?php aos_b(); ?>><?php echo $i; ?></div>

							<div class="group-process-ico" <?php aos_b(); ?>>
								<?php if ( ! empty( $items['group_process_ico'] ) ) { ?>
									<i class="ces <?php echo $items['group_process_ico']; ?>"></i>
								<?php } ?>
							</div>

							<h3 class="group-process-title ces" <?php aos_f(); ?>>
								<?php if ( ! empty( $items['group_process_title'] ) ) { ?>
									<?php echo $items['group_process_title']; ?>
								<?php } ?>
							</h3>
						</div>

						<?php if ( ! empty( $items['group_process_des'] ) ) { ?>
							<div class="group-process-explain">
								<div class="group-process-explain-main">
									<span class="circle-b"></span><span class="circle-a"></span>
									<div class="group-process-des"><?php echo $items['group_process_des']; ?></div>
								</div>
							</div>
						<?php } ?>

					</div>
				<?php } ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 流程' ); ?>
	</div>
</div>
<?php } ?>