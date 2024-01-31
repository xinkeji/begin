<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_new')) { ?>
<div class="g-row g-line group-news-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-news">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option('group_new_t') == '' ) { ?>
					<a href="<?php echo co_get_option('group_new_more_url'); ?>" rel="bookmark"><h3><?php echo co_get_option('group_new_t'); ?></h3></a>
				<?php } ?>
				<?php if ( ! co_get_option('group_new_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option('group_new_des'); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="group-news-content lbm">
				<?php
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					if ( co_get_option( 'not_group_new' ) ) {
						$notcat = implode( ',', co_get_option( 'not_group_new' ) );
					} else {
						$notcat = '';
					}
					$recent = new WP_Query( array( 'posts_per_page' => co_get_option('group_new_n'), 'category__not_in' => explode(',', $notcat), 'paged' => $paged) );
				?>
				<?php while($recent->have_posts()) : $recent->the_post(); $do_not_cat[] = $post->ID; ?>
				<?php if (co_get_option('group_new_list')) { ?>
					<article id="post-<?php the_ID(); ?>" class="post-item-list post group-new-list">
					<header class="entry-header" <?php aos_f(); ?>>
						<?php the_title( sprintf( '<h2 class="entry-title srm"><a class="get-icon" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>
				<?php } else { ?>
					<article id="post-<?php the_ID(); ?>" class="post-item-list post">
					<figure class="thumbnail" <?php aos_f(); ?>>
						<?php echo zm_thumbnail(); ?>
					</figure>
					<header class="entry-header" <?php aos_f(); ?>>
						<?php the_title( sprintf( '<h2 class="entry-title over"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>

					<div class="entry-content" <?php aos_f(); ?>>
						<div class="archive-content">
							<?php if (has_excerpt('')){
									echo wp_trim_words( get_the_excerpt(), 30, '...' );
								} else {
									$content = get_the_content();
									$content = wp_strip_all_tags(str_replace(array('[',']'),array('<','>'),$content));
									echo wp_trim_words( $content, 40, '...' );
								}
							?>
						</div>
						<span class="entry-meta">
							<?php begin_entry_meta(); ?>
						</span>
						<div class="clear"></div>
					</div>
				<?php } ?>
				</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 最新文章' ); ?>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>