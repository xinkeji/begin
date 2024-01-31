<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_contact')) { ?>
	<div class="g-row g-line sort contact" <?php aos(); ?>>
		<div class="g-col">
			<div class="section-box group-contact-wrap">
				<div class="group-title" <?php aos_b(); ?>>
					<?php if ( ! co_get_option( 'group_contact_t' ) == '' ) { ?>
						<h3><?php echo co_get_option( 'group_contact_t' ); ?></h3>
					<?php } ?>
					<div class="clear"></div>
				</div>
				<div class="group-contact  be-text sanitize<?php if ( ! co_get_option( 'contact_img_m' ) || ( co_get_option( 'contact_img_m' ) == 'contact_img_right')) { ?> group-contact-lr<?php } ?>">
					<div class="single-content text-back<?php if ( co_get_option( 'tr_contact' ) ) { ?> group-contact-main<?php } else { ?> group-contact-main-all<?php } ?>" <?php aos_f(); ?>>
						<?php echo wpautop( co_get_option( 'contact_p' ) ); ?>
					</div>

					<?php if ( co_get_option( 'group_contact_bg' ) ) { ?>
						<div class="group-contact-img" <?php aos_b(); ?>>
							<img alt="contact" src="<?php echo co_get_option( 'group_contact_img' ); ?>">
						</div>
					<?php } ?>

					<div class="clear"></div>
					<?php if ( co_get_option('group_more_z' ) ||  co_get_option( 'group_contact_z' ) ) { ?>
						<div class="group-contact-more">
							<?php if ( co_get_option( 'group_more_z' ) ) { ?>
								<span class="group-more" <?php aos_b(); ?>>
									<?php if ( co_get_option('group_more_url') == '' ) { ?>
										<a href="<?php the_permalink(); ?>" rel="external nofollow"><?php if ( co_get_option( 'group_more_ico' ) ) { ?><i class="<?php echo co_get_option( 'group_more_ico' ); ?>"></i><?php } ?><?php echo co_get_option('group_more_z'); ?></a>
									<?php } else { ?>
										<a href="<?php echo co_get_option( 'group_more_url' ); ?>" rel="external nofollow"><?php if ( co_get_option( 'group_more_ico' ) ) { ?><i class="<?php echo co_get_option( 'group_more_ico' ); ?>"></i><?php } ?><?php echo co_get_option( 'group_more_z' ); ?></a>
									<?php } ?>
								</span>
							<?php } ?>
							<?php if ( co_get_option( 'group_contact_z' ) ) { ?><span class="group-phone" <?php aos_b(); ?>><a href="<?php echo  co_get_option( 'group_contact_url' ); ?>" rel="external nofollow"><?php if ( co_get_option( 'group_contact_ico' ) ) { ?><i class="<?php echo co_get_option( 'group_contact_ico' ); ?>"></i><?php } ?><?php echo co_get_option('group_contact_z'); ?></a></span><?php } ?>
							<div class="clear"></div>
						</div>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<?php be_help( $text = '公司主页 → 关于我们' ); ?>
			<div class="clear"></div>
		</div>
	</div>
<?php } ?>