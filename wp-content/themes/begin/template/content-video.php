<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" class="post-item post ms">
<?php else : ?>
<article id="post-<?php the_ID(); ?>" class="post-item-list post format-video ms<?php if ( zm_get_option( 'post_no_margin' ) ) { ?> doclose<?php } ?> scl" <?php aos_a(); ?>>
<?php endif; ?>
	<?php if ( ! is_single() ) : ?>
		<figure class="thumbnail">
			<?php echo zm_thumbnail(); ?>
			<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a>
			<span class="cat<?php if ( zm_get_option( 'no_thumbnail_cat' ) ) { ?> cat-roll<?php } ?><?php if ( zm_get_option( 'merge_cat' ) ) { ?> merge-cat<?php } ?>"><?php zm_category(); ?></span>
		</figure>
	<?php endif; ?>
	<?php header_title(); ?>
		<?php if ( is_single() ) : ?>
			<?php if ( ( ! get_post_meta( get_the_ID(), 'header_img', true ) || get_post_meta( get_the_ID(), 'no_show_title', true ) ) && ( ! get_post_meta( get_the_ID(), 'header_bg', true ) ||  get_post_meta( get_the_ID(), 'no_img_title', true ) ) ) { ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php } ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title">' . be_sticky() . cat_sticky() . '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php if ( ! is_single() ) : ?>
			<div class="archive-content">
				<?php begin_trim_words(); ?>
			</div>
			<div class="clear"></div>
			<?php title_l(); ?>
			<?php get_template_part( 'template/new' ); ?>
			<span class="entry-meta lbm<?php vr(); ?>">
				<?php begin_entry_meta(); ?>
			</span>
		<?php else : ?>
			<?php if (zm_get_option('all_more') && !get_post_meta(get_the_ID(), 'not_more', true)) { ?>
				<div class="single-content<?php if (word_num() > 800) { ?> more-content more-area<?php } ?>">
			<?php } else { ?>
				<div class="single-content">
			<?php } ?>
				<?php begin_abstract(); ?>
				<?php get_template_part('ad/ads', 'single'); ?>
				<div class="format-videos">
					<div class="format-videos-img-box">
						<div class="format-videos-img">
							<?php echo zm_thumbnail(); ?>
						</div>
						<div class="clear"></div>
					</div>

					<div class="format-videos-inf">
						<span class="date"><i class="be be-schedule ri"></i><?php _e( '日期', 'begin' ); ?>：<?php time_ago( $time_type ='posts' ); ?><?php edit_post_link('<i class="be be-editor"></i>', ' ' ); ?></span>
						<span class="category"><i class="be be-folder ri"></i><?php _e( '分类', 'begin' ); ?>：<?php the_category( '&nbsp;&nbsp;' ); ?></span>
						<?php if ( post_password_required() ) { ?>
							<span class="comment"><i class="be be-speechbubble ri"></i><?php _e( '评论', 'begin' ); ?>：<a href="#comments"><?php _e( '密码保护', 'begin' ); ?></a></span>
						<?php } else { ?>
							<span class="comment"><i class="be be-speechbubble ri"></i><?php _e( '评论', 'begin' ); ?>：<?php comments_popup_link( '' . sprintf(__( '发表评论', 'begin' )) .'', '1 条', '% 条' ); ?></span>
						<?php } ?>
						<span class="comment"><?php views_videos(); ?></span>
					</div>
					<div class="clear"></div>
				</div>
				<?php the_content(); ?>
			</div>

			<?php dynamic_sidebar( 'single-foot' ); ?>

			<?php logic_notice(); ?>
			<?php content_support(); ?>

		<?php endif; ?>
		<div class="clear"></div>
	</div>

	<?php if ( ! is_single() ) : ?>
		<?php entry_more(); ?>
	<?php endif; ?>
</article>

<?php be_tags(); ?>