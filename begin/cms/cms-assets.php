<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( be_get_option( 'cms_assets' ) ) { ?>
<div class="betip cms-assets-<?php echo be_get_option( 'cms_assets_f' ); ?>">
	<?php if ( ! be_get_option( 'cms_assets_get' ) || ( be_get_option( "cms_assets_get" ) == 'cat' ) ) { ?>
		<?php $cmscatlist = explode( ',',be_get_option( 'cms_assets_id' ) ); foreach ( $cmscatlist as $category ) {
			$cat = ( be_get_option( 'no_cat_child' ) ) ? 'category' : 'category__in';
		?>
			<div class="flexbox-grid">
				<h3 class="cms-picture-cat-title"><a href="<?php echo get_category_link( $category ); ?>"><?php echo get_cat_name( $category ); ?></a></h3>
				<?php
					$img = get_posts( array(
						'posts_per_page' => be_get_option( 'cms_assets_n' ),
						'post_status'    => 'publish',
						$cat             => $category, 
						'orderby'        => 'date',
						'order'          => 'DESC', 
					) );

					foreach ( $img as $post ) : setup_postdata( $post );
					require get_template_directory() . '/template/assets.php';
					endforeach;
					wp_reset_postdata();
				?>
				<div class="clear"></div>
			</div>
		<?php } ?>
	<?php } ?>

	<?php if ( be_get_option( 'cms_assets_get' ) == 'post' ) { ?>
		<?php
			$args = array(
				'post__in'  => explode( ',', be_get_option( 'cms_assets_post_id' ) ),
				'orderby'   => 'post__in', 
				'order'     => 'DESC',
				'ignore_sticky_posts' => true,
				);
			$query = new WP_Query( $args );
		?>
		<div class="flexbox-grid">
			<?php
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
					require get_template_directory() . '/template/assets.php';
				endwhile;
				else :
					echo '<div class="be-none">首页设置 → 杂志布局 → 会员商品，输入文章ID</div>';
				endif;
				wp_reset_postdata();
			?>
			<div class="clear"></div>
		</div>
	<?php } ?>
	<?php be_help( $text = '首页设置 → 杂志布局 → 会员商品' ); ?>
</div>
<?php } ?>