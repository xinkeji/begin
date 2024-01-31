<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_notice')) { ?>
<div class="g-row g-line group-notice" <?php aos(); ?>>
	<div class="g-col ">
		<div class="section-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option('group_notice_t') == '' ) { ?>
					<h3><?php echo co_get_option('group_notice_t'); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('group_notice_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option('group_notice_des'); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>

			<div class="group-notice-wrap">
				<div class="group-notice-img">
					<div class="group-notice-bg" <?php aos_b(); ?>>
						<img alt="notice" src="<?php echo co_get_option( 'group_notice_img' ); ?>">
					</div>
				</div>

				<div class="group-notice-inf single-content sanitize" <?php aos_f(); ?>>
					<div class="text-back be-text"><?php echo wpautop( co_get_option( 'group_notice_inf' ) ); ?></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 公示板' ); ?>
	</div>
</div>
<?php } ?>