<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'cat_big_not' ) ) { ?>
<div class="line-big line-big-n betip">
	<?php $cmscatlist = explode( ',', be_get_option('cat_big_not_id') ); foreach ( $cmscatlist as $category ) {
		$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
	?>
	<?php if (be_get_option('cat_big_not_three')) { ?>
	<div class="cl3">
	<?php } else { ?>
	<div class="xl3 xm3">
	<?php } ?>
		<div class="cat-container ms" <?php aos_a(); ?>>
			<h3 class="cat-title">
				<a href="<?php echo get_category_link( $category ); ?>">
					<?php if ( zm_get_option( 'cat_icon' ) ) { ?>
						<?php if ( get_option( 'zm_taxonomy_icon' . $category ) ) { ?><i class="t-icon <?php echo zm_taxonomy_icon_code( $category ); ?>"></i><?php } ?>
						<?php if ( get_option( 'zm_taxonomy_svg' . $category ) ) { ?><svg class="t-svg icon" aria-hidden="true"><use xlink:href="#<?php echo zm_taxonomy_svg_code( $category ); ?>"></use></svg><?php } ?>
						<?php if ( ! get_option( 'zm_taxonomy_icon' . $category ) && ! get_option( 'zm_taxonomy_svg'.$category ) ) { ?><?php title_i(); ?><?php } ?>
					<?php } else { ?>
						<?php title_i(); ?>
					<?php } ?>
					<?php echo get_cat_name( $category ); ?>
					<?php more_i(); ?>
				</a>
			</h3>
			<div class="clear"></div>
			<div class="cms-cat-area">
				<ul class="cat-list">
					<?php
						$lists = get_posts( array(
							'posts_per_page' => be_get_option( 'cat_big_not_n' ),
							'post_status'    => 'publish',
							'post__not_in'   => $do_not_duplicate,
							$cat             => $category
						) );

						foreach ( $lists as $post ) : setup_postdata( $post );
						list_date();
						the_title( sprintf( '<li class="list-title' . date_class() . '"><h2 class="cms-list-title"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2></li>' );
						endforeach; wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 底部无缩略图分类列表' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>