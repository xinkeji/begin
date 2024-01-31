<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'video_box' ) ) { ?>
<?php if ( be_get_option( 'video') ) { ?>
	<div class="line-four line-four-video-item betip">
		<?php
			$args = array(
				'post_type' => 'video',
				'showposts' => be_get_option( 'video_n' ), 
			);

			if ( be_get_option( 'video_id' ) ) {
				$args = array(
					'showposts' => be_get_option( 'video_n' ), 
					'tax_query' => array(
						array(
							'taxonomy' => 'videos',
							'terms' => explode(',', be_get_option( 'video_id' ) )
						),
					)
				);
			}
		?>
		<?php $be_query = new WP_Query( $args ); while ( $be_query->have_posts() ) : $be_query->the_post(); ?>
		<div class="xl4 xm4" <?php aos_a(); ?>>
			<div class="picture-cms ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
				<figure class="picture-cms-img">
					<?php echo videos_thumbnail(); ?>
					<a rel="external nofollow" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a>
				</figure>
				<?php the_title( sprintf( '<h2 class="picture-cms-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</div>
		</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php be_help( $text = '首页设置 → 杂志布局 → 视频模块' ); ?>
		<div class="clear"></div>
	</div>
<?php } ?>

<?php if ( be_get_option( 'video_post' ) ) { ?>
<div class="line-four line-four-video-item sort betip" name="<?php echo be_get_option( 'video_s' ); ?>">
	<?php
		$args = array(
			'post_type' => 'post',
			'showposts' => be_get_option('video_n'), 
		);

		if ( be_get_option( 'video_post_id' ) ) {
			$args = array(
				'showposts' => be_get_option('video_n' ), 
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'terms' => explode(',', be_get_option( 'video_post_id' ) )
					),
				)
			);
		}
	?>
	<?php $be_query = new WP_Query( $args ); while ( $be_query->have_posts() ) : $be_query->the_post(); ?>
	<div class="xl4 xm4" <?php aos_a(); ?>>
		<div class="picture-cms ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
			<figure class="picture-cms-img">
				<?php echo zm_thumbnail(); ?>
				<a rel="external nofollow" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a>
			</figure>
			<?php the_title( sprintf( '<h2 class="picture-cms-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 视频模块' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>
<?php } ?>