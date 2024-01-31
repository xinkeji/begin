<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( get_post_meta(get_the_ID(), 'postauthor', true ) ) : ?>
<div class="authorbio ms load" <?php aos_a(); ?>>
	<?php if ( get_option( 'show_avatars' ) ) { ?>
		<?php if ( zm_get_option('cache_avatar' ) ) { ?>
			<?php echo begin_avatar( get_the_author_meta('email'), '96', '', get_the_author() ); ?>
		<?php } else { ?>
			<?php be_avatar_author(); ?>
		<?php } ?>
	<?php } ?>
	<ul class="spostinfo">
		<?php if ( zm_get_option( 'copyright_statement' ) == '' ) { ?>
			<li><?php _e( '本文由', 'begin' ); ?> <strong><?php echo str_replace( '<a', '<a rel="external nofollow"', get_the_author_posts_link() ); ?></strong> <?php _e( '投稿', 'begin' ); ?>，<?php _e( '发表于', 'begin' ); ?> <?php time_ago( $time_type ='posts' ); ?></li>
		<?php } else { ?>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_statement' ) ) ); ?></li>
		<?php } ?>
		<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
	</ul>
	<div class="clear"></div>
</div>
<?php else: ?>
<div class="authorbio ms load betip" <?php aos_a(); ?>>
	<?php if ( get_option( 'show_avatars' ) ) { ?>
		<?php if ( zm_get_option( 'copyright_avatar' )) { ?>
			<?php if ( zm_get_option('cache_avatar' ) ) { ?>
				<?php echo begin_avatar( get_the_author_meta( 'email' ), '96', '', get_the_author() ); ?>
			<?php } else { ?>
				<?php be_avatar_author(); ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<ul class="spostinfo">
		<?php $copy = get_post_meta( get_the_ID(), 'copyright', true); ?>
		<?php if ( get_post_meta( get_the_ID(), 'from', true ) ) : ?>
			<?php $original = get_post_meta( get_the_ID(), 'from', true ); ?>
			<li>
				<strong><?php _e( '版权声明', 'begin' ); ?></strong> <?php _e( '本文源自', 'begin' ); ?>
				<?php if ( get_post_meta( get_the_ID(), 'copyright', true ) ) : ?>
					<a href="<?php echo $copy ?>" rel="nofollow" target="_blank"><?php echo $original ?></a>，
				<?php else: ?>
					<?php echo $original ?>，
				<?php endif; ?>
				<?php echo str_replace( '<a', '<a rel="external nofollow"', get_the_author_posts_link() ); ?> <?php _e( '整理', 'begin' ); ?> <?php _e( '发表于', 'begin' ); ?> <?php time_ago( $time_type ='posts' ); ?>
			</li>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
		<?php else: ?>
			<?php if ( zm_get_option('copyright_statement') == '' ) { ?>
				<li><?php _e( '本文由', 'begin' ); ?> <strong><?php echo str_replace( '<a', '<a rel="external nofollow"', get_the_author_posts_link() ); ?></strong> <?php _e( '发表于', 'begin' ); ?> <?php time_ago( $time_type ='posts' ); ?></li>
			<?php } else { ?>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_statement' ) ) ); ?></li>
			<?php } ?>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
		<?php endif; ?>
	</ul>
	<?php be_help( $text = '主题选项→ 文章信息 → 正文底部版权信息' ); ?>
	<div class="clear"></div>
</div>
<?php endif; ?>