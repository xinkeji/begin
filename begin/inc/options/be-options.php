<?php if ( ! defined( 'ABSPATH' )  ) { die; }
if ( ! function_exists( 'be_get_option' ) ) {
	function be_get_option( $option = '', $default = null ) {
		$options = get_option( 'be_home' );
		return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}

$prefix = 'be_home';

ZMOP::createOptions( $prefix, array(
	'framework_title'         => '首页设置',
	'framework_class'         => 'be-box',

	'menu_title'              => '首页设置',
	'menu_slug'               => 'be-options',
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
$bloghome    = home_url( '/' );

ZMOP::createSection( $prefix, array(
	'id'     => 'home_setting',
	'title'  => '首页设置',
	'icon'   => 'dashicons dashicons-admin-home',
) );

// 首页选择
ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '首页布局',
	'icon'        => '',
	'description' => '选择一个首页布局',
	'fields'      => array(

		array(
			'id'      => 'layout',
			'type'    => 'radio',
			'title'   => '首页布局选择',
			'options' => array(
				'blog'   => '博客布局',
				'img'    => '图片布局',
				'grid'   => '分类图片',
				'cms'    => '杂志布局',
				'group'  => '公司主页',
			),
			'default' => 'blog',
		),

		array(
			'title'   => '页面使用首页布局',
			'type'    => 'content',
			'content' => '新建页面 → 右侧页面属性面板 → 模板，选择对应的模板发表即可。',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '首页幻灯',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'slider',
			'type'     => 'switcher',
			'title'    => '幻灯',
			'default'  => true,
		),

		array(
			'id'     => 'slider_home',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加幻灯',
			'accordion_title_by' => array( 'slider_name', 'slider_home_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'slider_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'slider_home_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'slider_home_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'slider_home_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'slider_name'       => '名称',
					'slider_home_title' => '标题',
					'slider_home_img'   => $imgdefault . '/options/1200.jpg',
					'slider_home_url'   => '',
				),

				array(
					'slider_name'       => '名称',
					'slider_home_title' => '标题',
					'slider_home_img'   => $imgdefault . '/options/1200.jpg',
					'slider_home_url'   => '',
				),
			)
		),

		array(
			'id'       => 'slider_home_occupy',
			'type'     => 'upload',
			'title'    => '占位图',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
			'after'    => '保持与第一个幻灯图片相同',
		),

		array(
			'id'       => 'slide_post',
			'class'    => 'be-parent-item',
			'type'     => 'switcher',
			'title'    => '右侧模块',
			'default'  => true,
		),

		array(
			'id'       => 'slide_post_m',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '移动端显示',
			'label'    => '',
			'default'  => true,
		),

		array(
			'id'     => 'slider_home_post',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加两个模块',
			'accordion_title_by' => array( 'slider_post_name', 'slider_post_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'slider_post_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'slider_post_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'slider_post_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'slider_post_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'slider_post_name'  => '名称',
					'slider_post_title' => '标题',
					'slider_post_img'   => $imgdefault . '/random/560.jpg',
					'slider_post_url'   => '',
				),

				array(
					'slider_post_name'  => '名称',
					'slider_post_title' => '标题',
					'slider_post_img'   => $imgdefault . '/random/560.jpg',
					'slider_post_url'   => '',
				),
			)
		),

		array(
			'id'       => 'owl_time',
			'type'     => 'number',
			'after'    => '<span class="after-perch">默认4000毫秒</span>',
			'title'    => '切换间隔',
			'default'  => 4000,
		),

		array(
			'id'       => 'slide_progress',
			'type'     => 'switcher',
			'title'    => '进度条',
			'label'    => '',
			'default'  => true,
		),

		array(
			'id'       => 'show_img_crop',
			'type'     => 'switcher',
			'title'    => '自动裁剪图片',
			'label'    => '仅在缩略图裁剪模式下有效',
		),

		array(
			'id'       => 'img_h_w',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '宽',
			'after'    => '<span class="after-perch">默认900</span>',
			'default'  => 900,
		),

		array(
			'id'       => 'img_h_h',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '高',
			'after'    => '<span class="after-perch">默认200</span>',
			'default'  => 200,
		),

		array(
			'id'       => 'show_slider_video',
			'class'    => 'be-parent-item',
			'type'     => 'switcher',
			'title'    => '仅显示一个视频',
			'label'    => '',
		),

		array(
			'id'       => 'show_slider_video_url',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => 'MP4视频',
		),

		array(
			'id'       => 'show_slider_video_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '视频封面',
		),

		array(
			'id'       => 'slider_only_img',
			'class'    => 'be-parent-item',
			'type'     => 'switcher',
			'title'    => '仅显示一张图片',
			'label'    => '',
		),

		array(
			'id'       => 'show_slider_img',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'show_slider_img_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '图片链接到',
			'subtitle' => '',
			'before'   => '',
			'after'    => '点击图片跳转的地址',
		),
	//end
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '专题专栏',
	'icon'        => '',
	'description' => '在首页显示专题专栏封面及列表',
	'fields'      => array(

		array(
			'type'     => 'content',
			'title'    => '专题专栏封面',
		),

		array(
			'id'       => 'code_special_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入专栏ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'special_f',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'       => 'blog_special_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入专题页面ID<span style="color: #cf4944;">（功能已弃用）</span>',
			'after'    => $mid,
		),

		array(
			'id'       => 'special_slider',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '滚动显示',
		),

		array(
			'type'     => 'content',
			'title'    => '专题专栏列表',
		),

		array(
			'id'       => 'code_special_list_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入专栏ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'blog_special_list_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '输入专题页面ID<span style="color: #cf4944;">（功能已弃用）</span>',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '分类封面',
	'icon'        => '',
	'description' => '在首页显示分类封面',
	'fields'      => array(

		array(
			'id'       => 'single_cover',
			'type'     => 'switcher',
			'title'    => '同时显示在正文页面顶部',
		),
		array(
			'id'       => 'cat_cover_adorn',
			'type'     => 'switcher',
			'title'    => '装饰动画',
			'default'  => true,
		),

		array(
			'id'       => 'cat_cover_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'cat_rec_m',
			'type'    => 'radio',
			'title'   => '模式选择',
			'inline'  => true,
			'options' => array(
				'cat_rec_ico'   => '图标',
				'cat_rec_img'   => '图片',
			),
			'default' => 'cat_rec_ico',
		),

		array(
			'id'      => 'cover_img_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $cover234,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '其它设置',
	'icon'        => '',
	'description' => '',
	'fields'      => array(

		array(
			'id'       => 'blank',
			'type'     => 'switcher',
			'title'    => '首页新窗口或标签打开链接',
		),

		array(
			'id'       => 'mobile_home_url',
			'type'     => 'text',
			'title'    => '移动端首页显示的页面',
			'after'    => '输入链接地址，不使用请留空',
		),

		array(
			'id'       => 'top_only',
			'type'     => 'switcher',
			'title'    => '首页推荐文字仅显示一个',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'home_setting',
	'title'       => '页脚链接',
	'icon'        => '',
	'description' => '在首页页脚显示友情链接',
	'fields'      => array(

		array(
			'id'       => 'footer_link',
			'type'     => 'switcher',
			'title'    => '首页页脚链接',
		),

		array(
			'id'       => 'link_f_cat',
			'type'     => 'text',
			'title'    => '链接分类',
			'after'    => '可以输入链接分类ID，显示特定的链接在首页，留空则显示全部链接',
		),

		array(
			'id'       => 'home_much_links',
			'type'     => 'switcher',
			'title'    => '简化样式',
		),
		array(
			'id'       => 'add_link_text',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '申请链接文字',
			'default'  => '申请友链',
		),

		array(
			'id'       => 'home_link_ico',
			'type'     => 'switcher',
			'title'    => '显示网站 Favicon 图标',
		),

		array(
			'id'       => 'footer_img',
			'type'     => 'switcher',
			'title'    => '图片链接',
		),

		array(
			'id'       => 'footer_link_no',
			'type'     => 'switcher',
			'title'    => '移动端不显示',
		),

		array(
			'id'          => 'link_url',
			'type'        => 'select',
			'title'       => '更多链接按钮',
			'placeholder' => '选择页面',
			'default'     => url_to_postid( $bloghome . '/link' ),
			'options'     => 'pages',
			'query_args'  => array(
				'posts_per_page' => -1
			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'     => 'blog_setting',
	'title'  => '博客布局',
	'icon'   => 'dashicons dashicons-admin-page',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'blog_setting',
	'title'       => 'Ajax模式',
	'icon'        => '',
	'description' => 'Ajax加载文章列表',
	'fields'      => array(

		array(
			'id'       => 'blog_ajax',
			'type'     => 'switcher',
			'title'    => '启用',
			'label'    => '',
		),

		array(
			'id'       => 'blog_ajax_n',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '15',
			'after'    => $anh,
		),

		array(
			'id'      => 'blog_ajax_id',
			'type'    => 'checkbox',
			'title'   => '选择分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'      => 'blog_ajax_cat_style',
			'type'    => 'radio',
			'title'   => '样式',
			'inline'  => true,
			'options' => array(
				'default' => '标准样式',
				'grid'    => '卡片样式',
			),
			'default' => 'default',
		),

		array(
			'id'      => 'blog_ajax_cat_btn',
			'type'    => 'radio',
			'title'   => '分类按钮',
			'inline'  => true,
			'options' => array(
				'yes'  => '显示',
				'no'   => '不显示',
			),
			'default' => 'yes',
		),

		array(
			'id'      => 'blog_ajax_cat_chil',
			'type'    => 'radio',
			'title'   => '子分类文章',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'blog_ajax_nav_btn',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'full',
		),

		array(
			'id'      => 'blog_ajax_infinite',
			'type'    => 'radio',
			'title'   => '更多按钮滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'blog_setting',
	'title'       => '常规模式',
	'icon'        => '',
	'description' => '博客布局常规模式设置，需要关闭Ajax模式',
	'fields'      => array(
		array(
			'id'      => 'blog_not_cat',
			'type'    => 'checkbox',
			'title'   => '选择排除的分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'       => 'order_btu',
			'type'     => 'switcher',
			'title'    => '文章排序按钮',
			'label'    => '',
		),

		array(
			'id'       => 'order_date',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '日期',
			'label'    => '按文章发表日期排序',
			'default'  => true,
		),

		array(
			'id'       => 'order_modified',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '更新',
			'label'    => '按文章最后更新日期排序',
			'default'  => true,
		),

		array(
			'id'       => 'order_comments',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '热评',
			'label'    => '按文章评论数排序',
			'default'  => true,
		),

		array(
			'id'       => 'order_views',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '热门',
			'label'    => '按文章浏览量排序',
			'default'  => true,
		),

		array(
			'id'       => 'order_like',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '点赞',
			'label'    => '按文章点赞数排序',
			'default'  => true,
		),

		array(
			'id'       => 'order_random',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '随机',
			'label'    => '随机排序',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'blog_setting',
	'title'       => '其它模块',
	'icon'        => '',
	'description' => '博客布局其它模块',
	'fields'      => array(

		array(
			'id'       => 'blog_top',
			'type'     => 'switcher',
			'title'    => '推荐文章',
		),

		array(
			'id'      => 'blog_top_n',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '篇数',
			'inline'  => true,
			'options' => array(
				'2'   => '2篇',
				'4'   => '更多',
			),
			'default' => '4',
		),

		array(
			'id'      => 'blog_top_id',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'       => 'blog_special',
			'type'     => 'switcher',
			'title'    => '专题',
		),

		array(
			'id'       => 'blog_special_list',
			'type'     => 'switcher',
			'title'    => '专题列表',
		),

		array(
			'id'       => 'blog_cat_cover',
			'type'     => 'switcher',
			'title'    => '分类封面',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'     => 'img_setting',
	'title'  => '图片布局',
	'icon'   => 'dashicons dashicons-format-image',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'img_setting',
	'title'       => 'Ajax模式',
	'icon'        => '',
	'description' => 'Ajax加载文章列表',
	'fields'      => array(

		array(
			'id'       => 'img_ajax',
			'type'     => 'switcher',
			'title'    => '启用',
			'label'    => '',
			'default'  => true,
		),

		array(
			'id'       => 'img_ajax_n',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '15',
			'after'    => $anh,
		),

		array(
			'id'      => 'img_ajax_id',
			'type'    => 'checkbox',
			'title'   => '选择分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'      => 'img_ajax_cat_btn',
			'type'    => 'radio',
			'title'   => '分类按钮',
			'inline'  => true,
			'options' => array(
				'yes'   => '显示',
				'no'   => '不显示',
			),
			'default' => 'yes',
		),

		array(
			'id'      => 'img_ajax_cat_chil',
			'type'    => 'radio',
			'title'   => '子分类文章',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'img_ajax_feature',
			'type'    => 'radio',
			'title'   => '缩略图模式',
			'inline'  => true,
			'options' => array(
				'0'   => '标准',
				'1'   => '图片',
			),
			'default' => '0',
		),

		array(
			'id'      => 'img_ajax_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '5',
		),

		array(
			'id'      => 'img_ajax_nav_btn',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'full',
		),

		array(
			'id'      => 'img_ajax_infinite',
			'type'    => 'radio',
			'title'   => '更多按钮滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'img_falls',
			'type'     => 'switcher',
			'title'    => '瀑布流模式',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'img_setting',
	'title'       => '常规模式',
	'icon'        => '',
	'description' => '图片布局常规模式设置，需要关闭Ajax模式',
	'fields'      => array(

		array(
			'id'      => 'grid_not_cat',
			'type'    => 'checkbox',
			'title'   => '选择排除的分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'      => 'img_f',
			'type'    => 'radio',
			'title'   => '图片布局分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'      => 'img_top_f',
			'type'    => 'radio',
			'title'   => '最新文章分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'       => 'grid_fall',
			'type'     => 'switcher',
			'title'    => '瀑布流模式',
			'label'    => '',
		),

		array(
			'id'       => 'hide_box',
			'type'     => 'switcher',
			'title'    => '图片布局显示摘要',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'img_setting',
	'title'       => '其它模块',
	'icon'        => '',
	'description' => '图片布局其它设置',
	'fields'      => array(

		array(
			'id'       => 'img_top',
			'type'     => 'switcher',
			'title'    => '推荐文章',
		),

		array(
			'id'      => 'img_top_id',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'       => 'img_special',
			'type'     => 'switcher',
			'title'    => '专题',
		),

		array(
			'id'       => 'img_cat_cover',
			'type'     => 'switcher',
			'title'    => '分类封面',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'catimg_setting',
	'title' => '分类图片',
	'icon'  => 'dashicons dashicons-format-gallery',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '最新文章',
	'icon'        => '',
	'description' => '分类图片首页最新文章',
	'fields'      => array(

		array(
			'id'       => 'grid_cat_new',
			'type'     => 'switcher',
			'title'    => '最新文章',
			'default'  => true,
		),

		array(
			'id'       => 'grid_cat_news_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'grid_new_f',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'       => 'grid_new_cat_n',
			'type'     => 'switcher',
			'title'    => '分类文章数不受上面限制',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '其它模块',
	'icon'        => '',
	'description' => '分类封面、条件筛选等',
	'fields'      => array(

		array(
			'id'       => 'grid_cat_slider',
			'type'     => 'switcher',
			'title'    => '幻灯',
			'default'  => true,
		),

		array(
			'id'       => 'catimg_top',
			'type'     => 'switcher',
			'title'    => '推荐文章',
		),

		array(
			'id'      => 'catimg_top_id',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'       => 'catimg_cat_cover',
			'type'     => 'switcher',
			'title'    => '分类封面',
		),

		array(
			'id'       => 'catimg_filter',
			'type'     => 'switcher',
			'title'    => '显示多条件筛选',
		),

		array(
			'id'       => 'catimg_special',
			'type'     => 'switcher',
			'title'    => '专题',
		),
	)
));


ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '分类模块A',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'imgcat_items_a',
			'type'     => 'switcher',
			'title'    => '显示',
			'default'  => true,
		),

		array(
			'id'     => 'catimg_items_a',
			'type'   => 'group',
			'title'  => '添加模块',
			'fields' => array(
				array(
					'id'    => 'catimg_items_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'catimg_items_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'catimg_items_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'catimg_items_mode',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
					),
				),

				array(
					'id'      => 'catimg_items_fl',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分栏（卡片仅支持3、4栏）',
					'inline'  => true,
					'options' => $fl3456,
				),

				array(
					'id'      => 'catimg_items_img',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '图片模式缩略图',
					'inline'  => true,
					'options' => array(
						'0'   => '正常',
						'1'   => '图片',
					),
				),

				array(
					'id'      => 'catimg_items_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分类按钮（仅适合多个分类）',
					'inline'  => true,
					'options' => array(
						'yes' => '显示',
						'no'  => '不显示',
					),
				),

				array(
					'id'      => 'catimg_items_chil',
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
					'id'      => 'catimg_items_nav_btn',
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

				array(
					'id'    => 'catimg_des',
					'class' => 'be-child-item',
					'type'  => 'switcher',
					'title' => '分类描述',
				),

				array(
					'id'    => 'catimg_items_des',
					'class' => 'be-child-item textarea-30',
					'type'  => 'textarea',
					'title' => '自定义分类描述',
				),
			),

			'default' => array(
				array(
					'catimg_items_title'   => '模块A',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',

				),

				array(
					'catimg_items_title'   => '模块B',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '杂志单栏小工具',
	'icon'        => '',
	'description' => '杂志单栏小工具',
	'fields'      => array(

		array(
			'id'       => 'grid_widget_one',
			'type'     => 'switcher',
			'title'    => '杂志单栏小工具',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '分类滚动模块',
	'icon'        => '',
	'description' => '分类滚动模块',
	'fields'      => array(

		array(
			'id'       => 'grid_carousel',
			'type'     => 'switcher',
			'title'    => '分类滚动模块',
		),

		array(
			'id'       => 'grid_carousel_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 8,
		),

		array(
			'id'          => 'grid_carousel_id',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'      => 'grid_carousel_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'id'       => 'grid_carousel_des',
			'type'     => 'switcher',
			'title'    => '分类描述',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '分类模块B',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'imgcat_items_b',
			'type'     => 'switcher',
			'title'    => '显示',
			'default'  => true,
		),

		array(
			'id'     => 'catimg_items_b',
			'type'   => 'group',
			'title'  => '添加模块',
			'fields' => array(
				array(
					'id'    => 'catimg_items_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'catimg_items_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'catimg_items_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'catimg_items_mode',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
					),
				),

				array(
					'id'      => 'catimg_items_fl',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分栏（卡片仅支持3、4栏）',
					'inline'  => true,
					'options' => $fl3456,
				),

				array(
					'id'      => 'catimg_items_img',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '图片模式缩略图',
					'inline'  => true,
					'options' => array(
						'0'   => '正常',
						'1'   => '图片',
					),
				),

				array(
					'id'      => 'catimg_items_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分类按钮（仅适合多个分类）',
					'inline'  => true,
					'options' => array(
						'yes' => '显示',
						'no'  => '不显示',
					),
				),

				array(
					'id'      => 'catimg_items_chil',
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
					'id'      => 'catimg_items_nav_btn',
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

				array(
					'id'    => 'catimg_des',
					'class' => 'be-child-item',
					'type'  => 'switcher',
					'title' => '分类描述',
				),

				array(
					'id'    => 'catimg_items_des',
					'class' => 'be-child-item textarea-30',
					'type'  => 'textarea',
					'title' => '自定义分类描述',
				),
			),

			'default' => array(
				array(
					'catimg_items_title'   => '模块A',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',

				),

				array(
					'catimg_items_title'   => '模块B',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => '杂志三栏小工具',
	'icon'        => '',
	'description' => '杂志三栏小工具',
	'fields'      => array(

		array(
			'id'       => 'grid_widget_two',
			'type'     => 'switcher',
			'title'    => '杂志三栏小工具',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'catimg_setting',
	'title'       => 'Ajax分类短代码',
	'icon'        => '',
	'description' => '通过添加短代码调用分类文章',
	'fields'      => array(

		array(
			'id'       => 'catimg_ajax_cat',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'catimg_ajax_cat_post_code',
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
	'parent'      => 'catimg_setting',
	'title'       => '分类模块C',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'imgcat_items_c',
			'type'     => 'switcher',
			'title'    => '显示',
			'default'  => true,
		),

		array(
			'id'     => 'catimg_items_c',
			'type'   => 'group',
			'title'  => '添加模块',
			'fields' => array(
				array(
					'id'    => 'catimg_items_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'catimg_items_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'catimg_items_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'catimg_items_mode',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
					),
				),

				array(
					'id'      => 'catimg_items_fl',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分栏（卡片仅支持3、4栏）',
					'inline'  => true,
					'options' => $fl3456,
				),

				array(
					'id'      => 'catimg_items_img',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '图片模式缩略图',
					'inline'  => true,
					'options' => array(
						'0'   => '正常',
						'1'   => '图片',
					),
				),

				array(
					'id'      => 'catimg_items_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分类按钮（仅适合多个分类）',
					'inline'  => true,
					'options' => array(
						'yes' => '显示',
						'no'  => '不显示',
					),
				),

				array(
					'id'      => 'catimg_items_chil',
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
					'id'      => 'catimg_items_nav_btn',
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

				array(
					'id'    => 'catimg_des',
					'class' => 'be-child-item',
					'type'  => 'switcher',
					'title' => '分类描述',
				),

				array(
					'id'    => 'catimg_items_des',
					'class' => 'be-child-item textarea-30',
					'type'  => 'textarea',
					'title' => '自定义分类描述',
				),
			),

			'default' => array(
				array(
					'catimg_items_title'   => '模块A',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',

				),

				array(
					'catimg_items_title'   => '模块B',
					'catimg_items_fl'      => '5',
					'catimg_items_n'       => '15',
					'catimg_items_btn'     => 'no',
					'catimg_items_chil'    => true,
					'catimg_items_img'     => '0',
					'catimg_items_nav_btn' => 'full',
					'catimg_items_des'     => '',
					'catimg_des'           => 'true',
					'catimg_items_mode'    => 'photo',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'id'     => 'cms_setting',
	'title'  => '杂志布局',
	'icon'  => 'dashicons dashicons-welcome-widgets-menus',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '幻灯显示模式',
	'icon'        => '',
	'description' => '选择幻灯显示模式',
	'fields'      => array(

		array(
			'id'      => 'slider_l',
			'type'    => 'radio',
			'title'   => '幻灯显示模式',
			'inline'  => true,
			'options' => array(
				'slider_n' => '标准',
				'slider_w' => '通栏',
			),
			'default' => 'slider_n',
		),
	)
));


ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '推荐文章',
	'icon'        => '',
	'description' => '',
	'fields'      => array(

		array(
			'id'       => 'cms_top',
			'type'     => 'switcher',
			'title'    => '推荐文章',
		),

		array(
			'id'       => 'cms_top_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认：1</span>',
			'default'  => 1,
		),

		array(
			'id'      => 'cms_top_n',
			'type'    => 'radio',
			'title'   => '篇数',
			'inline'  => true,
			'options' => array(
				'2'   => '2篇',
				'4'   => '更多',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'cms_top_id',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '专题',
	'icon'        => '',
	'description' => '在首页设置中添加专题页面 ID',
	'fields'      => array(

		array(
			'id'       => 'cms_special',
			'type'     => 'switcher',
			'title'    => '专题',
		),

		array(
			'id'       => 'cms_special_s',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认2</span>',
			'default'  => 2,
		),

		array(
			'id'       => 'cms_special_list',
			'type'     => 'switcher',
			'title'    => '专题列表',
		),

		array(
			'id'       => 'cms_special_list_s',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认3</span>',
			'default'  => 3,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '分类封面',
	'icon'        => '',
	'description' => '在首页显示分类封面',
	'fields'      => array(

		array(
			'id'       => 'h_cat_cover',
			'type'     => 'switcher',
			'title'    => '首页分类封面',
		),

		array(
			'id'       => 'cms_cover_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 4,
			'after'    => '<span class="after-perch">默认：4</span>',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '最新文章',
	'icon'        => '',
	'description' => '设置最新文章显示模式',
	'fields'      => array(

		array(
			'id'       => 'news',
			'type'     => 'switcher',
			'title'    => '最新文章',
			'default'  => true,
		),

		array(
			'id'       => 'news_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认5</span>',
			'default'  => 5,
		),

		array(
			'id'      => 'news_model',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'news_grid'   => '卡片模式',
				'news_card'   => '无图模式',
				'news_normal' => '标准模式',
			),
			'default' => 'news_grid',
		),

		array(
			'id'       => 'news_grid_sticky',
			'type'     => 'switcher',
			'title'    => '网格模式显示置顶文章',
			'default'  => true,
		),

		array(
			'id'       => 'news_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'not_news_n',
			'type'    => 'checkbox',
			'title'   => '排除的分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'       => 'cms_new_post_img',
			'type'     => 'switcher',
			'title'    => '图文模块',
			'after'    => '<span class="after-perch">位于最新文章模块中</span>',
		),

		array(
			'id'      => 'cms_new_post_img_id',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '最新分类',
	'icon'        => '',
	'description' => 'AJAX分类最新文章',
	'fields'      => array(

		array(
			'id'       => 'cms_new_code_cat',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'cms_new_code_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认6</span>',
			'default'  => 6,
		),

		array(
			'id'      => 'cms_new_code_style',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'grid'    => '卡片',
				'photo'   => '图片',
				'title'   => '标题',
				'list'    => '列表',
				'default' => '标准',
			),
			'default' => 'grid',
		),

		array(
			'id'      => 'cms_new_code_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl23456,
			'default' => '2',
		),

		array(
			'id'       => 'cms_new_code_n',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'cms_new_prev_next_btn',
			'type'    => 'radio',
			'title'   => '上下页按钮',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'cms_new_code_no_cat_btn',
			'type'    => 'radio',
			'title'   => '分类按钮',
			'inline'  => true,
			'options' => array(
				'yes'   => '显示',
				'no'    => '不显示',
			),
			'default' => 'yes',
		),

		array(
			'id'      => 'cms_new_code_cat_chil',
			'type'    => 'radio',
			'title'   => '子分类文章',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'cms_new_code_id',
			'type'    => 'checkbox',
			'title'   => '选择分类',
			'inline'  => true,
			'options' => 'categories',
			'query_args' => array(
				'orderby'  => 'ID',
				'order'    => 'ASC',
			),
		),

		array(
			'id'       => 'cms_new_code_post_img',
			'type'     => 'switcher',
			'title'    => '图文模块',
		),

		array(
			'class'    => 'be-child-item be-child-last-item',
			'title'   => '说明',
			'type'    => 'content',
			'content' => '位于最新文章模块中，编辑文章在下面“将文章添加到”面板中，勾选“杂志布局图文模块”，并更新文章',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '小说书籍',
	'icon'        => '',
	'description' => '在首页显示小说书籍封面',
	'fields'      => array(

		array(
			'id'       => 'cms_cat_novel',
			'type'     => 'switcher',
			'title'    => '小说书籍',
		),

		array(
			'id'       => 'cms_cat_novel_s',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 7,
			'after'    => '<span class="after-perch">默认：7</span>',
		),

		array(
			'id'       => 'cms_cat_novel_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid . '，留空则显示全部分类',
		),

		array(
			'id'       => 'cms_novel_mark',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '角标文字',
			'default'  => '小说',
			'after'    => '留空则不显示',
		),

		array(
			'id'       => 'cms_novel_author',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '显示作者信息',
			'default'  => true,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '自定义小说书籍信息文字',
		),

		array(
			'id'       => 'novel_author_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '作者文字',
			'default'  => '作者',
			'after'    => '留空则不显示',
		),

		array(
			'id'       => 'novel_status_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '状态文字',
			'default'  => '状态',
			'after'    => '留空则不显示',
		),

		array(
			'id'       => 'novel_views_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '热度文字',
			'default'  => '热度',
			'after'    => '留空则不显示',
		),

		array(
			'id'       => 'novel_related',
			'type'     => 'switcher',
			'title'    => '小说书籍正文相关文章',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '分类模块A',
	'icon'        => '',
	'description' => 'Ajax分类，' .$repeat,
	'fields'      => array(

		array(
			'id'       => 'cms_ajax_items_a',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'cms_ajax_item_a_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认8</span>',
			'default'  => 8,
		),

		array(
			'id'     => 'cms_ajax_item_a',
			'type'   => 'group',
			'title'  => '添加',
			'fields' => array(
				array(
					'id'    => 'cms_ajax_item_a_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'cms_ajax_item_a_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'cms_ajax_item_a_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'cms_ajax_item_a_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分类按钮',
					'inline'  => true,
					'options' => array(
						'yes' => '显示',
						'no'  => '不显示',
					),
				),

				array(
					'id'      => 'cms_ajax_item_a_chil',
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
					'id'      => 'cms_ajax_item_a_mode',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
					),
				),

				array(
					'id'      => 'cms_ajax_item_a_f',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分栏',
					'inline'  => true,
					'options' => $fl23456,
				),

				array(
					'id'      => 'cms_ajax_item_a_nav_btn',
					'class'   => 'be-child-item be-child-last-item',
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
					'cms_ajax_item_a_title'   => '模块A',
					'cms_ajax_item_a_id'      => '1',
					'cms_ajax_item_a_n'       => '10',
					'cms_ajax_item_a_mode'    => 'photo',
					'cms_ajax_item_a_f'       => '5',
					'cms_ajax_item_a_nav_btn' => 'full',
					'cms_ajax_item_a_btn'     => 'yes',
					'cms_ajax_item_a_chil'    => true,
				),

			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '多条件筛选',
	'icon'        => '',
	'description' => '设置是否在杂志首页显示多条件筛选',
	'fields'      => array(

		array(
			'id'       => 'cms_filter_h',
			'type'     => 'switcher',
			'title'    => '多条件筛选',
		),

		array(
			'id'       => 'cms_filter_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认9</span>',
			'default'  => 9,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '首字母分类/标签',
	'icon'        => '',
	'description' => '以首字母分组排序显示分类/标签',
	'fields'      => array(

		array(
			'id'       => 'letter_show',
			'type'     => 'switcher',
			'title'    => '首字母分类/标签',
		),

		array(
			'id'       => 'letter_show_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认10</span>',
			'default'  => 10,
		),

		array(
			'id'       => 'letter_t',
			'type'     => 'text',
			'title'    => '标题文字',
			'default'  => '全部分类',
		),

		array(
			'id'      => 'letter_show_md',
			'type'    => 'radio',
			'title'   => '调用模式',
			'inline'  => true,
			'options' => array(
				'letter_cat' => '分类',
				'letter_tag' => '标签',
			),
			'default' => 'letter_cat',
		),

		array(
			'id'       => 'letter_exclude',
			'type'     => 'text',
			'title'    => '输入排除的分类/标签ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'letter_hidden',
			'type'     => 'switcher',
			'title'    => '默认展开',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '杂志单栏小工具',
	'icon'        => '',
	'description' => '杂志单栏小工具',
	'fields'      => array(

		array(
			'id'       => 'cms_widget_one',
			'type'     => 'switcher',
			'title'    => '杂志单栏小工具',
		),

		array(
			'id'       => 'cms_widget_one_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认11</span>',
			'default'  => 11,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '杂志菜单小工具',
	'icon'        => '',
	'description' => '杂志菜单小工具',
	'fields'      => array(

		array(
			'id'       => 'cms_two_menu',
			'type'     => 'switcher',
			'title'    => '杂志菜单小工具',
		),

		array(
			'id'       => 'cms_two_menu_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认12</span>',
			'default'  => 12,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => 'AJAX分类',
	'icon'        => '',
	'description' => '设置AJAX加载分类',
	'fields'      => array(

		array(
			'id'       => 'cms_cat_tab',
			'type'     => 'switcher',
			'title'    => 'AJAX分类',
		),

		array(
			'id'       => 'cms_cat_tab_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认13</span>',
			'default'  => 13,
		),

		array(
			'id'       => 'cms_cat_tab_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 10,
		),

		array(
			'id'       => 'cms_cat_tab_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'cms_cat_tab_chil',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '子分类文章',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'       => 'cms_cat_tab_img',
			'type'     => 'switcher',
			'title'    => '缩略图',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '图片模块',
	'icon'        => '',
	'description' => '图片模块',
	'fields'      => array(

		array(
			'id'       => 'picture_box',
			'type'     => 'switcher',
			'title'    => '图片模块',
		),

		array(
			'id'       => 'picture_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认14</span>',
			'default'  => 14,
		),

		array(
			'id'       => 'picture_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'img_id',
			'type'     => 'text',
			'title'    => '正常文章分类',
			'after'    => '输入分类ID，多个分类用英文半角逗号","隔开，留空则不显示',
		),

		array(
			'id'       => 'picture_id',
			'type'     => 'text',
			'title'    => '调用图片分类',
			'after'    => '输入分类ID，多个分类用英文半角逗号","隔开，留空则不显示',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '杂志两栏小工具',
	'icon'        => '',
	'description' => '杂志两栏小工具',
	'fields'      => array(

		array(
			'id'       => 'cms_widget_two',
			'type'     => 'switcher',
			'title'    => '杂志两栏小工具',
		),

		array(
			'id'       => 'cms_widget_two_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认15</span>',
			'default'  => 15,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '单栏分类列表(5篇文章)',
	'icon'        => '',
	'description' => '单栏分类列表(5篇文章)',
	'fields'      => array(

		array(
			'id'       => 'cat_one_5',
			'type'     => 'switcher',
			'title'    => '单栏分类列表(5篇文章)',
		),

		array(
			'id'       => 'cat_one_5_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认16</span>',
			'default'  => 16,
		),

		array(
			'id'       => 'cat_one_5_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '单栏分类列表(无缩略图)',
	'icon'        => '',
	'description' => '单栏分类列表(无缩略图)',
	'fields'      => array(

		array(
			'id'       => 'cat_one_on_img',
			'type'     => 'switcher',
			'title'    => '单栏分类列表(无缩略图)',
		),

		array(
			'id'       => 'cat_one_on_img_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认17</span>',
			'default'  => 17,
		),

		array(
			'id'       => 'cat_one_on_img_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'cat_one_on_img_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '单栏分类列表(10篇文章)',
	'icon'        => '',
	'description' => '单栏分类列表(10篇文章)',
	'fields'      => array(

		array(
			'id'       => 'cat_one_10',
			'type'     => 'switcher',
			'title'    => '单栏分类列表(10篇文章)',
		),

		array(
			'id'       => 'cat_one_10_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认18</span>',
			'default'  => 18,
		),

		array(
			'id'       => 'cat_one_10_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '视频模块',
	'icon'        => '',
	'description' => '视频模块',
	'fields'      => array(

		array(
			'id'       => 'video_box',
			'type'     => 'switcher',
			'title'    => '视频模块',
		),

		array(
			'id'       => 'video_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认19</span>',
			'default'  => 19,
		),

		array(
			'id'       => 'video_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'video',
			'type'     => 'switcher',
			'title'    => '调用视频日志',
		),

		array(
			'id'       => 'video_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'video_post',
			'type'     => 'switcher',
			'title'    => '调用分类文章',
		),

		array(
			'id'          => 'video_post_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),
	)
));


ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '混排分类列表',
	'icon'        => '',
	'description' => '混排分类列表',
	'fields'      => array(

		array(
			'id'       => 'cat_lead',
			'type'     => 'switcher',
			'title'    => '混排分类列表',
		),

		array(
			'id'       => 'cat_lead_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认20</span>',
			'default'  => 20,
		),

		array(
			'id'       => 'cat_lead_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'no_lead_img',
			'type'     => 'switcher',
			'title'    => '显示小图',
			'default'  => true,
		),

		array(
			'id'       => 'cat_lead_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '两栏分类列表',
	'icon'        => '',
	'description' => '两栏分类列表',
	'fields'      => array(

		array(
			'id'       => 'cat_small',
			'type'     => 'switcher',
			'title'    => '两栏分类列表',
		),

		array(
			'id'       => 'cat_small_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认21</span>',
			'default'  => 21,
		),

		array(
			'id'       => 'cat_small_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'cat_small_z',
			'type'     => 'switcher',
			'title'    => '不显示第一篇摘要',
			'default'  => true,
		),

		array(
			'id'       => 'cat_small_img_no',
			'type'     => 'switcher',
			'title'    => '不显示缩略图',
		),

		array(
			'id'       => 'cat_small_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => 'Tab组合分类',
	'icon'        => '',
	'description' => 'AJAX调用分类文章',
	'fields'      => array(

	array(
			'id'       => 'cms_ajax_tabs',
			'type'     => 'switcher',
			'title'    => 'Tab组合分类',
			'label'    => '',
		),

		array(
			'id'       => 'tab_h_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认22</span>',
			'default'  => 22,
		),

		array(
			'id'       => 'tab_b_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 8,
		),

		array(
			'id'       => 'home_tab_cat_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'home_tab_cat_chil',
			'type'    => 'radio',
			'title'   => '子分类文章',
			'inline'  => true,
			'options' => array(
				'true'   => '显示',
				'false'  => '不显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'tabs_mode',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'imglist'  => '列表',
				'grid'     => '卡片',
				'default'  => '标准',
				'photo'    => '图片',
			),
			'default' => 'imglist',
		),

		array(
			'id'      => 'home_tab_code_f',
			'type'    => 'radio',
			'title'   => '分栏（卡片/图片）',
			'inline'  => true,
			'options' => $fl23456,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '杂志侧边栏',
	'icon'        => '',
	'description' => '杂志侧边栏',
	'fields'      => array(

		array(
			'id'       => 'cms_no_s',
			'type'     => 'switcher',
			'title'    => '杂志侧边栏',
			'default'  => true,
		),

		array(
			'id'       => 'cms_slider_sticky',
			'type'     => 'switcher',
			'title'    => '侧边栏跟随滚动',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '产品模块',
	'icon'        => '',
	'description' => '产品模块',
	'fields'      => array(

		array(
			'id'       => 'products_on',
			'type'     => 'switcher',
			'title'    => '产品模块',
		),

		array(
			'id'       => 'products_on_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">23</span>',
			'default'  => 23,
		),

		array(
			'id'       => 'products_n',
			'type'     => 'number',
			'title'    => '产品显示个数',
			'after'    => '<span class="after-perch">默认4</span>',
			'default'  => 4,
		),

		array(
			'id'       => 'products_id',
			'type'     => 'text',
			'title'    => '输入产品分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '特色模块',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'grid_ico_cms',
			'type'     => 'switcher',
			'title'    => '特色模块',
		),

		array(
			'id'       => 'grid_ico_cms_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认24</span>',
			'default'  => 24,
		),

		array(
			'id'     => 'cms_ico_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'cms_ico_name', 'cms_ico_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'cms_ico_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'cms_ico_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'cms_ico_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'cms_ico_svg',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '彩色图标',
				),

				array(
					'id'      => 'cms_ico_color',
					'class'   => 'be-child-item',
					'type'    => 'color',
					'title'   => '颜色',
				),

				array(
					'id'       => 'cms_ico_txt',
					'class'   => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '内容',
					'sanitize' => false,
				),

				array(
					'id'      => 'cms_ico_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'cms_ico_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-editor',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#e38b8d',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),

				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-schedule',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#a87d94',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),

				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-editor',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#89b8cd',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),

				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-schedule',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#afb4aa',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),

				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-editor',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#d6c2c1',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),

				array(
					'cms_ico_name'  => '名称',
					'cms_ico_title' => '标题',
					'cms_ico_ico'   => 'be be-schedule',
					'cms_ico_svg'   => '',
					'cms_ico_color' => '#feaba3',
					'cms_ico_txt'   => '内容文字',
					'cms_ico_url'   => '#',
					'cms_ico_img'   => '',
				),
			)
		),

		array(
			'id'       => 'cms_ico_b',
			'type'     => 'switcher',
			'title'    => '图标无背景色',
		),

		array(
			'id'      => 'grid_ico_cms_n',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl24568,
			'default' => '6',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '分类模块B',
	'icon'        => '',
	'description' => 'Ajax分类，' .$repeat,
	'fields'      => array(

		array(
			'id'       => 'cms_ajax_items_b',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'cms_ajax_item_b_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认25</span>',
			'default'  => 25,
		),

		array(
			'id'     => 'cms_ajax_item_b',
			'type'   => 'group',
			'title'  => '添加',
			'fields' => array(
				array(
					'id'    => 'cms_ajax_item_b_title',
					'class' => 'be-child-item',
					'type'  => 'text',
					'title' => '模块名称',
				),

				array(
					'id'       => 'cms_ajax_item_b_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入分类ID',
					'after'    => $mid,
				),

				array(
					'id'       => 'cms_ajax_item_b_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '每页篇数',
					'after'    => $anh,
				),

				array(
					'id'      => 'cms_ajax_item_b_btn',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分类按钮',
					'inline'  => true,
					'options' => array(
						'yes' => '显示',
						'no'  => '不显示',
					),
				),

				array(
					'id'      => 'cms_ajax_item_b_chil',
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
					'id'      => 'cms_ajax_item_b_mode',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '显示模式',
					'inline'  => true,
					'options' => array(
						'photo'    => '图片',
						'grid'     => '卡片',
					),
				),

				array(
					'id'      => 'cms_ajax_item_b_f',
					'class'   => 'be-child-item',
					'type'    => 'radio',
					'title'   => '分栏',
					'inline'  => true,
					'options' => $fl23456,
				),

				array(
					'id'      => 'cms_ajax_item_b_nav_btn',
					'class'   => 'be-child-item be-child-last-item',
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
					'cms_ajax_item_b_title'   => '模块A',
					'cms_ajax_item_b_id'      => '1',
					'cms_ajax_item_b_n'       => '10',
					'cms_ajax_item_b_mode'    => 'photo',
					'cms_ajax_item_b_f'       => '5',
					'cms_ajax_item_b_nav_btn' => 'full',
					'cms_ajax_item_b_btn'     => 'yes',
					'cms_ajax_item_b_chil'    => true,
				),

			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '工具模块',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'cms_tool',
			'type'     => 'switcher',
			'title'    => '工具模块',
		),

		array(
			'id'       => 'cms_tool_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认26</span>',
			'default'  => 26,
		),

		array(
			'id'       => 'cms_tool_txt_c',
			'type'     => 'switcher',
			'title'    => '说明文字居中',
			'default'  => true,
		),

		array(
			'id'     => 'cms_tool_item',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'cms_tool_name', 'cms_tool_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'cms_tool_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'cms_tool_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'cms_tool_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'cms_tool_svg',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '彩色图标',
				),

				array(
					'id'       => 'cms_tool_txt',
					'class'   => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '内容',
					'sanitize' => false,
				),

				array(
					'id'      => 'cms_tool_btn',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '按钮',
				),

				array(
					'id'      => 'cms_tool_url',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '链接',
				),

				array(
					'id'      => 'cms_tool_img',
					'class'   => 'be-child-item',
					'type'    => 'upload',
					'title'   => '图片',
					'preview' => true,
				),

			),

			'default' => array(
				array(
					'cms_tool_name'  => '名称',
					'cms_tool_title' => '标题',
					'cms_tool_ico'   => 'be be-editor',
					'cms_tool_svg'   => '',
					'cms_tool_txt'   => '内容文字',
					'cms_tool_btn'   => '按钮',
					'cms_tool_url'   => '#',
					'cms_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'cms_tool_name'  => '名称',
					'cms_tool_title' => '标题',
					'cms_tool_ico'   => 'be be-schedule',
					'cms_tool_svg'   => '',
					'cms_tool_txt'   => '内容文字',
					'cms_tool_btn'   => '按钮',
					'cms_tool_url'   => '#',
					'cms_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'cms_tool_name'  => '名称',
					'cms_tool_title' => '标题',
					'cms_tool_ico'   => 'be be-editor',
					'cms_tool_svg'   => '',
					'cms_tool_txt'   => '内容文字',
					'cms_tool_btn'   => '按钮',
					'cms_tool_url'   => '#',
					'cms_tool_img'   => $imgdefault . '/random/320.jpg',
				),

				array(
					'cms_tool_name'  => '名称',
					'cms_tool_title' => '标题',
					'cms_tool_ico'   => 'be be-schedule',
					'cms_tool_svg'   => '',
					'cms_tool_txt'   => '内容文字',
					'cms_tool_btn'   => '按钮',
					'cms_tool_url'   => '#',
					'cms_tool_img'   => $imgdefault . '/random/320.jpg',
				),
			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '热门推荐',
	'icon'        => '',
	'description' => $repeat,
	'fields'      => array(

		array(
			'id'       => 'cms_hot',
			'type'     => 'switcher',
			'title'    => '热门推荐',
		),

		array(
			'id'       => 'cms_hot_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认27</span>',
			'default'  => 27,
		),


		array(
			'id'      => 'cms_hot_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl345,
			'default' => '4',
		),

		array(
			'id'     => 'cms_hot_item',
			'type'   => 'group',
			'title'  => '添加',
			'accordion_title_by' => array( 'cms_hot_name', 'cms_hot_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'cms_hot_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'      => 'cms_hot_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'cms_hot_more',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '更多链接',
				),

				array(
					'id'      => 'cms_hot_ico',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '图标',
				),

				array(
					'id'      => 'cms_hot_svg',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '彩色图标',
				),

				array(
					'id'       => 'cms_hot_id',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '文章ID',
					'sanitize' => false,
					'after'    => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
				),

			),

			'default' => array(
				array(
					'cms_hot_name'  => '名称',
					'cms_hot_title' => '标题',
					'cms_hot_more'  => '',
					'cms_hot_ico'   => 'be be-skyatlas',
					'cms_hot_svg'   => '',
					'cms_hot_id'    => '',
				),

				array(
					'cms_hot_name'  => '名称',
					'cms_hot_title' => '标题',
					'cms_hot_more'  => '',
					'cms_hot_ico'   => 'be be-favoriteoutline',
					'cms_hot_svg'   => '',
					'cms_hot_id'    => '',
				),

				array(
					'cms_hot_name'  => '名称',
					'cms_hot_title' => '标题',
					'cms_hot_more'  => '',
					'cms_hot_ico'   => 'be be-display',
					'cms_hot_svg'   => '',
					'cms_hot_id'    => '',
				),

				array(
					'cms_hot_name'  => '名称',
					'cms_hot_title' => '标题',
					'cms_hot_more'  => '',
					'cms_hot_ico'   => 'be be-home',
					'cms_hot_svg'   => '',
					'cms_hot_id'    => '',
				),

			)
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '杂志三栏小工具',
	'icon'        => '',
	'description' => '杂志三栏小工具',
	'fields'      => array(

		array(
			'id'       => 'cms_widget_three',
			'type'     => 'switcher',
			'title'    => '杂志三栏小工具',
		),

		array(
			'id'       => 'cat_widget_three_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认28</span>',
			'default'  => 28,
		),

		array(
			'id'      => 'cms_widget_three_fl',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl1234,
			'default' => '3',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '分类图片',
	'icon'        => '',
	'description' => '分类图片',
	'fields'      => array(

		array(
			'id'       => 'cat_square',
			'type'     => 'switcher',
			'title'    => '分类图片',
		),

		array(
			'id'       => 'cat_square_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认29</span>',
			'default'  => 29,
		),

		array(
			'id'       => 'cat_square_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 6,
		),

		array(
			'id'       => 'cat_square_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '书籍封面',
	'icon'        => '',
	'description' => '在首页显示书籍封面，' . $repeat,
	'fields'      => array(

		array(
			'id'       => 'cms_novel_cover',
			'type'     => 'switcher',
			'title'    => '书籍封面',
		),

		array(
			'id'       => 'cms_novel_cover_s',
			'type'     => 'number',
			'title'    => '排序',
			'default'  => 30,
			'after'    => '<span class="after-perch">默认：30</span>',
		),

		array(
			'id'     => 'cms_novel_cover_cat',
			'type'   => 'group',
			'title'  => '添加书籍分类',
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'cms_novel_cover_name',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '名称',
				),

				array(
					'id'       => 'cms_novel_cover_id',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '输入顶级父分类ID',
					'after'    => '随机显示子分类封面',
				),

				array(
					'id'       => 'cms_novel_cover_mark',
					'class'    => 'be-child-item',
					'type'     => 'text',
					'title'    => '角标文字',
					'default'  => '小说',
					'after'    => '留空则不显示',
				),

				array(
					'id'       => 'cms_novel_cover_n',
					'class'    => 'be-child-item',
					'type'     => 'number',
					'title'    => '数量',
				),

				array(
					'id'      => 'cms_novel_cover_m',
					'class'    => 'be-child-item',
					'type'    => 'radio',
					'title'   => '外观模式',
					'inline'  => true,
					'options' => array(
						'novel_cover_cat'  => '分类模式',
						'novel_cover_grid' => '卡片模式',
					),
					'default' => 'novel_cover_cat',
				),

				array(
					'id'       => 'cms_novel_cover_author',
					'class'    => 'be-child-item be-child-last-item',
					'type'     => 'switcher',
					'title'    => '作者信息',
					'default'  => true,
				),


				array(
					'id'       => 'cms_novel_cover_random',
					'class'    => 'be-child-item',
					'type'     => 'switcher',
					'title'    => '随机显示',
				),

			),

			'default' => array(
				array(
					'cms_novel_cover_name'   => '分类',
					'cms_novel_cover_n'      => '6',
					'cms_novel_cover_id'     => '',
					'cms_novel_cover_random' => '',
					'cms_novel_cover_author' => true,
					'cms_novel_cover_m'      => 'novel_cover_cat',
					'cms_novel_cover_mark'   => '小说',
				),

			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '分类网格',
	'icon'        => '',
	'description' => '分类网格',
	'fields'      => array(

		array(
			'id'       => 'cat_grid',
			'type'     => 'switcher',
			'title'    => '分类网格',
		),

		array(
			'id'       => 'cat_grid_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认31</span>',
			'default'  => 31,
		),

		array(
			'id'       => 'cat_grid_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 6,
		),

		array(
			'id'       => 'cat_grid_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '图片滚动模块',
	'icon'        => '',
	'description' => '图片滚动模块',
	'fields'      => array(

		array(
			'id'       => 'flexisel',
			'type'     => 'switcher',
			'title'    => '图片滚动模块',
		),

		array(
			'id'       => 'flexisel_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认32</span>',
			'default'  => 32,
		),

		array(
			'id'       => 'flexisel_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 8,
		),

		array(
			'id'      => 'flexisel_m',
			'type'    => 'radio',
			'title'   => '调用方式',
			'inline'  => true,
			'options' => array(
				'flexisel_cat' => '文章分类',
				'flexisel_img' => '图片分类',
				'flexisel_key' => '指定文章',
			),
			'default' => 'flexisel_cat',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '文章分类',
		),

		array(
			'id'          => 'flexisel_cat_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '图片分类',
		),

		array(
			'id'       => 'gallery_id',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '指定文章',
		),

		array(
			'id'       => 'key_n',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '添加自定义字段',
			'after'    => '通过为文章添加自定义字段，调用指定文章',
			'default'  => 'views',
		),

		array(
			'id'      => 'flexisel_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl56,
			'default' => '5',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '底部分类列表',
	'icon'        => '',
	'description' => '底部分类列表',
	'fields'      => array(

		array(
			'id'       => 'cat_big',
			'type'     => 'switcher',
			'title'    => '底部分类列表',
		),

		array(
			'id'       => 'cat_big_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认33</span>',
			'default'  => 33,
		),

		array(
			'id'       => 'cat_big_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'cat_big_three',
			'type'     => 'switcher',
			'title'    => '三栏',
			'default'  => true,
		),

		array(
			'id'       => 'cat_big_z',
			'type'     => 'switcher',
			'title'    => '不显示第一篇摘要',
			'default'  => true,
		),

		array(
			'id'       => 'cat_big_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '会员商品',
	'icon'        => '',
	'description' => '需配合 ErphpDown 插件',
	'fields'      => array(

		array(
			'id'       => 'cms_assets',
			'type'     => 'switcher',
			'title'    => '会员商品',
		),

		array(
			'id'       => 'cms_assets_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认34</span>',
			'default'  => 34,
		),

		array(
			'id'       => 'cms_assets_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 5,
		),

		array(
			'id'      => 'cms_assets_get',
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
			'id'       => 'cms_assets_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'cms_assets_post_id',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),

		array(
			'id'      => 'cms_assets_f',
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
	'parent'      => 'cms_setting',
	'title'       => '商品',
	'icon'        => '',
	'description' => '商品',
	'fields'      => array(

		array(
			'id'       => 'tao_h',
			'type'     => 'switcher',
			'title'    => '商品',
		),

		array(
			'id'       => 'tao_h_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认35</span>',
			'default'  => 35,
		),

		array(
			'id'       => 'tao_h_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'h_tao_sort',
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
			'id'      => 'cms_tao_home_f',
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
			'id'       => 'tao_h_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'cat_tao_f',
			'type'    => 'radio',
			'title'   => '商品分类归档分栏',
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
	'parent'      => 'cms_setting',
	'title'       => 'WOO产品',
	'icon'        => '',
	'description' => '需要安装商城插件 WooCommerce 并发表产品',
	'fields'      => array(

		array(
			'id'       => 'product_h',
			'type'     => 'switcher',
			'title'    => 'WOO产品',
		),

		array(
			'id'       => 'product_h_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认36</span>',
			'default'  => 36,
		),

		array(
			'id'       => 'product_h_n',
			'type'     => 'number',
			'title'    => '产品商品显示数量',
			'after'    => '<span class="after-perch">默认4</span>',
			'default'  => 4,
		),

		array(
			'id'       => 'product_h_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'cms_woo_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '底部无缩略图分类列表',
	'icon'        => '',
	'description' => '底部无缩略图分类列表',
	'fields'      => array(

		array(
			'id'       => 'cat_big_not',
			'type'     => 'switcher',
			'title'    => '底部无缩略图分类列表',
		),

		array(
			'id'       => 'cat_big_not_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认37</span>',
			'default'  => 37,
		),

		array(
			'id'       => 'cat_big_not_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'       => 'cat_big_not_three',
			'type'     => 'switcher',
			'title'    => '三栏',
		),

		array(
			'id'       => 'cat_big_not_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => '标签标题',
	'icon'        => '',
	'description' => '以简单的样式显示分类标签及标题',
	'fields'      => array(

		array(
			'id'       => 'cat_tdk',
			'type'     => 'switcher',
			'title'    => '底部无缩略图分类列表',
		),

		array(
			'id'       => 'cat_tdk_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认38</span>',
			'default'  => 38,
		),

		array(
			'id'       => 'cat_tdk_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 10,
		),

		array(
			'id'       => 'cat_tdk_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'cat_tdk_cut_title',
			'type'     => 'switcher',
			'title'    => '截断标题',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'cms_setting',
	'title'       => 'Ajax分类短代码',
	'icon'        => '',
	'description' => '通过添加短代码调用分类文章',
	'fields'      => array(

		array(
			'id'       => 'cms_ajax_cat',
			'type'     => 'switcher',
			'title'    => '显示',
		),

		array(
			'id'       => 'cms_ajax_cat_post_s',
			'type'     => 'number',
			'title'    => '排序',
			'after'    => '<span class="after-perch">默认39</span>',
			'default'  => 39,
		),

		array(
			'id'       => 'cms_ajax_cat_post_code',
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
	'parent'      => 'cms_setting',
	'title'       => '其它',
	'icon'        => '',
	'description' => '设置是显示文章日期及子分类',
	'fields'      => array(

		array(
			'id'       => 'list_date',
			'type'     => 'switcher',
			'title'    => '文章列表日期',
			'default'  => true,
		),

		array(
			'id'       => 'no_cat_child',
			'type'     => 'switcher',
			'title'    => '分类列表显示子分类文章',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '公司主页',
	'icon'        => 'dashicons dashicons-admin-site-alt2',
	'description' => '用于设置公司主页布局及模块',
	'fields'      => array(

		array(
			'class'    => 'be-button-url be-button-help-url be-home-go',
			'type'     => 'subheading',
			'title'    => '',
			'content'  => '<span class="be-url-btn"><a href="' . $bloghome . 'wp-admin/admin.php?page=co-options" target="_blank"><i class="cx cx-begin"></i>进入公司主页设置</a></span>',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '备份首页设置',
	'icon'        => 'dashicons dashicons-update',
	'description' => '将主题首页设置数据导出为“<span style="color: #000;">首页设置备份 + 日期.json</span>”文件，并下载到本地',
	'fields'      => array(

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '将导出的“<span style="color: #000;">首页设置备份 + 日期.json</span>”文件用记事本打开',
		),

		array(
			'class' => 'be-child-item',
			'type'  => 'backup_be',
		),

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '请不要随意输入内容，并执行导入操作，否则所有设置将消失！',
		),
	)
) );