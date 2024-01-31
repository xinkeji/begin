<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( zm_get_option( 'search_captcha' ) ) {
// 搜索验证
function be_search_captcha( $query, $error = true ) {
	if ( is_search() && !is_admin() ) {
		if ( ! isset( $_COOKIE['esc_search_captcha'] ) ) {
			$query->is_search = false;
			$query->query_vars['s'] = false;
			$query->query['s'] = false;

			if ( $error == true ){
				//$query->is_404 = true;
				if ( isset( $_POST['result'] ) ) {
					if ( $_POST['result'] == $_COOKIE['result'] ) {
						$_COOKIE['esc_search_captcha'] = 1;
						setcookie( 'esc_search_captcha',1,0,'/' );
						echo '<script>location.reload();</script>';
					}
				}

				$num1 = rand( 1,10 );
				$num2 = rand( 1,10 );
				$result = $num1+$num2;
				$_COOKIE['result'] = $result;
				setcookie( 'result',urldecode( $result),0,'/' );
				?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1<?php if ( zm_get_option('mobile_viewport')) { ?>, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no<?php } ?>" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title><?php _e( '搜索验证', 'begin' ); ?><?php connector(); ?><?php if ( ! zm_get_option( 'blog_name' ) ) {bloginfo('name');} ?></title>
<?php do_action( 'favicon_ico' ) ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> ontouchstart="">
<?php wp_body_open(); ?>
<div id="page" class="hfeed site<?php page_class(); ?>">
<?php get_template_part( 'template/menu', 'index' ); ?>
<nav class="bread">
	<div class="be-bread">
		<div class="breadcrumb">
			<span class="seat"></span>
			<span class="home-text"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="bookmark">首页</a></span>
			<span class="home-text"><i class="be be-arrowright"></i></span>
			<span class="current"><?php _e( '搜索验证', 'begin' ); ?></span>
		</div>
	</div>
</nav>
<div id="content" class="site-content<?php decide_h(); ?>">
<?php be_back_img(); ?>
<div class="be-search-captcha-box">
	<div class="be-search-captcha fd">
		<div class="be-search-captcha-tip"><?php _e( '输入答案查看搜索结果', 'begin' ); ?></div>
		<form action="" method="post" autocomplete="off">
			<?php echo $num1; ?> + <?php echo $num2; ?> = <input type="text" name="result" required autofocus />
			<button type="submit"><?php _e( '确定', 'begin' ); ?></button>
		</form>
		<a class="be-search-captcha-btu" href="<?php echo esc_url( home_url('/') ); ?>"><?php _e( '返回首页', 'begin' ); ?></a>
	</div>
</div>
<?php
get_footer(); exit;
}}}}
add_action( 'parse_query', 'be_search_captcha' );
}