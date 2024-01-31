<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (zm_get_option('single_weixin_one')) { ?>
<div class="s-weixin-one b-weixin betip" data-aos="zoom-in">
	<div class="weimg-one">
		<div class="copy-weixin">
			<img src="<?php echo zm_get_option('weixin_h_img'); ?>" alt="weinxin" />
			<div class="weixinbox<?php if ( zm_get_option( 's_weixin_btn' ) && wp_is_mobile() ) { ?> weixinbtn<?php } ?>">
				<div class="btn-weixin-copy"><div class="btn-weixin"><i class="be be-clipboard"></i></div></div>
				<div class="weixin-id"><?php echo zm_get_option( 'weixin_s_id' ); ?></div>
			</div>
		</div>
		<div class="weixin-h"><strong><?php if ( zm_get_option('weixin_h') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_h'); ?><?php } ?></strong></div>
		<div class="weixin-h-w"><?php if ( zm_get_option('weixin_h_w') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_h_w'); ?><?php } ?></div>
		<div class="clear"></div>
	</div>
	<?php echo be_help( $text = '主题选项 → 辅助功能 → 正文末尾微信二维码' ); ?>
</div>
<?php } else { ?>
<div class="s-weixin b-weixin betip" data-aos="zoom-in">
	<div class="weimg-my weimg1">
		<div>
			<strong><?php if ( zm_get_option('weixin_h') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_h'); ?><?php } ?></strong>
		</div>
		<div><?php if ( zm_get_option('weixin_h_w') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_h_w'); ?><?php } ?></div>
		<div class="copy-weixin">
			<img src="<?php echo zm_get_option('weixin_h_img'); ?>" alt="weinxin" />
			<div class="weixinbox<?php if ( zm_get_option( 's_weixin_btn' ) && wp_is_mobile() ) { ?> weixinbtn<?php } ?>">
				<div class="btn-weixin-copy"><div class="btn-weixin"><i class="be be-clipboard"></i></div></div>
				<div class="weixin-id"><?php echo zm_get_option( 'weixin_s_id' ); ?></div>
			</div>
		</div>
	</div>
	<div class="weimg-my weimg2">
		<div>
			<strong><?php if ( zm_get_option('weixin_g') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_g'); ?><?php } ?></strong>
		</div>
		<div><?php if ( zm_get_option('weixin_g_w') == '' ) { ?><?php } else { ?><?php echo zm_get_option('weixin_g_w'); ?><?php } ?></div>
		<div class="copy-weixin">
			<img src="<?php echo zm_get_option('weixin_g_img'); ?>" alt="weinxin" />
			<div class="weixinbox<?php if ( zm_get_option( 's_weixin_btn' ) && wp_is_mobile() ) { ?> weixinbtn<?php } ?>">
				<div class="btn-weixin-copy"><div class="btn-weixin"><i class="be be-clipboard"></i></div></div>
				<div class="weixin-id"><?php echo zm_get_option( 'weixin_g_id' ); ?></div>
			</div>
		</div>
	</div>
	<?php echo be_help( $text = '主题选项 → 辅助功能 → 正文末尾微信二维码' ); ?>
	<div class="clear"></div>
</div>
<?php } ?>