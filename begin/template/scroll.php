<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
	if ( ! zm_get_option( 'scroll_hide' ) || ( zm_get_option( 'scroll_hide' ) == 'scroll_mobile' ) ) {
		if ( wp_is_mobile() ) { 
			$scroll_hide = ' scroll-hide';
		} else {
			$scroll_hide = '';
		}
	}
	if ( zm_get_option( 'scroll_hide' ) == 'scroll_desktop' ) {
		$scroll_hide = ' scroll-hide';
	}
?>
<?php if ( zm_get_option( 'mobile_scroll' ) && wp_is_mobile() ) { ?>
<?php } else { ?>
<ul id="scroll" class="scroll<?php if ( zm_get_option( 'btn_scroll_show' ) ) { ?> scroll-but<?php } ?><?php echo $scroll_hide; ?>">
	<?php if ( function_exists( 'be_toc' ) ) { ?>
		<?php if ( ! is_active_widget( '', '', 'be_toc_widget' ) || wp_is_mobile() ) { ?>
			<li class="toc-scroll toc-no"><a class="toc-button fo ms"><i class="be be-sort"></i></a><div class="toc-prompt"><div class="toc-arrow dah<?php if ( zm_get_option( 'languages_en' ) ) { ?> toc-arrow-en<?php } ?>"><?php _e( '目录', 'begin' ); ?><i class="be be-playarrow"></i></div></div></li>
		<?php } else { ?>
			<li class="toc-scroll toc-no"><a class="toc-widget fo ms"><i class="be be-sort"></i></a><div class="toc-prompt"><div class="toc-arrow dah<?php if ( zm_get_option( 'languages_en' ) ) { ?> toc-arrow-en<?php } ?>"><?php _e( '目录', 'begin' ); ?><i class="be be-playarrow"></i></div></div></li>
		<?php } ?>
	<?php } ?>

	<?php 
		if ( zm_get_option( 'admin_placard' ) ) {
			$placard = zm_get_option( 'placard_layer' ) && !current_user_can( 'manage_options' );
		} else {
			$placard = zm_get_option( 'placard_layer' );
		}
	 if ( $placard && zm_get_option( 'placard_but' ) ) { ?>
		<?php if ( be_get_option( 'placard_mobile' ) || ( ! wp_is_mobile() ) ) { ?>
			<li><a class="placard-but fo ms"><i class="be be-volumedown"></i></a></li>
		<?php } ?>
	<?php } ?>

	<?php if ( function_exists( 'epd_assets_vip' ) && zm_get_option( 'vip_scroll' ) ) { ?>
		<li>
			<?php if ( ! is_user_logged_in() ) { ?>
				<a class="scroll-vip fo ms show-layer cur" data-show-layer="login-layer" role="button"><i class="cx cx-svip"></i></a>
			<?php } else { ?>
				<a class="scroll-vip fo ms" href="<?php echo zm_get_option('be_vip_but_url'); ?>"><i class="cx cx-svip"></i></a>
			<?php } ?>
		</li>
	<?php } ?>

	<?php if ( zm_get_option( 'scroll_h' ) ) { ?><li><a class="scroll-h ms fo"><i class="be be-arrowup"></i></a></li><?php } ?>
	<?php if ( zm_get_option( 'scroll_b' ) ) { ?><li><a class="scroll-b ms fo"><i class="be be-arrowdown"></i></a></li><?php } ?>
	<?php if ( zm_get_option( 'scroll_z' ) ) { ?><?php if ( is_singular() || is_category() ) { ?><li class="foh"><a class="scroll-home ms fo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="be be-home"></i></a></li><?php } ?><?php } ?>
	<?php if ( zm_get_option( 'scroll_c' ) && !zm_get_option('close_comments') ) { ?><?php if (is_singular() && comments_open()) { ?><li class="foh"><a class="scroll-c fo"><i class="be be-speechbubble"></i></a></li><?php } ?><?php } ?>
	<?php if ( zm_get_option( 'read_night' ) ) { ?>
		<ul class="night-day">
			<li class="foh"><span class="night-main"><a class="m-night fo ms"><span class="m-moon"><span></span></span></a></span></li>
			<li class="foh"><a class="m-day fo ms"><i class="be be-loader"></i></a></li>
		</ul>
	<?php } ?>
	<?php if ( zm_get_option( 'scroll_s' ) ) { ?><li class="foh"><a class="scroll-search ms fo"><i class="be be-search"></i></a></li><?php } ?>
	<?php if ( zm_get_option( 'gb2' ) ) { ?><li class="gb2-site foh"><a id="gb2big5" class="ms fo"><span class="dah">繁</span></a></li><?php } ?>
	<?php if ( zm_get_option( 'qq_online' ) ) { ?><?php get_template_part( 'template/qqonline' ); ?><?php } ?>
	<?php if ( zm_get_option('qrurl') && !wp_is_mobile() ) { ?>
		<li class="qrshow foh">
			<a class="qrurl ms fo"><i class="be be-qr-code"></i></a>
			<span class="qrurl-box">
				<img id="qrious">
				<?php if ( zm_get_option( 'logo_small_b' ) )  { ?><span class="logo-qr"><img src="<?php echo zm_get_option( 'logo_small_b' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></span><?php } ?>
				<p><?php _e( '本页二维码', 'begin' ); ?></p>
				<span class="arrow-right"></span>
			</span>
		</li>
	<?php } ?>

	<?php if ( ! zm_get_option( 'scroll_hide' ) || ( zm_get_option( 'scroll_hide' ) == 'scroll_mobile' ) ) { ?>
		<?php if ( wp_is_mobile() ) { ?>
			<li><a class="rounded-full fo ms"><i class="be be-more"></i></a></li>
		<?php } ?>
	<?php } ?>
	<?php if ( zm_get_option( 'scroll_hide' ) == 'scroll_desktop' ) { ?>
		<li><a class="rounded-full fo ms"><i class="be be-more"></i></a></li>
	<?php } ?>

	<?php be_help( $text = '主题选项<br />↓<br />辅助功能<br />↓<br />跟随按钮设置' ); ?>
</ul>
<?php } ?>