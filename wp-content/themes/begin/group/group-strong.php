<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (co_get_option('group_strong')) { ?>
<div class="g-row g-line group-strong-line" <?php aos(); ?>>
	<div class="g-col">
		<div class="group-strong-box">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option('group_strong_t') == '' ) { ?>
					<h3><?php echo co_get_option('group_strong_t'); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option('group_strong_des') == '' ) { ?>
					<div class="group-des"><?php echo co_get_option('group_strong_des'); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>

			<div class="group-strong-content single-content sanitize" <?php aos_f(); ?>>
				<div class="text-back be-text"><?php echo wpautop( co_get_option( 'group_strong_inf' ) ); ?></div>
			</div>

			<div class="group-strong-slider owl-carousel slider-strong">
				<?php 
					$posts = get_posts(
						array(
							'post_type' => 'any',
							'orderby'   => 'post__in', 
							'order'     => 'DESC',
							'post__in'  => explode( ',', co_get_option( 'group_strong_id' ) ),
						)
					);
					if ( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
				?>

				<?php 
				if ( co_get_option( 'group_carousel_c' ) ) {
					$title = ' group-strong-title';
				} else {
					$title = '';
				}
				?>

				<div class="strong-strong-post" <?php aos_f(); ?>>
					<div class="strong-thumbnail"><?php echo zm_thumbnail_scrolling(); ?></div>
					<div class="clear"></div>
					<?php 
					if ( co_get_option( 'group_strong_title_c' ) ) {
						$title = ' group-strong-title-c';
					} else {
						$title = '';
					}
					the_title( sprintf( '<h2 class="group-strong-title over' . $title . '"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<div class="clear"></div>
				</div>
				<?php endforeach; endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 咨询' ); ?>
	</div>
</div>
<?php } ?>