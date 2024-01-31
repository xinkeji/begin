<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// 文章
function begin_sitemap_post_txt() {
	if ( zm_get_option( 'sitemap_split' ) ) {
		$batchSize = zm_get_option( 'sitemap_n' ); // 每个批次处理的文章数量
		$totalPosts = wp_count_posts()->publish; // 获取文章总数
		$totalBatches = ceil( $totalPosts / $batchSize ); // 计算总共需要分成多少批次

		for ( $i = 0; $i < $totalBatches; $i++ ) {
			$offset = $i * $batchSize;

			$posts = get_posts(array(
				'posts_per_page' => $batchSize,
				'offset'         => $offset,
			));

			$sitemap = get_home_url() . "\r\n";
			foreach ( $posts as $post ) {
				$sitemap .= get_permalink( $post->ID ) . "\r\n";
			}

			$file = ABSPATH . zm_get_option( 'sitemap_name' );
			$file .= ( $i > 0 ) ? '-' . $i : '';
			$file .= '.txt';

			file_put_contents( $file, $sitemap );
			sleep( zm_get_option( 'sitemap_delay' ) );
	    }
	} else {
		$posts = get_posts(array(
			'posts_per_page' => zm_get_option( 'sitemap_n' ),
		));

		$sitemap = get_home_url() . "\r\n";
		foreach ( $posts as $post ) {
			$sitemap .= get_permalink( $post->ID ) . "\r\n";
		}

		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '.txt';
		file_put_contents( $file, $sitemap );
	}
}
add_action( 'be_sitemap_generate', 'begin_sitemap_post_txt' );

// 页面
function begin_sitemap_page_txt() {
	$pages = get_pages();
	$sitemap = '';
	foreach ( $pages as $page ) {
		$sitemap .= get_page_link( $page->ID ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-page.txt';
		file_put_contents( $file, $sitemap );
	}
}

if ( zm_get_option( 'sitemap_pages' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_page_txt' );
}

// 分类
function begin_sitemap_cat_txt() {
	$categorys = get_terms( 'category', 'orderby=name&hide_empty=0' );
	$sitemap = '';
	foreach ( $categorys as $category ) {
		$sitemap .= get_term_link( $category, $category->slug ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-cat.txt';
		file_put_contents( $file, $sitemap );
	}
}
if ( zm_get_option( 'sitemap_cat' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_cat_txt' );
}

// 标签
function begin_sitemap_tag_txt() {
	$sitemap = '';
	$tags = get_terms( 'post_tag', 'orderby=name&hide_empty=0' );
	foreach ( $tags as $tag ) {
		$sitemap .= get_term_link( $tag, $tag->slug ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-tag.txt';
		file_put_contents( $file, $sitemap );
	}
}
if ( zm_get_option( 'sitemap_tag' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_tag_txt' );
}

// 自定义分类
// 商品
function begin_sitemap_tao_txt() {
	$sitemap = '';
	$posts = get_posts( 'post_type=tao&posts_per_page=-1&orderby=post_date&order=DESC' );
	foreach( $posts as $post ) {
		$sitemap .= get_permalink( $post->ID ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-tao.txt';
		file_put_contents( $file, $sitemap );
	}
}

if ( zm_get_option( 'no_tao' ) && zm_get_option( 'sitemap_tao' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_tao_txt' );
}

// 公告
function begin_sitemap_bulletin_txt() {
	$sitemap = '';
	$posts = get_posts( 'post_type=bulletin&posts_per_page=-1&orderby=post_date&order=DESC' );
	foreach( $posts as $post ) {
		$sitemap .= get_permalink( $post->ID ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-bulletin.txt';
		file_put_contents( $file, $sitemap );
	}
}

if ( zm_get_option( 'no_bulletin' ) && zm_get_option( 'sitemap_bulletin' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_bulletin_txt' );
}

// 网址
function begin_sitemap_favorites_txt() {
	$sitemap = '';
	$posts = get_posts( 'post_type=sites&posts_per_page=-1&orderby=post_date&order=DESC' );
	foreach( $posts as $post ) {
		$sitemap .= get_permalink( $post->ID ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-favorites.txt';
		file_put_contents( $file, $sitemap );
	}
}

if ( zm_get_option( 'no_favorites' ) && zm_get_option( 'sitemap_favorites' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_favorites_txt' );
}

// 产品
function begin_sitemap_show_txt() {
	$sitemap = '';
	$posts = get_posts( 'post_type=show&posts_per_page=-1&orderby=post_date&order=DESC' );
	foreach( $posts as $post ) {
		$sitemap .= get_permalink( $post->ID ) . "\r\n";
		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-products.txt';
		file_put_contents( $file, $sitemap );
	}
}

if ( zm_get_option( 'no_products' ) && zm_get_option( 'sitemap_products' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_show_txt' );
}