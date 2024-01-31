<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'picture_box' ) ) { ?>
	<div class="line-four line-four-picture-item betip">
		<?php if ( be_get_option( 'img_id' ) ) { ?>
			<?php $cmscatlist = explode( ',',be_get_option( 'img_id' ) ); foreach ( $cmscatlist as $category ) {
				$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
			?>
				<div class="cms-picture-box">
					<h3 class="cms-picture-cat-title"><a href="<?php echo get_category_link( $category ); ?>"><?php echo get_cat_name( $category ); ?></a></h3>
					<?php
						$img = get_posts( array(
							'posts_per_page' => be_get_option( 'picture_n' ),
							'post_status'    => 'publish',
							'post__not_in'   => $do_not_duplicate,
							$cat             => $category
						) );
					?>
					<?php foreach ( $img as $post ) : setup_postdata( $post ); ?>
						<div id="post-<?php the_ID(); ?>" class="xl4 xm4" <?php aos_a(); ?>>
							<div class="picture-cms ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
								<figure class="picture-cms-img">
									<?php echo zm_thumbnail(); ?>
								</figure>
								<?php the_title( sprintf( '<h2 class="picture-cms-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
					<div class="clear"></div>
				</div>
			<?php } ?>
		<?php } ?>

		<div class="clear"></div>

		<?php if ( be_get_option( 'picture_id' ) ) { ?>
			<?php
			$tax = 'gallery';
			$tax_terms = get_terms( $tax, array( 'orderby' => 'menu_order', 'order' => 'ASC', 'include' => explode( ',', be_get_option('picture_id' ) ) ) );
			if ( $tax_terms ) { ?>
				<?php foreach ( $tax_terms as $tax_term ) { ?>
					<?php
						$args = array(
							'post_type'        => 'picture',
							"$tax"             => $tax_term->slug,
							'post_status'      => 'publish',
							'posts_per_page'   => be_get_option( 'picture_n' ),
							'orderby'          => 'date', 
							'order'            => 'DESC', 
							'ignore_sticky_posts' => 1
						);
						$be_query = new WP_Query( $args );
					?>

					<?php if ( $be_query->have_posts() ) { ?>
						<div class="cms-picture-box">
							<h3 class="cms-picture-cat-title"><a href="<?php echo get_category_link( $tax_term ); ?>"><?php echo $tax_term->name; ?></a></h3>

							<?php while ( $be_query->have_posts() ) : $be_query->the_post(); ?>

							<div id="post-<?php the_ID(); ?>" class="xl4 xm4 ">
								<div class="picture-cms ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?> <?php aos_a(); ?>>
									<figure class="picture-cms-img">
										<?php echo img_thumbnail(); ?>
									</figure>
									<?php the_title( sprintf( '<h2 class="picture-cms-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
							<div class="clear"></div>
						</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<div class="clear"></div>
		<?php } ?>
		<?php be_help( $text = '首页设置 → 杂志布局 → 图片模块' ); ?>
	</div>
<?php } ?>