<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 网址
function sites_favorites() {
	global $post;
?>
<article class="post-item-list post sites-post besw" <?php aos_a(); ?>>
	<?php if ( zm_get_option( 'sites_adorn' ) ) { ?><div class="rec-adorn-s"></div><div class="rec-adorn-x"></div><?php } ?>
	<?php $sites_link = get_post_meta( get_the_ID(), 'sites_link', true ); ?>
	<?php $sites_url = get_post_meta( get_the_ID(), 'sites_url', true ); ?>
	<?php $sites_description = get_post_meta( get_the_ID(), 'sites_description', true ); ?>
	<?php $sites_des = get_post_meta( get_the_ID(), 'sites_des', true ); ?>
	<?php $sites_ico = get_post_meta( get_the_ID(), 'sites_ico', true ); ?>
	<?php if ( zm_get_option( 'sites_ico' ) ) { ?>
		<?php if ( get_post_meta( get_the_ID(), 'sites_url', true )) { ?>
			<a class="fancy-iframe" data-type="iframe" data-src="<?php echo $sites_url; ?>" href="javascript:;" rel="external nofollow" target="_blank">
				<div class="sites-ico load">
					<?php if ( get_post_meta( get_the_ID(), 'sites_ico', true ) ) { ?>
						<img class="sites-img sites-ico-custom" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="<?php echo $sites_ico; ?>" alt="<?php the_title(); ?>">
					<?php } else { ?>
						<img class="sites-img" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="<?php echo zm_get_option( 'favicon_api' ); ?><?php echo $sites_url; ?>" alt="<?php the_title(); ?>">
					<?php } ?>
				</div>
			</a>
		<?php } else { ?>
			<a class="fancy-iframe" data-type="iframe" data-src="<?php echo $sites_link; ?>" href="javascript:;" rel="external nofollow" target="_blank">
				<div class="sites-ico load">
					<?php if ( get_post_meta( get_the_ID(), 'sites_ico', true ) ) { ?>
						<img class="sites-img sites-ico-custom" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="<?php echo $sites_ico; ?>" alt="<?php the_title(); ?>">
					<?php } else { ?>
						<img class="sites-img" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="<?php echo zm_get_option( 'favicon_api' ); ?><?php echo $sites_link; ?>" alt="<?php the_title(); ?>">
					<?php } ?>
				</div>
			</a>
		<?php } ?>
	<?php } ?>
	<h4 class="sites-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
	<div class="sites-excerpt ease">
		<?php 
			if ( get_post_meta( get_the_ID(), 'sites_description', true ) || get_post_meta( get_the_ID(), 'sites_des', true ) ) {
				echo $sites_description;
				echo $sites_des;
			} else {
				if ( get_post_meta( get_the_ID(), 'sites_url', true ) ) {
					echo $sites_url;
				} else {
					echo $sites_link;
				}
			?>
		<?php } ?>

	</div>
	<div class="sites-link-but ease<?php if ( !zm_get_option( 'sites_ico' ) ) { ?> sites-link-but-noico<?php } ?>">
		<div class="sites-link">
			<?php if ( get_post_meta( get_the_ID(), 'sites_url', true ) ) { ?>
				<a href="<?php echo $sites_url; ?>" target="_blank" rel="external nofollow"><i class="be be-sort ri"></i><?php _e( '访问', 'begin' ); ?></a>
			<?php } else { ?>
				<a href="<?php echo $sites_link; ?>" target="_blank" rel="external nofollow"><i class="be be-sort ri"></i><?php _e( '访问', 'begin' ); ?></a>
			<?php } ?>
		</div>
		<div class="sites-more"><a href="<?php the_permalink(); ?>" rel="external nofollow"><?php _e( '简介', 'begin' ); ?></a></div>
	<div class="clear"></div>
</article>
<?php }