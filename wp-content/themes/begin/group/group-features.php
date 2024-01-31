<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( co_get_option( 'group_features' ) ) { ?>
<div class="g-row g-line group-features-line">
	<div class="g-col">
		<div class="group-features">
			<div class="group-title" <?php aos_b(); ?>>
				<?php if ( ! co_get_option( 'features_t') == '' ) { ?>
					<h3><?php echo co_get_option( 'features_t' ); ?></h3>
				<?php } ?>
				<?php if ( ! co_get_option( 'features_des' ) == '' ) { ?>
					<div class="group-des"><?php echo co_get_option( 'features_des' ); ?></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="section-box">
				<?php
					$features = get_posts( array(
						'posts_per_page' => co_get_option( 'features_n' ),
						'category__and'  => co_get_option( 'features_id' ),
					) );
				?>
				<?php foreach ( $features as $post ) : setup_postdata( $post ); ?>
					<div class="g4 g<?php echo co_get_option( 'group_features_f' ); ?>">
						<div class="box-4">
							<figure class="section-thumbnail" <?php aos_b(); ?>>
								<?php echo tao_thumbnail(); ?>
							</figure>
							<?php the_title( sprintf( '<h2 class="g4-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				<div class="clear"></div>
				<?php if ( ! co_get_option( 'features_url' ) == '' ) { ?>
					<div class="group-post-more">
						<a href="<?php echo co_get_option( 'features_url' ); ?>" title="<?php _e( '更多', 'begin' ); ?>" rel="external nofollow"><i class="be be-more"></i></a>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php be_help( $text = '公司主页 → 简介' ); ?>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>