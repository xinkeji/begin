<?php
/*
* Template Name: 读者排行
* Description：留言者排行
*/
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<?php get_header(); ?>
<style type="text/css">
#primary {
	width: 100%;
	overflow: hidden;
}

.top-comments {
	margin: 0 -6px 10px -6px;
}

.top-comments img {
	float: left;
	width: 100%;
	height: auto;
	max-width: 100%;
	padding: 10px 25px;
	border-radius: 50%;
}

.top-author {
	background: var(--be-bg-white);
	margin: 5px;
	padding: 0 5px 5px 5px;
	overflow: hidden;
	border-radius: 8px;
	box-shadow: 0 0 0 1px var(--be-shadow);
}

.top-comment {
	color: #999;
	text-align: center;
}

.author-url {
	width: 100%;
	padding: 0 5px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}

.comment-authors {
	padding: 0 10px;
}
</style>

<div id="primary" class="content-area">
	<main id="main" class="be-main site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="comment-authors">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		<?php top_comment_authors(98); ?>
		<div class="clear"></div>
		<?php edit_post_link('<i class="be be-editor"></i>', '<div class="page-edit-link edit-link">', '</div>' ); ?>
		<div class="clear"></div>
	</main>
</div>

<?php get_footer(); ?>