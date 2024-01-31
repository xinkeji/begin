<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// 文章
function begin_sitemap_post_xml() {
	if ( zm_get_option( 'sitemap_split' ) ) {
		$batchSize = zm_get_option( 'sitemap_n' );
		$totalPosts = wp_count_posts()->publish;
		$totalBatches = ceil( $totalPosts / $batchSize );

		for ( $i = 0; $i < $totalBatches; $i++ ) {
			$offset = $i * $batchSize;

			$posts = get_posts(array(
				'posts_per_page' => $batchSize,
				'offset'         => $offset,
			));

			$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
			$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
			$sitemap .= "\r\n" . '<url>';
			$sitemap .= "\r\n" . '<loc>' . get_home_url() . '</loc>';
			$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
			$sitemap .= "\r\n" . '<lastmod>' . gmdate( 'Y-m-d\TH:i:s+00:00', strtotime( get_lastpostmodified( 'GMT' ) ) ) . '+00:00</lastmod>';
			$sitemap .= "\r\n" . '<changefreq>daily</changefreq>';
			$sitemap .= "\r\n" . '<priority>1.0</priority>';
			$sitemap .= "\r\n" . '</url>';
			foreach ( $posts as $post ) {
				$sitemap .= "\r\n" . '<url>';
				$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
				$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
				$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post( $post->ID )->post_modified ) . '+00:00</lastmod>';
				$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
				$sitemap .= "\r\n" . '<priority>0.8</priority>';
				$sitemap .= "\r\n" . '</url>';
			}
			$sitemap .= "\r\n" . '</urlset>';

			$file = ABSPATH . zm_get_option( 'sitemap_name' );
			$file .= ( $i > 0 ) ? '-' . $i : '';
			$file .= '.xml';

			file_put_contents( $file, $sitemap );
			sleep( zm_get_option( 'sitemap_delay' ) );
	    }

	} else {
		$posts = get_posts(array(
			'posts_per_page' => zm_get_option( 'sitemap_n' ),
		));

		$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
		$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_home_url() . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . gmdate( 'Y-m-d\TH:i:s+00:00', strtotime( get_lastpostmodified( 'GMT' ) ) ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>daily</changefreq>';
		$sitemap .= "\r\n" . '<priority>1.0</priority>';
		$sitemap .= "\r\n" . '</url>';
		foreach ( $posts as $post ) {
			$sitemap .= "\r\n" . '<url>';
			$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
			$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
			$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post($post->ID)->post_modified ) . '+00:00</lastmod>';
			$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
			$sitemap .= "\r\n" . '<priority>0.8</priority>';
			$sitemap .= "\r\n" . '</url>';
		}
		$sitemap .= "\r\n" . '</urlset>';

		$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '.xml';
		file_put_contents( $file, $sitemap );
	}
}
add_action( 'be_sitemap_generate', 'begin_sitemap_post_xml' );

// 页面
function begin_sitemap_page_xml() {
	$pages = get_pages();
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach ( $pages as $page ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_page_link( $page->ID ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post( $page->ID )->post_modified ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-page.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'sitemap_pages' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_page_xml' );
}

// 分类
function begin_sitemap_cat_xml() {
	$categorys = get_terms( 'category', 'orderby=name&hide_empty=0' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach ( $categorys as $category ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_term_link( $category, $category->slug ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<changefreq>weekly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-cat.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'sitemap_cat' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_cat_xml' );
}

// 标签
function begin_sitemap_tag_xml() {
	$tags = get_terms( 'post_tag', 'orderby=name&hide_empty=0' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach ( $tags as $tag ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_term_link( $tag, $tag->slug ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.6</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-tag.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'sitemap_tag' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_tag_xml' );
}

// 自定义分类
// 商品
function begin_sitemap_tao_xml() {
	$posts = get_posts( 'post_type=tao&posts_per_page=-1&orderby=post_date&order=DESC' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach( $posts as $post ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post($post->ID)->post_modified ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-tao.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'no_tao' ) && zm_get_option( 'sitemap_tao' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_tao_xml' );
}

// 公告
function begin_sitemap_bulletin_xml() {
	$posts = get_posts( 'post_type=bulletin&posts_per_page=-1&orderby=post_date&order=DESC' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach( $posts as $post ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post($post->ID)->post_modified ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-bulletin.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'no_bulletin' ) && zm_get_option( 'sitemap_bulletin' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_bulletin_xml' );
}

// 网址
function begin_sitemap_favorites_xml() {
	$posts = get_posts( 'post_type=sites&posts_per_page=-1&orderby=post_date&order=DESC' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach( $posts as $post ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post($post->ID)->post_modified ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-favorites.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'no_favorites' ) && zm_get_option( 'sitemap_favorites' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_favorites_xml' );
}

// 产品
function begin_sitemap_products_xml() {
	$posts = get_posts( 'post_type=show&posts_per_page=-1&orderby=post_date&order=DESC' );
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= "\r\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';
	foreach( $posts as $post ) {
		$sitemap .= "\r\n" . '<url>';
		$sitemap .= "\r\n" . '<loc>' . get_permalink( $post->ID ) . '</loc>';
		$sitemap .= "\r\n" . '<mobile:mobile type="pc,mobile"/>';
		$sitemap .= "\r\n" . '<lastmod>' . str_replace( " ", "T", get_post($post->ID)->post_modified ) . '+00:00</lastmod>';
		$sitemap .= "\r\n" . '<changefreq>monthly</changefreq>';
		$sitemap .= "\r\n" . '<priority>0.8</priority>';
		$sitemap .= "\r\n" . '</url>';
	}
	$sitemap .= "\r\n" . '</urlset>';

	$file = ABSPATH . zm_get_option( 'sitemap_name' ) . '-products.xml';
	file_put_contents( $file, $sitemap );
}

if ( zm_get_option( 'no_products' ) && zm_get_option( 'sitemap_products' ) ) {
	add_action( 'be_sitemap_generate', 'begin_sitemap_products_xml' );
}