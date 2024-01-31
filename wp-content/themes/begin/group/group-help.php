<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_help' ) ) { ?>
<div class="g-row g-line group-help-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-help-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'group_help_t') == '' ) { ?>
					<h3><?php echo co_get_option( 'group_help_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('group_new_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'group_help_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="group-help-wrap">
				<div class="group-help-img" <?php aos_g(); ?>>
					<div class="group-help-bg">
						<img alt="<?php echo co_get_option( 'group_help_t' ); ?>" src="<?php echo co_get_option( 'group_help_img' ); ?>">
						<div class="group-help-txt fd"><?php echo co_get_option( 'group_help_t' ); ?></div>
					</div>
				</div>
				<div class="group-help-main">
					<?php 
						$i = 0;
						$help = ( array ) co_get_option( 'group_help_item' );
						foreach ( $help as $items ) {
						$i++;
					?>
						<div class="group-help-area <?php if ( $i < 2 ) { ?> active<?php } ?>" <?php aos_b(); ?>>
							<div class="group-help-title group-help-title-<?php echo $i; ?>">
								<span class="help-ico"></span>
								<?php if ( co_get_option( 'group_help_num') ) { ?>
									<span class="group-help-num"><?php echo $i; ?></span>
								<?php } ?>
								<?php if ( ! empty( $items['group_help_title'] ) ) { ?>
									<?php echo $items['group_help_title']; ?>
								<?php } ?>
							</div>
							<div class="group-help-content group-help-content-<?php echo $i; ?>">
								<?php if ( ! empty( $items['group_help_text'] ) ) { ?>
									<?php echo $items['group_help_text']; ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 帮助' ); ?>
	</div>
</div>
<?php } ?>