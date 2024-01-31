<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_widget_two')) { ?>
<div class="g-row g-line group-widget-two-line" <?php aos(); ?>>
	<div class="g-col">
		<div id="group-widget-two" class="group-widget dy">
			<?php if ( ! dynamic_sidebar( 'group-two' ) ) : ?>
				<aside class="add-widgets">
					<a href="<?php echo admin_url(); ?>widgets.php" target="_blank">为“公司两栏小工具”添加小工具</a>
					<div class="clear"></div>
				</aside>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 两栏小工具' ); ?>
	</div>
</div>
<?php } ?>