<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( !is_search() && is_archive() ) { ?>
	<?php if ( zm_get_option( 'child_cat' ) ) { ?>
		<?php if ( is_category() && !is_category( explode(',',zm_get_option( 'child_cat_no' ) ) ) ) { ?>
			<?php
				global $cat;
				$cat_term_id = get_category( $cat )->term_id;
				$cat_taxonomy = get_category( $cat )->taxonomy;
			?>
			<?php if ( sizeof( get_term_children( $cat_term_id, $cat_taxonomy ) ) == 0 ) { ?>
				<?php
					$cat_term_id = get_category_id( $cat );
					$cat_taxonomy = get_category( $cat )->taxonomy;
				?>
				<?php if ( sizeof ( get_term_children( $cat_term_id, $cat_taxonomy ) ) != 0 ) { ?>
					<div class="header-sub">
						<ul class="child-cat child-cat-<?php echo zm_get_option( 'child_cat_f' ); ?>" <?php aos_a(); ?>>
							<?php
								if ( zm_get_option( 'child_cat_exclude' ) ) {
									$exclude = array( $cat );
								} else {
									$exclude = '';
								}
								$term = get_queried_object();
								$sibcat = get_terms( $term->taxonomy, array(
									'parent'     => $term->parent,
									'exclude'    => $exclude,
									'hide_empty' => false,
								) );

								if ( $sibcat ) {
									foreach( $sibcat as $sibcat ) {
										echo '<li class="child-cat-item"><a class="ms" href="' . esc_url( get_term_link( $sibcat, $sibcat->taxonomy ) ) . '">' . $sibcat->name . '</a></li>';
									}
								}
							?>
							<ul class="clear"></ul>
						</ul>
					</div>
				<?php } ?>
			<?php } else { ?>
				<?php
					global $cat;
					$father_id = get_category( $cat )->term_id;
					$cat_taxonomy = get_category( $cat )->taxonomy;
				?>
				<?php if ( sizeof ( get_term_children( $father_id, $cat_taxonomy ) ) != 0 ) { ?>
					<div class="header-sub">
						<ul class="child-cat child-cat-<?php echo zm_get_option( 'child_cat_f' ); ?>" <?php aos_a(); ?>>
							<?php
								$term = get_queried_object();
								$children = get_terms( $term->taxonomy, array(
									'parent'    => $term->term_id,
									'hide_empty' => false
								) );
								if ( $children ) {
									foreach( $children as $subcat ) {
										echo '<li class="child-cat-item"><a class="ms" href="' . esc_url( get_term_link( $subcat, $subcat->taxonomy ) ) . '">' . $subcat->name . '</a></li>';
									}
								}
							?>
							<ul class="clear"></ul>
						</ul>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>

	<?php if ( is_author() ) : ?>
		<?php
			global $wpdb;
			$author_id = get_the_author_meta( 'ID' );
			$comment_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments  WHERE comment_approved='1' AND user_id = '$author_id' AND comment_type not in ('trackback','pingback')" );
		?>
		<div class="header-sub">
			<div class="cat-des ms" <?php aos_a(); ?>>
				<div class="cat-des-img author-es-img<?php if ( zm_get_option( 'cat_des_img_zoom' ) ) { ?> cat-des-img-zoom<?php } ?>">
					<img src="<?php if ( get_the_author_meta( 'userimg') ) { ?><?php echo the_author_meta( 'userimg' ); ?><?php } else { ?><?php echo zm_get_option( 'header_author_img' ); ?><?php } ?>" alt="<?php the_author(); ?>">
				</div>
				<div class="header-author">
					
					<div class="header-author-inf fadeInUp animated">
						<div class="header-avatar load">
							<?php if ( zm_get_option( 'cache_avatar' ) ) { ?>
								<?php echo begin_avatar( get_the_author_meta( 'user_email' ), '96', '', get_the_author() ); ?>
							<?php } else { ?>
								<?php be_avatar_author(); ?>
							<?php } ?>
						</div>
						<div class="header-user-author">
							<h1 class="des-t"><?php the_author(); ?></h1>
							<?php if ( get_the_author_meta( 'description' ) ) { ?>
								<p class="header-user-des"><?php the_author_meta( 'user_description' ); ?></p>
							<?php } else { ?>
								<p class="header-user-des">暂无个人说明</p>
							<?php } ?>
						</div>
					</div>
				</div>
				<p class="header-user-inf ease">
					<span><i class="be be-editor"></i><?php the_author_posts(); ?></span>
					<span><i class="be be-speechbubble"></i><?php echo $comment_count;?></span>
					<?php if ( zm_get_option( 'post_views' ) ) { ?><span><i class="be be-eye"></i><?php author_posts_views( get_the_author_meta( 'ID' ) );?></span><?php } ?>
					<?php if ( zm_get_option( 'post_views' ) ) { ?><span><i class="be be-thumbs-up-o"></i><?php like_posts_views( get_the_author_meta( 'ID' ) );?></span><?php } ?>
				</p>
			</div>
		</div>
	<?php endif; ?>

<?php } ?>

<?php if ( zm_get_option( 'h_widget_m' ) !== 'all_m' ) { ?>
<?php top_widget(); ?>
<?php } ?>

<?php if ( zm_get_option( 'filters' ) && is_category( explode( ',',zm_get_option( 'filters_cat_id' ) ) ) && !is_singular() && !is_home() && !is_author() && !is_search() && !is_tag() ) { ?>
<div class="header-sub">
	<?php get_template_part( '/inc/filter' ); ?>
	<?php be_help( $text = '主题选项 → 辅助功能 → 多条件筛选' ); ?>
</div>
<?php } ?>

<?php if ( is_single() && be_get_option( 'single_cover' ) ) { ?>
<div class="header-sub single-cover">
	<?php cat_cover(); ?>
	<?php be_help( $text = '首页设置 → 分类封面 → 同时显示在正文页面顶部' ); ?>
</div>
<?php } ?>

<?php if ( zm_get_option( 'subjoin_menu' ) ) { ?>
<?php if ( ! get_post_meta( get_the_ID(), 'header_bg', true ) && ( ! get_post_meta( get_the_ID(), 'header_img', true ) ) ) { ?>
<nav class="submenu-nav header-sub">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'submenu',
			'menu_class'     => 'submenu',
			'fallback_cb'    => 'assign'
		) );
	?>
	<div class="clear"></div>
</nav>
<?php } ?>
<?php } ?>