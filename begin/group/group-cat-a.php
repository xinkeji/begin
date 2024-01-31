<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_cat_a' ) ) { ?>
<div class="g-row g-line group-cat-a" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-cat">
			<?php $display_categories =  explode( ',', co_get_option( 'group_cat_a_id' ) ); foreach ( $display_categories as $category ) {
				$cat = co_get_option( 'group_no_cat_child' ) ? 'category' : 'category__in';
			?>
			<div class="gr2">
				<div class="gr-cat-box">
					<h3 class="gr-cat-title" <?php aos_b(); ?>><a href="<?php echo get_category_link( $category ); ?>"><?php echo get_cat_name( $category ); ?><span class="gr-cat-more"><i class="be be-more"></i></span></a></h3>
					<div class="clear"></div>
					<div class="gr-cat-area">
						<?php if ( co_get_option( 'group_cat_a_top' ) ) { ?>
							<?php
								$imgt = get_posts( array(
									'meta_key'       => 'cat_top',
									'posts_per_page' => 1,
									'post_status'    => 'publish',
									$cat             => $category,
								) );
							?>
							<?php foreach ( $imgt as $post ) : setup_postdata( $post ); $grouptop[] = $post->ID; ?>
								<div id="post-<?php the_ID(); ?>" class="gr-img-t">
									<figure class="gr-thumbnail"><?php echo zm_long_thumbnail(); ?></figure>
									<?php the_title( sprintf( '<h2 class="gr-title-img bgb"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									<div class="clear"></div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
							<div class="clear"></div>

							<div class="gr-cat-img">
								<?php
									$imgb = get_posts( array(
										'posts_per_page' => co_get_option( 'group_cat_a_n' ),
										'post_status'    => 'publish',
										$cat             => $category,
										'post__not_in'   => $grouptop,
									) );
								?>
								<?php foreach ( $imgb as $post ) : setup_postdata( $post ); ?>
									<div class="cat-gr2">
										<div id="post-<?php the_ID(); ?>" class="gr-img">
											<figure class="gr-a-thumbnail picture-cms-img" <?php aos_b(); ?>><?php echo zm_thumbnail(); ?></figure>
											<?php the_title( sprintf( '<div class="gr-img-title"><a href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></div>' ); ?>
											<div class="clear"></div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						<?php } else { ?>
							<?php
								$imgt = get_posts( array(
									'posts_per_page' => 1,
									'post_status'    => 'publish',
									$cat             => $category,
								) );
							?>
							<?php foreach ( $imgt as $post ) : setup_postdata( $post ); ?>
								<div id="post-<?php the_ID(); ?>" class="gr-img-t">
									<figure class="gr-thumbnail" <?php aos_b(); ?>><?php echo zm_long_thumbnail(); ?></figure>
									<?php the_title( sprintf( '<h2 class="gr-title-img bgb"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									<div class="clear"></div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>

							<div class="clear"></div>
							<div class="gr-cat-img">
								<?php
									$imgb = get_posts( array(
										'posts_per_page' => co_get_option( 'group_cat_a_n' ),
										'post_status'    => 'publish',
										$cat             => $category,
										'offset'         => 1,
									) );
								?>
								<?php foreach ( $imgb as $post ) : setup_postdata( $post ); ?>
									<div id="post-<?php the_ID(); ?>" class="cat-gr2">
										<div class="gr-img" <?php aos_b(); ?>>
											<figure class="gr-a-thumbnail picture-cms-img"><?php echo zm_thumbnail(); ?></figure>
											<?php the_title( sprintf( '<h2 class="gr-img-title"><a href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2>' ); ?>
											<div class="clear"></div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 新闻资讯A' ); ?>
	</div>
</div>
<?php } ?>