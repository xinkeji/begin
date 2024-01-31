<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 注册设置页面
add_action( 'admin_menu', 'register_be_sitemap_settings_page' );
function register_be_sitemap_settings_page() {
	add_management_page(
		'生成站点地图',
		'<span class="bem"></span>站点地图',
		'manage_options',
		'sitemap_generate',
		'be_sitemap_settings_page'
	);
}

// 设置页面内容
function be_sitemap_settings_page() {
	settings_errors( 'be_sitemap_settings' );
	?>

	<div class="wrap">
		<h2 class="bezm-settings">生成站点地图</h2>
		<div class="card be-area-box">
			<p>提交后，请不要关闭，等待，直至地图文件全部生成完毕。</p>
			<p>如提示错误，说明文章较多超出PHP内存限制，将停止生成，可适当增加限制值。</p>
			<p>或者直接使用：<a style="text-decoration: none;" href="<?php echo home_url(); ?>/wp-sitemap.xml" target="_blank">WP原生站点地图</a></span></p>
			<p>主题选项 → 基本设置 → SEO设置→ 进行相关设置</p>
		</div>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'be_sitemap_settings' );
				do_settings_sections( 'be_sitemap_settings' );
				submit_button( '生成地图' );
			?>
		</form>
	</div>
  <?php
}

// 注册设置
add_action( 'admin_init', 'register_be_sitemap_settings' );

function register_be_sitemap_settings() {
	register_setting(
		'be_sitemap_settings',           // 设置组名称
		'be_sitemap_settings',           // 设置选项名称
		'be_sitemap_settings_sanitize'   // 验证和保存回调函数
	);
}

// 验证和保存设置
function be_sitemap_settings_sanitize( $input ) {
	if ( isset( $_POST['submit'] ) ) {
		// 清除错误提示
		set_transient( 'settings_errors', array(), 30 );

		// 自定义提示消息
		add_settings_error(
			'be_sitemap_settings',
			'be_sitemap_message',
			'站点地图已生成完毕！',
			'success'
		);

		// 触发自定义动作钩子
		do_action( 'be_sitemap_generate' );
	}
	return $input;
}

// 更新文章时刷新
if ( zm_get_option( 'publish_sitemap' ) ) {
	add_action( 'publish_post', 'generate_sitemap_publish', 10, 3 );
	function generate_sitemap_publish( $post_id, $post, $update ) {
		if ( $update ) {
			do_action( 'be_sitemap_generate' );
		}
	}
}