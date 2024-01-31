<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'cat_small' ) ) { ?>
<div class="line-small betip">
	<?php $cmscatlist = explode( ',', be_get_option( 'cat_small_id' ) ); foreach ( $cmscatlist as $category ) {
		$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
	?>
		<div class="xl2 xm2">
			<div class="cat-container ms<?php if ( be_get_option( 'cat_small_z' ) ) { ?> cms-cat-txt<?php } ?>" <?php aos_a(); ?>>
				<h3 class="cat-title">
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
				<div class="cms-cat-area">
					<?php
						$img = get_posts( array(
							'posts_per_page' => 1,
							'post_status'    => 'publish',
							'post__not_in'   => $do_not_duplicate,
							$cat             => $category
						) );
					?>
					<?php foreach ( $img as $post ) : setup_postdata( $post ); ?>
						<?php if ( be_get_option( 'cat_small_img_no' ) ) { ?>
							<ul class="cat-small-list"><?php list_date(); ?><?php the_title( sprintf( '<li class="list-title' . date_class() . '"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></li>' ); ?></ul>
						<?php } else { ?>
							<?php if ( be_get_option( 'cat_small_z' ) ) { ?>
									<figure class="small-thumbnail"><?php echo zm_long_thumbnail(); ?></figure>
									<?php the_title( sprintf( '<h2 class="entry-small-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								<?php } else { ?>
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									<div class="cat-img-small">
										<figure class="thumbnail"><?php echo zm_thumbnail(); ?></figure>
										<div class="cat-main">
											<?php if ( has_excerpt( '' ) ){
													echo wp_trim_words( get_the_excerpt(), 45, '...' );
												} else {
													$content = get_the_content();
													$content = wp_strip_all_tags( str_replace( array( '[',']' ),array( '<','>' ),$content ) );
													echo wp_trim_words( $content, 42, '...' );
										        }
											?>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

					<div class="clear"></div>
					<ul class="cat-list">
						<?php
							$lists = get_posts( array(
								'posts_per_page' => be_get_option( 'cat_small_n' ),
								'offset'         => 1,
								'post_status'    => 'publish',
								'post__not_in'   => $do_not_duplicate,
								$cat             => $category
							) );

							foreach ( $lists as $post ) : setup_postdata( $post );
							list_date();
							the_title( sprintf( '<li class="list-title' . date_class() . '"><h2 class="cms-list-title"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2></li>' );
							endforeach; wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 两栏分类列表' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>