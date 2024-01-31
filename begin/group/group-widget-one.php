<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_widget_one')) { ?>
<div class="g-row g-line group-widget-one-line" <?php aos(); ?>>
	<div class="g-col">
		<div id="group-widget-one" class="widget-nav group-widget dy">
			<?php if ( ! dynamic_sidebar( 'group-one' ) ) : ?>
				<aside class="add-widgets">
					<a href="<?php echo admin_url(); ?>widgets.php" target="_blank">为“公司一栏小工具”添加小工具</a>
					<div class="clear"></div>
				</aside>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 一栏小工具' ); ?>
	</div>
</div>
<?php } ?>