<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 链接
// begin link
function begin_get_the_link_items( $id = null ) {
	global $wpdb,$post;
	$args  = array(
		'orderby'   => zm_get_option('rand_link'),
		'order'     => 'DESC',
		'exclude'   => zm_get_option('link_cat'),
		'category'  => $id,
	);

	$bookmarks = get_bookmarks( $args );
	$output = "";
	if ( !empty( $bookmarks ) ) {
		foreach ($bookmarks as $bookmark) {
			if ( zm_get_option( 'site_inks_des' ) ) {
				$linkdes = '<div class="link-des-box"><div class="link-des over">' . $bookmark->link_description . '</div></div>';
			} else {
				$linkdes = '';
			}

			$output .= '<div class="link-box" data-aos="fade-up"><a href="' . $bookmark->link_url . ' " target="_blank" ><div class="link-main">';
			if (!zm_get_option('link_favicon') || (zm_get_option("link_favicon") == 'favicon_ico')) {
				if ( empty( $bookmark->link_image ) ) {
					$output .= '<div class="page-link-img"><img src="' . zm_get_option("favicon_api") . '' . $bookmark->link_url . '" alt="' . $bookmark->link_name . '"></div><div class="link-name-link"><div class="page-link-name">' . $bookmark->link_name . '</div><div class="links-url">' . $bookmark->link_url . '</div></div>' . $linkdes . '</li>';
				} else {
					$output .= '<div class="page-link-img page-link-img-custom"><img src="' . $bookmark->link_image . '" alt="' . $bookmark->link_name . '"></div><div class="link-name-link"><div class="page-link-name">' . $bookmark->link_name . '</div><div class="links-url">' . $bookmark->link_url . '</div></div>' . $linkdes . '</li>';
				}
			}
			if (zm_get_option('link_favicon') == 'first_ico') {
				$output .= '<div class="link-letter">' . getFirstCharter($bookmark->link_name) . '</div><div class="link-name-link"><div class="page-link-name">' . $bookmark->link_name . '</div><div class="links-url">' . $bookmark->link_url . '</div></div>' . $linkdes . '</li>';
			}
			if ( zm_get_option( 'inks_adorn' ) ) {
				$output .= '<div class="rec-adorn-s"></div><div class="rec-adorn-x"></div>';
			}
			$output .= '</div></a></div>';
		}
	}
	return $output;
}

function begin_get_link_items() {
	$result = '';
	$linkcats = get_terms( 'link_category' );
	if ( !empty( $linkcats ) ) {
		foreach( $linkcats as $linkcat ){
			$result .= '<div class="clear"></div><h3 class="link-cat" data-aos="zoom-in">'.$linkcat->name.'</h3>';
			if ( $linkcat->description ) $result .= '<div class="linkcat-des" data-aos="zoom-in">'.$linkcat->description .'</div>';
			$result .= begin_get_the_link_items( $linkcat->term_id );
		}
	} else {
		$result = begin_get_the_link_items();
	}
	return $result;
}

function begin_home_link_ico( $id = null ) {
	global $wpdb,$post;
	$args = array(
		'orderby'   => 'rating',
		'order'     => 'DESC',
		'category'  => be_get_option( 'link_f_cat' ),
	);

	$bookmarks = get_bookmarks( $args );
	$output = "";
	if ( ! empty( $bookmarks ) ) {
		foreach ( $bookmarks as $bookmark ) {
			$output .= '<ul class="lx7"><li class="link-f link-name">';
			if ( empty( $bookmark->link_image ) ) {
				$output .= '<a href="' . $bookmark->link_url . ' " target="_blank" ><img class="link-ico" src="' . zm_get_option( "favicon_api" ) . '' . $bookmark->link_url . '" alt="' . $bookmark->link_name . '">' . $bookmark->link_name . '</a>';
			} else {
				$output .= '<a href="' . $bookmark->link_url . ' " target="_blank" ><img class="link-ico link-ico-custom" src="' . $bookmark->link_image . '" alt="' . $bookmark->link_name . '">' . $bookmark->link_name . '</a>';
			}
			$output .= '</li></ul>';
		}
	}
	return $output;
}

