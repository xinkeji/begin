<?php if ( ! defined( 'ABSPATH' )  ) { die; }
if ( ! function_exists( 'co_get_option' ) ) {
	function co_get_option( $option = '', $default = null ) {
		$options = get_option( 'co_home' );
		return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}

$prefix = 'co_home';

ZMOP::createOptions( $prefix, array(
	'framework_title'         => '公司主页',
	'framework_class'         => 'be-box',

	'menu_title'              => '公司主页',
	'menu_slug'               => 'co-options',
	'menu_type'               => 'submenu',
	'menu_capability'         => 'manage_options',
	'menu_icon'               => null,
	'menu_position'           => null,
	'menu_hidden'             => false,
	'menu_parent'             => 'themes.php',

	'show_bar_menu'           => false,
	'show_sub_menu'           => false,
	'show_in_network'         => true,
	'show_in_customizer'      => false,

	'show_search'             => false,
	'show_reset_all'          => true,
	'show_reset_section'      => true,
	'show_footer'             => true,
	'show_all_options'        => true,
	'show_form_warning'       => true,
	'sticky_header'           => true,
	'save_defaults'           => true,
	'ajax_save'               => $save,

	'admin_bar_menu_icon'     => 'cx cx-begin',
	'admin_bar_menu_priority' => 80,

	'footer_text'             => '',
	'footer_after'            => '',
	'footer_credit'           => '',

	'database'                => '',
	'transient_time'          => 0,

	'contextual_help'         => array(),
	'contextual_help_sidebar' => '',

	'enqueue_webfont'         => true,
	'async_webfont'           => false,

	'output_css'              => true,

	'nav'                     => 'normal',
	'theme'                   => 'be',
	'class'                   => '',

	'defaults'                => array(),

));

ZMOP::createSection( $prefix, array(
	'title'       => '公司幻灯',
	'icon'  => 'dashicons dashicons-cover-image',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_slider',
			'type'     => 'switcher',
			'title'    => '幻灯',
			'default'  => true,
		),

		array(
			'id'     => 'slider_group',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加幻灯',
			'accordion_title_by' => array( 'slider_group_name', 'slider_group_title_a' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'slider_group_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'slider_group_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '背景图片',
					'preview' => true,
				),

				array(
					'id'      => 'slider_group_small_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '浮动小图片',
					'preview' => true,
				),

				array(
					'id'       => 'slider_group_c',
					'class'    => 'be-child-item',
					'type'     => 'switcher',
					'title'    => '无小图时文字居中',
				),

				array(
					'id'      => 'slider_group_title_a',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第一行字',
				),

				array(
					'id'      => 'slider_group_title_b',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第二行大字',
				),

				array(
					'id'      => 'slider_group_title_c',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第三行字',
				),

				array(
					'id'      => 'slider_group_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'slider_group_btu',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮文字',
				),

				array(
					'id'      => 'slider_group_btu_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮链接',
				),

			),

			'default' => array(
				array(
					'slider_group_name'       => '名称',
					'slider_group_img'        => $imgdefault . '/options/1200.jpg',
					'slider_group_small_img'  => $imgdefault . '/random/320.jpg',
					'slider_group_title_a'    => '响应式设计',
					'slider_group_title_b'    => '集成SEO自定义功能',
					'slider_group_title_c'    => '众多实用小工具',
					'slider_group_c'          => true,
					'slider_group_url'        => '',
					'slider_group_btu'        => '按钮',
					'slider_group_btu_url'    => '',
				),


				array(
					'slider_group_name'       => '名称',
					'slider_group_img'        => $imgdefault . '/options/1200.jpg',
					'slider_group_small_img'  => '',
					'slider_group_title_a'    => 'CSS3+HTML5、响应式设计',
					'slider_group_title_b'    => 'WordPress多功能主题： Begin',
					'slider_group_title_c'    => '博客、杂志、图片、公司企业多种布局可选',
					'slider_group_c'          => true,
					'slider_group_url'        => '',
					'slider_group_btu'        => '',
					'slider_group_btu_url'    => '',
				),
			)
		),


		array(
			'id'       => 'slider_group_occupy',
			'type'     => 'upload',
			'title'    => '占位图',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
			'after'    => '保持与第一个幻灯图片相同',
		),

		array(
			'id'       => 'big_back_img_h',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认500</span>',
			'default'  => 500,
		),

		array(
			'id'       => 'big_back_img_m_h',
			'type'     => 'number',
			'title'    => '移动端高度',
			'after'    => '<span class="after-perch">用于移动端显示全图，留空默认240</span>',
		),

		array(
			'id'       => 'group_blur',
			'type'     => 'switcher',
			'title'    => '模糊大背景图片',
		),

		array(
			'id'       => 'group_nav',
			'type'     => 'switcher',
			'title'    => '菜单浮在幻灯上',
		),

		array(
			'id'       => 'group_slider_video',
			'class'    => 'be-parent-item',
			'type'     => 'switcher',
			'title'    => '仅显示一个视频',
			'label'    => '',
		),

		array(
			'id'       => 'group_slider_video_url',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => 'MP4视频',
		),

		array(
			'id'       => 'group_slider_video_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '视频封面',
		),

		array(
			'id'       => 'group_only_img',
			'class'    => 'be-parent-item',
			'type'     => 'switcher',
			'title'    => '仅显示一张图片',
			'label'    => '',
		),

		array(
			'id'       => 'group_slider_img',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '图片',
			'default'  => '',
			'preview'  => true,
		),

		array(
			'id'       => 'group_slider_img_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '图片链接到',
			'subtitle' => '',
			'before'   => '',
			'after'    => '点击图片跳转的地址',
		),
	)
));

