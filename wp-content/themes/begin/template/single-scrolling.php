<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
	<?php if (zm_get_option('single_rolling')) { ?>
	<?php 
		if ( zm_get_option( 'not_single_rolling_cat' ) ) {
			$notcat = implode( ',', zm_get_option( 'not_single_rolling_cat' ) );
		} else {
			$notcat = '';
		}
		if ( ! in_category( explode( ',', $notcat ) ) ) { ?>
	<?php 
		global $post;
		$catid = '';
		$cat = get_the_category();
		foreach($cat as $key=>$category){
			$catid = $category->term_id;
		}
		$q = new WP_Query( array(
			'showposts' => zm_get_option('single_rolling_n'),
			'post_type' => 'post',
			'cat' => $catid,
			'post__not_in' => array($post->ID),
			'order' => 'DESC',//ASC
			'ignore_sticky_posts' => 1
		) );
	?>
	<?php if ($q->have_posts()) : ?>
		<div class="slider-rolling-box ms betip" <?php aos_a(); ?>>
			<div id="slider-rolling" class="owl-carousel be-rolling single-rolling">
				<?php while ($q->have_posts()) : $q->the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="post-item-list post scrolling-img">
						<div class="scrolling-thumbnail"><?php echo zm_thumbnail_scrolling(); ?></div>
						<div class="clear"></div>
						<?php the_title( sprintf( '<h2 class="grid-title over"><a href="%s" target="_blank" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<div class="clear"></div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php be_help( $text = '主题选项 → 基本设置 → 正文底部滚动同分类文章' ); ?>
		</div>
	<?php endif; ?>
	<?php } ?>
<?php } ?>