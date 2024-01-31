<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'products_on' ) ) { ?>
<div class="line-four line-four-show-item betip">
	<?php
		$args = array(
			'post_type' => 'show',
			'showposts' => be_get_option('products_n'), 
		);

		if ( be_get_option( 'products_id' ) ) {
			$args = array(
				'showposts' => be_get_option( 'products_n' ), 
				'tax_query' => array(
					array(
						'taxonomy' => 'products',
						'terms' => explode(',',be_get_option( 'products_id' ) )
					),
				)
			);
		}
	?>
	<?php $be_query = new WP_Query( $args ); while ( $be_query->have_posts() ) : $be_query->the_post(); ?>

	<div class="xl4 xm4">
		<div class="picture-cms ms" <?php aos_a(); ?>>
			<figure class="picture-cms-img">
				<?php echo img_thumbnail(); ?>
				<span class="show-t"></span>
			</figure>
			<?php the_title( sprintf( '<h2 class="picture-s-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>
	</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<div class="clear"></div>
	<?php be_help( $text = '首页设置 → 杂志布局 → 产品模块' ); ?>
</div>
<?php } ?>