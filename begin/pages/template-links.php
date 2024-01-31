<?php
/*
Template Name: 友情链接
*/

if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>
<div id="content-links" class="content-area">
	<main id="main" class="be-main link-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( $post->post_content !== '' && ! zm_get_option( 'add_link' ) ) { ?>
				<article id="post-<?php the_ID(); ?>" class="post-item-list post-item post ms">
					<div class="entry-content">
						<div class="single-content">
							<?php the_content(); ?>
							<?php edit_post_link( '<i class="be be-editor"></i>', '<div class="page-edit-link edit-link">', '</div>' ); ?>
						</div>
						<div class="clear"></div>
					</div>
				</article>
			<?php } ?>

			<article class="link-page">
				<div class="link-content">
					<?php 
					if (! zm_get_option( 'links_model' ) || ( zm_get_option("links_model") == 'links_ico' ) ) {
						echo begin_get_link_items();
					}
					if ( zm_get_option( 'links_model' ) == 'links_default' ) {
						echo links_page();
					}
					?>
				</div>
			</article>

			<div class="clear"></div>

			<?php if ( zm_get_option( 'add_link' ) ) { ?>
				<article id="post-<?php the_ID(); ?>" class="post-item-list post-item post ms">
					<div class="entry-content">
						<div class="single-content">
							<div id="add-link-message"></div>
							<?php the_content(); ?>
							<div class="add-link" <?php aos_a(); ?>>
								<div class="add-link-message fd"><p class="add-link-tip fd">带星号必填！</p></div>
								<div class="clear"></div>
								<form method="post" class="add-link-form" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
									<p class="add-link-label">
										<label for="begin_name">网站名称<i>*</i></label>
										<input type="text" size="40" value="" class="form-control" id="begin_name" name="begin_name" />
									</p>
									<p class="add-link-label">
										<label for="begin_url">网站链接<i>*</i></label>
										<input type="text" size="40" value="" class="form-control" id="begin_url" name="begin_url" />
									</p>

									<p class="add-link-label">
										<label for="link_notes">QQ<i>*</i></label>
										<input type="text" size="40" value="" class="form-control" id="link_notes" name="link_notes" />
									</p>

									<p class="add-link-label">
										<label for="begin_description">网站描述<i>*</i></label>
										<textarea id="begin_description" class="form-control" name="begin_description" rows="4"></textarea>
									</p>
									<p class="add-link-label">
										<input type="hidden" value="send" name="begin_form" />
										<button type="submit" class="add-link-btn">提交申请</button>
									</p>
								</form>
								<div class="add-link-loading">提交中，请稍候...</div>
							</div>
							<?php edit_post_link('<i class="be be-editor"></i>', '<div class="page-edit-link edit-link">', '</div>' ); ?>
						</div>
						<div class="clear"></div>
					</div>
				</article>
			<?php } ?>

		<?php endwhile; ?>

		<div class="clear"></div>

		<?php if ( comments_open() || get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>

	</main>
</div>
<?php get_footer(); ?>