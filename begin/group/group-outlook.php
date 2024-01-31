<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_outlook' ) ) { ?>
<div class="group-outlook-bg g-row g-line" style="background: url('<?php echo co_get_option( 'group_outlook_bg' ); ?>') no-repeat center / cover;" <?php aos(); ?>>
	<div class="group-outlook-rgb">
		<div class="group-outlook-dec"></div>
		<div class="g-col">
			<div class="group-outlook-box">
				<?php if ( co_get_option( 'group_outlook_t' ) ) { ?>
					<div class="group-outlook-title" <?php aos_b(); ?>>
						<h3><?php echo co_get_option( 'group_outlook_t' ); ?></h3>
						<div class="clear"></div>
					</div>
				<?php } ?>

				<div class="group-outlook-content text-back be-text" <?php aos_b(); ?>>
					<?php echo wpautop( co_get_option( 'group_outlook_content' ) ); ?>
				</div>

				<?php if ( co_get_option( 'group_outlook_more' ) ) { ?>
					<div class="group-outlook-more" <?php aos_b(); ?>>
						<a href="<?php echo co_get_option( 'group_outlook_url' ); ?>" rel="external nofollow"><?php echo co_get_option( 'group_outlook_more' ); ?></a>
					</div>
				<?php } ?>

			</div>
			<?php be_help( $text = '公司主页 → 展望' ); ?>
		</div>
	</div>
</div>
<?php } ?>