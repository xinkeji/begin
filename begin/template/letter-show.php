<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'letter_show' ) ) { ?>
<div class="filter-box ms" <?php aos_a(); ?>>
	<div class="letter-t"><i class="be be-sort"></i><span><?php echo be_get_option( 'letter_t' ); ?></span></div>
		<?php if ( ! be_get_option( 'letter_hidden' ) ) { ?><div class="letter-box-main letter-box-main-h"><?php } else { ?><div class="letter-box-main"><?php } ?>
			<?php specs_show(); ?>
		<div class="clear"></div>
	</div>
	<?php be_help( $text = '首页设置 → 杂志布局 → 首字母分类/标签' ); ?>
</div>
<?php } ?>