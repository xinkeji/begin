<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_products' ) ) { ?>
<div class="g-row g-line group-features-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-features">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'group_products_t' ) == '' ) { ?>
					<h3><?php echo co_get_option( 'group_products_t' ); ?></h3>
				<?php } ?>

				<?php if ( ! co_get_option( 'group_products_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'group_products_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="section-box">
				<?php
					$args = array(
						'post_type' => 'show',
						'showposts' => co_get_option( 'group_products_n' ), 
					);

					if ( co_get_option( 'group_products_id' ) ) {
						$args = array(
							'showposts' => co_get_option( 'group_products_n' ), 
							'tax_query' => array(
								array(
									'taxonomy' => 'products',
									'terms' => explode(',', co_get_option( 'group_products_id' ) )
								),
							)
						);
					}
				?>
				<?php $be_query = new WP_Query( $args ); while ( $be_query->have_posts()) : $be_query->the_post(); ?>
				<div class="g4 g<?php echo co_get_option( 'group_products_f' ); ?>">
					<div class="box-4" <?php aos_b(); ?>>
						<figure class="picture-cms-img">
							<?php echo img_thumbnail(); ?>
						</figure>
						<?php the_title( sprintf( '<h3 class="g4-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<div class="clear"></div>
				<?php if ( co_get_option( 'group_products_url' ) == '' ) { ?>
				<?php } else { ?>
					<div class="group-post-more"><a href="<?php echo co_get_option( 'group_products_url' ); ?>" title="<?php _e( '更多', 'begin' ); ?>" rel="external nofollow"><i class="be be-more"></i></a></div>
				<?php } ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 产品模块' ); ?>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>