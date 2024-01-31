<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_assets' ) ) { ?>
	<?php if ( ! co_get_option( 'group_assets_get' ) || ( co_get_option( "group_assets_get" ) == 'cat' ) ) { ?>
		<?php $cmscatlist = explode( ',',co_get_option( 'group_assets_id' ) ); foreach ( $cmscatlist as $category ) {
			$cat = co_get_option( 'no_cat_child' ) ? 'category' : 'category__in';
		?>
			<div class="betip line-group-assets g-row g-line group-assets-<?php echo co_get_option( 'group_assets_f' ); ?>" <?php aos(); ?>>
				<div class="g-col">
					<div class="flexbox-grid">
						<div class="group-title" <?php aos_b(); ?>>
							<h3><?php echo get_cat_name( $category ); ?></h3>
							<?php if ( category_description( $category ) ) { ?>
								<div class="group-des"><?php echo category_description( $category ); ?></div>
							<?php } ?>
							<div class="clear"></div>
						</div>
						<?php
							$img = get_posts( array(
								'posts_per_page' => be_get_option( 'group_assets_n' ),
								'post_status'    => 'publish',
								$cat             => $category, 
								'orderby'        => 'date',
								'order'          => 'DESC', 
							) );

							foreach ( $img as $post ) : setup_postdata( $post );
							require get_template_directory() . '/template/assets.php';
							endforeach;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
						<div class="group-cat-img-more"><a href="<?php echo get_category_link( $category );?>" title="<?php _e( '更多', 'begin' ); ?>"><i class="be be-more"></i></a></div>
					</div>
					<?php be_help( $text = '公司主页 → 会员商品' ); ?>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
	<?php } ?>

	<?php if ( co_get_option( 'group_assets_get' ) == 'post' ) { ?>
		<div class="betip line-group-assets g-row g-line group-assets-<?php echo co_get_option( 'group_assets_f' ); ?>" <?php aos(); ?>>
			<div class="g-col">
				<div class="flexbox-grid">
					<div class="group-title" <?php aos_b(); ?>>
						<?php if ( ! co_get_option( 'group_assets_t' ) == '' ) { ?>
							<h3><?php echo co_get_option( 'group_assets_t' ); ?></h3>
						<?php } ?>
						<?php if ( ! co_get_option( 'group_assets_des' ) == '' ) { ?>
							<div class="group-des"><?php echo co_get_option( 'group_assets_des' ); ?></div>
						<?php } ?>
						<div class="clear"></div>
					</div>
					<?php
						$args = array(
							'post__in'  => explode( ',', co_get_option( 'group_assets_post_id' ) ),
							'orderby'   => 'post__in', 
							'order'     => 'DESC',
							'ignore_sticky_posts' => true,
							);
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
							require get_template_directory() . '/template/assets.php';
						endwhile;
						else :
							echo '<div class="be-none">公司主页 → 会员商品，输入文章ID</div>';
						endif;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
					<div class="group-cat-img-more"><a href="<?php echo get_category_link( $category );?>" title="<?php _e( '更多', 'begin' ); ?>"><i class="be be-more"></i></a></div>
				</div>
				<?php be_help( $text = '公司主页 → 会员商品' ); ?>
			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>
<?php } ?>