// footer links
function links_footer() { ?>
	<div id="links" class="betip">
		<?php if ( be_get_option( 'footer_img' ) ) { ?>
			<ul class="links-mode" <?php aos_a(); ?>><?php wp_list_bookmarks('title_li=&before=<li class="lx7" data-aos="fade-up"><span class="link-f link-img sup">&after=</span></li>&categorize=1&show_images=1&orderby=rating&order=DESC&category='.be_get_option('link_f_cat')); ?></ul>
		<?php } else { ?>
			<?php if (be_get_option('home_link_ico')) { ?>
				<?php echo begin_home_link_ico(); ?>
			<?php } else { ?>
				<?php wp_list_bookmarks('title_li=&before=<ul class="lx7" data-aos="zoom-in"><li class="link-f link-name sup" data-aos="zoom-in">&after=</li></ul>&categorize=0&show_images=0&orderby=rating&order=DESC&category='.be_get_option('link_f_cat')); ?>
			<?php } ?>
		<?php } ?>
		<div class="clear"></div>
		<?php if ( be_get_option('link_url') == '' ) { ?><?php } else { ?><div class="more-link" data-aos="zoom-in"><a href="<?php echo get_permalink( be_get_option('link_url') ); ?>" target="_blank" title="<?php _e( '更多链接', 'begin' ); ?>"><i class="be be-more"></i></a></div><?php } ?>
		<?php be_help( $text = '首页设置 → 页脚链接' ); ?>
	</div>
<?php }

function much_links() { ?>
	<div id="links" class="much-links-box betip">
		<?php if ( be_get_option( 'home_link_ico' ) ) { ?>
			<h2 class="much-links-ico"><span class="dashicons dashicons-admin-site-alt3"></span><?php _e( '友情链接', 'begin' ); ?><?php if ( be_get_option('link_url') == '' ) { ?><?php } else { ?><span class="add-more-link" data-aos="zoom-in"><a href="<?php echo get_permalink( be_get_option('link_url') ); ?>" target="_blank"><span class="be be-edit"></span><?php echo be_get_option( 'add_link_text' ); ?></a></span><?php } ?></h2>
			<?php echo begin_home_link_ico(); ?>
		<?php } else { ?>
			<ul class="links-mode" <?php aos_a(); ?>><?php wp_list_bookmarks('title_li=&before=<ul class="much-links-item" data-aos="zoom-in"><li class="much-link-f" data-aos="zoom-in">&after=</li></ul>&categorize=1&show_images=0&orderby=rating&order=DESC&category=' . be_get_option( 'link_f_cat' ) ); ?></ul>
		<?php } ?>
		<div class="clear"></div>
		<?php be_help( $text = '首页设置 → 页脚链接' ); ?>
	</div>
<?php }

// page links
function links_page() { ?>
	<?php 
		$args = array(
			'before'             => '<li><span class="lx7" data-aos="zoom-in"><span class="link-f">',
			'after'              => '</span></span></li>',
			'title_li'           => '',
			'categorize'         => 1,
			'show_images'        => zm_get_option('links_img_txt'),
			'orderby'            => 'rating',
			'order'              => 'DESC',
			'category_orderby'   => 'description',
			'exclude'            => zm_get_option('link_cat'),
			'title_before'       => '<h3 class="link-cat" data-aos="zoom-in">',
			'title_after'        => '</h3>',
			'category_before'    => '<div class="clear"></div>',
			'category_after'     => '<div class="clear"></div>'
		);
	?>
	<ul class="wp-list<?php if (zm_get_option('links_img_txt')) { ?> links-img<?php } ?>"><?php wp_list_bookmarks($args); ?></ul>
<?php }