ZMOP::createSection( $prefix, array(

	'title'       => '关于我们',
	'icon'        => 'dashicons dashicons-businessman',
	'description' => '关于我们',
	'fields'      => array(

		array(
			'id'       => 'group_contact',
			'type'     => 'switcher',
			'title'    => '关于我们',
			'default'  => true,
		),

		array(
			'id'       => 'group_contact_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认1</span>',
			'default'  => 1,
		),

		array(
			'id'       => 'group_contact_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '关于我们',
		),

		array(
			'id'        => 'contact_p',
			'type'      => 'wp_editor',
			'title'     => '内容',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'       => 'tr_contact',
			'type'     => 'switcher',
			'title'    => '移动端截断文字',
			'default'  => true,
		),

		array(
			'id'       => 'group_contact_bg',
			'type'     => 'switcher',
			'title'    => '显示图片',
			'default'  => true,
		),

		array(
			'id'       => 'group_contact_img',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '上传图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'      => 'contact_img_m',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '图片显示模式',
			'inline'  => true,
			'options' => array(
				'contact_img_center' => '居中',
				'contact_img_right' => '居右',
			),
			'default' => 'contact_img_right',
		),

		array(
			'id'       => 'group_more_z',
			'type'     => 'text',
			'title'    => '详细查看按钮文字',
			'after'    => '留空则不显示',
			'default'  => '详细查看',
		),

		array(
			'id'       => 'group_more_ico',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图标代码',
			'default'  => 'be be-stack',
		),

		array(
			'id'       => 'group_more_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '详细查看链接地址',
		),

		array(
			'id'       => 'group_contact_z',
			'type'     => 'text',
			'title'    => '联系方式按钮文字',
			'after'    => '留空则不显示',
			'default'  => '关于我们',
		),

		array(
			'id'       => 'group_contact_ico',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图标代码',
			'default'  => 'be be-phone',
		),

		array(
			'id'       => 'group_contact_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '联系方式链接地址',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '说明',
	'icon'        => 'dashicons dashicons-edit-page',
	'description' => '说明',
	'fields'      => array(

		array(
			'id'       => 'group_explain',
			'type'     => 'switcher',
			'title'    => '说明',
			'default'  => true,
		),

		array(
			'id'       => 'group_explain_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认2</span>',
			'default'  => 2,
		),

		array(
			'id'     => 'group_explain_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_explain_name', 'group_explain_t' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_explain_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'       => 'group_explain_t',
					'type'     => 'text',
					'title'    => '标题',
				),

				array(
					'id'       => 'group_explain_des',
					'type'     => 'text',
					'title'    => '说明',
				),

				array(
					'id'        => 'explain_p',
					'type'      => 'wp_editor',
					'title'     => '内容',
					'height'    => '150px',
					'sanitize'  => false,
				),

				array(
					'id'       => 'ex_thumbnail_a',
					'class'   => 'be-child-item',
					'type'     => 'upload',
					'title'    => '上传左图片',
					'preview'  => true,
				),

				array(
					'id'       => 'ex_thumbnail_b',
					'class'   => 'be-child-item',
					'type'     => 'upload',
					'title'    => '上传右图片',
					'preview'  => true,
				),

				array(
					'id'       => 'ex_thumbnail_only',
					'type'     => 'switcher',
					'title'    => '仅显示一张图',
				),

				array(
					'id'       => 'explain_content_t',
					'type'     => 'text',
					'title'    => '文字说明小标题',
				),

				array(
					'id'       => 'explain_content_ico',
					'type'     => 'text',
					'title'    => '小标题图标',
				),

				array(
					'id'       => 'group_explain_url',
					'type'     => 'text',
					'title'    => '自定义链接',
				),

				array(
					'id'       => 'group_explain_more',
					'type'     => 'text',
					'title'    => '按钮文字',
				),

				array(
					'id'       => 'group_explain_more_no',
					'type'     => 'switcher',
					'title'    => '不显示链接按钮',
				),

			),

			'default' => array(
				array(
					'group_explain_name'    => '名称',
					'group_explain_t'       => '公司说明',
					'group_explain_des'     => '公司说明模块',
					'explain_p'             => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
					'explain_content_t'     => '文字说明小标题',
					'explain_content_ico'   => 'cx cx-begin',
					'group_explain_url'     => '#',
					'group_explain_more'    => '详细',
					'group_explain_more_no' => false,
					'ex_thumbnail_only'     => false,
					'ex_thumbnail_a'        => $imgdefault . '/random/320.jpg',
					'ex_thumbnail_b'        =>  $imgdefault . '/random/320.jpg',
				),
			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '关于本站',
	'icon'        => 'dashicons dashicons-admin-site',
	'description' => '关于本站模块',
	'fields'      => array(

		array(
			'id'       => 'group_about',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'       => 'group_about_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认3</span>',
			'default'  => 3,
		),

		array(
			'id'       => 'group_about_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '关于本站',
		),

		array(
			'id'        => 'group_about_content',
			'type'      => 'wp_editor',
			'title'     => '内容',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>
							<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'       => 'group_about_more',
			'type'     => 'text',
			'title'    => '按钮文字',
			'default'   => '按钮',
		),

		array(
			'id'       => 'group_about_url',
			'type'     => 'text',
			'title'    => '链接',
		),

		array(
			'id'      => 'group_about_color',
			'class'   => 'be-about-color color-f',
			'type'    => 'color',
			'title'    => '文字背景颜色',
			'default' => 'rgba(221,153,51,0.88)',
		),

		array(
			'id'       => 'group_about_bg',
			'type'     => 'upload',
			'title'    => '上传背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '公示板',
	'icon'        => 'dashicons dashicons-admin-comments',
	'description' => '公示板',
	'fields'      => array(

		array(
			'id'       => 'group_notice',
			'type'     => 'switcher',
			'title'    => '公示板',
			'default'  => true,
		),

		array(
			'id'       => 'group_notice_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认4</span>',
			'default'  => 4,
		),

		array(
			'id'       => 'group_notice_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '公示板',
		),

		array(
			'id'       => 'group_notice_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '公示板说明',
		),

		array(
			'id'        => 'group_notice_inf',
			'type'      => 'wp_editor',
			'title'     => '输入右侧文字信息',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p><h2>H2 响应式设计</h2><div class="clear"></div><h3>H3 自定义颜色风格</h3><h4>H4 响应式设计不依赖任何前端框架</h4><h5>H5 不依赖任何前端框架</h5><h6>H6 响应式设计自定义颜色风格不依赖任何前端框架风格不依赖任何风格不依赖任何</h6></p>',
		),

		array(
			'id'       => 'group_notice_img',
			'type'     => 'upload',
			'title'    => '左侧图片',
			'default'  => $imgdefault . '/random/560.jpg',
			'preview'  => true,
		),
	)
));


ZMOP::createSection( $prefix, array(
	'title'       => '分类封面',
	'icon'        => 'dashicons dashicons-format-image',
	'description' => '分类封面',
	'fields'      => array(

		array(
			'id'       => 'group_cat_cover',
			'type'     => 'switcher',
			'title'    => '分类封面',
		),

		array(
			'id'       => 'group_cat_cover_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认5</span>',
			'default'  => 5,
		),

		array(
			'id'       => 'group_cat_cover_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'group_cover_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl345,
			'default' => '4',
		),

		array(
			'id'       => 'group_cover_gray',
			'type'     => 'switcher',
			'title'    => '图片灰色',
			'default'  => true,
		),

		array(
			'id'       => 'group_cover_title',
			'type'     => 'switcher',
			'title'    => '显示分类名称',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '服务项目',
	'icon'        => 'dashicons dashicons-schedule',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'dean',
			'type'     => 'switcher',
			'title'    => '服务项目',
			'default'  => true,
		),

		array(
			'id'       => 'dean_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认6</span>',
			'default'  => 6,
		),

		array(
			'id'       => 'dean_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '服务项目',
		),

		array(
			'id'       => 'dean_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '服务项目模块',
		),

		array(
			'id'     => 'group_dean_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_dean_name', 'group_dean_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_dean_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_dean_t1',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第一行文字',
				),

				array(
					'id'      => 'group_dean_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第二行文字（浮在图片上）',
				),

				array(
					'id'      => 'group_dean_t2',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '第三行文字',
				),

				array(
					'id'      => 'group_dean_btn',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮',
				),

				array(
					'id'      => 'group_dean_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'group_dean_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),
			),

			'default' => array(
				array(
					'group_dean_name'  => '名称',
					'group_dean_title' => '标题',
					'group_dean_t1'    => '第一行文字',
					'group_dean_t2'    => '第二行文字',
					'group_dean_img'   => $imgdefault . '/random/560.jpg',
					'group_dean_btn'   => '按钮',
					'group_dean_url'   => '#',
				),

				array(
					'group_dean_name'  => '名称',
					'group_dean_title' => '标题',
					'group_dean_t1'    => '第一行文字',
					'group_dean_t2'    => '第二行文字',
					'group_dean_img'   => $imgdefault . '/random/560.jpg',
					'group_dean_btn'   => '按钮',
					'group_dean_url'   => '#',
				),

				array(
					'group_dean_name'  => '名称',
					'group_dean_title' => '标题',
					'group_dean_t1'    => '第一行文字',
					'group_dean_t2'    => '第二行文字',
					'group_dean_img'   => $imgdefault . '/random/560.jpg',
					'group_dean_btn'   => '按钮',
					'group_dean_url'   => '#',
				),

				array(
					'group_dean_name'  => '名称',
					'group_dean_title' => '标题',
					'group_dean_t1'    => '第一行文字',
					'group_dean_t2'    => '第二行文字',
					'group_dean_img'   => $imgdefault . '/random/560.jpg',
					'group_dean_btn'   => '按钮',
					'group_dean_url'   => '#',
				),
			)
		),

		array(
			'id'      => 'deanm_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl345,
			'default' => '4',
		),

		array(
			'id'       => 'deanm_fm',
			'type'     => 'switcher',
			'title'    => '移动端强制1栏',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '推荐',
	'icon'        => 'dashicons dashicons-thumbs-up',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_foldimg',
			'type'     => 'switcher',
			'title'    => '推荐',
			'default'  => true,
		),

		array(
			'id'       => 'foldimg_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认7</span>',
			'default'  => 7,
		),

		array(
			'id'       => 'foldimg_t',
			'type'     => 'text',
			'title'    => '标题',
			'default' => '推荐',
		),

		array(
			'id'       => 'foldimg_des',
			'type'     => 'text',
			'title'    => '说明',
			'default' => '推荐说明',
		),

		array(
			'id'       => 'foldimg_fl',
			'type'     => 'switcher',
			'title'    => '移动端显示1栏',
		),

		array(
			'id'     => 'group_foldimg_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_foldimg_name', 'group_foldimg_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_foldimg_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_foldimg_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),


				array(
					'id'      => 'group_foldimg_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

				array(
					'id'        => 'group_foldimg_des',
					'class'     => 'be-child-item',
					'type'      => 'wp_editor',
					'height'    => '150px',
					'title'     => '内容',
					'sanitize'  => false,
					'after'     => '<span class="after-top">使用 <i class="mce-ico mce-i-bullist"></i> 项目符号列表，换行显示</span>',
				),

				array(
					'id'      => 'group_foldimg_btn',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮',
				),

				array(
					'id'      => 'group_foldimg_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

			),

			'default' => array(
				array(
					'group_foldimg_name'  => '名称',
					'group_foldimg_title' => '标题',
					'group_foldimg_img'   => $imgdefault . '/random/320.jpg',
					'group_foldimg_des'   => '<p>内容内容</p><p>内容内容</p><p>内容内容</p>',
					'group_foldimg_btn'   => '按钮',
					'group_foldimg_url'   => '#',
				),

				array(
					'group_foldimg_name'  => '名称',
					'group_foldimg_title' => '标题',
					'group_foldimg_img'   => $imgdefault . '/random/320.jpg',
					'group_foldimg_des'   => '<p>内容内容</p><p>内容内容</p><p>内容内容</p>',
					'group_foldimg_btn'   => '按钮',
					'group_foldimg_url'   => '#',
				),

				array(
					'group_foldimg_name'  => '名称',
					'group_foldimg_title' => '标题',
					'group_foldimg_img'   => $imgdefault . '/random/320.jpg',
					'group_foldimg_des'   => '<p>内容内容</p><p>内容内容</p><p>内容内容</p>',
					'group_foldimg_btn'   => '按钮',
					'group_foldimg_url'   => '#',
				),

				array(
					'group_foldimg_name'  => '名称',
					'group_foldimg_title' => '标题',
					'group_foldimg_img'   => $imgdefault . '/random/320.jpg',
					'group_foldimg_des'   => '<p>内容内容</p><p>内容内容</p><p>内容内容</p>',
					'group_foldimg_btn'   => '按钮',
					'group_foldimg_url'   => '#',
				),
			)
		),

		array(
			'class'    => 'be-home-help',
			'class'    => 'be-child-item be-child-last-item',
			'title'   => '说明',
			'type'    => 'content',
			'content' => '适当的图片比例会有个放大效果，比如一般手机壁纸图片的大小',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '流程',
	'icon'        => 'dashicons dashicons-coffee',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_process',
			'type'     => 'switcher',
			'title'    => '流程',
			'default'  => true,
		),

		array(
			'id'       => 'process_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认8</span>',
			'default'  => 8,
		),

		array(
			'id'       => 'process_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '工作流程',
		),

		array(
			'id'       => 'process_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '工作流程说明',
		),

		array(
			'id'       => 'process_turn',
			'type'     => 'switcher',
			'title'    => '显示动画',
			'default'  => true,
		),

		array(
			'id'     => 'group_process_item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_process_name', 'group_process_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_process_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_process_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'       => 'group_process_des',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '描述',
					'sanitize' => false,
				),

				array(
					'id'      => 'group_process_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'group_process_color',
					'class'   => 'be-child-item',
					'type'    => 'color',
					'title'   => '颜色',
				),

			),

			'default' => array(
				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'be be-display',
					'group_process_color' => '#41a0bb',
				),

				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'cx cx-haibao',
					'group_process_color' => '#c4475d',
				),

				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'be be-skyatlas',
					'group_process_color' => '#9f935d',
				),

				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'be be-home',
					'group_process_color' => '#6096a4',
				),

				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'be be-star',
					'group_process_color' => '#b78a6a',
				),

				array(
					'group_process_name'  => '名称',
					'group_process_title' => '标题',
					'group_process_des'   => '描述',
					'group_process_ico'   => 'be be-search',
					'group_process_color' => '#8e4671',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '支持',
	'icon'        => 'dashicons dashicons-whatsapp',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_assist',
			'type'     => 'switcher',
			'title'    => '支持',
			'default'  => true,
		),

		array(
			'id'       => 'group_assist_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认9</span>',
			'default'  => 9,
		),

		array(
			'id'       => 'group_assist_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '协助支持',
		),

		array(
			'id'       => 'group_assist_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '协助支持说明',
		),

		array(
			'id'       => 'group_assist_number',
			'type'     => 'switcher',
			'title'    => '显示序号',
		),

		array(
			'id'     => 'group_assist_item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_assist_name', 'group_assist_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_assist_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_assist_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'group_assist_des',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '描述',
				),

				array(
					'id'      => 'group_assist_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'group_assist_color',
					'class'   => 'be-child-item',
					'type'    => 'color',
					'title'   => '颜色',
				),

				array(
					'id'      => 'group_assist_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

			),

			'default' => array(
				array(
					'group_assist_name'  => '名称',
					'group_assist_title' => '标题',
					'group_assist_des'   => '描述',
					'group_assist_ico'   => 'be be-display',
					'group_assist_url'   => '',
					'group_assist_color' => '#999',
				),

				array(
					'group_assist_name'  => '名称',
					'group_assist_title' => '标题',
					'group_assist_des'   => '描述',
					'group_assist_ico'   => 'be be-schedule',
					'group_assist_url'   => '',
					'group_assist_color' => '#a87d94',
				),

				array(
					'group_assist_name'  => '名称',
					'group_assist_title' => '标题',
					'group_assist_des'   => '描述',
					'group_assist_ico'   => 'be be-personoutline',
					'group_assist_url'   => '',
					'group_assist_color' => '#88b7cc',
				),

				array(
					'group_assist_name'  => '名称',
					'group_assist_title' => '标题',
					'group_assist_des'   => '描述',
					'group_assist_ico'   => 'be be-favoriteoutline',
					'group_assist_url'   => '',
					'group_assist_color' => '#e38b8d',
				),
			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '咨询',
	'icon'        => 'dashicons dashicons-format-chat',
	'description' => '公司咨询模块',
	'fields'      => array(

		array(
			'id'       => 'group_strong',
			'type'     => 'switcher',
			'title'    => '咨询',
		),

		array(
			'id'       => 'group_strong_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认10</span>',
			'default'  => 10,
		),

		array(
			'id'       => 'group_strong_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '咨询',
		),

		array(
			'id'       => 'group_strong_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '咨询说明',
		),

		array(
			'id'       => 'group_strong_title_c',
			'type'     => 'switcher',
			'title'    => '标题居中',
			'default'  => true,
		),

		array(
			'id'      => 'group_strong_id',
			'type'    => 'text',
			'title'   => '右侧文章',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'        => 'group_strong_inf',
			'type'      => 'wp_editor',
			'height'    => '150px',
			'title'     => '内容',
			'sanitize'  => false,
			'default'   => '<h2>H2 响应式设计</h2><div class="clear"></div><h3>H3 自定义颜色风格</h3><h4>H4 响应式设计不依赖任何前端框架</h4><h5>H5 不依赖任何前端框架</h5><h6>H6 响应式设计自定义颜色风格不依赖任何前端框架风格</h6>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '帮助',
	'icon'        => 'dashicons dashicons-editor-help',
	'description' => '调用方法：编辑页面或者文章，在下面勾选"添加到公司首页帮助模块"',
	'fields'      => array(

		array(
			'id'       => 'group_help',
			'type'     => 'switcher',
			'title'    => '帮助',
			'default'  => true,
		),

		array(
			'id'       => 'group_help_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认11</span>',
			'default'  => 11,
		),

		array(
			'id'       => 'group_help_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '帮助',
		),

		array(
			'id'       => 'group_help_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '帮助说明',
		),

		array(
			'id'     => 'group_help_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_help_name', 'group_help_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_help_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_help_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'       => 'group_help_text',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '内容',
					'sanitize' => false,
				),
			),

			'default' => array(
				array(
					'group_help_name'  => '名称',
					'group_help_title' => '专业在线咨询',
					'group_help_text'  => 'HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。',
				),

				array(
					'group_help_name'  => '名称',
					'group_help_title' => '专业在线咨询',
					'group_help_text'  => 'HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。',
				),

				array(
					'group_help_name'  => '名称',
					'group_help_title' => '专业在线咨询',
					'group_help_text'  => 'HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。',
				),
			)
		),

		array(
			'id'       => 'group_help_num',
			'type'     => 'switcher',
			'title'    => '显示序号',
			'default'  => true,
		),

		array(
			'id'       => 'group_help_img',
			'type'     => 'upload',
			'title'    => '左侧图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '工具',
	'icon'        => 'dashicons dashicons-admin-tools',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_tool',
			'type'     => 'switcher',
			'title'    => '工具',
			'default'  => true,
		),

		array(
			'id'       => 'tool_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认12</span>',
			'default'  => 12,
		),

		array(
			'id'       => 'tool_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '工具',
		),

		array(
			'id'       => 'tool_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '实用工具',
		),

		array(
			'id'     => 'group_tool_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_tool_name', 'group_tool_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_tool_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_tool_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'group_tool_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'group_tool_svg',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '彩色图标',
				),

				array(
					'id'       => 'group_tool_txt',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '内容',
					'sanitize' => false,
				),

				array(
					'id'      => 'group_tool_btn',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮',
				),

				array(
					'id'      => 'group_tool_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'group_tool_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'group_tool_name'  => '名称',
					'group_tool_title' => '标题',
					'group_tool_ico'   => 'be be-eye',
					'group_tool_svg'   => '',
					'group_tool_txt'   => '内容文字',
					'group_tool_btn'   => '按钮',
					'group_tool_url'   => '#',
					'group_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'group_tool_name'  => '名称',
					'group_tool_title' => '标题',
					'group_tool_ico'   => 'be be-schedule',
					'group_tool_svg'   => '',
					'group_tool_txt'   => '内容文字',
					'group_tool_btn'   => '按钮',
					'group_tool_url'   => '#',
					'group_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'group_tool_name'  => '名称',
					'group_tool_title' => '标题',
					'group_tool_ico'   => 'be be-favoriteoutline',
					'group_tool_svg'   => '',
					'group_tool_txt'   => '内容文字',
					'group_tool_btn'   => '按钮',
					'group_tool_url'   => '#',
					'group_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'group_tool_name'  => '名称',
					'group_tool_title' => '标题',
					'group_tool_ico'   => 'be be-skyatlas',
					'group_tool_svg'   => '',
					'group_tool_txt'   => '内容文字',
					'group_tool_btn'   => '按钮',
					'group_tool_url'   => '#',
					'group_tool_img'   => $imgdefault . '/random/320.jpg',
				),
			)
		),

		array(
			'id'      => 'stool_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl3456,
			'default' => '4',
		),

		array(
			'id'       => 'group_tool_txt_c',
			'type'     => 'switcher',
			'title'    => '说明文字居中',
			'default'  => true,
		),

	)
));


