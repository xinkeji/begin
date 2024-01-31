<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>

	<section id="picture" class="picture-area content-area site-img grid-cat-<?php echo be_get_option( 'img_f' ); ?>">
		<main id="main" class="be-main site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post-item-list post scl">
				<div class="picture-box ms sup" <?php aos_a(); ?>>
					<figure class="picture-img">
						<?php echo img_thumbnail(); ?>
					</figure>
					<?php the_title( sprintf( '<h3 class="picture-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				</div>
			</article>
			<?php endwhile; ?>
		</main>
		<div class="other-nav"><?php begin_pagenav(); ?></div>
		<div class="clear"></div>
	</section>

<?php get_footer(); ?>