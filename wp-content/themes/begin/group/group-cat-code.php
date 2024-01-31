<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_ajax_cat' ) ) { ?>
	<div class="g-row g-line group-ajax-cat-post">
		<div class="g-col">
			<?php echo do_shortcode( co_get_option( 'group_ajax_cat_post_code' ) ); ?>
			<?php be_help( $text = '公司主页 → Ajax分类短代码' ); ?>
		</div>
	</div>
<?php } ?>