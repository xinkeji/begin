<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 博客布局
function blog_template() { ?>
<div id="primary" class="content-area common">
	<main id="main" class="site-main<?php if ( ! be_get_option( 'blog_ajax' ) ) { ?> be-main<?php } ?><?php if (zm_get_option('post_no_margin')) { ?> domargin<?php } ?>" role="main">
		<?php if ( be_get_option( 'slider' ) ) { ?>
			<?php
				global $wpdb, $post;
				if ( !is_paged() ) :
					require get_template_directory() . '/template/slider.php';
				endif;
			?>
		<?php } ?>

		<?php if ( be_get_option( 'blog_top' ) ) { ?>
			<?php
				if ( !is_paged() ) :
					get_template_part( 'template/b-top' );
				endif;
			?>
		<?php } ?>

		<?php
			if ( be_get_option( 'blog_special' ) ) {
				if ( !is_paged() ) :
					page_special();
				endif;
			}
		?>

		<?php
			if ( be_get_option( 'blog_special_list' ) ) {
				if ( !is_paged() ) :
					page_special_list();
				endif;
			}
		?>

		<?php 
			if ( be_get_option( 'blog_cat_cover' ) ) {
				if ( !is_paged() ) :
					echo '<div class="blog-cover betip">';
						cat_cover();
						be_help( $text = '首页设置 → 博客布局 → 其它模块 → 分类封面' );
					echo '</div>';
				endif;
			}
		?>
<?php }

// 图片布局
function grid_template_a() { ?>
	<?php if ( be_get_option( 'slider' ) ) { ?>
		<?php
			global $wpdb, $post;
			if ( !is_paged() ) :
				require get_template_directory() . '/template/slider.php';
			endif;
		?>
	<?php } ?>

	<?php 
		if ( be_get_option( 'img_cat_cover' ) ) {
			if ( !is_paged() ) :
				echo '<div class="grid-cover betip">';
					cat_cover();
					be_help( $text = '首页设置 → 图片布局 → 其它模块 → 分类封面' );
				echo '</div>';
			endif;
		}
	?>

	<?php if ( be_get_option( 'img_top' ) ) { ?>
		<?php
			if ( !is_paged() ) :
				get_template_part( 'template/img-top' );
			endif;
		?>
	<?php } ?>

	<?php
		if ( be_get_option( 'img_special' ) ) {
			if ( !is_paged() ) :
				page_special();
			endif;
		}
	?>

<?php }
function grid_template_b() { ?>
	<?php grid_template_a(); ?>
	<section id="picture" class="picture-area content-area grid-cat-<?php echo be_get_option('img_f'); ?>">
		<main id="main" class="be-main site-main" role="main">
<?php }

function grid_template_c() { ?>
<?php grid_template_d(); ?>
</main>
<?php begin_pagenav(); ?>
<div class="clear"></div>
</section>
<?php }

