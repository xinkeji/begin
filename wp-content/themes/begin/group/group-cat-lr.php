<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_cat_d' ) ) {
	$cat = co_get_option( 'group_no_cat_child' ) ? 'category' : 'category__in';
?>
	<div class="g-row g-line group-cat-d" <?php aos(); ?>>
		<div class="g-col">
			<div class="grf-cat-lr">
				<div class="grf2 grfl">
					<div class="grf-cat-box">
						<ul class="grf-cat-list" <?php aos_f(); ?>>
							<a href="<?php echo get_category_link( co_get_option( 'group_cat_d_l_id' ) );?>">
								<figure class="grf-thumbnail" <?php aos_b(); ?>>
									<h3 class="grf-cat-name" <?php aos_b(); ?>><?php echo get_cat_name( co_get_option( 'group_cat_d_l_id' ) ); ?></h3>
									<img alt="contact" src="<?php echo co_get_option( 'group_cat_d_l_img' ); ?>">
								</figure>
							</a>
							<?php
								$cat_d = get_posts( array(
									'posts_per_page' => co_get_option('group_cat_d_n'),
									'post_status'    => 'publish',
									$cat             => co_get_option( 'group_cat_d_l_id' ),
								) );
							?>
							<?php foreach ( $cat_d as $post ) : setup_postdata( $post ); ?>
								<li class="list-date"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?> <?php echo get_the_time( 'H:i:s' ); ?>"><?php the_time( 'm/d' ) ?></time></li>
								<?php the_title( sprintf( '<li class="list-title"><h2 class="group-list-title"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2></li>' ); ?>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>

				<div class="grf2 grfr">
					<div class="grf-cat-box">
						<ul class="grf-cat-list" <?php aos_f(); ?>>
							<a href="<?php echo get_category_link( co_get_option( 'group_cat_d_r_id' ) );?>">
								<figure class="grf-thumbnail" <?php aos_b(); ?>>
									<h3 class="grf-cat-name" <?php aos_b(); ?>><?php echo get_cat_name( co_get_option( 'group_cat_d_r_id' ) ); ?></h3>
									<img alt="contact" src="<?php echo co_get_option( 'group_cat_d_r_img' ); ?>">
								</figure>
							</a>
							<?php
								$cat_d = get_posts( array(
									'posts_per_page' => co_get_option('group_cat_d_n'),
									'post_status'    => 'publish',
									$cat             => co_get_option( 'group_cat_d_r_id' ),
								) );
							?>
							<?php foreach ( $cat_d as $post ) : setup_postdata( $post ); ?>
								<li class="list-date"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?> <?php echo get_the_time( 'H:i:s' ); ?>"><?php the_time( 'm/d' ) ?></time></li>
								<?php the_title( sprintf( '<li class="list-title"><h2 class="group-list-title"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2></li>' ); ?>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<?php be_help( $text = '公司主页 → 新闻资讯D' ); ?>
		</div>
	</div>
<?php } ?>