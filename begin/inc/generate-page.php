<?php
if ( ! defined( 'ABSPATH' ) ) exit;
//添加页面函数
function begin_add_page( $title, $slug, $page_template = '' ){
	$allPages = get_pages();
	$exists = false;
	foreach( $allPages as $page ) {
		if ( strtolower( $page->post_name ) == strtolower( $slug ) ){
			$exists = true;
		}
	}

	if ( $exists == false ) {
		$new_page_id = wp_insert_post(
			array(
				'post_title'     => $title,
				'post_type'      => 'page',
				'post_name'      => $slug,
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
				'post_status'    => 'publish',
				'post_author'    => 1,
				'menu_order'     => 0
			)
		);

		if ( $new_page_id && $page_template != '' ) {
			update_post_meta( $new_page_id, '_wp_page_template', $page_template );
		}
	}
}

function begin_add_template() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		begin_add_page( '用户中心', 'user-center', 'pages/template-user.php' );
		begin_add_page( '用户注册', 'registered', 'pages/template-reg.php' );
		begin_add_page( '友情链接', 'link', 'pages/template-links.php' );
	}
}
add_action( 'load-themes.php','begin_add_template' );
// add_action( 'admin_init','begin_add_template' );

//添加投稿
function begin_add_page_publish( $title, $slug, $page_template = '' ){
	$allPages = get_pages();
	$exists = false;
	foreach( $allPages as $page ) {
		if ( strtolower( $page->post_name ) == strtolower( $slug ) ){
			$exists = true;
		}
	}

	if ( $exists == false ) {
		$new_page_id = wp_insert_post(
			array(
				'post_title'     => $title,
				'post_type'      => 'page',
				'post_name'      => $slug,
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
				'post_content'   => '[bet_submission_form]',
				'post_status'    => 'publish',
				'post_author'    => 1,
				'menu_order'     => 0,
				'meta_input'     => array(
					'no_sidebar' => 'true',
					'header_bg'  => get_template_directory_uri() . '/img/default/options/1200.jpg',
				),
			)
		);

		if ( $new_page_id && $page_template != '' ) {
			update_post_meta( $new_page_id, '_wp_page_template', $page_template );
		}
	}
}

function begin_add_template_publish() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		begin_add_page_publish( '我要投稿','publish','pages.php' );
	}
}
add_action( 'load-themes.php','begin_add_template_publish' );