<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_widget_three')) { ?>
<div class="g-row g-line group-widget-three-line" <?php aos(); ?>>
	<div class="g-col">
		<div id="group-widget-three" class="group-widget dy">
			<?php if ( ! dynamic_sidebar( 'group-three' ) ) : ?>
				<aside class="add-widgets">
					<a href="<?php echo admin_url(); ?>widgets.php" target="_blank">为“公司三栏小工具”添加小工具</a>
					<div class="clear"></div>
				</aside>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 三栏小工具' ); ?>
	</div>
</div>
<?php } ?>