function grid_template_d() { ?>
<?php global $wpdb, $post; ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="post-item-list post ajax-grid-img scl" <?php aos_a(); ?>>
	<div class="picture-box sup ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
		<figure class="picture-img">
			<?php echo be_img_excerpt(); ?>
			<?php if ( get_post_meta(get_the_ID(), 'direct', true) ) { ?>
				<?php $direct = get_post_meta(get_the_ID(), 'direct', true); ?>
				<?php echo zm_thumbnail_link(); ?>
			<?php } else { ?>
				<?php echo zm_grid_thumbnail(); ?>
			<?php } ?>

			<?php if ( has_post_format('video') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a></div><?php } ?>
			<?php if ( has_post_format('quote') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-display"></i></a></div><?php } ?>
			<?php if ( has_post_format('image') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-picture"></i></a></div><?php } ?>
		</figure>
		<?php the_title( sprintf( '<h2 class="grid-title over"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<span class="grid-inf">
			<?php if ( has_post_format('link') ) { ?>
				<?php if ( get_post_meta(get_the_ID(), 'link_inf', true) ) { ?>
					<span class="link-inf"><?php $link_inf = get_post_meta(get_the_ID(), 'link_inf', true);{ echo $link_inf;}?></span>
				<?php } else { ?>
					<span class="g-cat"><?php zm_category(); ?></span>
				<?php } ?>
			<?php } else { ?>
				<?php if (zm_get_option('meta_author')) { ?><span class="grid-author"><?php grid_author_inf(); ?></span><?php } ?>
				<span class="g-cat"><?php zm_category(); ?></span>
			<?php } ?>
			<span class="grid-inf-l">
				<?php echo be_vip_meta(); ?>
				<?php if ( !has_post_format('link') ) { ?><?php grid_meta(); ?><?php } ?>
				<?php views_span(); ?>
				<?php if ( get_post_meta(get_the_ID(), 'zm_like', true) ) : ?><span class="grid-like"><span class="be be-thumbs-up-o">&nbsp;<?php zm_get_current_count(); ?></span></span><?php endif; ?>
			</span>
		</span>
		<div class="clear"></div>
	</div>
</article>
<?php endwhile;?>
<?php }

// 分类图片
function grid_cat_template() { ?>
<?php if ( be_get_option( 'grid_cat_slider' ) ) { ?>
	<?php
		global $post;
		require get_template_directory() . '/template/slider.php';
	?>
<?php } ?>

<section id="grid-cat" class="grid-cat-content content-area">
	<main id="main" class="be-main site-main" role="main">
		<?php 
			global $wpdb, $post; $do_not_duplicate[] = '';
			if ( be_get_option( 'catimg_cat_cover' ) ) {
					echo '<div class="catimg-cover betip">';
					cat_cover();
					be_help( $text = '首页设置 → 分类图片 → 其它模块 → 分类封面' );
					echo '</div>';
			}
			if ( be_get_option( 'catimg_top' ) ) {
				require get_template_directory() . '/grid/grid-top.php';
			}
			require get_template_directory() . '/grid/grid-cat-new.php';
			if ( zm_get_option( 'filters' ) && be_get_option( 'catimg_filter' ) ) {
				get_template_part( '/inc/filter-general' );
			}
			if ( be_get_option( 'catimg_special' ) ) {
				page_special();
			}
			if ( be_get_option( 'imgcat_items_a' ) ) {
				echo be_catimg_items_a();
			}
			get_template_part( '/grid/grid-widget-one' );
			require get_template_directory() . '/grid/grid-cat-carousel.php';
			if ( be_get_option( 'imgcat_items_b' ) ) {
				echo be_catimg_items_b();
			}
			get_template_part( '/grid/grid-widget-two' );
			if ( be_get_option( 'catimg_special_list' ) ) {
				echo '<div class="catimg-cover-box">';
					page_special_list();
				echo '</div>';
			}

			if ( be_get_option( 'catimg_ajax_cat' ) ) {
				echo '<div class="catimg-ajax-cat-post betip">';
				echo do_shortcode( be_get_option( 'catimg_ajax_cat_post_code' ) );
				be_help( $text = '首页设置 → 分类图片 → Ajax分类短代码' );
				echo '</div>';
			}
			if ( be_get_option( 'imgcat_items_c' ) ) {
				echo be_catimg_items_c();
			}
		 ?>
	</main>
</section>
<?php }

// grid new
function grid_new() { ?>
<?php global $wpdb, $post; ?>
	<article id="post-<?php the_ID(); ?>" class="post-item-list post gn aos-animate" <?php aos_a(); ?>>
		<div class="grid-cat-bx4 grid-cat-new sup ms<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
			<figure class="picture-img">
				<?php if ( get_post_meta(get_the_ID(), 'direct', true) ) { ?>
					<?php echo zm_thumbnail_link(); ?>
				<?php } else { ?>
					<?php echo zm_thumbnail(); ?>
				<?php } ?>
				<?php if ( has_post_format('video') ) { ?><div class="play-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a></div><?php } ?>
				<?php if ( has_post_format('quote') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-display"></i></a></div><?php } ?>
				<?php if ( has_post_format('image') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-picture"></i></a></div><?php } ?>
				<?php if ( has_post_format('link') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-link"></i></a></div><?php } ?>
			</figure>

			<?php if ( get_post_meta(get_the_ID(), 'direct', true) ) { ?>
				<?php $direct = get_post_meta(get_the_ID(), 'direct', true); ?>
				<h2 class="grid-title"><a href="<?php echo $direct ?>" target="_blank" rel="external nofollow"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<?php the_title( sprintf( '<h2 class="grid-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php } ?>

			<span class="grid-inf">
				<?php if ( get_post_meta(get_the_ID(), 'link_inf', true) ) { ?>
					<span class="link-inf"><?php $link_inf = get_post_meta(get_the_ID(), 'link_inf', true);{ echo $link_inf;}?></span>
					<span class="grid-inf-l">
					<?php if ( !get_post_meta(get_the_ID(), 'direct', true) ) { ?><span class="g-cat"><?php zm_category(); ?></span><?php } ?>
					<?php echo t_mark(); ?>
					</span>
				<?php } else { ?>
					<?php if (zm_get_option('meta_author')) { ?><span class="grid-author"><?php grid_author_inf(); ?></span><?php } ?>
					<?php if ( !get_post_meta(get_the_ID(), 'direct', true) ) { ?><span class="g-cat"><?php zm_category(); ?></span><?php } ?>
					<span class="grid-inf-l">
						<?php echo be_vip_meta(); ?>
						<?php grid_meta(); ?>
						<?php if ( get_post_meta(get_the_ID(), 'zm_like', true) ) : ?><span class="grid-like"><span class="be be-thumbs-up-o">&nbsp;<?php zm_get_current_count(); ?></span></span><?php endif; ?>
						<?php echo t_mark(); ?>
					</span>
				<?php } ?>
			</span>
			<div class="clear"></div>
		</div>
	</article>
<?php }

// 杂志布局
function cms_template() { ?>
<?php 
global $wpdb, $post; $do_not_duplicate[] = '';
if ( ! be_get_option( 'slider_l' ) || ( be_get_option( 'slider_l' ) == 'slider_w' ) ) {
	require get_template_directory() . '/template/slider.php';
}

if ( be_get_option( 'cms_slider_sticky' ) ) {
	echo '<div id="primary-cms">';
}

if ( be_get_option( 'cms_no_s' ) ) {
	echo '<div id="primary" class="content-area">';
} else {
	echo '<div id="cms-primary" class="content-area">';
 }
echo '<main id="main" class="site-main" role="main">';
if ( be_get_option( 'slider_l' ) == 'slider_n' ) {
	require get_template_directory() . '/template/slider.php';
}

$cmsorder_a = array(
	'cms_order_a' => array(
		'sort1'  => be_get_option( 'cms_top_s' ),
		'sort2'  => be_get_option( 'cms_special_s' ),
		'sort3'  => be_get_option( 'cms_special_list_s' ),
		'sort4'  => be_get_option( 'cms_cover_s' ),
		'sort5'  => be_get_option( 'cms_two_menu_s' ),
		'sort6'  => be_get_option( 'news_s' ),
		'sort7'  => be_get_option( 'cms_new_code_s' ),
		'sort8'  => be_get_option( 'cms_cat_novel_s' ),
		'sort9'  => be_get_option( 'cms_ajax_item_a_s' ),
		'sort10' => be_get_option( 'cms_filter_s' ),
		'sort11' => be_get_option( 'cms_cat_tab_s' ),
		'sort12' => be_get_option( 'letter_show_s' ),
		'sort13' => be_get_option( 'cms_widget_one_s' ),
		'sort14' => be_get_option( 'cat_one_5_s' ),
		'sort15' => be_get_option( 'cat_one_on_img_s' ),
		'sort16' => be_get_option( 'cat_one_10_s' ),
		'sort17' => be_get_option( 'picture_s' ),
		'sort18' => be_get_option( 'cms_widget_two_s' ),
		'sort19' => be_get_option( 'cat_lead_s' ),
		'sort20' => be_get_option( 'cat_small_s' ),
		'sort21' => be_get_option( 'video_s' ),
		'sort22' => be_get_option( 'tab_h_s' ),

	),
);

extract( $cmsorder_a );
ob_start();
get_template_part( '/cms/cms-top' );
$sort1 = ob_get_clean();

ob_start();
if ( be_get_option( 'cms_special' ) ) {
	if ( !is_paged() ) :
	echo '<div class="cms-cover-box">';
		page_special();
	echo '</div>';
	endif;
}
$sort2 = ob_get_clean();

ob_start();
if ( be_get_option( 'cms_special_list' ) ) {
	if ( !is_paged() ) :
	echo '<div class="cms-cover-box">';
		page_special_list();
	echo '</div>';
	endif;
}
$sort3 = ob_get_clean();

ob_start();
get_template_part( '/cms/cat-cover' );
$sort4 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-widget-two-menu' );
$sort5 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-news.php';
$sort6 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-new-code.php';
$sort7 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-novel' );
$sort8 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-ajax-cat-a.php';
$sort9 = ob_get_clean();

ob_start();
get_template_part( '/inc/filter-home' );
$sort10 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-tab.php';
$sort11 = ob_get_clean();

ob_start();
get_template_part( '/template/letter-show' );
$sort12 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-widget-one' );
$sort13 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-one-5.php';
$sort14 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-one-no-img.php';
$sort15 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-one-10.php';
$sort16 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-picture.php';
$sort17 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-widget-two' );
$sort18 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-lead.php';
$sort19 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-small.php';
$sort20 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-video' );
$sort21 = ob_get_clean();

ob_start();
if ( be_get_option( 'cms_ajax_tabs' ) ) {
echo '<div class="betip">';
get_template_part( '/cms/cms-code-cat-tab' ); 
be_help( $text = '首页设置→杂志布局→Tab组合分类' );
echo '</div>';
}
$sort22 = ob_get_clean();

$output = array(
	'sort1'   => $sort1,
	'sort2'   => $sort2,
	'sort3'   => $sort3,
	'sort4'   => $sort4,
	'sort5'   => $sort5,
	'sort6'   => $sort6,
	'sort7'   => $sort7,
	'sort8'   => $sort8,
	'sort9'   => $sort9,
	'sort10'  => $sort10,
	'sort11'  => $sort11,
	'sort12'  => $sort12,
	'sort13'  => $sort13,
	'sort14'  => $sort14,
	'sort15'  => $sort15,
	'sort16'  => $sort16,
	'sort17'  => $sort17,
	'sort18'  => $sort18,
	'sort19'  => $sort19,
	'sort20'  => $sort20,
	'sort21'  => $sort21,
	'sort22'  => $sort22,
);

$cms_order_a = $cmsorder_a['cms_order_a'];
array_multisort( $cms_order_a, $output );
foreach ( $output as $html ) {
	echo $html;
}
echo '</main>';
echo '</div>';

if ( be_get_option( 'cms_no_s' ) ) {
	echo get_sidebar('cms'); 
} else {
	echo '<div class="clear"></div>';
}
if ( be_get_option( 'cms_slider_sticky' ) ) {
	echo '</div>';
}
echo '<div id="below-main">';
$cmsorder_b = array(
	'cms_order_b' => array(
		'rank1'  => be_get_option( 'cms_ajax_item_b_s' ),
		'rank2'  => be_get_option( 'products_on_s' ),
		'rank3'  => be_get_option( 'cms_tool_s' ),
		'rank4'  => be_get_option( 'cms_hot_s' ),
		'rank5'  => be_get_option( 'grid_ico_cms_s' ),
		'rank6'  => be_get_option( 'cat_widget_three_s' ),
		'rank7'  => be_get_option( 'cat_square_s' ),
		'rank8'  => be_get_option( 'cms_novel_cover_s' ),
		'rank9'  => be_get_option( 'cat_grid_s' ),
		'rank10' => be_get_option( 'flexisel_s' ),
		'rank11' => be_get_option( 'cat_big_s' ),
		'rank12' => be_get_option( 'cms_assets_s' ),
		'rank13' => be_get_option( 'tao_h_s' ),
		'rank14' => be_get_option( 'product_h_s' ),
		'rank15' => be_get_option( 'cat_big_not_s' ),
		'rank16' => be_get_option( 'cat_tdk_s' ),
		'rank17' => be_get_option( 'cms_ajax_cat_post_s' ),
	),
);

extract( $cmsorder_b );
ob_start();
require get_template_directory() . '/cms/cms-ajax-cat-b.php';
$rank1 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-show' );
$rank2 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-tool' );
$rank3 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-hot' );
$rank4 = ob_get_clean();

ob_start();
if ( be_get_option( 'grid_ico_cms' ) ) { grid_md_cms(); }
$rank5 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-widget-three' );
$rank6 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-square.php';
$rank7 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-novel-cover.php';
$rank8 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-grid.php';
$rank9 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-scrolling.php';
$rank10 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-big.php';
$rank11 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-assets' );
$rank12 = ob_get_clean();

ob_start();
get_template_part( '/cms/cms-tao' );
$rank13 = ob_get_clean();

ob_start();
if (function_exists( 'is_shop' )) {
	get_template_part( '/woocommerce/be-woo/cms-woo' );
}
$rank14 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-big-n.php';
$rank15 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-tdk.php';
$rank16 = ob_get_clean();

ob_start();
require get_template_directory() . '/cms/cms-cat-code.php';
$rank17 = ob_get_clean();

$output = array(
	'rank1'   => $rank1,
	'rank2'   => $rank2,
	'rank3'   => $rank3,
	'rank4'   => $rank4,
	'rank5'   => $rank5,
	'rank6'   => $rank6,
	'rank7'   => $rank7,
	'rank8'   => $rank8,
	'rank9'   => $rank9,
	'rank10'  => $rank10,
	'rank11'  => $rank11,
	'rank12'  => $rank12,
	'rank13'  => $rank13,
	'rank14'  => $rank14,
	'rank15'  => $rank15,
	'rank16'  => $rank16,
	'rank17'  => $rank17,
);

$cms_order_b = $cmsorder_b['cms_order_b'];
array_multisort( $cms_order_b, $output );
foreach ( $output as $html ) {
	echo $html;
}
echo '</div>';
?>
<?php }

// 公司布局
function group_template() { ?>
<div class="container">
<?php get_template_part( '/group/group-slider' ); ?>
<div id="group-section" class="group-section <?php if (co_get_option('g_line')) { ?>line-color<?php } else { ?>line-white<?php } ?>">
<?php 
	function group() {
	global $wpdb, $post; $do_not_cat[] = '';

	$grouporder = array(
		'group_order' => array(
			'sort1'  => co_get_option( 'group_contact_s' ),
			'sort2'  => co_get_option( 'group_explain_s' ),
			'sort3'  => co_get_option( 'group_about_s' ),
			'sort4'  => co_get_option( 'group_notice_s' ),
			'sort5'  => co_get_option( 'group_cat_cover_s' ),
			'sort6'  => co_get_option( 'dean_s' ),
			'sort7'  => co_get_option( 'foldimg_s' ),
			'sort8'  => co_get_option( 'process_s' ),
			'sort9'  => co_get_option( 'group_assist_s' ),
			'sort10' => co_get_option( 'group_strong_s' ),
			'sort11' => co_get_option( 'group_help_s' ),
			'sort12' => co_get_option( 'tool_s' ),
			'sort13' => co_get_option( 'group_products_s' ),
			'sort14' => co_get_option( 'service_s' ),
			'sort15' => co_get_option( 'g_product_s' ),
			'sort16' => co_get_option( 'group_ico_s' ),
			'sort17' => co_get_option( 'group_post_s' ),
			'sort18' => co_get_option( 'group_features_s' ),
			'sort19' => co_get_option( 'group_img_s' ),
			'sort20' => co_get_option( 'counter_s' ),
			'sort21' => co_get_option( 'coop_s' ),
			'sort22' => co_get_option( 'group_wd_s' ),
			'sort23' => co_get_option( 'group_widget_one_s' ),
			'sort24' => co_get_option( 'group_new_s' ),
			'sort25' => co_get_option( 'group_widget_three_s' ),
			'sort26' => co_get_option( 'g_tao_s' ),
			'sort27' => co_get_option( 'group_cat_a_s' ),
			'sort28' => co_get_option( 'group_widget_two_s' ),
			'sort29' => co_get_option( 'group_cat_b_s' ),
			'sort30' => co_get_option( 'group_tab_s' ),
			'sort31' => co_get_option( 'group_outlook_s' ),
			'sort32' => co_get_option( 'group_cat_c_s' ),
			'sort33' => co_get_option( 'group_carousel_s' ),
			'sort34' => co_get_option( 'group_cat_d_s' ),
			'sort35' => co_get_option( 'group_ajax_cat_post_s' ),
			'sort36' => co_get_option( 'group_assets_s' ),
		),
	);

	extract( $grouporder );
	ob_start();
	get_template_part( '/group/group-contact' );
	$sort1 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-explain' );
	$sort2 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-about' );
	$sort3 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-notice' );
	$sort4 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-cover' );
	$sort5 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-dean' );
	$sort6 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-foldimg' );
	$sort7 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-process' );
	$sort8 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-assist' );
	$sort9 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-strong.php';
	$sort10 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-help' );
	$sort11 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-tool' );
	$sort12 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-show' );
	$sort13 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-service' );
	$sort14 = ob_get_clean();

	ob_start();
	if (function_exists( 'is_shop' )) {
		get_template_part( '/woocommerce/be-woo/group-woo' );
	}
	$sort15 = ob_get_clean();

	ob_start();
	if (co_get_option('group_ico')) { grid_md_group(); }
	$sort16 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-post' );
	$sort17 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-features' );
	$sort18 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-cat-img' );
	$sort19 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-counter' );
	$sort20 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-coop' );
	$sort21 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-wd' );
	$sort22 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-widget-one' );
	$sort23 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-news.php';
	$sort24 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-widget-three' );
	$sort25 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-tao' );
	$sort26 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-cat-a.php';
	$sort27 = ob_get_clean();

	ob_start();
	get_template_part( '/group/group-widget-two' );
	$sort28 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-cat-b.php';
	$sort29 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-tab.php';
	$sort30 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-outlook.php';
	$sort31 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-cat-c.php';
	$sort32 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-carousel.php';
	$sort33 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-cat-lr.php';
	$sort34 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-cat-code.php';
	$sort35 = ob_get_clean();

	ob_start();
	require get_template_directory() . '/group/group-assets.php';
	$sort36 = ob_get_clean();

	$output = array(
		'sort1'   => $sort1,
		'sort2'   => $sort2,
		'sort3'   => $sort3,
		'sort4'   => $sort4,
		'sort5'   => $sort5,
		'sort6'   => $sort6,
		'sort7'   => $sort7,
		'sort8'   => $sort8,
		'sort9'   => $sort9,
		'sort10'  => $sort10,
		'sort11'  => $sort11,
		'sort12'  => $sort12,
		'sort13'  => $sort13,
		'sort14'  => $sort14,
		'sort15'  => $sort15,
		'sort16'  => $sort16,
		'sort17'  => $sort17,
		'sort18'  => $sort18,
		'sort19'  => $sort19,
		'sort20'  => $sort20,
		'sort21'  => $sort21,
		'sort22'  => $sort22,
		'sort23'  => $sort23,
		'sort24'  => $sort24,
		'sort25'  => $sort25,
		'sort26'  => $sort26,
		'sort27'  => $sort27,
		'sort28'  => $sort28,
		'sort29'  => $sort29,
		'sort30'  => $sort30,
		'sort31'  => $sort31,
		'sort32'  => $sort32,
		'sort33'  => $sort33,
		'sort34'  => $sort34,
		'sort35'  => $sort35,
		'sort36'  => $sort36,
	);

	$group_order = $grouporder['group_order'];
	array_multisort( $group_order, $output );
	foreach ( $output as $html ) {
		echo $html;
	}
} ?>
<?php group(); ?>
</div>
<div class="clear"></div>
</div>
<?php }

// fall
function fall_main() { ?>
<section id="post-fall" class="content-area">
	<main id="main" class="be-main fall-main post-fall" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" class="post-item-list post fall fall-off scl" <?php aos_a(); ?>>
			<div class="fall-box sup load<?php echo fill_class(); ?>"<?php echo be_img_fill(); ?>>
				<?php 
				global $post;
				$content = $post->post_content;
				preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
				$n = count($strResult[1]);
				if ( $n > 0 ) { ?>
					<figure class="fall-img">
						<?php echo zm_waterfall_img(); ?>
						<?php if ( has_post_format('video') ) { ?><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a><?php } ?>
						<?php if ( has_post_format('quote') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-display"></i></a></div><?php } ?>
						<?php if ( has_post_format('image') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-picture"></i></a></div><?php } ?>
					</figure>
					<?php the_title( sprintf( '<h2 class="fall-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php } else { ?>
					<?php the_title( sprintf( '<h2 class="fall-title fall-title-img"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<div class="archive-content-fall">
						<?php begin_trim_words(); ?>
					</div>
				<?php } ?>
				<?php if (zm_get_option('fall_inf')) { ?><?php fall_inf(); ?><?php } ?>
			 	<div class="clear"></div>
			</div>
		</article>
		<?php endwhile;?>
	</main>
	<div class="clear"></div>
</section>
<div class="other-nav"><?php begin_pagenav(); ?></div>
<?php }

// qa
function beqa_article() { ?>
<?php if (zm_get_option('post_no_margin')) { ?>
<article id="post-<?php the_ID(); ?>" class="post-item-list post ms doclose scl" <?php aos_a(); ?>>
<?php } else { ?>
<article id="post-<?php the_ID(); ?>" class="post-item-list post ms scl" <?php aos_a(); ?>>
<?php } ?>
	<?php if ( get_option( 'show_avatars' ) ) { ?>
		<?php 
			echo '<div class="qa-cat-avatar load gdz">';
			// echo '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">';
			echo '<a href="' . get_permalink() . '" rel="external nofollow">';
				if (zm_get_option( 'cache_avatar' ) ) {
				echo begin_avatar( get_the_author_meta( 'email' ), '96', '', get_the_author() );
				} else {
					echo be_avatar_author();
				}
			echo '</a>';
			echo '</div>';
		?>
	<?php } ?>
	<div class="qa-cat-content">
		<header class="qa-header">
			<?php the_title( sprintf( '<h2 class="entry-title gdz"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header>

		<div class="qa-cat-meta gdz">
			<?php 
				echo '<span class="qa-meta qa-cat">';
				the_category( ' ' );
				echo '</span>';

				echo '<span class="qa-meta qa-time"><span class="qa-meta-class"></span>';
				echo '<time datetime="';
				echo get_the_date('Y-m-d');
				echo ' ' . get_the_time('H:i:s');
				echo '">';
				time_ago( $time_type ='post' );
				echo '</time></span>';

				qa_get_comment_last();

				echo '<span class="qa-meta qa-r">';
					if (!zm_get_option('close_comments')) {
						echo '<span class="qa-meta qa-comment">';
							comments_popup_link( '<span class="no-comment"><i>' . sprintf( __( '回复', 'begin' ) ) . '</i>' . sprintf( __( '0', 'begin' ) ) . '</span>', '<i>' . sprintf( __( '回复', 'begin' ) ) . '</i>1 ', '<i>' . sprintf( __( '回复', 'begin' ) ) . '</i>%' );
						echo '</span>';
					}
					views_qa();
				echo '</span>';

			?>
			<div class="clear"></div>
		</div>
	</div>
</article>
<?php }