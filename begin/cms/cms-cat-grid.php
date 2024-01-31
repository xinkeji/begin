<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'cat_grid' ) ) { ?>
<div class="cms-cat-grid cms-cat-grid-item betip" <?php aos_a(); ?>>
	<?php $cmscatlist = explode( ',', be_get_option( 'cat_grid_id' ) ); foreach ( $cmscatlist as $category ) {
		$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
	?>
	<div class="cms-cat-main ms">
		<h3 class="cat-grid-title">
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
		<div class="cat-g3">
			<?php
				$img = get_posts( array(
					'posts_per_page' => be_get_option( 'cat_grid_n' ),
					'post_status'    => 'publish',
					'post__not_in'   => $do_not_duplicate,
					$cat             => $category
				) );
			?>
			<?php foreach ( $img as $post ) : setup_postdata( $post ); ?>
			<article id="post-<?php the_ID(); ?>" class="post-item-list post glg" <?php aos_a(); ?>>
				<figure class="thumbnail">
					<?php echo zm_thumbnail(); ?>
				</figure>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title over"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>

				<div class="entry-content">
					<span class="entry-meta">
						<?php begin_grid_meta(); ?>
					</span>
					<div class="clear"></div>
				</div>
			</article>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			<div class="clear"></div>
		</div>
	</div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 分类网格' ); ?>
</div>
<div class="clear"></div>
<?php } ?>