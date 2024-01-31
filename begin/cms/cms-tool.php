<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (be_get_option('cms_tool')) { ?>
<div class="group-tool-box betip">
	<?php 
		$tool = (array) be_get_option( 'cms_tool_item' );
		foreach ( $tool as $items ) {
	?>
		<div class="sx4">
			<div class="group-tool edit-buts sup" <?php aos_b(); ?>>
				<div class="group-tool-img">
					<?php if ( ! empty( $items['cms_tool_img'] ) ) { ?>
						<div class="group-tool-img-top"></div>
						<div class="img40 lazy"><div class="bgimg" style="background-image: url(<?php echo $items['cms_tool_img']; ?>) !important;"></div></div>
					<?php } ?>
				</div>
				<div class="group-tool-pu">
					<div class="group-tool-ico" <?php aos_b(); ?>>
						<?php if ( ! empty( $items['cms_tool_svg'] ) ) { ?>
							<svg class="icon" aria-hidden="true"><use xlink:href="#<?php echo $items['cms_tool_svg']; ?>"></use></svg>
						<?php } ?>
						<?php if ( ! empty( $items['cms_tool_ico'] ) ) { ?>
							<i class="<?php echo $items['cms_tool_ico']; ?>"></i>
						<?php } ?>
					</div>

					<?php if ( ! empty( $items['cms_tool_btn'] ) ) { ?>
						<h3 class="group-tool-title"><?php echo $items['cms_tool_title']; ?></h3>
					<?php } else { ?>
						<a href="<?php echo $items['cms_tool_url']; ?>" target="_blank" rel="external nofollow"><h3 class="cms-tool-title"><?php echo $items['cms_tool_title']; ?></h3></a>
					<?php } ?>

					<?php if ( ! empty( $items['cms_tool_txt'] ) ) { ?>
						<p class="group-tool-p<?php if ( be_get_option( 'cms_tool_txt_c' ) ) { ?> group-tool-c<?php } ?>">
							<?php echo $items['cms_tool_txt']; ?>
						</p>
					<?php } ?>

					<?php if ( ! empty( $items['cms_tool_btn'] ) ) { ?>
						<div class="group-tool-link"><a href="<?php echo $items['cms_tool_url']; ?>" target="_blank" rel="external nofollow" data-hover="<?php echo $items['cms_tool_btn']; ?>"><span><i class="be be-more"></i></span></a></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 工具模块' ); ?>
</div>
<?php } ?>