ZMOP::createSection( $prefix, array(
	'title'       => '产品模块',
	'icon'        => 'dashicons dashicons-tide',
	'description' => '产品模块',
	'fields'      => array(

		array(
			'id'       => 'group_products',
			'type'     => 'switcher',
			'title'    => '产品模块',
		),

		array(
			'id'       => 'group_products_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认13</span>',
			'default'  => 13,
		),

		array(
			'id'       => 'group_products_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'group_products_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '主要产品',
		),

		array(
			'id'       => 'group_products_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '产品日志模块',
		),

		array(
			'id'       => 'group_products_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'group_products_url',
			'type'     => 'text',
			'title'    => '输入更多按钮链接地址',
			'after'    => '留空则不显示',
		),

		array(
			'id'      => 'group_products_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '服务宗旨',
	'icon'        => 'dashicons dashicons-feedback',
	'description' => '服务宗旨',
	'fields'      => array(

		array(
			'id'       => 'service',
			'type'     => 'switcher',
			'title'    => '服务宗旨',
			'default'  => true,
		),

		array(
			'id'       => 'service_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认14</span>',
			'default'  => 14,
		),

		array(
			'id'       => 'service_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '服务宗旨',
		),


		array(
			'id'       => 'service_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '服务宗旨模块',
		),

		array(
			'id'       => 'service_bg_img',
			'type'     => 'upload',
			'title'    => '背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'service_c_img',
			'type'     => 'upload',
			'title'    => '中间模块图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'        => 'service_c_txt',
			'type'      => 'wp_editor',
			'title'     => '内容',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'     => 'group_service_l',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加左侧模块',
			'accordion_title_by' => array( 'group_service_name_l', 'group_service_title_l' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_service_name_l',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_service_title_l',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'       => 'group_service_txt_l',
					'class'   => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '描述',
					'sanitize' => false,
				),

				array(
					'id'      => 'group_service_ico_l',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'       => 'group_service_img_l',
					'class'    => 'be-child-item',
					'type'     => 'upload',
					'title'    => '图片',
					'preview'  => true,
				),
			),

			'default' => array(
				array(
					'group_service_name_l'  => '名称',
					'group_service_title_l' => '模块标题',
					'group_service_ico_l'   => 'be be-search',
					'group_service_img_l'   => '',
					'group_service_txt_l'   => '输入一段简短的模块文字描述',
				),

				array(
					'group_service_name_l'  => '名称',
					'group_service_title_l' => '模块标题',
					'group_service_ico_l'   => 'be be-schedule',
					'group_service_img_l'   => '',
					'group_service_txt_l'   => '输入一段简短的模块文字描述',
				),

				array(
					'group_service_name_l'  => '名称',
					'group_service_title_l' => '模块标题',
					'group_service_ico_l'   => 'be be-skyatlas',
					'group_service_img_l'   => '',
					'group_service_txt_l'   => '输入一段简短的模块文字描述',
				),
			)
		),

		array(
			'id'     => 'group_service_r',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加右侧模块',
			'accordion_title_by' => array( 'group_service_name_r', 'group_service_title_r' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_service_name_r',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_service_title_r',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'       => 'group_service_txt_r',
					'class'   => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '描述',
					'sanitize' => false,
				),

				array(
					'id'      => 'group_service_ico_r',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'       => 'group_service_img_r',
					'class'    => 'be-child-item',
					'type'     => 'upload',
					'title'    => '图片',
					'preview'  => true,
				),

			),

			'default' => array(
				array(
					'group_service_name_r'  => '名称',
					'group_service_title_r' => '模块标题',
					'group_service_ico_r'   => 'be be-thumbs-up-o',
					'group_service_img_r'   => '',
					'group_service_txt_r'   => '输入一段简短的模块文字描述',
				),

				array(
					'group_service_name_r'  => '名称',
					'group_service_title_r' => '模块标题',
					'group_service_ico_r'   => 'be be-email',
					'group_service_img_r'   => '',
					'group_service_txt_r'   => '输入一段简短的模块文字描述',
				),

				array(
					'group_service_name_r'  => '名称',
					'group_service_title_r' => '模块标题',
					'group_service_ico_r'   => 'be be-favoriteoutline',
					'group_service_img_r'   => '',
					'group_service_txt_r'   => '输入一段简短的模块文字描述',
				),
			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => 'WOO产品',
	'icon'        => 'dashicons dashicons-cart',
	'description' => '需要安装商城插件 WooCommerce 并发表产品',
	'fields'      => array(

		array(
			'id'       => 'g_product',
			'type'     => 'switcher',
			'title'    => 'WOO产品',
		),

		array(
			'id'       => 'g_product_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认15</span>',
			'default'  => 15,
		),

		array(
			'id'       => 'g_product_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => 'WOO产品',
		),

		array(
			'id'       => 'g_product_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => 'WOO产品模块',
		),

		array(
			'id'       => 'g_product_id',
			'type'     => 'text',
			'title'    => '输入产品分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'g_product_n',
			'type'     => 'number',
			'title'    => '产品显示数量',
			'default'  => 4,
		),

		array(
			'id'      => 'group_woo_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '特色',
	'icon'        => 'dashicons dashicons-share-alt',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_ico',
			'type'     => 'switcher',
			'title'    => '特色',
			'default'  => true,
		),

		array(
			'id'       => 'group_ico_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 16,
			'after'    => '<span class="after-perch">默认16</span>',
		),

		array(
			'id'       => 'group_ico_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '特色',
		),

		array(
			'id'       => 'group_ico_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '特色模块',
		),

		array(
			'id'     => 'group_ico_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_ico_name', 'group_ico_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_ico_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_ico_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'group_ico_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'group_ico_svg',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '彩色图标',
				),

				array(
					'id'      => 'group_ico_color',
					'class'   => 'be-child-item',
					'type'    => 'color',
					'title'   => '颜色',
				),

				array(
					'id'       => 'group_ico_txt',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '内容',
					'sanitize' => false,
				),

				array(
					'id'      => 'group_ico_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'group_ico_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-editor',
					'group_ico_svg'   => '',
					'group_ico_color' => '#e38b8d',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),

				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-schedule',
					'group_ico_svg'   => '',
					'group_ico_color' => '#a87d94',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),

				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-editor',
					'group_ico_svg'   => '',
					'group_ico_color' => '#89b8cd',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),

				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-schedule',
					'group_ico_svg'   => '',
					'group_ico_color' => '#afb4aa',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),

				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-editor',
					'group_ico_svg'   => '',
					'group_ico_color' => '#d6c2c1',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),

				array(
					'group_ico_name'  => '名称',
					'group_ico_title' => '标题',
					'group_ico_ico'   => 'be be-schedule',
					'group_ico_svg'   => '',
					'group_ico_color' => '#feaba3',
					'group_ico_txt'   => '内容文字',
					'group_ico_url'   => '#',
					'group_ico_img'   => '',
				),
			)
		),

		array(
			'id'      => 'grid_ico_group_n',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl24568,
			'default' => '6',
		),

		array(
			'id'       => 'group_ico_b',
			'type'     => 'switcher',
			'title'    => '图标无背景色',
		),

		array(
			'id'       => 'group_img_ico',
			'type'     => 'switcher',
			'title'    => '不显示文字(仅适用于图片)',
		),

		array(
			'id'       => 'group_md_gray',
			'type'     => 'switcher',
			'title'    => '图片灰色',
		),
	)
));


