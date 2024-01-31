<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'cms_cat_tab' ) ) { ?>
<div class="cms-cat-tab-box betip" <?php aos_a(); ?>>
	<div class="cms-cat-tab ms">
		<?php 
			$children = ( be_get_option( 'cms_cat_tab_chil' ) == 'false' ) ? 'false' : 'true';
			echo do_shortcode( '[be_ajax_post style="imglist" terms="' . be_get_option( 'cms_cat_tab_id' ) . '" posts_per_page="' . be_get_option( 'cms_cat_tab_n' ) . '" children="' . $children . '" listimg="yes" mid="1" btn_all="no"]' );
		?>
	</div>
	<?php be_help( $text = '首页设置 → 杂志布局 → AJAX分类' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>