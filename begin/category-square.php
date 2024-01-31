<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * category Template: 卡片布局
 */
get_header(); ?>

<section id="primary" class="content-area cms-news-grid-container cat-square">
	<main id="main" class="be-main site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="post-item-list post ms glc scl" <?php aos_a(); ?>>
			<?php get_template_part( 'template/new' ); ?>

			<figure class="thumbnail">
				<?php echo zm_thumbnail(); ?>
			</figure>

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title over"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>

			<div class="entry-content">
				<div class="archive-content">
					<?php if (has_excerpt('')){
							echo wp_trim_words( get_the_excerpt(), 30, '...' );
						} else {
							$content = get_the_content();
							$content = wp_strip_all_tags(str_replace(array('[',']'),array('<','>'),$content));
							echo wp_trim_words( $content, 35, '...' );
				        }
					?>
				</div>
				<span class="entry-meta lbm">
					<?php begin_entry_meta(); ?>
				</span>
				<div class="clear"></div>
			</div>
		</article>
		<?php endwhile; ?>
		<div class="square-clear"><?php begin_pagenav(); ?></div>
	</main>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>