ZMOP::createSection( $prefix, array(
	'title'       => '描述',
	'icon'        => 'dashicons dashicons-welcome-write-blog',
	'description' => '描述',
	'fields'      => array(

		array(
			'id'       => 'group_post',
			'type'     => 'switcher',
			'title'    => '描述',
		),

		array(
			'id'       => 'group_post_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 17,
			'after'    => '<span class="after-perch">默认17</span>',
		),

		array(
			'id'       => 'group_post_id',
			'type'     => 'text',
			'title'    => '输入文章或页面ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '简介',
	'icon'        => 'dashicons dashicons-admin-page',
	'description' => '简介',
	'fields'      => array(

		array(
			'id'       => 'group_features',
			'type'     => 'switcher',
			'title'    => '简介',
		),

		array(
			'id'       => 'group_features_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 18,
			'after'    => '<span class="after-perch">默认18</span>',
		),

		array(
			'id'       => 'features_t',
			'type'     => 'text',
			'title'    => '自定义标题',
			'default'  => '本站简介',
		),

		array(
			'id'       => 'features_des',
			'type'     => 'text',
			'title'    => '自定义描述',
			'default'  => '本站简介描述',
		),

		array(
			'id'          => 'features_id',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'       => 'features_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),
		array(
			'id'      => 'group_features_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'       => 'features_url',
			'type'     => 'text',
			'title'    => '输入更多按钮链接地址',
			'after'    => '留空则不显示',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '展示',
	'icon'        => 'dashicons dashicons-welcome-view-site',
	'description' => '展示',
	'fields'      => array(

		array(
			'id'       => 'group_img',
			'type'     => 'switcher',
			'title'    => '展示',
		),

		array(
			'id'       => 'group_img_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 19,
			'after'    => '<span class="after-perch">默认19</span>',
		),

		array(
			'id'       => 'group_img_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'group_img_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'  => $mid,
		),

		array(
			'id'      => 'group_img_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '计数器',
	'icon'        => 'dashicons dashicons-clock',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_counter',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'       => 'counter_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认20</span>',
			'default'  => 20,
		),

		array(
			'id'      => 'group_counter_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl234,
			'default' => '2',
		),

		array(
			'id'     => 'group_counter_item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_counter_name', 'group_counter_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_counter_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_counter_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'group_counter_num',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '数值',
				),

				array(
					'id'      => 'group_counter_speed',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '速度（在多少秒内达到设定的数值）',
				),

				array(
					'id'      => 'group_counter_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'group_counter_color',
					'class'   => 'be-child-item',
					'type'    => 'color',
					'title'   => '图标颜色',
				),

			),

			'default' => array(
				array(
					'group_counter_name'  => '名称',
					'group_counter_title' => '网站浏览量',
					'group_counter_num'   => '987654',
					'group_counter_speed' => '80000',
					'group_counter_ico'   => 'be be-favoriteoutline',
					'group_counter_color' => '#9f935d',
				),

				array(
					'group_counter_name'  => '名称',
					'group_counter_title' => '在线用户',
					'group_counter_num'   => '123456',
					'group_counter_speed' => '80000',
					'group_counter_ico'   => 'be be-skyatlas',
					'group_counter_color' => '#8e4671',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '合作',
	'icon'        => 'dashicons dashicons-groups',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'group_coop',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),


		array(
			'id'       => 'group_coop_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '合作伙伴',
		),

		array(
			'id'       => 'group_coop_des',
			'type'     => 'text',
			'title'    => '自定义描述',
			'default'  => '我们合作的伙伴',
		),

		array(
			'id'       => 'coop_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认21</span>',
			'default'  => 21,
		),

		array(
			'id'      => 'group_coop_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl23456,
			'default' => '4',
		),

		array(
			'id'     => 'group_coop_item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'group_coop_name', 'group_coop_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'group_coop_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'group_coop_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'group_coop_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

				array(
					'id'      => 'group_coop_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

			),

			'default' => array(
				array(
					'group_coop_name'  => '名称',
					'group_coop_title' => '标题',
					'group_coop_img'   => $imgdefault . '/random/320.jpg',
					'group_coop_url'   => '',
				),

				array(
					'group_coop_name'  => '名称',
					'group_coop_title' => '标题',
					'group_coop_img'   => $imgdefault . '/random/320.jpg',
					'group_coop_url'   => '#',
				),

				array(
					'group_coop_name'  => '名称',
					'group_coop_title' => '标题',
					'group_coop_img'   => $imgdefault . '/random/320.jpg',
					'group_coop_url'   => '',
				),

				array(
					'group_coop_name'  => '名称',
					'group_coop_title' => '标题',
					'group_coop_img'   => $imgdefault . '/random/320.jpg',
					'group_coop_url'   => '#',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '分类左右图',
	'icon'        => 'dashicons dashicons-format-gallery',
	'description' => '图片调用方法：编辑选定的分类中的一篇文章，在编辑框下面“将文章添加到”面板中，勾选“分类推荐文章”，并更新发表',
	'fields'      => array(

		array(
			'id'       => 'group_wd',
			'type'     => 'switcher',
			'title'    => '分类左右图',
		),

		array(
			'id'       => 'group_wd_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认22</span>',
			'default'  => 22,
		),

		array(
			'id'       => 'group_wd_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '一栏小工具',
	'icon'        => 'dashicons dashicons-align-wide',
	'description' => '一栏小工具',
	'fields'      => array(

		array(
			'id'       => 'group_widget_one',
			'type'     => 'switcher',
			'title'    => '一栏小工具',
		),

		array(
			'id'       => 'group_widget_one_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认23</span>',
			'default'  => 23,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '最新文章',
	'icon'        => 'dashicons dashicons-format-aside',
	'description' => '最新文章',
	'fields'      => array(

		array(
			'id'       => 'group_new',
			'type'     => 'switcher',
			'title'    => '最新文章',
			'default'  => true,
		),

		array(
			'id'       => 'group_new_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认24</span>',
			'default'  => 24,
		),

		array(
			'id'       => 'group_new_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '最新文章',
		),

		array(
			'id'       => 'group_new_more_url',
			'type'     => 'text',
			'title'    => '标题链接',
		),

		array(
			'id'       => 'group_new_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '这里是本站最新发表的文章',
		),

		array(
			'id'       => 'group_new_list',
			'type'     => 'switcher',
			'title'    => '标题模式',
			'default'  => true,
		),

		array(
			'id'       => 'group_new_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 10,
		),

		array(
			'id'      => 'not_group_new',
			'type'    => 'checkbox',
			'title'   => '排除的分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '商品模块',
	'icon'        => 'dashicons dashicons-cart',
	'description' => '商品模块',
	'fields'      => array(

		array(
			'id'       => 'g_tao_h',
			'type'     => 'switcher',
			'title'    => '商品模块',
		),

		array(
			'id'       => 'g_tao_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认25</span>',
			'default'  => 25,
		),

		array(
			'id'       => 'g_tao_h_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'g_tao_sort',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => array(
				'time'  => '发表时间',
				'views' => '浏览量',
			),
			'default' => 'time',
		),

		array(
			'id'      => 'g_tao_home_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => array(
				'4' => '四栏',
				'5' => '五栏',
				'6' => '六栏',
			),

			'default' => '4',
		),

		array(
			'id'       => 'g_tao_h_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '三栏小工具',
	'icon'        => 'dashicons dashicons-editor-insertmore',
	'description' => '三栏小工具',
	'fields'      => array(

		array(
			'id'       => 'group_widget_three',
			'type'     => 'switcher',
			'title'    => '三栏小工具',
		),

		array(
			'id'       => 'group_widget_three_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认26</span>',
			'default'  => 26,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '新闻资讯A',
	'icon'        => 'dashicons dashicons-editor-table',
	'description' => '新闻资讯A',
	'fields'      => array(

		array(
			'id'       => 'group_cat_a',
			'type'     => 'switcher',
			'title'    => '新闻资讯A',
		),

		array(
			'id'       => 'group_cat_a_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 27,
			'after'    => '<span class="after-perch">默认27</span>',
		),

		array(
			'id'       => 'group_cat_a_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'group_cat_a_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'group_cat_a_top',
			'type'     => 'switcher',
			'title'    => '第一篇调用分类推荐文章',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '两栏小工具',
	'icon'        => 'dashicons dashicons-columns',
	'description' => '两栏小工具',
	'fields'      => array(

		array(
			'id'       => 'group_widget_two',
			'type'     => 'switcher',
			'title'    => '两栏小工具',
		),

		array(
			'id'       => 'group_widget_two_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认28</span>',
			'default'  => 28,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '新闻资讯B',
	'icon'        => 'dashicons dashicons-editor-table',
	'description' => '新闻资讯B',
	'fields'      => array(

		array(
			'id'       => 'group_cat_b',
			'type'     => 'switcher',
			'title'    => '新闻资讯B',
		),

		array(
			'id'       => 'group_cat_b_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 29,
			'after'    => '<span class="after-perch">默认29</span>',
		),

		array(
			'id'       => 'group_cat_b_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'group_cat_b_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'group_cat_b_top',
			'type'     => 'switcher',
			'title'    => '第一篇调用分类置顶文章',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => 'AJAX分类',
	'icon'        => 'dashicons dashicons-category',
	'description' => 'AJAX加载TAB分类',
	'fields'      => array(

		array(
			'id'       => 'group_tab',
			'type'     => 'switcher',
			'title'    => 'AJAX分类',
		),

		array(
			'id'       => 'group_tab_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 30,
			'after'    => '<span class="after-perch">默认30</span>',
		),

		array(
			'id'       => 'group_tab_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => 'AJAX分类',
		),

		array(
			'id'       => 'group_tab_des',
			'type'     => 'text',
			'title'    => '自定义描述',
			'default'  => '这里是描述',
		),

		array(
			'id'     => 'group_tab_items',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'fields' => array(
				array(
					'id'    => 'group_tab_items_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'group_tab_cat_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'group_tab_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'group_tab_cat_chil',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '子分类文章',
					'inline'  => true,
					'options' => array(
						'true'   => '显示',
						'false'  => '不显示',
					),
				),

				array(
					'id'      => 'group_tabs_mode',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
						'title'    => '标题',
					),
				),

				array(
					'id'      => 'group_tabs_f',
					'type'    => 'radio',
					'title'   => '分栏',
					'inline'  => true,
					'options' => $fl3456,
				),

				array(
					'id'      => 'group_tabs_nav_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '翻页模式',
					'inline'  => true,
					'options' => array(
						'turn'   => '数字翻页',
						'more'   => '更多按钮',
						'full'   => '同时显示',
					),
				),

			),

			'default' => array(
				array(
					'group_tab_items_title' => '模块A',
					'group_tab_cat_id'      => '1',
					'group_tab_n'           => '10',
					'group_tabs_mode'       => 'photo',
					'group_tabs_f'          => '5',
					'group_tabs_nav_btn'    => 'full',
					'group_tab_cat_chil'    => true,
				),

			)
		),

		array(
			'id'       => 'group_tab_title_h',
			'type'     => 'switcher',
			'title'    => '图片模式标题显隐',
			'default'  => true,
		),

		array(
			'id'       => 'group_tab_title_c',
			'type'     => 'switcher',
			'title'    => '图片模式标题居中',
			'default'  => true,
		),

		array(
			'id'       => 'group_tab_img_meta',
			'type'     => 'switcher',
			'title'    => '图片模式显示文章信息',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '展望',
	'icon'        => 'dashicons dashicons-image-filter',
	'description' => '展望模块',
	'fields'      => array(

		array(
			'id'       => 'group_outlook',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'       => 'group_outlook_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认31</span>',
			'default'  => 31,
		),

		array(
			'id'       => 'group_outlook_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '展示未来',
		),

		array(
			'id'        => 'group_outlook_content',
			'type'      => 'wp_editor',
			'title'     => '内容',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'       => 'group_outlook_more',
			'type'     => 'text',
			'title'    => '按钮文字',
			'default'   => '展望按钮',
		),

		array(
			'id'       => 'group_outlook_url',
			'type'     => 'text',
			'title'    => '链接',
		),

		array(
			'id'       => 'group_outlook_bg',
			'type'     => 'upload',
			'title'    => '上传背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '新闻资讯C',
	'icon'        => 'dashicons dashicons-editor-table',
	'description' => '新闻资讯C',
	'fields'      => array(

		array(
			'id'       => 'group_cat_c',
			'type'     => 'switcher',
			'title'    => '新闻资讯C',
		),

		array(
			'id'       => 'group_cat_c_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 32,
			'after'    => '<span class="after-perch">默认32</span>',
		),

		array(
			'id'       => 'group_cat_c_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'group_cat_c_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'group_cat_c_img',
			'type'     => 'switcher',
			'title'    => '第一篇显示缩略图',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '热门推荐',
	'icon'        => 'dashicons dashicons-buddicons-groups',
	'description' => '热门推荐',
	'fields'      => array(

		array(
			'id'       => 'group_carousel',
			'type'     => 'switcher',
			'title'    => '热门推荐',
		),

		array(
			'id'       => 'group_carousel_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 33,
			'after'    => '<span class="after-perch">默认33</span>',
		),

		array(
			'id'       => 'carousel_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 8,
		),

		array(
			'id'       => 'group_carousel_t',
			'type'     => 'text',
			'title'    => '标题',
			'default'  => '热门推荐',
		),

		array(
			'id'       => 'carousel_des',
			'type'     => 'text',
			'title'    => '说明',
			'default'  => '热门推荐说明',
		),

		array(
			'id'          => 'group_carousel_id',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'       => 'group_carousel_c',
			'type'     => 'switcher',
			'title'    => '标题居中',
			'default'  => true,
		),

		array(
			'id'       => 'group_gallery',
			'type'     => 'switcher',
			'title'    => '调用图片日志',
		),

		array(
			'id'       => 'group_gallery_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '输入图片分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'carousel_bg_img',
			'type'     => 'upload',
			'title'    => '背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '新闻资讯D',
	'icon'        => 'dashicons dashicons-editor-table',
	'description' => '以左右模块展示两个分类文章列表',
	'fields'      => array(

		array(
			'id'       => 'group_cat_d',
			'type'     => 'switcher',
			'title'    => '新闻资讯D',
		),

		array(
			'id'       => 'group_cat_d_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 34,
			'after'    => '<span class="after-perch">默认34</span>',
		),

		array(
			'id'       => 'group_cat_d_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 8,
		),

		array(
			'id'          => 'group_cat_d_l_id',
			'type'        => 'select',
			'title'       => '选择左侧分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'       => 'group_cat_d_l_img',
			'type'     => 'upload',
			'title'    => '左侧图片',
			'default'  => $imgdefault . '/random/560.jpg',
			'preview'  => true,
		),

		array(
			'id'          => 'group_cat_d_r_id',
			'type'        => 'select',
			'title'       => '选择右侧分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'       => 'group_cat_d_r_img',
			'type'     => 'upload',
			'title'    => '右侧图片',
			'default'  => $imgdefault . '/random/560.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => 'Ajax分类短代码',
	'icon'        => 'dashicons dashicons-welcome-widgets-menus',
	'description' => '通过添加短代码调用分类文章',
	'fields'      => array(

		array(
			'id'       => 'group_ajax_cat',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'group_ajax_cat_post_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认35</span>',
			'default'  => 35,
		),

		array(
			'id'       => 'group_ajax_cat_post_code',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '输入短代码',
			'default'  => '[be_ajax_post]',
		),

		array(
			'class'    => 'be-help-code',
			'title'    => '短代码示例',
			'type'     => 'content',
			'content'  => $shortcode_help,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '会员商品',
	'icon'        => 'dashicons dashicons-cloud',
	'description' => '需配合 ErphpDown 插件',
	'fields'      => array(

		array(
			'id'       => 'group_assets',
			'type'     => 'switcher',
			'title'    => '会员商品',
		),

		array(
			'id'       => 'group_assets_t',
			'type'     => 'text',
			'title'    => '标题',
			'default' => '推荐商品',
		),

		array(
			'id'       => 'group_assets_des',
			'type'     => 'text',
			'title'    => '说明',
			'default' => '推荐商品说明',
		),

		array(
			'id'       => 'group_assets_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认36</span>',
			'default'  => 36,
		),

		array(
			'id'       => 'group_assets_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 5,
		),

		array(
			'id'      => 'group_assets_get',
			'type'    => 'radio',
			'title'   => '调用模式',
			'inline'  => true,
			'options' => array(
				'cat'   => '分类',
				'post'  => '文章',
			),
			'default' => 'cat',
		),

		array(
			'id'       => 'group_assets_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'group_assets_post_id',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'      => 'group_assets_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => array(
				'4' => '四栏',
				'5' => '五栏',
				'6' => '六栏',
			),
			'default' => '5',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '其它',
	'icon'        => 'dashicons dashicons-lightbulb',
	'description' => '其它',
	'fields'      => array(

		array(
			'id'       => 'g_line',
			'type'     => 'switcher',
			'title'    => '隔行变色',
			'default'  => true,
		),

		array(
			'id'       => 'group_no_cat_child',
			'type'     => 'switcher',
			'title'    => '显示子分类文章',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '备份公司设置',
	'icon'        => 'dashicons dashicons-update',
	'description' => '将主题公司主页设置数据导出为“<span style="color: #000;">公司主页备份 + 日期.json</span>”文件，并下载到本地',
	'fields'      => array(

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '将导出的“<span style="color: #000;">公司主页备份 + 日期.json</span>”文件用记事本打开',
		),

		array(
			'class' => 'be-child-item',
			'type'  => 'backup_co',
		),

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '请不要随意输入内容，并执行导入操作，否则所有设置将消失！',
		),
	)
) );