<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * category Template: Ajax标准布局
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main ajax-site-main<?php if ( zm_get_option( 'post_no_margin') ) { ?> domargin<?php } ?>" role="main">
		<?php 
			$orderby = 'date';
			$meta_key = '';

			switch ( zm_get_option( 'ajax_code_d_orderby' ) ) {
				case 'modified':
					$orderby = 'modified';
					break;
				case 'comment_count':
					$orderby = 'comment_count';
					break;
				case 'views':
					$orderby = 'meta_value_num';
					$meta_key = 'views';
					break;
			}

			$btns     = zm_get_option( 'ajax_layout_code_d_btn' ) ? be_cat_btn() : 'no';
			$children = ( zm_get_option('ajax_layout_code_d_chil' ) == 'false' ) ? 'false' : 'true';

			echo do_shortcode( '[be_ajax_post posts_per_page="' . zm_get_option( 'ajax_layout_code_d_n' ) . '" style="default" cat="' . get_query_var( 'cat' ) . ',' . be_subcat_id() . '" btn="' . $btns . '" btn_all= "no" more="' . zm_get_option( 'nav_btn_d' ) . '" infinite="' . zm_get_option( 'more_infinite_d' ) . '" meta_key="' . $meta_key . '" orderby="' . $orderby . '" children="' . $children . '" order="DESC"]' );
		?>
	</main>
	<div class="clear"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>