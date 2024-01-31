<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (be_get_option('tao_h')) { ?>
<div class="line-tao betip">
	<?php
	$tax = 'taobao';
	$tax_terms = get_terms( $tax, array( 'orderby' => 'menu_order', 'order' => 'ASC', 'include' => explode( ',',be_get_option('tao_h_id' ) ) ) );
	if ( $tax_terms ) { ?>
		<?php foreach ( $tax_terms as $tax_term ) { ?>
			<?php
				$orderby = ( be_get_option( 'h_tao_sort' ) == 'views' ) ? 'meta_value' : 'date';

				$args = array(
					'post_type'        => 'tao',
					"$tax"             => $tax_term->slug,
					'post_status'      => 'publish',
					'posts_per_page'   => be_get_option( 'tao_h_n' ),
					'meta_key'         => 'views',
					'orderby'          => $orderby, 
					'order'            => 'DESC', 
					'ignore_sticky_posts' => 1
				);
				$be_query = new WP_Query( $args );
			?>
			<?php if ( $be_query->have_posts() ) { ?>
				<div class="cms-tao-box">
					<h3 class="cms-picture-cat-title"><a href="<?php echo get_category_link( $tax_term ); ?>"><?php echo $tax_term->name; ?></a></h3>
					<?php while ( $be_query->have_posts() ) : $be_query->the_post(); ?>
					<div class="tao-home-area tao-home-fl tao-home-fl-<?php echo be_get_option( 'cms_tao_home_f' ); ?>">
						<?php get_template_part( '/template/tao-home' ); ?>
					</div>
					<?php endwhile;wp_reset_postdata(); ?>
					<div class="clear"></div>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 商品' ); ?>
</div>
<?php } ?>