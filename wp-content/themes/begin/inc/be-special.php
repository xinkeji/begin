<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 专题专栏
function page_special() {
	global $post; 
?>
<?php if ( be_get_option( 'blog_special_id' ) ) { ?>
	<div class="cat-cover-box<?php if ( be_get_option( 'special_slider' ) ) { ?> cat-cover-slider<?php } ?>">
		<div class="special-main <?php if ( be_get_option( 'special_slider' ) ) { ?> special-slider owl-carousel<?php } ?>">
			<?php $posts = get_posts( array( 'post_type' => 'any', 'orderby' => 'menu_order', 'include' => be_get_option('blog_special_id'), 'ignore_sticky_posts' => 1 ) ); if ($posts) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
				<div class="grid-cat-<?php echo be_get_option( 'special_f' ); ?><?php if ( ! be_get_option( 'special_slider' ) ) { ?> cover4x<?php } ?>">
					<div class="cat-cover-main ms" <?php aos_a(); ?>>
						<div class="cat-cover-img thumbs-b lazy">
							<?php $image = get_post_meta( get_the_ID(), 'thumbnail', true ); ?>
								<?php if ( zm_get_option( 'lazy_s' ) ) { ?>
									<a class="thumbs-back" href="<?php echo get_permalink(); ?>" rel="bookmark" data-src="<?php echo $image; ?>">
								<?php } else { ?>
									<a class="thumbs-back" href="<?php echo get_permalink(); ?>" rel="bookmark" style="background-image: url(<?php echo $image; ?>);">
								<?php } ?>
								<div class="special-mark bz fd"><?php _e( '专题', 'begin' ); ?></div>
								<div class="cover-des-box">
									<?php
										$special = get_post_meta( get_the_ID(), 'special', true );
										if ( get_post_meta( get_the_ID(), 'special', true ) ) {
											echo '<div class="special-count fd">';
											if ( get_tag_post_count( $special ) > 0 ) {
												echo get_tag_post_count( $special );
												echo _e( '篇', 'begin' );
											} else {
												echo _e( '未添加文章', 'begin' );
											}
											echo '</div>';
										}
									?>
									<div class="cover-des">
										<div class="cover-des-main over">
											<?php
											$description = get_post_meta( get_the_ID(), 'description', true );
											if ( get_post_meta( get_the_ID(), 'description', true ) ) { ?>
												<?php echo $description; ?>
											<?php } else { ?>
												<?php the_title(); ?>
											<?php } ?>
										</div>
									</div>
								</div>
							</a>
							<h4 class="cat-cover-title"><?php the_title(); ?></h4>
						</div>
					</div>
				</div>
			<?php endforeach; endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		<?php be_help( $text = '首页设置 → 专栏专题' ); ?>
		<div class="clear"></div>
	</div>
<?php } ?>

<?php if ( be_get_option( 'code_special_id' ) ) { ?>
	<div class="cat-cover-box<?php if ( be_get_option( 'special_slider' ) ) { ?> cat-cover-slider<?php } ?>">
		<?php
			$special = array(
				'taxonomy'      => 'special',
				'show_count'    => 1,
				'include'       => be_get_option( 'code_special_id' ),
				'orderby'       => 'menu_order',
				'order'         => 'ASC',
				'hide_empty'    => 0,
				'hierarchical'  => 0
			);
			$cats = get_categories( $special );
		?>
		<div class="special-main <?php if ( be_get_option( 'special_slider' ) ) { ?> special-slider owl-carousel<?php } ?>">
			<?php foreach( $cats as $cat ) : ?>
				<div class="grid-cat-<?php echo be_get_option( 'special_f' ); ?><?php if ( ! be_get_option( 'special_slider' ) ) { ?> cover4x<?php } ?>">
					<div class="cat-cover-main ms" <?php aos_a(); ?>>
						<div class="cat-cover-img thumbs-b lazy">
								<?php if ( zm_get_option( 'lazy_s' ) ) { ?>
									<a class="thumbs-back" href="<?php echo get_category_link( $cat->term_id ) ?>" rel="bookmark" data-src="<?php echo cat_cover_url( $cat->term_id ); ?>">
								<?php } else { ?>
									<a class="thumbs-back" href="<?php echo get_category_link( $cat->term_id ) ?>" rel="bookmark" style="background-image: url(<?php echo cat_cover_url( $cat->term_id ); ?>);">
								<?php } ?>
								<div class="special-mark bz fd"><?php _e( '专题', 'begin' ); ?></div>
								<div class="cover-des-box">
									<div class="special-count fd"><?php echo $cat->count; ?><?php _e( '篇', 'begin' ); ?></div>
									<div class="cover-des">
										<div class="cover-des-main over">
											<?php echo term_description( $cat->term_id ); ?>
										</div>
									</div>
								</div>
							</a>
							<h4 class="cat-cover-title"><?php echo $cat->name; ?></h4>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php be_help( $text = '首页设置 → 专栏专题' ); ?>
		<div class="clear"></div>
	</div>
<?php } ?>
<?php }

