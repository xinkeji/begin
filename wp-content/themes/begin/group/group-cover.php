<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_cat_cover' ) ) { ?>
<div class="g-row g-line group-cover" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-cat-cover-box">
			<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'category',
						'include'    => co_get_option( 'group_cat_cover_id' ),
						'hide_empty' => false,
						'orderby'    => 'id',
						'order'      => 'ASC',
					)
				);
				foreach ( $terms as $term ) {
			?>
			
			<div class="group-cat-cover-main group-cover-f<?php echo co_get_option( 'group_cover_f' ); ?>">
				<div class="group-cat-cover">
					<div class="group-cat-cover-img sup<?php if ( co_get_option( 'group_cover_gray' ) ) { ?> img-gray<?php } ?>" <?php aos_b(); ?>>
						<a rel="external nofollow" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
							<?php if ( zm_get_option( 'lazy_s' ) ) { ?>
								<span class="load"><img src="<?php echo get_template_directory_uri(); ?>/img/loading.png" alt="<?php echo $term->name; ?>" data-original="<?php echo cat_cover_url( $term->term_id ); ?>"></span>
							<?php } else { ?>
								<img src="<?php echo cat_cover_url( $term->term_id ); ?>" alt="<?php echo $term->name; ?>">
							<?php } ?>
						</a>
						<?php if ( co_get_option( 'group_cover_title' ) ) { ?><h4 class="group-cat-cover-title"><?php echo $term->name; ?></h4><?php } ?>
					</div>
				</div>

			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php be_help( $text = '公司主页 → 分类封面' ); ?>
	</div>
</div>
<?php } ?>