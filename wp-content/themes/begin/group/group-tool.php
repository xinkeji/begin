<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_tool')) { ?>
<div class="g-row g-line group-tool-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-tool-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option('tool_t') == '' ) { ?>
					<h3><?php echo co_get_option('tool_t'); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('tool_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option('tool_des'); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<?php 
				$tool = ( array ) co_get_option( 'group_tool_item' );
				foreach ( $tool as $items ) {
			?>
				<div class="sx4 edit-buts stool-<?php echo co_get_option('stool_f'); ?>">
					<div class="group-tool sup">
						<div class="group-tool-img">
							<?php if ( ! empty( $items['group_tool_img'] ) ) { ?>
								<div class="group-tool-img-top"></div>
								<div class="img40 lazy"><div class="bgimg" style="background-image: url(<?php echo $items['group_tool_img']; ?>) !important;"></div></div>
							<?php } ?>
						</div>

						<div class="group-tool-pu">
							<div class="group-tool-ico" <?php aos_b(); ?>>
								<?php if ( ! empty( $items['group_tool_svg'] ) ) { ?>
									<svg class="icon" aria-hidden="true"><use xlink:href="#<?php echo $items['group_tool_svg']; ?>"></use></svg>
								<?php } ?>
								<?php if ( ! empty( $items['group_tool_ico'] ) ) { ?>
									<i class="<?php echo $items['group_tool_ico']; ?>"></i>
								<?php } ?>
							</div>
							<?php if ( ! empty( $items['group_tool_btn'] ) ) { ?>
								<h3 class="group-tool-title" <?php aos_b(); ?>><?php echo $items['group_tool_title']; ?></h3>
							<?php } else { ?>
								<a href="<?php echo $items['group_tool_url']; ?>" target="_blank" rel="external nofollow"><h3 class="group-tool-title"><?php echo $items['group_tool_title']; ?></h3></a>
							<?php } ?>

							<?php if ( ! empty( $items['group_tool_txt'] ) ) { ?>
								<p class="group-tool-p<?php if ( co_get_option( 'group_tool_txt_c' ) ) { ?> group-tool-c<?php } ?>">
									<?php echo $items['group_tool_txt']; ?>
								</p>
							<?php } ?>
							<?php if ( ! empty( $items['group_tool_btn'] ) ) { ?>
								<div class="group-tool-link"><a href="<?php echo $items['group_tool_url']; ?>" target="_blank" rel="external nofollow" data-hover="<?php echo $items['group_tool_btn']; ?>"><span><i class="be be-more"></i></span></a></div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php be_help( $text = '公司主页 → 工具' ); ?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>