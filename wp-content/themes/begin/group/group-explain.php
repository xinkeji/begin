<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_explain' ) ) { ?>
	<?php 
		$explain = ( array ) co_get_option( 'group_explain_item' );
		foreach ( $explain as $items ) {
	?>
		<div class="explain g-line" <?php aos(); ?>>
			<div class="g-row">
				<div class="g-col">
					<div class="section-box group-explain-wrap">
						<div class="group-title" <?php aos_b(); ?>>
							<?php if ( ! empty( $items['group_explain_t'] ) ) { ?>
								<h3><?php echo $items['group_explain_t']; ?></h3>
							<?php } ?>
							<?php if ( ! empty( $items['group_explain_des'] ) ) { ?>
								<div class="group-des"><?php echo $items['group_explain_des']; ?></div>
							<?php } ?>
							<div class="clear"></div>
						</div>
						<div class="group-explain-box">
							<div class="group-explain-img-box<?php if ( empty( $items['ex_thumbnail_only'] ) ) { ?> explain-img<?php } ?>" <?php aos_b(); ?>>
								<figure class="group-explain-img">
									<a rel="external nofollow" href="<?php echo $items['group_explain_url']; ?>"><img src="<?php echo $items['ex_thumbnail_a']; ?>" alt="<?php echo $items['group_explain_t']; ?>" /></a>
								</figure>

								<?php if ( empty( $items['ex_thumbnail_only'] ) ) { ?>
									<figure class="group-explain-img">
										<a rel="external nofollow" href="<?php echo $items['group_explain_url']; ?>"><img src="<?php echo $items['ex_thumbnail_b']; ?>" alt="<?php echo $items['group_explain_t']; ?>" /></a>
									</figure>
								<?php } ?>
							</div>

							<div class="group-explain">
								<div class="group-explain-main edit-buts single-content sanitize" <?php aos_f(); ?>>
									<?php if ( ! empty( $items['explain_content_t'] ) ) { ?>
										<a href="<?php echo $items['group_explain_url']; ?>" rel="external nofollow">
											<div class="group-explain-t">
												<?php if ( ! empty( $items['explain_content_ico'] ) ) { ?>
													<i class="explain-content-ico <?php echo $items['explain_content_ico']; ?>"></i>
												<?php } ?>
												<?php echo $items['explain_content_t']; ?>
											</div>
										</a>
									<?php } ?>
									<?php if ( ! empty( $items['explain_p'] ) ) { ?>
										<div class="text-back be-text"><?php echo wpautop( $items['explain_p'] ); ?></div>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<?php if ( $items['group_explain_url'] && ! $items['group_explain_more_no'] ) { ?>
						<div class="group-explain-more">
							<a href="<?php echo $items['group_explain_url']; ?>" title="<?php _e( '详细查看', 'begin' ); ?>" rel="external nofollow">
								<?php if ( ! empty( $items['group_explain_more'] ) ) { ?>
									<?php echo $items['group_explain_more']; ?>
								<?php } else { ?>
									<i class="be be-more"></i>
								<?php } ?>
							</a>
						</div>
					<?php } ?>
					<?php be_help( $text = '公司主页 → 说明' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>