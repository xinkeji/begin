<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (be_get_option('cat_lead')) { ?>
<div class="cms-cat-lead betip">
	<?php $cmscatlist = explode( ',', be_get_option( 'cat_lead_id' ) ); foreach ( $cmscatlist as $category ) {
		$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
	?>
		<div class="cat-container ms" <?php aos_a(); ?>>
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
			<?php
				$img = get_posts( array(
					'posts_per_page' => 1,
					'post_status'    => 'publish',
					'post__not_in'   => $do_not_duplicate,
					$cat             => $category
				) );
			?>
			<?php foreach ( $img as $post ) : setup_postdata( $post ); ?>
				<article id="post-<?php the_ID(); ?>" class="post-item-list post cms-cat-lead-post doclose" <?php aos_a(); ?>>
					<figure class="thumbnail">
						<?php echo zm_thumbnail(); ?>
					</figure>
					<?php header_title(); ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>

					<div class="entry-content">
						<div class="archive-content">
							<?php begin_trim_words(); ?>
						</div>
						<div class="clear"></div>
						<span class="entry-meta lbm">
							<?php begin_entry_meta(); ?>
						</span>
					</div>
				</article>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="clear"></div>

		<div class="cms-news-grid-container<?php if ( ! be_get_option( 'no_lead_img' ) ) { ?> hide-lead-img ms<?php } ?>" <?php aos_a(); ?>>
			<?php
				$lists = get_posts( array(
					'posts_per_page' => be_get_option( 'cat_lead_n' ),
					'post_status'    => 'publish',
					'offset'         => 1,
					'post__not_in'   => $do_not_duplicate,
					$cat             => $category
				) );
			?>
			<?php foreach ( $lists as $post ) : setup_postdata( $post ); ?>
				<?php if (be_get_option('no_cat_child')) { ?>
					<article id="post-<?php the_ID(); ?>" class="post-item-list post ms glx">
				<?php } else { ?>
					<article id="post-<?php the_ID(); ?>" class="post-item-list post ms glx">
				<?php } ?>
					<?php if ( be_get_option( 'no_lead_img' ) ) { ?>
						<figure class="thumbnail">
							<?php echo zm_thumbnail(); ?>
						</figure>
					<?php } ?>
					<header class="entry-header">
						<h2 class="entry-title over<?php if ( ! be_get_option( 'no_lead_img' ) ) { ?>  srm<?php } ?>"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php echo t_mark(); ?><?php the_title(); ?></a></h2>
					</header>

					<div class="entry-content">
						<?php if ( be_get_option( 'no_lead_img' ) ) { ?>
							<div class="archive-content">
								<?php if ( has_excerpt( '' ) ){
										echo wp_trim_words( get_the_excerpt(), 30, '...' );
									} else {
										$content = get_the_content();
										$content = wp_strip_all_tags( str_replace(array('[',']'),array('<','>'), $content ) );
										echo wp_trim_words( $content, 35, '...' );
							        }
								?>
							</div>
						<?php } ?>
						<?php if ( be_get_option( 'no_lead_img' ) ) { ?>
							<span class="entry-meta lbm">
								<?php begin_entry_meta(); ?>
							</span>
						<?php } ?>
						<div class="clear"></div>
					</div>
				</article>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 混排分类列表' ); ?>
</div>
<?php } ?>