<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_img' ) ) { ?>
	<?php $display_categories = explode(',',co_get_option('group_img_id') ); foreach ($display_categories as $category) {
		$cat = co_get_option( 'group_no_cat_child' ) ? 'category' : 'category__in';
	?>
		<div class="g-row g-line group-cat-img-line" <?php aos(); ?>>
			<div class="g-col">
				<div class="group-features">
					<div class="group-title" <?php aos_b(); ?>>
						<h3><?php echo get_cat_name( $category ); ?></h3>
						<?php if ( category_description( $category ) ) { ?>
							<div class="group-des"><?php echo category_description( $category ); ?></div>
						<?php } ?>
						<div class="clear"></div>
					</div>

					<div class="section-box">
						<?php
							$group_img = get_posts( array(
								'posts_per_page' => co_get_option( 'group_img_n' ),
								'post_status'    => 'publish',
								$cat             => $category,
							) );
						?>
						<?php foreach ( $group_img as $post ) : setup_postdata( $post ); ?>
							<div class="g4 g<?php echo co_get_option( 'group_img_f' ); ?>">
								<div class="box-4">
									<figure class="section-thumbnail" <?php aos_b(); ?>>
										<?php echo tao_thumbnail(); ?>
									</figure>
									<?php the_title( sprintf( '<h2 class="g4-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								</div>
							</div>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
						<div class="clear"></div>
						<div class="group-cat-img-more"><a href="<?php echo get_category_link($category);?>" title="<?php _e( '更多', 'begin' ); ?>"><i class="be be-more"></i></a></div>
					</div>
				</div>
				<?php be_help( $text = '公司主页 → 展示' ); ?>
				<div class="clear"></div>
			</div>
		</div>
	<?php } ?>
<?php } ?>