<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( is_front_page() && !is_paged() ) { ?>
	<?php if ( ! be_get_option( 'layout' ) || ( be_get_option( "layout" ) == 'group' ) ) { ?>
		<?php if ( ! be_get_option( 'footer_link_no' ) || ( ! wp_is_mobile() ) ) { ?>
			<?php if ( be_get_option( 'home_much_links' ) ) { ?>
				<div class="much-links-main links-group">
					<?php much_links(); ?>
				</div>
			<?php } else { ?>
				<div class="links-group">
					<?php links_footer(); ?>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } else { ?>
		<?php if ( ! be_get_option( 'footer_link_no' ) || ( ! wp_is_mobile() ) ) { ?>
			<?php if ( be_get_option( 'home_much_links' ) ) { ?>
				<div class="much-links-main links-box">
					<?php much_links(); ?>
				</div>
			<?php } else { ?>
				<div class="links-box">
					<?php links_footer(); ?>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>