// 专题专栏列表
function page_special_list() {
	global $post;
?>
<?php if ( be_get_option( 'blog_special_list_id' ) ) { ?>
	<div class="cat-cover-box">
		<?php $posts = get_posts( array( 'post_type' => 'any', 'orderby' => 'menu_order', 'include' => be_get_option('blog_special_list_id'), 'ignore_sticky_posts' => 1 ) ); if ($posts) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
		<div class="special-grid-box" <?php aos_a(); ?>>
			<div class="special-grid-item ms">
				<div class="special-list-img">
					<div class="thumbs-special lazy">
						<?php if ( zm_get_option( 'lazy_s' ) ) { ?>
							<a class="thumbs-back sc" href="<?php echo get_permalink(); ?>" rel="bookmark" data-src="<?php echo get_post_meta( get_the_ID(), 'thumbnail', true ); ?>"></a>
						<?php } else { ?>
							<a class="thumbs-back sc" href="<?php echo get_permalink(); ?>" rel="bookmark" style="background-image: url(<?php echo get_post_meta( get_the_ID(), 'thumbnail', true ); ?>);"></a>
						<?php } ?>
					</div>

					<div class="special-mark bz"><?php _e( '专题', 'begin' ); ?></div>
					<?php
						$special = get_post_meta( get_the_ID(), 'special', true );
						if ( get_post_meta( get_the_ID(), 'special', true ) ) {
							echo '<div class="special-grid-count">';
							if ( get_tag_post_count( $special ) > 0 ) {
								echo get_tag_post_count( $special );
								echo _e( '篇', 'begin' );
							} else {
								echo _e( '未添加文章', 'begin' );
							}
							echo '</div>';
						}
					?>
				</div>

				<div class="special-list-box">
					<h4 class="special-name"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
					<div class="special-list">
						<?php
							$special = get_post_meta( get_the_ID(), 'special', true );
							$args = array(
								'tag'       => $special,
								'showposts' => 3,
								'orderby'   => 'date',
								'order'     => 'DESC',
								'post_type' => 'any',
								'ignore_sticky_posts' => 1
							);
							$the_query = new WP_Query( $args );
						?>

						<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php the_title( sprintf( '<div class="special-list-title' . date_class() . '"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></div>' ); ?>
						<?php endwhile; endif; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
		<?php wp_reset_query(); ?>
		<?php be_help( $text = '首页设置 → 专栏专题 → 专题列表' ); ?>
		<div class="clear"></div>
	</div>
<?php } ?>

<?php if ( be_get_option( 'code_special_list_id' ) ) { ?>
	<div class="cat-cover-box">
		<?php
			$special = array(
				'taxonomy'      => 'special',
				'show_count'    => 1,
				'include'       => be_get_option( 'code_special_list_id' ),
				'orderby'       => 'menu_order',
				'order'         => 'ASC',
				'hide_empty'    => 0,
				'hierarchical'  => 0
			);
			$cats = get_categories( $special );
		?>

		<?php foreach( $cats as $cat ) : ?>

			<div class="special-grid-box" <?php aos_a(); ?>>
				<div class="special-grid-item ms">
					<div class="special-list-img">
						<div class="thumbs-special lazy">
							<?php if ( zm_get_option( 'lazy_s' ) ) { ?>
								<a class="thumbs-back sc" href="<?php echo get_category_link( $cat->term_id ) ?>" rel="bookmark" data-src="<?php echo cat_cover_url( $cat->term_id ); ?>"></a>
							<?php } else { ?>
								<a class="thumbs-back sc" href="<?php echo get_category_link( $cat->term_id ) ?>" rel="bookmark" style="background-image: url(<?php echo cat_cover_url( $cat->term_id ); ?>);"></a>
							<?php } ?>
						</div>

						<div class="special-mark bz"><?php _e( '专题', 'begin' ); ?></div>
						<div class="special-grid-count"><?php echo $cat->count; ?><?php _e( '篇', 'begin' ); ?></div>
					</div>

					<div class="special-list-box">
						<h4 class="special-name"><a href="<?php echo get_category_link( $cat->term_id ) ?>" rel="bookmark"><?php echo $cat->name; ?></a></h4>
						<div class="special-list">
							<?php
								$args = array(
									'post_type' => 'post',
									'showposts' => 3,
									'tax_query' => array(
										array(
											'taxonomy' => 'special',
											'field' => 'id',
											'terms' => $cat->term_id,
										),
									)
								);
								$querys = new WP_Query($args);
							?>

							<?php while($querys->have_posts()) :  $querys->the_post(); ?>
								<?php the_title( sprintf( '<h2 class="special-list-title' . date_class() . '"><a class="srm" href="%s" rel="bookmark">' . t_mark(), esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			<?php be_help( $text = '首页设置 → 专栏专题 → 专题列表' ); ?>
		<div class="clear"></div>
	</div>
<?php } ?>
<?php }

// special_single_content
function special_single_content() {
	global $wpdb, $post;
?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( is_single() ) : ?>
		<article id="post-<?php the_ID(); ?>" class="post-item-list post">
		<?php else : ?>
		<article id="post-<?php the_ID(); ?>" class="post-item-list post" <?php aos_a(); ?>>
		<?php endif; ?>

			<header class="entry-header">
				<?php if ( get_post_meta(get_the_ID(), 'header_img', true) || get_post_meta(get_the_ID(), 'header_bg', true) ) { ?>
					<div class="entry-title-clear"></div>
				<?php } else { ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php } ?>

			</header>

			<div class="entry-content entry-content-zt">
				<div class="single-content">
					<?php the_content(); ?>
				</div>
				<div class="clear"></div>
			</div>
			<footer class="page-meta-zt">
				<?php begin_page_meta_zt(); ?>
			</footer>
			<div class="clear"></div>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
<?php }