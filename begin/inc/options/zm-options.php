<?php if ( ! defined( 'ABSPATH' )  ) { die; }
if ( ! function_exists( 'zm_get_option' ) ) {
	function zm_get_option( $option = '', $default = null ) {
		$options = get_option( 'begin' );
		return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}

if ( ! zm_get_option( 'save_ajax' ) || ( zm_get_option( 'save_ajax' ) == 'ajax' ) ) {
	$save = true;
}
if ( zm_get_option( 'save_ajax' ) == 'normal' ) {
	$save = false;
}

$select_template = array('');
foreach ( $select_template as $select_template ) {
	$options_select_template['archive-default']      = "默认模板";
	$options_select_template['category-code-a']      = "Ajax图片布局";
	$options_select_template['category-code-b']      = "Ajax卡片布局";
	$options_select_template['category-code-c']      = "Ajax标题布局";
	$options_select_template['category-code-f']      = "Ajax标题列表";
	$options_select_template['category-code-e']      = "Ajax问答布局";
	$options_select_template['category-code-c']      = "Ajax标准布局";
	$options_select_template['category-code-g']      = "Ajax瀑布流";
	$options_select_template['category-img']         = "图片布局";
	$options_select_template['category-grid']        = "图片布局-缩略图可调";
	$options_select_template['category-img-s']       = "图片布局-侧边";
	$options_select_template['category-display']     = "图片展示";
	$options_select_template['category-child-tdk']   = "标签标题";
	$options_select_template['category-novel']       = "小说书籍";
	$options_select_template['category-child-novel'] = "书籍封面";
	$options_select_template['category-child-cover'] = "封面导航";
	$options_select_template['category-note']        = "文档模板";
	$options_select_template['category-notes']       = "文档模板-章节";
	$options_select_template['category-assets']      = "会员商品";
	$options_select_template['category-list']        = "标题列表";
	$options_select_template['category-fall']        = "瀑布流";
	$options_select_template['category-square']      = "卡片布局";
	$options_select_template['category-full']        = "通长缩略图";
}

$select_template_tag = array('');
foreach ( $select_template_tag as $select_template_tag ) {
	$options_select_template_tag['archive-default']  = "默认模板";
	$options_select_template_tag['category-img']     = "图片布局";
	$options_select_template_tag['category-grid']    = "图片布局-缩略图可调";
	$options_select_template_tag['category-img-s']   = "图片布局-侧边";
	$options_select_template_tag['category-display'] = "图片展示";
	$options_select_template_tag['category-fall']    = "瀑布流";
	$options_select_template_tag['category-square']  = "卡片布局";
	$options_select_template_tag['category-full']    = "通长缩略图";
}

$imgdefault  = get_template_directory_uri() . '/img/default';
$imgpath     = get_template_directory_uri() . '/img';
$bloghome    = home_url( '/' );
$bloglogin   = home_url( '/' ).'wp-login.php';
$qq_auth     = home_url( '/' ).'wp-content/themes/begin/inc/social/qq-auth.php';
$weibo_auth  = home_url( '/' ).'wp-content/themes/begin/inc/social/sina-auth.php';
$weixin_auth = home_url( '/' );
$selectemail = get_option( 'admin_email' );
$repeat      = '点击&nbsp;<i class="dashicons dashicons-admin-page"></i>&nbsp;按钮，复制现有模块添加更多，通过拖动调整显示顺序';
$mid         = '多个ID用英文半角逗号","隔开';
$idcat       = '输入分类ID，多个ID用英文半角逗号","隔开';
$anh         = '<span class="after-perch">留空则以后台阅读设置为准</span>';
$shortcode_help = '
<span><strong>基础代码</strong></span>[be_ajax_post]<br />
<span><strong>代码示例</strong></span>[be_ajax_post style="grid" column="2" terms="1,2,3" posts_per_page="4"]<br />
<span><strong>示例说明</strong></span>style="grid"卡片模式，column="2"两栏，terms="1,2,3"调用ID为1,2,3的分类文章，posts_per_page="4"每页显示4篇<br /><br />
<span><strong>可选参数</strong></span>可组合使用，多个参数用一个半角空格隔开，<strong>不能有多余的空格</strong>，可重复添加多个短代码<br />
<span><strong>图片模式</strong></span>[be_ajax_post style="photo"]<br />
<span><strong>卡片模式</strong></span>[be_ajax_post style="grid"]<br />
<span><strong>标题模式</strong></span>[be_ajax_post style="title"]<br />
<span><strong>标题列表</strong></span>[be_ajax_post style="list"]<br />
<span><strong>问答模式</strong></span>[be_ajax_post style="qa"]<br />
<span><strong>标准模式</strong></span>[be_ajax_post style="default"]<br />
<span><strong>分栏</strong></span>[be_ajax_post column="4"]<br />
<span><strong>可选分栏数</strong></span>图片模式 4 5 6&nbsp;/&nbsp;卡片与标题模式 1 2 3 4&nbsp;/&nbsp;标题列表仅1栏<br />
<span><strong>无全部文章按钮</strong></span>[be_ajax_post btn_all="no"]<br />
<span><strong>无选择按钮</strong></span>[be_ajax_post btn="no"]<br />
<span><strong>显示首页幻灯</strong></span>[be_ajax_post slider="1"]<br />
<span><strong>调用指定分类</strong></span>[be_ajax_post terms="1,2,3,4"]<br />
<span><strong>调用指定标签</strong></span>[be_ajax_post column="4" cat="34,39" tags="tag"]<br />
<span><strong>不显示子分类文章</strong></span>[be_ajax_post children="false"]<br />
<span><strong>每页4篇文章</strong></span>[be_ajax_post posts_per_page="4"]<br />
<span><strong>图片模式缩略图</strong></span>[be_ajax_post img="1"]<br />
<span><strong>随机排序</strong></span>[be_ajax_post orderby="rand"]<br />
<span><strong>按发表日期排序</strong></span>[be_ajax_post orderby="date" order="DESC"]<br />
<span><strong>按更新日期排序</strong></span>[be_ajax_post orderby="modified" order="DESC"]<br />
<span><strong>按评论数排序</strong></span>[be_ajax_post orderby="comment_count" order="DESC"]<br />
<span><strong>按浏览量排序</strong></span>[be_ajax_post meta_key="views" orderby="meta_value_num" order="DESC"]<br />
<span><strong>无限加载按钮</strong></span>[be_ajax_post more="more"]<br />
<span><strong>无限滚动加载</strong></span>[be_ajax_post more="more" infinite="true"]<br /><br />
<strong>可在文章、页面和“增强文本”小工具中添加上述短代码</strong><br />
<strong>在“增强文本”小工具中，可以在小工具“CSS类”中添加“apc”或者“nobg”让小工具无背景色</strong>';

$test_array = array(
	''  => '中',
	't' => '上',
	'b' => '下',
	'l' => '左',
	'r' => '右'
);

$rand_link = array(
	'rating' => '正常',
	'rand'   => '随机'
);

$ajax_orderby = array(
	'date'          => '发表日期',
	'modified'      => '最后更新',
	'comment_count' => '评论数',
	'views'         => '浏览量'
);

$inks_img_txt = array(
	'0' => '文字',
	'1' => '图片'
);

$fl789 = array(
	'7' => '七栏',
	'8' => '八栏',
	'9' => '九栏'
);

$fl24568 = array(
	'2' => '两栏',
	'4' => '四栏',
	'5' => '五栏',
	'6' => '六栏',
	'8' => '八栏'
);

$fl2456 = array(
	'2' => '两栏',
	'4' => '四栏',
	'5' => '五栏',
	'6' => '六栏',
);

$fl245 = array(
	'2' => '两栏',
	'4' => '四栏',
	'5' => '五栏',
);

$fl1234 = array(
	'1' => '1栏',
	'2' => '2栏',
	'3' => '3栏',
	'4' => '4栏'
);

$fl345 = array(
	'3' => '3栏',
	'4' => '4栏',
	'5' => '5栏'
);

$fl456 = array(
	'4' => '4栏',
	'5' => '5栏',
	'6' => '6栏'
);

$fl56 = array(
	'5' => '5栏',
	'6' => '6栏'
);

$fsl45 = array(
	'4' => '4栏',
	'5' => '5栏'
);

$fl3456 = array(
	'3' => '3栏',
	'4' => '4栏',
	'5' => '5栏',
	'6' => '6栏'
);

$fl23456 = array(
	'2' => '两栏',
	'3' => '三栏',
	'4' => '四栏',
	'5' => '五栏',
	'6' => '六栏',
);

$fl34 = array(
	'3' => '3栏',
	'4' => '4栏'
);

$fl234 = array(
	'2' => '2栏',
	'3' => '3栏',
	'4' => '4栏'
);

$swf12 = array(
	'1' => '1栏',
	'2' => '2栏'
);

$cover234 = array(
	'2' => '2栏',
	'3' => '3栏',
	'4' => '4栏',
	'5' => '5栏'
);

$prefix = 'begin';

ZMOP::createOptions( $prefix, array(
	'framework_title'         => '主题选项',
	'framework_class'         => 'be-box',

	'menu_title'              => '主题选项',
	'menu_slug'               => 'begin-options',
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
	'title'       => '操作说明',
	'icon'        => 'cx cx-begin',
	'description' => '',
	'fields'      => array(

		array(
			'class'   => 'be-home-help',
			'title'   => '快速定位设置项',
			'type'    => 'content',
			'content' => '点击左上&nbsp;&nbsp;<i class="beico dashicons dashicons-ellipsis"></i>展开所有设置按钮，在同一个页面显示所有设置，利用浏览器搜索功能（Ctrl+f），输入关键字定位到设置项。',
		),

		array(
			'id'       => 'be_debug',
			'type'     => 'switcher',
			'title'    => '调试模式',
			'default'  => true,
		),

		array(
			'class'    => 'be-home-help',
			'class'    => 'be-child-item be-child-last-item',
			'title'    => '说明',
			'type'     => 'content',
			'content'  => '前端显示模块设置帮助<span class="behelp cx cx-begin"></span>按钮，仅在调试主题时启用，可能会影响部分功能，仅管理员可见。',
		),

		array(
			'class'    => 'be-button-url be-button-help-url',
			'type'     => 'subheading',
			'title'    => '使用文档',
			'content'  => '<span class="be-url-btn"><a href="https://zmingcx.com/begin-guide.html" rel="external nofollow" target="_blank">查看文档</a></span>',
		),

		array(
			'id'      => 'save_ajax',
			'type'    => 'radio',
			'title'   => '保存模式',
			'inline'  => true,
			'options' => array(
				'ajax'    => 'Ajax无刷新',
				'normal'  => '正常模式',
			),
			'default' => 'ajax',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '提示',
			'type'    => 'content',
			'content' => '主题设置开关较多，不要把所有开关都打开，有些功能您并不一定能用到。',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '左上按钮',
			'type'    => 'content',
			'content' => '<i class="beico dashicons dashicons-ellipsis"></i>展开所有设置选项。',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '左侧按钮',
			'type'    => 'content',
			'content' => '<i class="dashicons dashicons-plus-alt2"></i>展开所有菜单。',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '右上按钮',
			'type'    => 'content',
			'content' => '<i class="dashicons dashicons-update-alt"></i>保存设置，快捷键 Ctrl+S',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '右侧按钮',
			'type'    => 'content',
			'content' => '<i class="be be-sort"></i>查看分类及专题页面 ID',
		),

		array(
			'class'   => 'be-home-help',
			'title'   => '右下按钮',
			'type'    => 'content',
			'content' => '<i class="to-down-up"></i>返回顶部及转至底部。',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '首页设置',
	'icon'        => 'dashicons dashicons-admin-home',
	'description' => '用于设置选择首页布局及模块',
	'fields'      => array(

		array(
			'class'    => 'be-button-url be-button-help-url be-home-go',
			'type'     => 'subheading',
			'title'    => '',
			'content'  => '<span class="be-url-btn"><a href="' . $bloghome . 'wp-admin/admin.php?page=be-options" target="_blank"><i class="cx cx-begin"></i>进入首页设置</a></span>',
		),

	)
));

// 基本设置
ZMOP::createSection( $prefix, array(
	'id'    => 'basic_setting',
	'title' => '基本设置',
	'icon'  => 'dashicons dashicons-admin-generic',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '文章列表截断字数',
	'description' => '可以根据页面宽度适当调整文章列表摘要的显示字数',
	'fields'      => array(

		array(
			'id'       => 'words_n',
			'type'     => 'number',
			'title'    => '自动截断字数',
			'after'    => '<span class="after-perch">默认值：100</span>',
			'default'  => 100,
		),

		array(
			'id'       => 'word_n',
			'type'     => 'number',
			'title'    => '摘要截断字数',
			'after'    => '<span class="after-perch">默认值：90</span>',
			'default'  => 90,
		),
	)
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '阅读全文按钮',
	'icon'        => '',
	'description' => '自定义文章列表阅读全文按钮文字',
	'fields'      => array(

		array(
			'id'       => 'more_w',
			'type'     => 'text',
			'title'    => '阅读全文按钮文字',
			'after'    => '留空则不显示',
			'default'  => '',
		),

		array(
			'id'       => 'direct_w',
			'type'     => 'text',
			'title'    => '直达链接按钮文字',
			'after'    => '留空则不显示',
			'default'  => '直达链接',
		),

		array(
			'id'       => 'more_hide',
			'type'     => 'switcher',
			'title'    => '默认隐藏',
			'label'    => '鼠标悬停时显示',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '公告',
	'icon'        => '',
	'description' => '用滚动公告代替首页面包屑导航',
	'fields'      => array(

		array(
			'id'       => 'bulletin',
			'type'     => 'switcher',
			'title'    => '公告',
		),

		array(
			'id'      => 'bulletin_type',
			'type'    => 'radio',
			'title'   => '选择调用',
			'inline'  => true,
			'options' => array(
				'category' => '分类',
				'notice'   => '公告',
			),
			'default' => 'category',
		),

		array(
			'id'       => 'bulletin_id',
			'type'     => 'text',
			'title'    => '输入公告分类ID',
			'after'    => '调用指定的分类',
		),

		array(
			'id'       => 'bulletin_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 2,
		),

		array(
			'id'      => 'notice_m',
			'type'    => 'radio',
			'title'   => '公告分类模板选择',
			'inline'  => true,
			'options' => array(
				'notice_d' => '默认',
				'notice_s' => '说说',
			),
			'default' => 'notice_s',
		),

		array(
			'id'       => 'breadcrumb_on',
			'type'     => 'switcher',
			'title'    => '面包屑导航',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '弹窗公告',
	'icon'        => '',
	'description' => '设置定时弹出的公告',
	'fields'      => array(

		array(
			'id'       => 'placard_layer',
			'type'     => 'switcher',
			'title'    => '弹窗公告',
		),

		array(
			'id'      => 'placard_mode',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'right'  => '右下显示',
				'mask'   => '全屏遮挡',
			),
			'default' => 'right',
		),

		array(
			'id'       => 'admin_placard',
			'type'     => 'switcher',
			'title'    => '排除管理员',
		),

		array(
			'id'       => 'placard_mobile',
			'type'     => 'switcher',
			'title'    => '移动端',
			'default'  => true,
		),

		array(
			'id'       => 'placard_but',
			'type'     => 'switcher',
			'title'    => '公告按钮',
		),

		array(
			'id'          => 'placard_cat_id',
			'type'        => 'select',
			'title'       => '选择一个分类',
			'placeholder' => '选择分类',
			'options'     => 'categories',
		),

		array(
			'id'       => 'placard_id',
			'type'     => 'text',
			'title'    => '输入文章ID',
			'after'    => '调用指定文章，留空则显示5篇分类文章',
		),

		array(
			'id'       => 'placard_time',
			'type'     => 'number',
			'title'    => '默认30分钟弹出一次',
			'after'    => '<span class="after-perch">分钟</span>',
			'default'  => 30,
		),

		array(
			'id'       => 'placard_img',
			'type'     => 'switcher',
			'title'    => '显示最新文章图片',
			'default'  => true,
		),

		array(
			'id'       => 'custom_placard',
			'type'     => 'switcher',
			'title'    => '自定义内容',
		),

		array(
			'id'       => 'custom_placard_title',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '标题',
		),

		array(
			'id'       => 'custom_placard_url',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '链接',
		),

		array(
			'id'       => 'custom_placard_img',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'        => 'custom_placard_content',
			'class'     => 'be-child-item be-child-last-item textarea-30',
			'type'      => 'textarea',
			'title'     => '内容',
			'sanitize'  => false,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => 'Ajax加载文章',
	'icon'        => '',
	'description' => '滚动页面时，自动加载下一页文章',
	'fields'      => array(

		array(
			'id'       => 'infinite_post',
			'type'     => 'switcher',
			'title'    => 'Ajax 加载文章',
			'default'  => true,
		),

		array(
			'id'       => 'pages_n',
			'type'     => 'number',
			'title'    => '加载页数',
			'default'  => 3,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '页号显示',
	'icon'        => '',
	'description' => '设置文章列表分页按钮显示模式',
	'fields'      => array(

		array(
			'id'       => 'first_mid_size',
			'type'     => 'number',
			'title'    => '首页页号数',
			'default'  => 2,
		),

		array(
			'id'       => 'mid_size',
			'type'     => 'number',
			'title'    => '其它页号数',
			'default'  => 4,
		),

		array(
			'id'       => 'input_number',
			'type'     => 'switcher',
			'title'    => '输入页号跳转',
			'default'  => true,
		),

		array(
			'id'       => 'turn_small',
			'type'     => 'switcher',
			'title'    => '移动端简化分页',
			'default'  => true,
		),

		array(
			'id'       => 'no_pagination',
			'type'     => 'switcher',
			'title'    => '不显示分页按钮',
		),

		array(
			'id'       => 'rewrite_paged_url',
			'type'     => 'switcher',
			'title'    => '自定义分页链接前缀',
			'label'    => '更改后，需要保存一次固定链接设置',
		),

		array(
			'id'       => 'rewrite_paged_url_txt',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '自定义分页链接前缀',
			'default'  => 'mypage',
		),

		array(
			'title'   => '说明',
			'class'    => 'be-help-code be-child-item be-child-last-item',
			'type'    => 'content',
			'content' => '<span>默认翻页链接</span>/page/2/<br /><span>修改后翻页链接</span>/' . zm_get_option( 'rewrite_paged_url_txt' ) . '/2/<br />更改后需要保存一次固定链接设置<br />可与上面“不显示分页按钮”同时使用，恶意采集将找不到正常的分页链接<br />随便改一下链接前缀，但不保存固定链接设置，点击分页链接则返回到首页或404，彻底隐藏分页',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '替换用户默认链接',
	'icon'        => '',
	'description' => '替换文章作者归档页默认链接，防止暴露登录名称',
	'fields'      => array(

		array(
			'id'      => 'my_author',
			'type'    => 'radio',
			'title'   => '作者链接后缀',
			'inline'  => true,
			'options' => array(
				'first_name' => '用户名字',
				'last_name'  => '用户姓氏',
			),
			'default' => 'first_name',
		),

		array(
			'title'   => '提示',
			'type'    => 'content',
			'content' => '后台 → 用户 → 个人资料页面 → 显示名称，在名字或姓氏中输入字母单词，不能使用中文，并在“公开显示为”选择除登录名之外的',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '生成文章索引目录',
	'icon'        => '',
	'description' => '用段落标题生成文章索引目录',
	'fields'      => array(

		array(
			'id'       => 'be_toc',
			'type'     => 'switcher',
			'title'    => '生成文章索引目录',
		),

		array(
			'id'      => 'toc_mode',
			'type'    => 'radio',
			'title'   => '选择几级标题',
			'inline'  => true,
			'options' => array(
				'toc_four' => '仅四级标题',
				'toc_all'  => '二至六级标题',
			),
			'default' => 'toc_four',
		),

		array(
			'id'      => 'toc_style',
			'type'    => 'radio',
			'title'   => '层级显示',
			'inline'  => true,
			'options' => array(
				'tocjq'  => '单级显示',
				'tocphp' => '层级显示',
			),
			'default' => 'tocjq',
		),

		array(
			'id'       => 'toc_title_n',
			'type'     => 'number',
			'title'    => '几个标题时生成目录',
			'default'  => 4,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '正文设置',
	'icon'        => '',
	'description' => '正文显示内容设置',
	'fields'      => array(

		array(
			'id'       => 'begin_today',
			'type'     => 'switcher',
			'title'    => '历史上的今天',
		),

		array(
			'id'       => 'lightbox_on',
			'type'     => 'switcher',
			'title'    => '图片 Lightbox 放大查看',
			'default'  => true,
		),

		array(
			'id'       => 'auto_img_link',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '图片自动添加超链接',
			'after'    => '<span class="after-perch">用于触发放大查看，酌情开启</span>',
		),

		array(
			'id'       => 'p_first',
			'type'     => 'switcher',
			'title'    => '段首缩进',
			'default'  => true,
		),

		array(
			'id'       => 'all_more',
			'type'     => 'switcher',
			'title'    => '正文继续阅读按钮',
		),

		array(
			'id'       => 'custum_font',
			'type'     => 'switcher',
			'title'    => '编辑器增加中文字体',
			'default'  => true,
		),

		array(
			'id'       => 'copy_tips',
			'type'     => 'switcher',
			'title'    => '复制提示',
		),

		array(
			'id'       => 'copyright_pro',
			'type'     => 'switcher',
			'title'    => '禁止复制及右键',
			'after'    => '<span class="after-perch">管理员登录无效</span>',
		),

		array(
			'id'       => 'no_copy',
			'type'     => 'switcher',
			'title'    => '禁止复制CSS版',
		),

		array(
			'id'       => 'copy_upset',
			'type'     => 'switcher',
			'title'    => '在段落末尾添加隐藏的版权链接',
			'after'    => '<span class="after-perch">为恶意采集增加难度</span>',
		),

		array(
			'id'       => 'copy_upset_txt',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '自定义文字',
			'after'    => '默认文章源自+网站名称',
			'default'  => '文章源自',
		),

		array(
			'id'       => 'copy_upset_n',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '添加数',
			'default'  => 10,
		),

		array(
			'id'       => 'link_pages_all',
			'type'     => 'switcher',
			'title'    => '文章分页显示全部按钮',
			'default'  => true,
		),

		array(
			'id'       => 'link_external',
			'type'     => 'switcher',
			'title'    => '文章外链接添加nofollow',
			'default'  => true,
		),

		array(
			'id'       => 'link_internal',
			'type'     => 'switcher',
			'title'    => '文章内链接新窗口打开',
			'after'    => '<span class="after-perch">需与上面的选项同时使用</span>',
		),

		array(
			'id'       => 'single_no_sidebar',
			'type'     => 'switcher',
			'title'    => '正文无侧边栏',
		),

		array(
			'id'       => 'photo_album_n',
			'type'     => 'number',
			'title'    => '相册短代码默认每页显示图片数',
			'default'  => 4,
		),

		array(
			'id'       => 'excerpt_n',
			'type'     => 'number',
			'title'    => '正文顶部摘要截断字数',
			'after'    => '<span class="after-perch">默认值：90</span>',
			'default'  => 90,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '固定信息',
	'icon'        => '',
	'description' => '在文章底部显示固定信息',
	'fields'      => array(

		array(
			'id'       => 'logic_notice_enable',
			'type'     => 'switcher',
			'title'    => '按分类显示',
		),

		array(
			'id'     => 'logic_notice',
			'class'  => 'be-child-item',
			'type'   => 'group',
			'title'  => '添加信息',
			'before' => '按文章分类显示不同的固定内容，点击&nbsp;<i class="dashicons dashicons-admin-page"></i>&nbsp;按钮，复制添加更多',
			'accordion_title_by' => array( 'logic_notice_title' ),
			'accordion_title_number' => true,

			'fields' => array(
				array(
					'id'      => 'logic_notice_title',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '标题',
				),

				array(
					'id'      => 'logic_notice_id',
					'class'   => 'be-child-item',
					'type'    => 'text',
					'title'   => '输入分类ID',
				),

				array(
					'id'       => 'logic_notice_txt',
					'class'    => 'be-child-item textarea-30',
					'type'     => 'textarea',
					'title'    => '输入信息',
					'sanitize' => false,
				),

				array(
					'id'        => 'logic_notice_visual',
					'class'     => 'be-child-item',
					'type'      => 'wp_editor',
					'height'    => '150px',
					'title'     => '输入信息',
					'sanitize'  => false,
				),
			),

			'default' => array(
				array(
					'logic_notice_name'   => '名称',
					'logic_notice_title'  => '分类名称',
					'logic_notice_id'     => '',
					'logic_notice_visual' => '',
					'logic_notice_txt'    => '',
				),
			)
		),

		array(
			'id'       => 'copyright_info',
			'type'     => 'switcher',
			'title'    => '通用固定信息',
			'default'  => true,
		),

		array(
			'id'        => 'copyright_content',
			'class'     => 'be-child-item be-child-last-item',
			'type'      => 'wp_editor',
			'title'     => '输入信息',
			'height'    => '100px',
			'sanitize'  => false,
			'default'   => '文章末尾固定信息',
			'after'     => '显示在所有文章的未尾',
		),

		array(
			'id'       => 'copyright_down_info',
			'type'     => 'switcher',
			'title'    => '下载模板信息',
			'default'  => true,
		),

		array(
			'id'        => 'copyright_content_down',
			'class'     => 'be-child-item be-child-last-item',
			'type'      => 'wp_editor',
			'title'     => '输入信息',
			'height'    => '100px',
			'sanitize'  => false,
			'default'   => '文件下载版权声明',
			'after'     => '仅显示在下载模板',
		),


	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '代码高亮',
	'icon'        => '',
	'description' => '显示代码高亮',
	'fields'      => array(

		array(
			'id'       => 'be_code',
			'type'     => 'switcher',
			'title'    => '自动代码高亮显示',
			'default'  => true,
		),

		array(
			'id'      => 'be_code_css',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '样式',
			'inline'  => true,
			'options' => array(
				'normal' => '默认',
				'color'  => '彩色',
			),
			'default' => 'normal',
		),


		array(
			'id'       => 'highlight',
			'type'     => 'switcher',
			'title'    => '手动代码高亮显示',
			'after'    => '<span class="after-perch">仅为兼容老版本样式</span>',
		),
	)
));

// 子项
ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '功能优化',
	'icon'        => '',
	'description' => '用于优化WordPress',
	'fields'      => array(

		array(
			'id'       => 'enable_cleaner',
			'type'     => 'switcher',
			'title'    => '清理冗余',
			'default'  => true,
		),

		array(
			'class'    => 'be-child-item be-child-last-item be-button-url',
			'type'     => 'subheading',
			'title'    => '清理',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/tools.php?page=be_cleaner" target="_blank">清理冗余</a></span>',
		),

		array(
			'id'       => 'no_category',
			'type'     => 'switcher',
			'title'    => '去掉分类链接中的"category"',
			'after'    => '<span class="after-perch">更改后需保存一次固定链接设置</span>',
		),

		array(
			'id'       => 'category_x',
			'type'     => 'switcher',
			'title'    => '分类链接末尾添加"/"斜杠',
			'after'    => '<span class="after-perch">更改后需保存一次固定链接设置</span>',
		),

		array(
			'id'       => 'be_tags_rules',
			'type'     => 'switcher',
			'title'    => '标签链接改为ID',
			'after'    => '<span class="after-perch">更改后需保存一次固定链接设置</span>',
		),

		array(
			'id'       => 'page_html',
			'type'     => 'switcher',
			'title'    => '页面添加.html后缀',
			'after'    => '<span class="after-perch">更改后需保存一次固定链接设置</span>',
		),

		array(
			'id'       => 'image_alt',
			'type'     => 'switcher',
			'title'    => '自动将文章标题作为图片 alt 标签内容',
			'default'  => true,
		),

		array(
			'id'       => 'be_upload_name',
			'type'     => 'switcher',
			'title'    => '上传附件自动按时间重命名',
		),

		array(
			'id'       => 'last_login',
			'type'     => 'switcher',
			'title'    => '显示用户登录注册时间',
			'default'  => true,
		),

		array(
			'id'       => 'bulk_actions_post',
			'type'     => 'switcher',
			'title'    => '文章批量操作',
			'default'  => true,
		),

		array(
			'id'       => 'ajax_move_post',
			'type'     => 'switcher',
			'title'    => '后台 Ajax 移动文章到回收站',
			'default'  => true,
		),

		array(
			'id'       => 'meta_key_filter',
			'type'     => 'switcher',
			'title'    => '后台自定义字段筛选',
			'default'  => true,
		),

		array(
			'id'       => 'post_ssid',
			'type'     => 'switcher',
			'title'    => '后台显示文章ID',
			'default'  => true,
		),

		array(
			'id'       => 'clone_post',
			'type'     => 'switcher',
			'title'    => '后台复制文章',
		),

		array(
			'id'       => 'be_meta_box_order',
			'type'     => 'switcher',
			'title'    => '恢复编辑面板位置',
			'after'    => '<span class="after-perch">启用并保存后，刷新两次后台页面，即可恢复默认位置，用后关闭</span>',
		),

		array(
			'id'       => 'xmlrpc_no',
			'type'     => 'switcher',
			'title'    => '禁用 xmlrpc',
		),

		array(
			'id'       => 'script_defer',
			'type'     => 'switcher',
			'title'    => '延迟加载脚本',
		),

		array(
			'id'       => 'embed_no',
			'type'     => 'switcher',
			'title'    => '禁用oEmbed',
			'default'  => true,
		),

		array(
			'id'       => 'revisions_no',
			'type'     => 'switcher',
			'title'    => '禁止修订版本',
			'default'  => true,
			'after'    => '<span class="after-perch">效果不太好</span>',
		),

		array(
			'id'       => 'disable_api',
			'type'     => 'switcher',
			'title'    => '禁用 REST API',
			'after'    => '<span class="after-perch">连接小程序、APP、使用区块编辑器不要勾选</span>',
		),

		array(
			'id'       => 'x-frame',
			'type'     => 'switcher',
			'title'    => '禁止被 iframe 网页嵌套',
		),

		array(
			'id'       => 'be_safety',
			'type'     => 'switcher',
			'title'    => '阻止恶意URL请求',
		),

		array(
			'id'       => 'forget_password',
			'type'     => 'switcher',
			'title'    => '修正QQ邮箱密码链接',
			'default'  => true,
		),

		array(
			'id'       => 'delete_enclosure',
			'type'     => 'switcher',
			'title'    => '禁止添加 enclosed 字段（酌情）',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '侧边栏小工具',
	'icon'        => '',
	'description' => '与侧边栏小工具相关的设置',
	'fields'      => array(

		array(
			'id'       => 'sidebar_sticky',
			'type'     => 'switcher',
			'title'    => '侧边栏跟随滚动',
			'default'  => true,
		),

		array(
			'id'       => 'widget_logic',
			'type'     => 'switcher',
			'title'    => '小工具条件判断',
			'default'  => true,
		),

		array(
			'id'       => 'clone_widgets',
			'type'     => 'switcher',
			'title'    => '小工具克隆',
			'default'  => true,
		),

		array(
			'id'       => 'single_e',
			'type'     => 'switcher',
			'title'    => '正文底部小工具',
			'default'  => true,
		),

		array(
			'id'      => 'single_e_f',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $swf12,
			'default' => '2',
		),

		array(
			'id'       => 'header_widget',
			'type'     => 'switcher',
			'title'    => '头部小工具',
		),

		array(
			'id'       => 'h_widget_p',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '移动端不显示',
		),

		array(
			'id'      => 'h_widget_m',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '显示位置',
			'inline'  => true,
			'options' => array(
				'cat_single_m' => '在分类及正文页面显示',
				'cat_m'        => '仅在分类页面显示',
				'all_m'        => '全局显示',
			),
			'default' => 'cat_single_m',
		),

		array(
			'id'      => 'header_widget_f',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl34,
			'default' => '4',
		),

		array(
			'class'   => 'be-home-help',
			'class'   => 'be-child-item be-child-last-item',
			'title'   => '提示',
			'type'    => 'content',
			'content' => '仅适合添加“导航菜单”小工具',
		),

		array(
			'id'       => 'footer_w',
			'type'     => 'switcher',
			'title'    => '页脚小工具',
			'default'  => true,
		),

		array(
			'id'       => 'mobile_footer_w',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '移动端不显示',
		),

		array(
			'id'      => 'footer_w_f',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl3456,
			'default' => '3',
		),

		array(
			'id'       => 'footer_contact',
			'type'     => 'switcher',
			'title'    => '右侧固定内容',
		),

		array(
			'id'        => 'footer_contact_html',
			'class'     => 'be-child-item textarea-30',
			'type'      => 'textarea',
			'title'     => '输入内容，支持HTML代码',
			'sanitize'  => false,
		),


		array(
			'id'       => 'footer_widget_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '页脚小工具背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '随便看看小工具',
		),

		array(
			'id'       => 'random_number',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 5,
		),

		array(
			'id'       => 'random_post_img',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示缩略图',
			'default'  => true,
		),

		array(
			'id'       => 'random_exclude_id',
			'class'    => 'be-child-item be-help-item',
			'type'     => 'text',
			'title'    => '排除的分类',
			'after'    => $mid,
		),

		array(
			'id'       => 'widget_p',
			'type'     => 'number',
			'title'    => '文章小工具段落插入位置',
			'after'    => '<span class="after-perch">在第几个段后</span>',
			'default'  => 3,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '自定义文章显示数',
	'icon'        => '',
	'description' => '一般用于使用图片布局的分类或标签，自定义文章显示数',
	'fields'      => array(

		array(
			'id'       => 'cat_posts_id',
			'type'     => 'text',
			'title'    => '输入分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'posts_n',
			'type'     => 'number',
			'title'    => '显示数',
			'default'  => 20,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '分类设置',
	'icon'        => '',
	'description' => '与分类相关的一些设置',
	'fields'      => array(

		array(
			'id'       => 'select_templates',
			'type'     => 'switcher',
			'title'    => '选择分类模板',
			'default'  => true,
		),

		array(
			'id'       => 'cat_order',
			'type'     => 'switcher',
			'title'    => '分类排序',
			'default'  => true,
		),

		array(
			'id'       => 'cat_icon',
			'type'     => 'switcher',
			'title'    => '分类图标',
		),

		array(
			'id'       => 'cat_cover',
			'type'     => 'switcher',
			'title'    => '分类封面',
			'default'  => true,
		),

		array(
			'id'       => 'cat_cover_d',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '默认图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'after'    => '用于未设置封面的分类',
			'preview'  => true,
		),

		array(
			'id'       => 'cat_des_img',
			'type'     => 'switcher',
			'title'    => '分类图片',
			'default'  => true,
		),

		array(
			'id'       => 'cat_des_img_d',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '默认图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'after'    => '用于未设置图片的分类',
			'preview'  => true,
		),

		array(
			'id'       => 'cat_des',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '仅有描述的显示',
			'default'  => true,
		),

		array(
			'id'       => 'cat_des_p',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示描述',
		),

		array(
			'id'       => 'cat_des_img_crop',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '自动裁剪图片',
		),

		array(
			'id'       => 'des_title_l',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '标题居左',
		),

		array(
			'id'       => 'header_title_narrow',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '不显示标题',
		),

		array(
			'id'       => 'cat_des_img_zoom',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '移动端图片缩放',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '分类图片通栏（测试中）',
		),

		array(
			'id'       => 'top_sub',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '启用',
		),

		array(
			'id'       => 'top_sub_img',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示分类图片',
			'default'  => true,
		),

		array(
			'id'       => 'top_sub_bg',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'color',
			'title'    => '背景颜色',
			'default'  => '#999',
		),

		array(
			'id'       => 'cat_top',
			'type'     => 'switcher',
			'title'    => '显示分类推荐文章',
		),

		array(
			'id'       => 'no_child',
			'type'     => 'switcher',
			'title'    => '分类归档不显示子分类文章',
		),

		array(
			'id'       => 'child_cat',
			'type'     => 'switcher',
			'title'    => '分类归档显示父子分类链接',
		),

		array(
			'id'      => 'child_cat_f',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl789,
			'default' => '8',
		),

		array(
			'id'       => 'child_cat_no',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入排除的分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'child_cat_exclude',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '同级分类排除本身',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '正文标签文章',
	'icon'        => '',
	'description' => '用AJAX加载标签文章替换文章末尾默认标签',
	'fields'      => array(

		array(
			'id'       => 'single_tab_tags',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'       => 'single_tab_tags_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'single_tab_tags_order',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => array(
				'date'   => '时间',
				'rand'    => '随机',
			),
			'default' => 'rand',
		),

		array(
			'id'      => 'single_tab_tags_style',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'photo'   => '图片',
				'grid'    => '卡片',
				'list'    => '列表',
			),
			'default' => 'photo',
		),

		array(
			'id'      => 'single_tab_tags_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl245,
			'default' => '4',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '正文上下篇文章链接',
	'icon'        => '',
	'description' => '设置上下篇文章链接模式',
	'fields'      => array(

		array(
			'id'      => 'post_nav_mode',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'full_site' => '全站',
				'same_cat'  => '同分类',
			),
			'default' => 'full_site',
		),

		array(
			'id'       => 'post_nav_img',
			'type'     => 'switcher',
			'title'    => '显示缩略图',
			'default'  => true,
		),

		array(
			'id'       => 'post_nav_no',
			'type'     => 'switcher',
			'title'    => '不显示该模块',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '正文底部滚动同分类文章',
	'icon'        => '',
	'description' => '以图片形式在正文底部滚动显示同分类文章',
	'fields'      => array(

		array(
			'id'       => 'single_rolling',
			'type'     => 'switcher',
			'title'    => '正文底部滚动同分类文章',
			'default'  => true,
		),

		array(
			'id'       => 'single_rolling_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 10,
		),

		array(
			'id'      => 'not_single_rolling_cat',
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
	'parent'      => 'basic_setting',
	'title'       => '正文相关文章',
	'icon'        => '',
	'description' => '在正文底部显示相同标签的文章',
	'fields'      => array(

		array(
			'id'      => 'related_img',
			'type'    => 'radio',
			'title'   => '显示位置',
			'inline'  => true,
			'options' => array(
				'related_no'      => '不显示',
				'related_inside'  => '显示在文章中',
				'related_outside' => '显示在文章下面'
			),
			'default' => 'related_inside',
		),

		array(
			'id'      => 'related_orderby',
			'type'    => 'radio',
			'title'   => '排序',
			'inline'  => true,
			'options' => array(
				'related_date'     => '发表时间',
				'related_rand'     => '随机显示',
				'related_modified' => '最后更新时间'
			),
			'default' => 'related_date',
		),

		array(
			'id'      => 'related_mode',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'related_normal' => '标准',
				'slider_grid'    => '图片',
			),
			'default' => 'slider_grid',
		),

		array(
			'id'       => 'related_n',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'not_related_cat',
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
			'id'       => 'related_tao',
			'type'     => 'switcher',
			'title'    => '正文底部商品',
		),

		array(
			'id'       => 'single_tao_n',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '篇数',
			'default'  => 4,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '相关资源',
	'icon'        => '',
	'description' => '调用同分类文章或者指定文章，仅显示在正文会员资源模板中',
	'fields'      => array(

		array(
			'id'       => 'single_assets',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'      => 'single_assets_get',
			'type'    => 'radio',
			'title'   => '调用方式',
			'inline'  => true,
			'options' => array(
				'cat'    => '同分类文章',
				'post'   => '指定文章',
				'ajax'   => 'Ajax',
			),
			'default'    => 'cat',
		),

		array(
			'id'       => 'single_assets_n',
			'type'     => 'number',
			'title'    => '同分类文章篇数',
			'default'  => 4,
		),

		array(
			'id'      => 'single_assets_order',
			'type'    => 'radio',
			'title'   => '同分类文章排序',
			'inline'  => true,
			'options' => array(
				'date'    => '时间',
				'rand'    => '随机',
				'views'   => '浏览',
			),
			'default' => 'date',
		),

		array(
			'id'      => 'single_assets_id',
			'type'    => 'text',
			'title'   => '输入文章ID',
			'after'   => '输入文章ID，多个ID用英文半角逗号","隔开，按先后排序',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '自定义分类法文章显示数',
	'icon'        => '',
	'description' => '自定义图片、视频、商品、产品、网址文章归档及页面显示文章数',
	'fields'      => array(

		array(
			'id'       => 'type_posts_n',
			'type'     => 'number',
			'title'    => '归档篇数',
			'default'  => 20,
		),

		array(
			'id'       => 'type_cat',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '显示该类型所有分类链接',
			'default'  => true,
		),

		array(
			'id'       => 'custom_cat_n',
			'type'     => 'number',
			'title'    => '页面篇数',
			'default'  => 12,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '最新文章图标',
	'icon'        => '',
	'description' => '最新文章图标设置',
	'fields'      => array(

		array(
			'id'       => 'news_ico',
			'type'     => 'switcher',
			'title'    => '最新文章图标',
			'default'  => true,
		),

		array(
			'id'       => 'news_date',
			'type'     => 'switcher',
			'title'    => '突出最新文章日期',
			'default'  => true,
		),

		array(
			'id'       => 'new_n',
			'type'     => 'number',
			'title'    => '显示时限',
			'default'  => 168,
			'after'    => '<span class="after-perch">小时，默认一周（168小时）内发表的文章显示，最短24小时</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => 'AJAX分类短代码',
	'icon'        => '',
	'description' => '在文章或页面中添加短代码，以Ajax调用分类文章',
	'fields'      => array(

		array(
			'id'       => 'ajax_cat_btn_flow',
			'type'     => 'switcher',
			'title'    => '按钮不回行',
			'after'    => '<span class="after-perch">分类按钮较多时，在移动端一行显示</span>',
		),

		array(
			'class'    => 'be-help-code',
			'title'    => '短代码示例',
			'type'    => 'content',
			'content' => $shortcode_help,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '友情链接页面',
	'icon'        => '',
	'description' => '友情链接页面设置',
	'fields'      => array(

		array(
			'id'       => 'add_link',
			'type'     => 'switcher',
			'title'    => '自助友情链接',
			'default'  => true,
		),

		array(
			'id'       => 'site_inks_des',
			'type'     => 'switcher',
			'title'    => '显示描述',
		),

		array(
			'id'       => 'inks_adorn',
			'type'     => 'switcher',
			'title'    => '装饰动画',
			'default'  => true,
		),

		array(
			'id'      => 'links_model',
			'type'    => 'radio',
			'title'   => '显示模式',
			'inline'  => true,
			'options' => array(
				'links_ico'     => '图标模式',
				'links_default' => '默认模式',
			),
			'default' => 'links_ico',
		),

		array(
			'id'      => 'link_favicon',
			'type'    => 'radio',
			'title'   => '图标模式选择',
			'inline'  => true,
			'options' => array(
				'favicon_ico' => 'Favicon图标',
				'first_ico'   => '首字图标',
			),
			'default' => 'favicon_ico',
		),

		array(
			'id'      => 'rand_link',
			'type'    => 'radio',
			'title'   => '图标模式排序',
			'inline'  => true,
			'options' => $rand_link, 
			'default' => 'rating',
		),

		array(
			'id'      => 'links_img_txt',
			'type'    => 'radio',
			'title'   => '默认模式选择',
			'inline'  => true,
			'options' => $inks_img_txt,
			'default' => '0',
		),

		array(
			'id'       => 'link_cat',
			'type'     => 'text',
			'title'    => '输入排除的链接ID',
			'after'    => $mid,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'basic_setting',
	'title'       => '网站Favicon图标API',
	'icon'        => '',
	'description' => '设置获取网站Favicon图标API',
	'fields'      => array(

		array(
			'id'       => 'favicon_api',
			'type'     => 'text',
			'title'    => '获取图标API地址',
			'default' => 'https://favicon.cccyun.cc/',
			'after'    => '输入获取网站favicon图标API地址，默认：https://favicon.cccyun.cc/',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'admin_setting',
	'title' => '站点管理',
	'icon'        => 'dashicons dashicons-admin-users',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '管理站点',
	'icon'        => '',
	'description' => '登录注册相关设置',
	'fields'      => array(

		array(
			'id'       => 'front_login',
			'type'     => 'switcher',
			'title'    => '前端登录',
			'label'    => '',
			'default'  => true,
		),

		array(
			'id'       => 'profile',
			'type'     => 'switcher',
			'title'    => '顶部登录按钮',
			'default'  => true,
		),
		array(
			'id'       => 'menu_login',
			'type'     => 'switcher',
			'title'    => '主菜单登录按钮',
			'default'  => true,
		),

		array(
			'id'       => 'menu_reg',
			'type'     => 'switcher',
			'title'    => '注册按钮',
			'default'  => true,
			'after'    => '<span class="after-perch">需要到设置 → 常规 → 常规选项 → 成员资格 → 勾选“任何人都可以注册”</span>',
		),

		array(
			'id'       => 'mobile_login',
			'type'     => 'switcher',
			'title'    => '移动端登录按钮',
			'default'  => true,
		),

		array(
			'id'       => 'reset_pass',
			'type'     => 'switcher',
			'title'    => '前端显示找回密码',
			'default'  => true,
		),
		array(
			'id'       => 'login_captcha',
			'type'     => 'switcher',
			'title'    => '登录验证码',
		),

		array(
			'id'       => 'register_captcha',
			'type'     => 'switcher',
			'title'    => '注册验证码',
			'default'  => true,
		),

		array(
			'id'       => 'lost_captcha',
			'type'     => 'switcher',
			'title'    => '找回密码验证码',
			'default'  => true,
		),
		array(
			'id'       => 'go_reg',
			'type'     => 'switcher',
			'title'    => '注册输入密码',
			'default'  => true,
		),

		array(
			'id'       => 'reg_captcha',
			'type'     => 'switcher',
			'title'    => '注册邮箱验证',
			'default'  => true,
			'after'    => '<span class="after-perch">需要与"注册输入密码"同时使用</span>',
		),

		array(
			'id'       => 'reg_above',
			'type'     => 'switcher',
			'title'    => '用户注册页面首屏为注册表单',
			'default'  => true,
		),

		array(
			'id'       => 'no_admin',
			'type'     => 'switcher',
			'title'    => '仅允许管理员及编辑进后台',
		),

		array(
			'id'       => 'only_social_login',
			'type'     => 'switcher',
			'title'    => '仅允许社会化登录',
		),

		array(
			'id'       => 'user_l',
			'type'     => 'text',
			'title'    => '自定义登录按钮链接',
		),

		array(
			'id'       => 'reg_l',
			'type'     => 'text',
			'title'    => '注册按钮链接',
			'default'  => $bloghome . 'registered',
		),

		array(
			'id'       => 'logout_to',
			'type'     => 'text',
			'title'    => '退出登录后跳转的页面',
			'default'  => home_url( '/' ),
		),

		array(
			'id'       => 'wel_come',
			'type'     => 'text',
			'title'    => '顶部欢迎语',
			'default'  => '欢迎光临！',
		),

		array(
			'id'       => 'reg_clause',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '注册登录协议说明文字',
			'sanitize' => false,
			'default'  => '<p style="text-align: center;">注册登录即视为同意以上条款</p>',
			'after'    => '可使用HMTL代码',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '用户中心',
	'icon'        => '',
	'description' => '设置前端用户中心',
	'fields'      => array(

		array(
			'id'          => 'user_url',
			'type'        => 'select',
			'title'       => '用户中心',
			'placeholder' => '选择页面',
			'default'     => url_to_postid( $bloghome . '/user-center' ),
			'options'     => 'pages',
			'query_args'  => array(
				'posts_per_page' => -1
			)
		),

		array(
			'id'          => 'tou_url',
			'type'        => 'select',
			'title'       => '用户投稿',
			'placeholder' => '选择页面',
			'default'     => url_to_postid( $bloghome . '/publish' ),
			'options'     => 'pages',
			'query_args'  => array(
				'posts_per_page' => -1
			)
		),

		array(
			'id'       => 'personal_img',
			'type'     => 'upload',
			'title'    => '用户中心背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '背景图片',
	'icon'        => '',
	'description' => '上传一些页面及模块的背景图片',
	'fields'      => array(

		array(
			'id'       => 'custom_login',
			'type'     => 'switcher',
			'title'    => '启用后台登录美化',
			'default'  => true,
		),

		array(
			'id'       => 'login_img',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '背景图片',
			'default'  => 'https://desk-fd.zol-img.com.cn/t_s1920x1080c5/g7/M00/0E/09/ChMkLGMxCYeIYVapABUiNwouqU0AAH5vQICQNEAFSJP842.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'bing_login',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '必应每日壁纸',
		),

		array(
			'id'       => 'reg_img',
			'type'     => 'upload',
			'title'    => '注册页面背景图片',
			'default'  => 'https://desk-fd.zol-img.com.cn/t_s1920x1080c5/g7/M00/0E/09/ChMkLGMxCYeIYVapABUiNwouqU0AAH5vQICQNEAFSJP842.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'bing_reg',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '必应每日壁纸',
		),

		array(
			'id'       => 'reg_content_img',
			'type'     => 'upload',
			'title'    => '注册页面小背景图片',
			'default'  =>  $imgdefault . '/random/320.jpg',
			'preview'  => true,
			'after'    => '<span class="after-perch">图片大小（≈350×550px）</span>',
		),

		array(
			'id'       => 'no_reg_content_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '注册页面仅显示毛玻璃效果',
			'default'  => true,
		),

		array(
			'id'       => 'header_author_img',
			'type'     => 'upload',
			'title'    => '作者存档头部图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'user_back',
			'type'     => 'upload',
			'title'    => '用户信息背景图片',
			'default'  => $imgdefault . '/options/user.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '注册邀请码',
	'icon'        => '',
	'description' => '用于在注册表单中添加邀请码',
	'fields'      => array(

		array(
			'id'       => 'invitation_code',
			'type'     => 'switcher',
			'title'    => '注册邀请码',
		),

		array(
			'id'       => 'code_data',
			'type'     => 'switcher',
			'title'    => '创建数据表',
			'after'    => '<span class="after-perch">开启后，需保存两次设置，然后取消勾选</span>',
		),

		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '添加邀请码',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/admin.php?page=be_invitation_code_add" target="_blank">添加邀请码</a></span>',
		),
		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '前端显示邀请码',
			'content'  => '新建页面 → 添加短代码 [be_reg_codes] 并发表',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '社会化登录',
	'icon'        => '',
	'description' => '社会化登录',
	'fields'      => array(

		array(
			'id'       => 'be_social_login',
			'type'     => 'switcher',
			'title'    => '社会化登录',
		),

		array(
			'id'       => 'login_data',
			'type'     => 'switcher',
			'title'    => '创建数据表',
			'after'    => '<span class="after-perch">开启后，需保存两次设置，然后取消勾选</span>',
		),

		array(
			'title'    => 'QQ',
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
		),

		array(
			'title'    => '申请地址',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '<a href="https://connect.qq.com/" target="_blank" title="申请地址">https://connect.qq.com</a>',
		),

		array(
			'title'    => '网站回调域',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => $qq_auth,
		),

		array(
			'id'       => 'qq_app_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => 'QQ APP ID',
		),

		array(
			'id'       => 'qq_key',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => 'QQ APP Key',
		),

		array(
			'title'    => '微博',
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
		),

		array(
			'title'    => '申请地址',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '<a href="https://open.weibo.com/" target="_blank" title="申请地址">https://open.weibo.com</a>',
		),

		array(
			'title'    => '应用地址',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => $weibo_auth,
		),

		array(
			'id'       => 'weibo_key',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微博 App Key',
		),

		array(
			'id'       => 'weibo_secret',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '微博 App Secret',
		),

		array(
			'title'    => '微信',
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
		),

		array(
			'title'    => '申请地址（企业资格认证）',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '<a href="https://open.weixin.qq.com/" target="_blank" title="申请地址">https://open.weixin.qq.com</a>',
		),

		array(
			'title'    => '授权回调域',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => $weixin_auth,
		),

		array(
			'id'       => 'weixin_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微信 APP ID',
		),

		array(
			'id'       => 'weixin_secret',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '微信 App Secret',
		),

		array(
			'id'       => 'social_login_url',
			'type'     => 'text',
			'title'    => '登录后跳转的地址',
			'default'  => $bloghome,
			'after'    => '比如网站首页链接',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '仅登录访问',
	'icon'        => '',
	'description' => '仅登录访问网站',
	'fields'      => array(

		array(
			'id'       => 'force_login',
			'type'     => 'switcher',
			'title'    => '仅登录访问',
		),

		array(
			'id'       => 'force_login_url',
			'type'     => 'text',
			'title'    => '登录注册页面链接',
			'default'  => $bloglogin,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '密码访问网站',
	'icon'        => '',
	'description' => '密码访问网站',
	'fields'      => array(

		array(
			'id'       => 'be_password_status',
			'type'     => 'switcher',
			'title'    => '密码访问网站',
		),

		array(
			'id'       => 'be_password_pass',
			'type'     => 'text',
			'title'    => '访问密码',
		),

		array(
			'id'       => 'be_show_password',
			'type'     => 'switcher',
			'title'    => '显示密码',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'admin_setting',
	'title'       => '重定向登录注册链接',
	'icon'        => '',
	'description' => '重定向默认登录注册页面到指定链接，选择一个自己认为适合的',
	'fields'      => array(

		array(
			'id'       => 'redirect_login',
			'type'     => 'switcher',
			'title'    => '重定向默认登录链接',
			'after'    => '<span class="after-perch">适合不想让别人进入默认登录注册页面，又不影响重置密码</span>',
		),

		array(
			'id'       => 'redirect_login_link',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '重定向网址',
		),


		array(
			'id'       => 'login_link',
			'type'     => 'switcher',
			'title'    => '修改默认登录链接',
			'after'    => '<span class="after-perch">适合不想让别人知道默认登录注册页面链接，但会影响重置密码</span>',
		),

		array(
			'id'       => 'pass_h',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '前缀',
			'default'  => 'my',
		),

		array(
			'id'       => 'word_q',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '后缀',
			'default'  => 'the',
		),

		array(
			'id'       => 'go_link',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '重定向网址',
			'default'  => '',
			'after'    => '当访问默认的登录地址时重定向的网址',
		),

		array(
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'content',
			'title'    => '<strong>修改后的登录地址</strong>',
			'content'  => home_url() . '/wp-login.php?' . zm_get_option( 'pass_h' ) . '=' . zm_get_option( 'word_q' ),
		),

	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'seo_setting',
	'title' => 'SEO设置',
	'icon'  => 'dashicons dashicons-chart-bar',
) );


ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '站点SEO',
	'icon'        => '',
	'description' => '与SEO相关的设置，之后不要再轻易更改，会影响网站收录',
	'fields'      => array(

		array(
			'id'       => 'wp_title',
			'type'     => 'switcher',
			'title'    => '启用SEO功能',
			'default'  => true,
			'label'    => '如使用其它SEO插件，取消勾选，以免重复显示SEO内容',
		),

		array(
			'id'       => 'og_title',
			'type'     => 'switcher',
			'title'    => '显示OG协议标签',
			'default'  => true,
		),

		array(
			'id'       => 'description',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '首页描述（Description）',
			'default'  => '一般不超过200个字符',
		),

		array(
			'id'       => 'keyword',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '首页关键词（KeyWords）',
			'default'  => '一般不超过100个字符',
		),

		array(
			'id'       => 'home_title',
			'type'     => 'text',
			'title'    => '自定义网站首页title',
			'after'    => '留空则不显示自定义title',
		),

		array(
			'id'       => 'home_info',
			'type'     => 'text',
			'title'    => '自定义网站首页副标题',
			'after'    => '留空则不显示自定义副标题',
		),

		array(
			'id'       => 'blog_info',
			'type'     => 'switcher',
			'title'    => '首页显示站点副标题',
			'default'  => true,
		),

		array(
			'id'       => 'connector',
			'type'     => 'text',
			'title'    => '修改站点分隔符',
			'default'  => '|',
		),

		array(
			'id'       => 'blank_connector',
			'type'     => 'switcher',
			'title'    => '分隔符无空格',
		),

		array(
			'id'       => 'blog_name',
			'type'     => 'switcher',
			'title'    => '正文title不显示网站名称',
			'label'    => '同时删除分隔符及勾选分隔符无空格',
		),

		array(
			'id'       => 'seo_title_tag',
			'type'     => 'switcher',
			'title'    => '正文title显示为标签+文章标题',
		),

		array(
			'id'       => 'seo_tag_number',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '标签数量',
			'default'  => '5',
		),

		array(
			'id'       => 'seo_separator_tag',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '标签分隔符',
			'default'  => '-',
		),

		array(
			'id'       => 'home_paged_ban',
			'type'     => 'switcher',
			'title'    => '杂志、公司布局首页分页链接301转向',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '站点地图',
	'icon'        => '',
	'description' => '同时更新生成上万文章的站点地图，可能会造成PHP内存不足而停止，酌情设置，可分别生成txt和xml格式的地图文件。</span>',
	'fields'      => array(

		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '生成站点地图',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin//tools.php?page=sitemap_generate" target="_blank">生成站点地图</a></span>'
		),

		array(
			'id'       => 'publish_sitemap',
			'type'     => 'switcher',
			'title'    => '更新文章时刷新站点地图',
			'after'    => '<span class="after-perch">可能会造成发表文章时缓慢，酌情启用</span>',
		),

		array(
			'id'       => 'sitemap_xml',
			'type'     => 'switcher',
			'title'    => '更新xml格式站点地图',
			'default'  => true,
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '.xml" target="_blank">' . zm_get_option( 'sitemap_name' ) . '.xml</a></span>',
		),

		array(
			'id'       => 'sitemap_txt',
			'type'     => 'switcher',
			'title'    => '更新txt格式站点地图',
			'default'  => true,
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '.txt" target="_blank">' . zm_get_option( 'sitemap_name' ) . '.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_n',
			'type'     => 'number',
			'title'    => '更新文章数',
			'default'  => '2000',
			'after'    => '<span class="after-perch">输入“-1”为全部</span>',
		),

		array(
			'id'       => 'sitemap_split',
			'type'     => 'switcher',
			'title'    => '拆分多个地图文件',
			'after'    => '<span class="after-perch">适合文章较多的站点</span>',
		),

		array(
			'id'       => 'sitemap_delay',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '拆分延时',
			'default'  => '5',
			'after'    => '<span class="after-perch">默认5秒</span>',
		),

		array(
			'class'    => 'be-child-item be-child-last-item be-help-inf',
			'title'    => '说明',
			'type'    => 'content',
			'content' => '
			拆分后的地图文件链接地址，后面为数字编号，以此类推：<br />
			<span style="color: #999;">
			<div>' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '.txt</div>
			<div>' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-1.txt</div>
			<div>' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '.xml</div>
			<div>' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-1.xml</div>
			</span>',
		),

		array(
			'id'       => 'sitemap_name',
			'type'     => 'text',
			'title'    => '自定义地图文件名称',
			'default'  => 'sitemap',
			'after'    => '防止被恶意采集利用',
		),

		array(
			'id'       => 'sitemap_pages',
			'type'     => 'switcher',
			'title'    => '页面',
			'default'  => true,
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-page.xml" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-page.xml</a> / <a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-page.txt" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-page.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_cat',
			'type'     => 'switcher',
			'title'    => '分类',
			'default'  => true,
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-cat.xml" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-cat.xml</a> / <a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-cat.txt" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-cat.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_tag',
			'type'     => 'switcher',
			'title'    => '标签',
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-tag.xml" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-tag.xml</a> / <a href="' . home_url() . '/' . zm_get_option( 'sitemap_name' ) . '-tag.txt" target="_blank">' . zm_get_option( 'sitemap_name' ) . '-tag.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_bulletin',
			'type'     => 'switcher',
			'title'    => '公告',
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/sitemap-bulletin.xml" target="_blank">sitemap-bulletin.xml</a> / <a href="' . home_url() . '/sitemap-bulletin.txt" target="_blank">sitemap-bulletin.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_tao',
			'type'     => 'switcher',
			'title'    => '商品',
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/sitemap-tao.xml" target="_blank">sitemap-tao.xml</a> / <a href="' . home_url() . '/sitemap-tao.txt" target="_blank">sitemap-tao.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_favorites',
			'type'     => 'switcher',
			'title'    => '网址',
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/sitemap-favorites.xml" target="_blank">sitemap-favorites.xml</a> / <a href="' . home_url() . '/sitemap-favorites.txt" target="_blank">sitemap-favorites.txt</a></span>',
		),

		array(
			'id'       => 'sitemap_products',
			'type'     => 'switcher',
			'title'    => '产品',
			'after'    => '<span class="after-perch">链接：<a href="' . home_url() . '/sitemap-products.xml" target="_blank">sitemap-products.xml</a> / <a href="' . home_url() . '/sitemap-products.txt" target="_blank">sitemap-products.txt</a></span>',
		),

		array(
			'id'       => 'wp_sitemap_no',
			'type'     => 'switcher',
			'title'    => 'WP原生站点地图',
			'default'  => true,
			'after'    => '<span class="after-perch">默认链接：<a href="' . home_url() . '/wp-sitemap.xml" target="_blank">wp-sitemap.xml</a></span>',
		),

		array(
			'id'       => 'wp_sitemaps_max',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '自定义文章数',
			'default'  => true,
		),

		array(
			'id'       => 'wp_sitemaps_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页显示',
			'default'  => '2000',
			'after'    => '<span class="after-perch">条，默认2000</span>',
		),

		array(
			'class'    => 'be-child-item be-child-last-item',
			'title'    => '提示',
			'type'    => 'content',
			'content' => '原生站点地图，支持大部分搜索引擎，因动态生成，可能索引速度较慢',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '关键词内链',
	'icon'        => '',
	'description' => '设置关键词内链',
	'fields'      => array(


		array(
			'id'       => 'keyword_link',
			'type'     => 'switcher',
			'title'    => '关键词',
			'default'  => true,
		),

		array(
			'class'    => 'be-button-url be-child-item be-child-last-item',
			'type'     => 'subheading',
			'title'    => '设置关键词',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/tools.php?page=keywordlink" target="_blank">添加关键词</a></span>'
		),

		array(
			'id'       => 'tag_c',
			'type'     => 'switcher',
			'title'    => '用文章标签作为关键词添加内链',
		),

		array(
			'id'       => 'chain_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '数量',
			'default'  => 2,
		),

		array(
			'class'    => 'be-child-item be-child-last-item',
			'title'    => '提示',
			'type'    => 'content',
			'content' => '如果网站标签较多，更新文章时可能会很慢或卡死，酌情使用',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '自动添加标签',
	'icon'        => '',
	'description' => '自动为文章添加现有的标签',
	'fields'      => array(

		array(
			'id'       => 'auto_tags',
			'type'     => 'switcher',
			'title'    => '自动添加标签',
		),

		array(
			'id'       => 'auto_tags_n',
			'type'     => 'number',
			'title'    => '添加数量',
			'default'  => 6,
		),

		array(
			'id'       => 'auto_tags_random',
			'type'     => 'switcher',
			'title'    => '随机',
		),

		array(
			'title'    => '提示',
			'type'    => 'content',
			'content' => '<span style="color: #cf4944;">如果网站标签较多，更新文章时可能会卡死，酌情使用</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '百度收录',
	'icon'        => '',
	'description' => '将文章自动提交给百度',
	'fields'      => array(

		array(
			'id'       => 'baidu_link',
			'type'     => 'switcher',
			'title'    => '百度普通收录',
		),

		array(
			'id'       => 'link_token',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '准入密钥',
			'after'    => '输入调用接口地址&token=后面的字符',
		),

		array(
			'id'       => 'baidu_daily',
			'type'     => 'switcher',
			'title'    => '百度快速收录',
		),

		array(
			'id'       => 'daily_token',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '准入密钥',
			'after'    => '输入调用接口地址&token=后面的字符',
		),

		array(
			'id'       => 'baidu_time',
			'type'     => 'switcher',
			'title'    => '百度时间因子',
			'after'    => '<span class="after-perch">主题时间标注清晰符合要求，百度官方也未提供任何具体代码，有效与否自行判断，代码会影响谷歌结构化检测。</span>',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '分类法固定链接',
	'icon'        => '',
	'description' => '用于修改专栏、商品、公告、网址等固定链接及前缀。修改后到WP后台 → 设置 → 固定链接设置，保存一下，否则不会生效。',
	'fields'      => array(

		array(
			'id'       => 'begin_types_link',
			'type'     => 'switcher',
			'title'    => '固定链接',
		),

		array(
			'id'      => 'begin_types',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '选择',
			'inline'  => true,
			'options' => array(
				'link_id'   => '文章ID.html',
				'link_name' => '文章名称.html',
			),
			'default' => 'link_id',
		),

		array(
			'title'   => '链接前缀',
			'type'    => 'content',
			'content' => '例如，商品链接：tao/xxx.html，商品分类：taobao/xxx，可以修改tao和taobao以符合自己的要求，但两者不能相同，也不能留空。',
		),


		array(
			'id'       => 'be_special_url',
			'type'     => 'text',
			'title'    => '专栏链接前缀',
			'default'  => 'special',
		),


		array(
			'id'       => 'sp_url',
			'type'     => 'text',
			'title'    => '商品链接前缀',
			'default'  => 'tao',
		),

		array(
			'id'       => 'sp_cat_url',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '商品分类链接前缀',
			'default'  => 'taobao',
		),

		array(
			'id'       => 'sp_tag_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '商品标签链接前缀',
			'default'  => 'taotag',
		),

		array(
			'id'       => 'favorites_url',
			'type'     => 'text',
			'title'    => '网址链接前缀',
			'default'  => 'sites',
		),

		array(
			'id'       => 'favorites_cat_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '网址分类链接前缀',
			'default'  => 'favorites',
		),

		array(
			'id'       => 'bull_url',
			'type'     => 'text',
			'title'    => '公告链接前缀',
			'default'  => 'bulletin',
		),

		array(
			'id'       => 'bull_cat_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '公告分类链接前缀',
			'default'  => 'notice',
		),

		array(
			'id'       => 'img_url',
			'type'     => 'text',
			'title'    => '图片链接前缀',
			'default'  => 'picture',
		),

		array(
			'id'       => 'img_cat_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '图片分类链接前缀',
			'default'  => 'gallery',
		),

		array(
			'id'       => 'video_url',
			'type'     => 'text',
			'title'    => '视频链接前缀',
			'default'  => 'video',
		),

		array(
			'id'       => 'video_cat_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '视频分类链接前缀',
			'default'  => 'videos',
		),

		array(
			'id'       => 'show_url',
			'type'     => 'text',
			'title'    => '产品链接前缀',
			'default'  => 'show',
		),

		array(
			'id'       => 'show_cat_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '产品分类链接前缀',
			'default'  => 'products',
		),
	)
));



ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '文章浏览统计',
	'icon'        => '',
	'description' => '用于统计文章被浏览点击次数',
	'fields'      => array(

		array(
			'id'       => 'post_views',
			'type'     => 'switcher',
			'title'    => '文章浏览统计',
			'default'  => true,
		),

		array(
			'id'       => 'user_views',
			'type'     => 'switcher',
			'title'    => '仅登录可见',
		),

		array(
			'id'      => 'views_count',
			'type'    => 'radio',
			'title'   => '统计来自',
			'inline'  => true,
			'options' => array(
				'0'   => '所有人',
				'1'   => '仅访客',
				'2'   => '仅登录',
			),
			'default' => '0',
		),

		array(
			'id'      => 'exclude_bots',
			'type'    => 'radio',
			'title'   => '排除搜索爬虫',
			'inline'  => true,
			'options' => array(
				'1'   => '是',
				'0'   => '否',
			),
			'default' => '0',
		),

		array(
			'id'      => 'use_ajax',
			'type'    => 'radio',
			'title'   => 'Ajax 更新',
			'inline'  => true,
			'options' => array(
				'1'   => '是',
				'0'   => '否',
			),
			'default' => '0',
		),

		array(
			'title'   => '提示',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'content',
			'content' => '仅在使用静态缓存时启用，将以AJAX方式在后台更新浏览计数，清理缓存后前端才会显示实际的计数',
		),

		array(
			'id'      => 'random_count',
			'type'    => 'radio',
			'title'   => '随机计数',
			'inline'  => true,
			'options' => array(
				'1'   => '是',
				'0'   => '否',
			),
			'default' => '0',
		),

		array(
			'id'       => 'rand_mt',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '随机数值',
			'default'  => 15,
			'after'    => '<span class="after-perch">在1至数值间，随机添加计数</span>',
		),

		array(
			'id'       => 'template',
			'type'     => 'text',
			'title'    => '显示模板',
			'default'  => '%VIEW_COUNT%',
		),

		array(
			'title'   => '可使用的变量',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'content',
			'content' => '<b>正常显示：</b>%VIEW_COUNT%<br /><br /><b>以千单位显示：</b>%VIEW_COUNT_ROUNDED%<br />',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '流量统计代码',
	'icon'        => '',
	'description' => '用于添加流量统计代码',
	'fields'      => array(

		array(
			'id'        => 'tongji_h',
			'class'     => 'textarea-30',
			'type'      => 'textarea',
			'title'     => '异步',
			'sanitize'  => false,
			'after'     => '用于在页头添加异步统计代码（例如：百度统计）',
		),

		array(
			'id'        => 'tongji_f',
			'class'     => 'textarea-30',
			'type'      => 'textarea',
			'title'     => '同步',
			'sanitize'  => false,
			'after'     => '用于在页脚添加同步统计代码（例如：站长统计）',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '自定义404页面',
	'icon'        => '',
	'description' => '自定义404页面',
	'fields'      => array(

		array(
			'id'       => '404_t',
			'type'     => 'text',
			'title'    => '自定义404页面标题',
			'default'    => '亲，你迷路了！',
		),

		array(
			'id'       => '404_c',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义404页面内容',
			'default'  => '亲，该网页可能搬家了！<br />',
			'sanitize' => false,
		),

		array(
			'id'      => '404_go',
			'type'    => 'radio',
			'title'   => '404跳转',
			'inline'  => true,
			'options' => array(
				'404_s' => '读秒跳转',
				'404_h' => '直接跳转',
				'404_d' => '不跳转'
			),
			'default' => '404_d',
		),

		array(
			'id'       => '404_url',
			'type'     => 'text',
			'title'    => '自定义跳转链接',
			'default'  => home_url(),
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'seo_setting',
	'title'       => '页脚信息',
	'icon'        => '',
	'description' => '修改添加页脚信息',
	'fields'      => array(

		array(
			'id'        => 'footer_inf_t',
			'type'      => 'wp_editor',
			'title'     => '页脚信息',
			'height'    => '150px',
			'sanitize'  => false,
			'after'     => '回行显示，选择文字“居中对齐”',
			'default'   => '<p style="text-align: center;">Copyright &copy;&nbsp;&nbsp;站点名称&nbsp;&nbsp;版权所有.</p><p style="text-align: center;">主题选项→SEO选项卡，最下面修改页脚信息</p><p style="text-align: center;"><a title="主题设计：知更鸟" href="http://zmingcx.com/" target="_blank" rel="external nofollow"><img src="' . get_template_directory_uri() . '/img/logo.png" alt="Begin主题" width="120" height="27" /></a></p>',
		),

		array(
			'id'       => 'yb_info',
			'type'     => 'text',
			'title'    => '域名备案号',
		),

		array(
			'id'       => 'yb_url',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '工信部链接',
		),

		array(
			'id'       => 'yb_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '域名备案小图标',
			'default'  => '',
			'preview'  => true,
		),

		array(
			'id'       => 'wb_info',
			'type'     => 'text',
			'title'    => '公网安备号',
		),

		array(
			'id'       => 'wb_url',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '公网安备链接',
		),

		array(
			'id'       => 'wb_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '公网安备小图标',
			'default'  => '',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'menu_setting',
	'title' => '菜单设置',
	'icon'        => 'dashicons dashicons-menu-alt',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'menu_setting',
	'title'       => '菜单外观',
	'icon'        => '',
	'description' => '设置菜单外观样式及显示模式',
	'fields'      => array(

		array(
			'id'      => 'menu_m',
			'type'    => 'radio',
			'title'   => '导航菜单固定模式',
			'inline'  => true,
			'options' => array(
				'menu_d' => '正常模式',
				'menu_n' => '永不固定',
				'menu_g' => '保持固定',
			),
			'default' => 'menu_d',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '主要菜单样式',
		),

		array(
			'id'       => 'menu_block',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '色块模式',
			'default'  => true,
		),

		array(
			'id'       => 'nav_ace',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '文字加粗',
			'default'  => true,
		),

		array(
			'id'       => 'menu_glass',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '半透明',
			'default'  => true,
		),

		array(
			'id'      => 'main_menu',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '菜单位置',
			'inline'  => true,
			'options' => array(
				'main_menu_l' => '居左',
				'main_menu_r' => '居右',
			),
			'default' => 'main_menu_l',
		),

		array(
			'id'       => 'nav_margin',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '菜单左右距离',
			'default'  => '66',
			'after'    => '<span class="after-perch">默认66</span>',
		),

		array(
			'id'       => 'top_nav_show',
			'type'     => 'switcher',
			'title'    => '顶部菜单及站点管理',
			'default'  => true,
		),

		array(
			'id'       => 'nav_extend',
			'type'     => 'switcher',
			'title'    => '伸展菜单',
			'default'  => true,
		),

		array(
			'id'       => 'nav_width',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '伸展菜单宽度',
			'after'    => '<span class="after-perch">默认1300，不使用自定义宽度请留空</span>',
		),

		array(
			'id'       => 'nav_full_width',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '100%宽',
		),

		array(
			'id'       => 'assign_menus',
			'type'     => 'switcher',
			'title'    => '指派菜单',
			'default'  => true,
			'after'    => '<span class="after-perch">为每个页面<a href="' . home_url() . '/wp-admin/nav-menus.php?action=locations" target="_blank"><b> 设置 </b></a>不同的菜单</span>',
		),

		array(
			'id'       => 'subjoin_menu',
			'type'     => 'switcher',
			'title'    => '附加菜单',
			'default'  => true,
		),

		array(
			'id'       => 'mega_menu',
			'type'     => 'switcher',
			'title'    => '超级菜单',
			'default'  => true,
		),

		array(
			'id'       => 'menu_visibility',
			'type'     => 'switcher',
			'title'    => '菜单条件判断',
			'default'  => true,
		),

		array(
			'id'       => 'menu_des',
			'type'     => 'switcher',
			'title'    => '二级菜单显示描述',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'menu_setting',
	'title'       => '通用头部模式',
	'icon'        => '',
	'description' => '网站名称在上，主菜单在下的一种导航菜单模式，比较适合在桌面端使用',
	'fields'      => array(

		array(
			'id'       => 'header_normal',
			'type'     => 'switcher',
			'title'    => '通用头部模式',
		),

		array(
			'id'      => 'h_main_o',
			'type'    => 'radio',
			'title'   => '右侧显示',
			'inline'  => true,
			'options' => array(
				'h_search'  => '搜索框',
				'h_contact' => '自定义内容',
			),
			'default' => 'h_search',
		),

		array(
			'id'       => 'logo_box_height',
			'type'     => 'number',
			'title'    => '头部高度',
			'after'    => '<span class="after-perch">默认80</span>',
			'default'  => 80,
		),

		array(
			'id'      => 'header_color',
			'type'    => 'color',
			'title'   => '背景颜色',
			'default' => '#ffffff',
		),

		array(
			'id'        => 'header_contact',
			'type'      => 'wp_editor',
			'title'     => '自定义内容',
			'height'    => '150px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'       => 'top_bg',
			'type'     => 'upload',
			'title'    => '背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'      => 'top_bg_m',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '图片显示模式',
			'inline'  => true,
			'options' => array(
				'repeat_p' => '平铺',
				'repeat_x' => '重复',
				'repeat_y' => '不重复',
			),
			'default' => 'repeat_p',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'menu_setting',
	'title'       => '移动端菜单',
	'icon'        => '',
	'description' => '设置移动端菜单',
	'fields'      => array(

		array(
			'id'       => 'footer_menu',
			'type'     => 'switcher',
			'title'    => '移动端底部菜单',
		),

		array(
			'id'       => 'footer_menu_no',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '菜单自动隐藏',
			'default'  => true,
		),

		array(
			'id'       => 'footer_menu_ico',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '图标模式',
			'default'  => true,
		),

		array(
			'id'       => 'nav_weixin_on',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '菜单微信',
			'default'  => true,
		),

		array(
			'id'       => 'nav_weixin_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示复制按钮',
			'default'  => true,
		),

		array(
			'id'       => 'nav_weixin_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微信号',
			'default'  => '我的微信',
		),

		array(
			'id'       => 'nav_weixin_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '微信二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),

		array(
			'id'       => 'mobile_nav',
			'type'     => 'switcher',
			'title'    => '移动端菜单与PC端不同',
		),

		array(
			'id'       => 'm_nav',
			'type'     => 'switcher',
			'title'    => '单独的移动端菜单',
			'after'    => '<span class="after-perch">不能有二级菜单，有特殊需要时启用</span>',
		),

		array(
			'id'       => 'nav_no',
			'type'     => 'switcher',
			'title'    => '移动端导航按钮链接到页面',
		),

		array(
			'id'          => 'nav_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'        => 'select',
			'title'       => '选择页面',
			'placeholder' => '选择页面',
			'options'     => 'pages',
			'query_args'  => array(
				'posts_per_page' => -1
			)
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'thumbnail_setting',
	'title' => '缩略图',
	'icon'        => 'dashicons dashicons-format-image',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'thumbnail_setting',
	'title'       => '缩略图',
	'icon'        => '',
	'description' => '选择缩略图方式及设置大小比例',
	'fields'      => array(

		array(
			'id'      => 'img_way',
			'type'    => 'radio',
			'title'   => '缩略图方式',
			'inline'  => true,
			'options' => array(
				'no_thumb' => '不裁剪',
				'd_img'    => '裁剪缩略图',
				's_img'    => '生成缩略图',
				'o_img'    => '阿里云OSS',
				'q_img'    => '七牛云',
				'upyun'    => '又拍云',
				'cos_img'  => '腾讯COS',
			),
			'default' => 'no_thumb',
		),

		array(
			'title'    => '选择说明',
			'type'    => 'content',
			'content'  => '<b>不裁剪</b> 支持所有内外链图片，因调用的是原始图片，加载速度会有所影响。<br /><br /><b>裁剪缩略图</b> 支持部分外链，生成单独的缩略图，并可判断内外链，内链裁剪，外链不裁剪调用原图。<br /><br /><b>生成缩略图</b> 仅支持媒体库中可见的图片，生成单独的缩略图，会增加数据查询次数。',
		),

		array(
			'id'       => 'lazy_thumb',
			'type'     => 'upload',
			'title'    => '占位图用于延迟加载',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
			'after'    => '必须重新上传一张图片，用于裁剪相应的占位图，支持阿里云OSS、七牛云、又拍云、腾讯COS裁剪',
		),

		array(
			'id'       => 'allowed_domains',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '仅用于裁剪缩略图方式',
			'after'    => '允许裁剪的外链域名，多个域名中间用英文半角逗号","隔开，与手动添加的允许裁剪外链图片配套使用',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '裁剪设置',
		),

		array(
			'id'      => 'crop_top',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'inline'  => true,
			'title'   => '裁剪位置',
			'options' => $test_array,
			'default' => '',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '标准缩略图',
		),

		array(
			'id'       => 'img_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认280</span>',
			'default'  => 280,
		),

		array(
			'id'       => 'img_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认210</span>',
			'default'  => 210,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '杂志分类模块缩略图',
		),

		array(
			'id'       => 'img_k_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认560</span>',
			'default'  => 560,
		),

		array(
			'id'       => 'img_k_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认230</span>',
			'default'  => 230,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '图片布局缩略图',
		),

		array(
			'id'       => 'grid_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认280</span>',
			'default'  => 280,
		),

		array(
			'id'       => 'grid_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认210</span>',
			'default'  => 210,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '图片缩略图',
		),

		array(
			'id'       => 'img_i_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认280</span>',
			'default'  => 280,
		),

		array(
			'id'       => 'img_i_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认210</span>',
			'default'  => 210,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '视频缩略图',
		),

		array(
			'id'       => 'img_v_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认280</span>',
			'default'  => 280,
		),

		array(
			'id'       => 'img_v_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认210</span>',
			'default'  => 210,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '商品缩略图',
		),

		array(
			'id'       => 'img_t_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认400</span>',
			'default'  => 400,
		),

		array(
			'id'       => 'img_t_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认400</span>',
			'default'  => 400,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '幻灯小工具',
		),

		array(
			'id'       => 'img_s_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认350</span>',
			'default'  => 350,
		),

		array(
			'id'       => 'img_s_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认260</span>',
			'default'  => 260,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '分类宽图',
		),

		array(
			'id'       => 'img_full_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认900</span>',
			'default'  => 900,
		),

		array(
			'id'       => 'img_full_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认350</span>',
			'default'  => 350,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '网址缩略图',
		),

		array(
			'id'       => 'sites_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认280</span>',
			'default'  => 280,
		),

		array(
			'id'       => 'sites_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认210</span>',
			'default'  => 210,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content' => '分类图片',
		),

		array(
			'id'       => 'img_des_w',
			'class'    => 'be-child-item be-child-number',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认1200</span>',
			'default'  => 1200,
		),

		array(
			'id'       => 'img_des_h',
			'class'    => 'be-child-item be-child-last-number',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认250</span>',
			'default'  => 250,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '不裁剪显示比例',
		),

		array(
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '70 等于 4：3，100 等于正方形，不使用自定义请留空',
		),

		array(
			'id'       => 'img_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '标准缩略图',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'img_k_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '杂志分类模块缩略图',
			'after'    => '<span class="after-perch">默认41</span>',
		),

		array(
			'id'       => 'grid_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '图片布局缩略图',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'img_v_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '视频缩略图',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'img_t_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '商品缩略图',
			'after'    => '<span class="after-perch">默认100</span>',
		),

		array(
			'id'       => 'img_s_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '幻灯小工具',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'img_l_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '横向滚动',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'img_full_bl',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '分类宽图',
			'after'    => '<span class="after-perch">默认33.3</span>',
		),

		array(
			'id'       => 'sites_bl',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '网址缩略图',
			'after'    => '<span class="after-perch">默认75</span>',
		),

		array(
			'id'       => 'fall_width',
			'type'     => 'number',
			'title'    => '瀑布流',
			'after'    => '<span class="after-perch">默认233，当调整了页面宽度或者调整分栏，修改这个值，直至两侧对齐</span>',
			'default'  => 233,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '限制文章列表缩略图',
		),

		array(
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '仅适合使用样式简单的博客布局，会影响其它布局样式',
		),

		array(
			'id'       => 'thumbnail_width',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '缩略图最大宽度',
			'after'    => '<span class="after-perch">默认值200</span>',
		),

		array(
			'id'       => 'meta_left',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '调整信息位置',
			'after'    => '<span class="after-perch">默认距左240</span>',
		),

		array(
			'id'       => 'thumbnail_crop',
			'type'     => 'switcher',
			'title'    => '手动缩略图自动裁剪',
		),

		array(
			'id'       => 'wp_thumbnails',
			'type'     => 'switcher',
			'title'    => 'WP自带的特色图片',
			'after'    => '<span class="after-perch">上传图片会生成多余的缩略图，而且无法清理，如不使用该功能请不要开启</span>',
		),

		array(
			'id'       => 'disable_img_sizes',
			'type'     => 'switcher',
			'title'    => '禁止WP自动裁剪图片',
			'default'  => true,
		),

		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '缩略图缓存',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/tools.php?page=crop-thumb" target="_blank">清理缩略图缓存</a></span>'
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'thumbnail_setting',
	'title'       => '随机缩略图',
	'icon'        => '',
	'description' => '设置随机缩略图',
	'fields'      => array(

		array(
			'id'       => 'no_rand_img',
			'type'     => 'switcher',
			'title'    => '文章中无图，不显示随机缩略图',
			'default'  => true,
		),

		array(
			'id'       => 'randimg_crop',
			'type'     => 'switcher',
			'title'    => '裁剪随机缩略图',
			'label'    => '支持阿里云OSS、七牛云、又拍云、腾讯COS裁剪',
		),

		array(
			'id'       => 'random_image_url',
			'type'     => 'textarea',
			'title'    => '标准随机缩略图',
			'after'    => '多张图片链接，中间用英文半角逗号","隔开',
			'default'  => $imgdefault . '/random/320.jpg',
		),

		array(
			'id'       => 'random_long_url',
			'type'     => 'textarea',
			'title'    => '分类模块随机缩略图',
			'after'    => '多张图片链接，中间用英文半角逗号","隔开',
			'default'  => $imgdefault . '/random/560.jpg',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'thumbnail_setting',
	'title'       => '延迟加载',
	'icon'        => '',
	'description' => '延迟加载图片，提高页面加载速度',
	'fields'      => array(

		array(
			'id'       => 'lazy_s',
			'type'     => 'switcher',
			'title'    => '缩略图延迟加载',
			'default'  => true,
		),

		array(
			'id'       => 'lazy_e',
			'type'     => 'switcher',
			'title'    => '正文图片延迟加载',
			'after'    => '<span class="after-perch">可能会影响图片收录</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'thumbnail_setting',
	'title'       => '图片本地化',
	'icon'        => '',
	'description' => '将文章中外链图片自动下载到本地，有些外链图片（如头条），需要切换到“文本”编辑模式，更新发表。',
	'fields'      => array(

		array(
			'id'       => 'save_image',
			'type'     => 'switcher',
			'title'    => '外链图片自动本地化',
			'after'    => '<span class="after-perch">酌情开启</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'thumbnail_setting',
	'title'       => '图片压缩',
	'icon'        => '',
	'description' => '上传图片时，对图片进行自动压缩',
	'fields'      => array(

		array(
			'id'       => 'reduce_img',
			'type'     => 'switcher',
			'title'    => '图片压缩',
		),

		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '设置参数',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/tools.php?page=resize-after-upload" target="_blank">压缩设置</a></span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'template_setting',
	'title'       => '分类模板',
	'icon'        => 'dashicons dashicons-category',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'template_setting',
	'title'       => 'Ajax模式',
	'icon'        => '',
	'description' => '选择不同的Ajax分类模板，显示不同的外观布局',
	'fields'      => array(

		array(
			'type'    => 'content',
			'content' => '输入分类ID，同一个ID不可重复添加，并且不能与常规模式重复使用',
		),

		array(
			'id'       => 'ajax_layout_code_d',
			'class'    => 'be-normal-item',
			'type'     => 'text',
			'title'    => 'Ajax标准布局',
			'after'    => $idcat,
		),

		array(
			'id'       => 'ajax_layout_code_d_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '10',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_d_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_d_chil',
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
			'id'      => 'ajax_code_d_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_d',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_d',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_a',
			'type'     => 'text',
			'title'    => 'Ajax图片布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_layout_code_a_f',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '5',
		),

		array(
			'id'       => 'ajax_layout_code_a_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '15',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_a_r',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '侧边栏',
		),

		array(
			'id'       => 'ajax_layout_code_a_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_a_chil',
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
			'id'      => 'ajax_layout_code_a_img',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '缩略图',
			'inline'  => true,
			'options' => array(
				'0'   => '正常',
				'1'   => '图片',
			),
			'default' => '0',
		),

		array(
			'id'      => 'ajax_code_a_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_a',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_a',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_b',
			'type'     => 'text',
			'title'    => 'Ajax卡片布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_layout_code_b_f',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl1234,
			'default' => '3',
		),

		array(
			'id'       => 'ajax_layout_code_b_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '12',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_b_r',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '侧边栏',
		),

		array(
			'id'       => 'ajax_layout_code_b_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_b_chil',
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
			'id'      => 'ajax_code_b_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_b',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_b',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_c',
			'type'     => 'text',
			'title'    => 'Ajax标题布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_layout_code_c_f',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl1234,
			'default' => '3',
		),

		array(
			'id'       => 'ajax_layout_code_c_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '12',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_c_r',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '侧边栏',
		),

		array(
			'id'       => 'ajax_layout_code_c_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_c_chil',
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
			'id'      => 'ajax_code_c_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_c',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_c',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_f',
			'type'     => 'text',
			'title'    => 'Ajax标题列表',
			'after'    => $idcat,
		),

		array(
			'id'       => 'ajax_layout_code_f_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '12',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_f_r',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '侧边栏',
		),

		array(
			'id'       => 'ajax_layout_code_f_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_f_chil',
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
			'id'      => 'ajax_code_f_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_f',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_f',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_g',
			'type'     => 'text',
			'title'    => 'Ajax瀑布流',
			'after'    => $idcat,
		),

		array(
			'id'       => 'ajax_layout_code_g_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '15',
			'after'    => $anh,
		),

		array(
			'id'      => 'ajax_layout_code_g_chil',
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
			'id'      => 'ajax_code_g_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'more_infinite_g',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
			'inline'  => true,
			'options' => array(
				'false'  => '否',
				'true'   => '是',
			),
			'default' => 'false',
		),

		array(
			'id'       => 'ajax_layout_code_e',
			'type'     => 'text',
			'title'    => 'Ajax问答布局',
			'after'    => $idcat,
		),

		array(
			'id'       => 'ajax_layout_code_e_n',
			'class'    => 'be-child-item',
			'type'     => 'number',
			'title'    => '每页篇数',
			'default'  => '10',
			'after'    => $anh,
		),

		array(
			'id'       => 'ajax_layout_code_e_r',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '侧边栏',
		),

		array(
			'id'       => 'ajax_layout_code_e_btn',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '子分类按钮',
			'default'  => true,
		),

		array(
			'id'      => 'ajax_layout_code_e_chil',
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
			'id'       => 'ajax_layout_code_e_btn_m',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '标准按钮',
			'after'    => '<span class="after-perch">子分类较多时选择</span>',
		),

		array(
			'id'      => 'ajax_code_e_orderby',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '文章排序',
			'inline'  => true,
			'options' => $ajax_orderby,
			'default' => 'date',
		),

		array(
			'id'      => 'nav_btn_e',
			'class'   => 'be-child-item',
			'type'    => 'radio',
			'title'   => '翻页模式',
			'inline'  => true,
			'options' => array(
				'true'   => '数字翻页',
				'more'   => '更多按钮',
				'full'   => '同时显示',
			),
			'default' => 'true',
		),

		array(
			'id'      => 'more_infinite_e',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '滚动加载',
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
	'parent'      => 'template_setting',
	'title'       => '常规模式',
	'icon'        => '',
	'description' => '选择不同的分类模板，显示不同的外观布局',
	'fields'      => array(

		array(
			'type'    => 'content',
			'content' => '输入分类ID，同一个ID不可重复添加，并且不能与AJAX模式重复使用',
		),

		array(
			'id'       => 'cat_layout_default',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '默认模板',
		),

		array(
			'id'       => 'cat_layout_img',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图片布局',
		),

		array(
			'id'       => 'cat_layout_img_s',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图片布局（有侧边栏）',
		),

		array(
			'id'       => 'cat_layout_grid',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图片布局（可单独设置缩略图大小）',
		),

		array(
			'id'       => 'cat_layout_play',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图片布局（有播放图标）',
		),

		array(
			'id'       => 'cat_layout_full',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '通长缩略图',
		),

		array(
			'id'       => 'cat_layout_list',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '标题列表',
		),

		array(
			'id'       => 'cat_layout_novel',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '小说书籍',
		),

		array(
			'id'       => 'cat_child_novel',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '书籍封面',
		),

		array(
			'id'       => 'cat_child_cover',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '封面导航',
		),

		array(
			'id'       => 'cat_layout_square',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '卡片布局',
		),

		array(
			'id'       => 'cat_layout_line',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '时间轴',
		),

		array(
			'id'       => 'cat_layout_fall',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '瀑布流',
		),

		array(
			'id'       => 'cat_layout_child',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '子分类',
		),

		array(
			'id'       => 'cat_layout_child_img',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '子分类图片',
		),

		array(
			'id'       => 'cat_layout_child_tdk',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '标签标题',
		),

		array(
			'id'       => 'cat_layout_display',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '图片展示',
		),

		array(
			'id'       => 'cat_layout_note',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '文档模板',
		),

		array(
			'id'       => 'cat_layout_notes',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '文档模板 ( 章节 )',
			'after'    => '适合父子分类并可用导航菜单小工具创建目录',
		),

		array(
			'id'       => 'cat_layout_assets',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '会员商品',
			'after'    => '需要安装 ErphpDown 插件',
		),

		array(
			'id'      => 'cat_display_f',
			'type'    => 'radio',
			'title'   => '图片展示分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '4',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '文档模板设置',
		),

		array(
			'id'      => 'note_nav_order',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '目录顶部显示',
			'inline'  => true,
			'options' => array(
				'asc'    => '旧的文章',
				'desc'   => '新的文章',
			),
			'default' => 'asc',
		),

		array(
			'id'       => 'note_nav_widget',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '章节模板小工具',
			'label'    => '用导航菜单小工具创建目录',
		),
		array(
			'id'       => 'note_nav_show',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '目录默认展开',
			'default'  => true,
		),

		array(
			'id'       => 'note_main_overall',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '正文全宽',
		),

		array(
			'id'       => 'note_support',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '正文附加信息',
			'default'  => true,
		),

		array(
			'id'       => 'note_comments',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '正文评论模块',
			'default'  => true,
		),

		array(
			'id'        => 'note_notice',
			'class'     => 'be-child-item be-child-last-item',
			'type'      => 'wp_editor',
			'title'     => '底部固定内容',
			'height'    => '100px',
			'sanitize'  => false,
			'default'   => '<p>HTML5+CSS3 响应式设计，博客、杂志、图片、公司企业多种布局可选，集成SEO自定义功能，丰富的主题选项，众多实用小工具。</p>',
		),

		array(
			'id'       => 'gallery_fall',
			'type'     => 'switcher',
			'title'    => '图片分类归档使用瀑布流',
			'default'  => true,
		),

		array(
			'id'       => 'fall_inf',
			'type'     => 'switcher',
			'title'    => '瀑布流显示文章信息',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'template_setting',
	'title'       => '正文模板',
	'icon'        => '',
	'description' => '选择不同的模板，让文章显示不同的外观功能',
	'fields'      => array(

		array(
			'id'       => 'single_layout_qa',
			'type'     => 'text',
			'title'    => '问答模板',
			'after'    => '',
		),

		array(
			'id'       => 'single_layout_down',
			'type'     => 'text',
			'title'    => '下载模板',
		),

		array(
			'id'       => 'single_layout_vip',
			'type'     => 'text',
			'title'    => '会员资源',
			'after'    => '需要安装 ErphpDown 插件',
		),

		array(
			'id'       => 'single_layout_display',
			'type'     => 'text',
			'title'    => '展示模板',
		),

		array(
			'id'       => 'single_layout_full',
			'type'     => 'text',
			'title'    => '简化模板',
		),

		array(
			'id'       => 'single_layout_note',
			'type'     => 'text',
			'title'    => '文档模板',
		),

		array(
			'id'       => 'single_layout_notes',
			'type'     => 'text',
			'title'    => '文档模板 ( 章节 )',
			'after'    => '适合父子分类并可用导航菜单小工具创建目录',
		),

		array(
			'id'       => 'novel_layout',
			'type'     => 'text',
			'title'    => '小说模板',
		),

		array(
			'id'       => 'novel_reading_mode',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '直接进入阅读模式',
			'default'  => true,
		),

		array(
			'id'       => 'novel_eyecare_mode',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '护眼模式',
			'default'  => true,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'template_setting',
	'title'       => '专栏模板',
	'icon'        => '',
	'description' => '选择不同的专栏模板，输入专栏ID，不可重复添加',
	'fields'      => array(

		array(
			'id'      => 'ajax_special_code_a',
			'type'     => 'text',
			'title'   => '图片布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_special_code_b',
			'type'     => 'text',
			'title'   => '卡片布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_special_code_c',
			'type'     => 'text',
			'title'   => '标题布局',
			'after'    => $idcat,
		),

		array(
			'id'      => 'ajax_special_code_d',
			'type'     => 'text',
			'title'   => '标题列表',
			'after'    => $idcat,
		),

		array(
			'id'      => 'all_special_item',
			'type'     => 'text',
			'title'   => '全部专栏',
			'after'    => '仅用于顶级父专栏显示全部专栏',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'template_setting',
	'title'       => '默认模板',
	'icon'        => '',
	'description' => '设置分类默认模板',
	'fields'      => array(

		array(
			'id'          => 'default_cat_template',
			'type'        => 'select',
			'title'       => '分类默认模板',
			'placeholder' => '',
			'options'     => $options_select_template,
		),

		array(
			'id'          => 'default_tag_template',
			'type'        => 'select',
			'title'       => '标签默认模板',
			'placeholder' => '',
			'options'     => $options_select_template_tag,
		),

	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '文章信息',
	'icon'  => 'dashicons dashicons-edit-page',
	'description' => '文章相关信息设置',
	'fields'      => array(

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '文章信息设置',
		),

		array(
			'id'       => 'title_c',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '正文标题居中',
			'default'  => true,
		),

		array(
			'id'       => 'meta_author_single',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '正文显示作者信息',
			'default'  => true,
		),

		array(
			'id'       => 'meta_author',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '文章列表显示作者信息',
			'default'  => true,
		),

		array(
			'id'       => 'author_hide',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '网格模块不显示作者信息',
			'default'  => true,
		),

		array(
			'id'       => 'reading_m',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '阅读模式',
			'default'  => true,
		),

		array(
			'id'       => 'post_modified',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '更新时间',
		),

		array(
			'id'       => 'print_on',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '打印按钮',
		),

		array(
			'id'       => 'word_count',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '文章字数',
		),

		array(
			'id'       => 'reading_time',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '阅读时间',
		),

		array(
			'id'       => 'word_time',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '移动端隐藏字数和阅读时间',
		),

		array(
			'id'       => 'meta_time',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '使用标准日期格式',
		),

		array(
			'id'       => 'no_year',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '标准日期文章列表不显示年',
		),

		array(
			'id'       => 'meta_time_second',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示时间',
			'default'  => true,
		),

		array(
			'id'       => 'post_cat',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示文章分类',
			'default'  => true,
		),

		array(
			'id'       => 'meta_zm_like',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '点赞数',
			'default'  => true,
		),

		array(
			'id'       => 'post_replace',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '底部最后更新日期',
		),

		array(
			'id'       => 'post_tags',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示文章标签',
			'default'  => true,
		),

		array(
			'id'       => 'post_cat_b',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '底部分类链接',
		),

		array(
			'id'       => 'baidu_record',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '显示百度收录与否',
		),

		array(
			'id'       => 'no_thumbnail_cat',
			'type'     => 'switcher',
			'title'    => '缩略图上分类名称',
			'after'    => '<span class="after-perch">鼠标悬停显示</span>',
		),

		array(
			'id'       => 'merge_cat',
			'class'     => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '背景透明',
			'after'    => '<span class="after-perch">适于缩略图颜色丰富情况下使用</span>',
		),

		array(
			'id'       => 'limit_tags_number',
			'type'     => 'number',
			'title'    => '文章标签显示数量',
			'after'    => '<span class="after-perch">留空显示全部</span>',
		),

		array(
			'id'       => 'post_tag_cloud',
			'type'     => 'switcher',
			'title'    => '文章列表显示标签',
			'default'  => true,
		),

		array(
			'id'       => 'post_tag_cloud_n',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '数量',
			'default'  => 2,
		),

		array(
			'id'       => 'auto_add_like',
			'type'     => 'switcher',
			'title'    => '自动添加点赞字段',
			'default'  => true,
			'label'    => '用于文章排序',
		),

		array(
			'id'       => 'copyright',
			'type'     => 'switcher',
			'title'    => '正文底部版权信息',
			'default'  => true,
		),

		array(
			'id'       => 'copyright_avatar',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '显示作者头像',
			'default'  => true,
		),

		array(
			'id'       => 'copyright_statement',
			'class'    => 'be-child-item textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义版权信息第一行',
			'sanitize' => false,
			'after'    => '可使用HTML代码',
		),

		array(
			'id'        => 'copyright_indicate',
			'class'     => 'be-child-item be-child-last-item textarea-30',
			'type'      => 'textarea',
			'title'     => '自定义版权信息第二行',
			'sanitize'  => false,
			'default'   => '<strong>转载请务必保留本文链接：</strong>{{link}}',
			'after'     => '{{title}}表示文章标题，{{link}}表示文章链接，比如获取文章标题和链接：＜a href="{{link}}">{{title}}＜/a＞',
		),
	)
));




ZMOP::createSection( $prefix, array(
	'id'          => 'comments_setting',
	'title'       => '评论设置',
	'icon'        => 'dashicons dashicons-admin-comments',
	'description' => '与评论相关的设置',
	'fields'      => array(

		array(
			'id'       => 'comment_ajax',
			'type'     => 'switcher',
			'title'    => 'Ajax评论',
			'default'  => true,
			'label'    => '启用后，删除WP程序根目录的wp-comments-post，可防垃圾评论',
		),

		array(
			'id'       => 'infinite_comment',
			'type'     => 'switcher',
			'title'    => 'Ajax加载更多评论',
		),

		array(
			'id'       => 'at',
			'type'     => 'switcher',
			'title'    => '评论@回复',
			'default'  => true,
		),

		array(
			'id'       => 'qq_info',
			'type'     => 'switcher',
			'title'    => 'QQ快速评论',
		),

		array(
			'id'       => 'mail_notify',
			'type'     => 'switcher',
			'title'    => '回复邮件通知',
			'default'  => true,
		),

		array(
			'id'       => 'qt',
			'type'     => 'switcher',
			'title'    => '解锁提交评论',
			'default'  => true,
		),

		array(
			'id'       => 'not_comment_form',
			'type'     => 'switcher',
			'title'    => '默认隐藏评论表单',
		),

		array(
			'id'       => 'no_comment_url',
			'type'     => 'switcher',
			'title'    => '不显示评论网址表单',
		),

		array(
			'id'       => 'no_email',
			'type'     => 'switcher',
			'title'    => '评论只填写昵称',
			'label'    => '同时需要到讨论设置中，取消“评论者必须填入名字和电子邮箱地址”勾选',
		),

		array(
			'id'       => 'login_reply_btn',
			'type'     => 'switcher',
			'title'    => '不显示登录回复按钮',
		),

		array(
			'id'       => 'comment_honeypot',
			'type'     => 'switcher',
			'title'    => '防机器人',
			'default'  => true,
		),

		array(
			'id'       => 'refused_spam',
			'type'     => 'switcher',
			'title'    => '评论检查中文',
			'default'  => true,
		),

		array(
			'id'       => 'sticky_comments',
			'type'     => 'switcher',
			'title'    => '评论置顶',
			'default'  => true,
		),

		array(
			'id'       => 'comments_top',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '显示在评论模块上面',
			'default'  => true,
		),

		array(
			'id'       => 'comment_time',
			'type'     => 'switcher',
			'title'    => '评论时间',
			'default'  => true,
		),

		array(
			'id'       => 'vip',
			'type'     => 'switcher',
			'title'    => '评论等级',
			'default'  => true,
		),

		array(
			'id'       => 'comment_floor',
			'type'     => 'switcher',
			'title'    => '评论楼层',
			'default'  => true,
		),

		array(
			'id'       => 'comment_remark',
			'type'     => 'switcher',
			'title'    => '备注信息',
		),

		array(
			'id'       => 'comment_region',
			'type'     => 'switcher',
			'title'    => '地区信息',
			'after'    => '<span class="after-perch">需上传IP数据库dat文件到网站根目录</span>',
		),

		array(
			'id'       => 'ip_dat_name',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '数据库文件名称',
			'default'  => 'ipbe',
		),

		array(
			'id'       => 'embed_img',
			'type'     => 'switcher',
			'title'    => '评论贴图按钮',
			'default'  => true,
		),

		array(
			'id'       => 'emoji_show',
			'type'     => 'switcher',
			'title'    => '评论表情按钮',
			'default'  => true,
		),

		array(
			'id'       => 'comment_pre_btn',
			'type'     => 'switcher',
			'title'    => '评论代码高亮按钮',
			'default'  => true,
		),

		array(
			'id'       => 'comment_html',
			'type'     => 'switcher',
			'title'    => '禁止评论HTML',
		),

		array(
			'id'       => 'del_comment',
			'type'     => 'switcher',
			'title'    => '删除评论按钮',
			'default'  => true,
		),

		array(
			'id'       => 'comment_url',
			'type'     => 'switcher',
			'title'    => '禁止评论超链接',
		),

		array(
			'id'       => 'comment_counts',
			'type'     => 'switcher',
			'title'    => '评论信息',
			'default'  => true,
		),

		array(
			'id'       => 'be_show_avatars',
			'type'     => 'switcher',
			'title'    => '申请头像按钮',
			'default'  => true,
		),

		array(
			'id'       => 'close_comments',
			'type'     => 'switcher',
			'title'    => '关闭评论',
		),

		array(
			'id'       => 'login_comment',
			'type'     => 'switcher',
			'title'    => '登录显示评论模块',
		),

		array(
			'id'       => 'check_admin',
			'type'     => 'switcher',
			'title'    => '禁止冒充管理员留言',
		),

		array(
			'id'       => 'admin_name',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '管理员名称',
		),

		array(
			'id'       => 'admin_email',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '管理员邮箱',
		),

		array(
			'id'       => 'comment_vip',
			'type'     => 'switcher',
			'title'    => '显示评论VIP',
		),

		array(
			'id'      => 'roles_vip',
			'class'   => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '选择显示评论VIP的角色',
			'inline'  => true,
			'options' => array(
				'administrator' => '管理员',
				'editor'        => '编辑',
				'author'        => '作者',
				'contributor'   => '贡献者',
				'subscriber'    => '订阅者',
				'vip_roles'     => '自定义角色'
			),
			'default' => 'contributor',
		),

		array(
			'id'       => 'comment_hint',
			'type'     => 'text',
			'title'    => '评论提示文字',
			'default'  => '赠人玫瑰，手留余香...',
			'after'    => '留空不显示',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'          => 'comments_setting',
	'title'       => '付费资源',
	'icon'        => 'dashicons dashicons-cart',
	'description' => '需要安装 ErphpDown 插件',
	'fields'      => array(
		array(
			'id'       => 'be_down_show',
			'type'     => 'switcher',
			'title'    => '不加载插件下载模块',
			'default'  => true,
		),

		array(
			'id'       => 'no_epd_css',
			'type'     => 'switcher',
			'title'    => '不加载插件样式',
			'default'  => true,
		),

		array(
			'id'       => 'be_login_epd',
			'type'     => 'switcher',
			'title'    => '弹窗登录',
			'default'  => true,
		),

		array(
			'id'       => 'goods_count',
			'type'     => 'switcher',
			'title'    => '已售数量',
			'default'  => true,
		),

		array(
			'id'       => 'vip_meta',
			'type'     => 'switcher',
			'title'    => '资源信息',
			'default'  => true,
		),

		array(
			'id'       => 'menu_vip',
			'type'     => 'switcher',
			'title'    => '菜单VIP',
			'default'  => true,
		),

		array(
			'id'       => 'vip_scroll',
			'type'     => 'switcher',
			'title'    => '跟随VIP',
			'default'  => true,
		),

		array(
			'id'       => 'be_rec_but_url',
			'type'     => 'text',
			'title'    => '充值链接',
		),

		array(
			'id'       => 'be_vip_but_url',
			'type'     => 'text',
			'title'    => '会员链接',
		),

		array(
			'id'       => 'vip10img',
			'type'     => 'upload',
			'title'    => '终身会员背景图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'vip9img',
			'type'     => 'upload',
			'title'    => '包年会员背景图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'vip8img',
			'type'     => 'upload',
			'title'    => '包季会员背景图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'vip7img',
			'type'     => 'upload',
			'title'    => '包月会员背景图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'down_widget_img',
			'type'     => 'upload',
			'title'    => '会员资源小工具默认图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'title'    => '资源信息预设文字',
			'type'    => 'content',
			'content' => '',
		),

		array(
			'id'       => 'down_assets_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '会员',
			'default'  => '收费资源',
		),

		array(
			'id'       => 'down_name_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '名称',
			'default'  => '名称',
		),

		array(
			'id'       => 'down_os_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '平台',
			'default'  => '平台',
		),

		array(
			'id'       => 'down_versions_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '版本',
			'default'  => '版本',
		),

		array(
			'id'       => 'down_size_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '大小',
			'default'  => '大小',
		),

		array(
			'id'       => 'down_sold_inf',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '已售',
			'default'  => '已售',
		),

		array(
			'id'       => 'down_update_inf',
			'class'    => 'be-child-item be-child-last-item be-help-inf',
			'type'     => 'text',
			'title'    => '更新',
			'default'  => '更新',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '搜索设置',
	'icon'        => 'dashicons dashicons-search',
	'description' => '',
	'fields'      => array(

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => 'WP默认搜索设置',
		),

		array(
			'id'       => 'wp_s',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '启用',
			'default'  => true,
		),

		array(
			'id'       => 'search_captcha',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '搜索验证',
			'default'  => true,
		),

		array(
			'id'       => 'search_title',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '仅搜索标题',
			'default'  => true,
		),

		array(
			'id'       => 'auto_search_post',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '结果仅一个自动跳转',
			'default'  => true,
		),

		array(
			'id'      => 'search_option',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '搜索选项',
			'inline'  => true,
			'options' => array(
				'search_default' => '默认',
				'search_url'     => '修改搜索URL',
				'search_cat'     => '分类搜索',
			),
			'default' => 'search_default',
		),

		array(
			'id'      => 'search_post_type',
			'class'   => 'be-child-item',
			'type'    => 'checkbox',
			'title'   => '选择参与搜索的文章类型',
			'inline'  => true,
			'options' => 'post_types',
 			'default'      => array( 'post', 'page', 'bulletin', 'picture', 'video', 'tao', 'show', 'sites' )
		),

		array(
			'id'       => 'not_search_cat',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '输入排除的分类ID',
			'after'    => $mid,
		),

		array(
			'id'      => 'search_the',
			'type'    => 'radio',
			'title'   => '搜索结果布局',
			'inline'  => true,
			'options' => array(
				'search_list'   => '标题布局',
				'search_img'    => '图片布局',
				'search_normal' => '标准布局',
			),
			'default' => 'search_list',
		),

		array(
			'id'       => 'menu_search',
			'type'     => 'switcher',
			'title'    => '弹窗搜索',
			'default'  => true,
		),

		array(
			'id'       => 'search_sidebar',
			'type'     => 'switcher',
			'title'    => '显示侧边栏',
			'default'  => true,
		),

		array(
			'id'       => 'search_nav',
			'type'     => 'switcher',
			'title'    => '搜索推荐',
			'default'  => true,
		),

		array(
			'id'       => 'menu_search_button',
			'type'     => 'switcher',
			'title'    => '主菜单搜索按钮',
			'default'  => true,
		),

		array(
			'class'    => 'be-flex-parent-title',
			'type'     => 'subheading',
		),

		array(
			'class'    => 'be-flex-switcher-parent-title',
			'type'     => 'subheading',
			'content'  => '搜索引擎',
		),

		array(
			'id'       => 'baidu_s',
			'class'    => 'be-flex-switcher be-flex-switcher-first',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '百度',
		),

		array(
			'id'       => 'google_s',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => 'Google',
		),

		array(
			'id'       => 'bing_s',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '必应',
		),

		array(
			'id'       => '360_s',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '360',
		),

		array(
			'id'       => 'sogou_s',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '搜狗',
		),

		array(
			'id'       => 'google_id',
			'type'     => 'text',
			'title'    => 'Google 搜索ID',
			'default'  => '005077649218303215363:ngrflw3nv8m',
			'after'    => '申请地址：https://cse.google.com/',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '网站标志',
	'icon'  => 'dashicons dashicons-wordpress-alt',
	'description' => '上传设置网站LOGO及标志等',
	'fields'      => array(

		array(
			'id'      => 'site_sign',
			'type'    => 'radio',
			'title'   => '站点LOGO/标志',
			'inline'  => true,
			'options' => array(
				'logos'      => 'LOGO',
				'logo_small' => '标志+标题',
				'no_logo'    => '仅标题',
			),
			'default' => 'logo_small',
		),

		array(
			'id'       => 'logo_css',
			'type'     => 'switcher',
			'title'    => '站点名称扫光动画',
			'label'    => '',
			'default'  => true,
		),

		array(
			'id'       => 'logo',
			'type'     => 'upload',
			'title'    => '网站 logo',
			'default'  => $imgpath . '/logo.png',
			'preview'  => true,
			'after'    => '透明png或svg长方型图片效果最佳，默认高度50px',
		),

		array(
			'id'       => 'logo_height',
			'class'    => 'be-child-item be-help-item',
			'type'     => 'number',
			'title'    => '高度',
			'after'    => '<span class="after-perch">默认高度50</span>',
			'default'  => 50,
		),

		array(
			'id'       => 'logo_small_b',
			'type'     => 'upload',
			'title'    => '网站标志',
			'default'  => $imgpath . '/logo-s.png',
			'preview'  => true,
			'after'    => '透明png或svg正方形图片效果最佳，默认宽度50px',
		),

		array(
			'id'       => 'logo_small_width',
			'class'    => 'be-child-item be-help-item',
			'type'     => 'number',
			'title'    => '宽度',
			'after'    => '<span class="after-perch">默认宽度50px</span>',
			'default'  => 50,
		),

		array(
			'id'       => 'favicon',
			'type'     => 'upload',
			'title'    => '自定义 Favicon',
			'default'  => $imgpath . '/favicon.ico',
			'preview'  => true,
			'after'    => '上传favicon.ico(普通图片格式的也可以)，并通过FTP上传到网站根目录',
		),

		array(
			'id'       => 'apple_icon',
			'type'     => 'upload',
			'title'    => '自定义 iOS 图标',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
			'after'    => '上传苹果移动设备主屏幕图标',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'    => 'aux_setting',
	'title' => '辅助功能',
	'icon'  => 'dashicons dashicons-image-filter',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '阿里图标库',
	'icon'        => '',
	'description' => '添加设置阿里图标库',
	'fields'      => array(

		array(
			'class'    => 'be-button-url',
			'type'     => 'subheading',
			'title'    => '访问阿里图标库',
			'content'  => '<span class="be-url-btn"><a href="https://www.iconfont.cn/" target="_blank">添加图标</a></span>',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '阿里图标外链',
		),

		array(
			'class'    => 'be-child-item be-help-item',
			'title'    => '说明',
			'type'    => 'content',
			'content'  => '添加修改图标库后，需重新添加链接',
		),

		array(
			'id'       => 'iconfont_url',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单色图标链接',
			'after'    => '（Font class）后缀为css',
		),

		array(
			'id'       => 'iconsvg_url',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '彩色图标链接',
			'after'    => '（Symbol）后缀为js',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '阿里图标本地',
		),

		array(
			'class'    => 'be-child-item be-help-item',
			'title'    => '说明',
			'type'    => 'content',
			'content'  => '在本地调图标库，不使用请不要勾选',
		),

		array(
			'id'       => 'black_font',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '单色图标',
			'after'    => '<span class="after-perch">将下载的图标库文件夹改名为font，上传到 wp-content 目录</span>',
		),

		array(
			'id'       => 'color_icon',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '彩色图标',
			'after'    => '<span class="after-perch">将下载的图标库文件夹改名为icon，上传到 wp-content 目录</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '编辑器切换',
	'icon'        => '',
	'description' => '用于在区块编辑器与经典编辑器间切换',
	'fields'      => array(

		array(
			'id'       => 'start_classic_editor',
			'type'     => 'switcher',
			'title'    => '经典编辑器',
			'default'  => true,
		),

		array(
			'id'       => 'classic_widgets',
			'type'     => 'switcher',
			'title'    => '经典小工具编辑器',
			'default'  => true,
		),

		array(
			'id'       => 'disable_block_styles',
			'type'     => 'switcher',
			'title'    => '禁止加载区块样式',
			'default'  => true,
		),

		array(
			'title'   => '提示',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'content',
			'content' => '禁止后，之前添加区块样式将消失，如果有添加区块不要勾选',
		),

		array(
			'id'       => 'remove_global_css',
			'type'     => 'switcher',
			'title'    => '禁止加载站点编辑器样式',
			'default'  => true,
		),

		array(
			'title'   => '说明',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'content',
			'content' => '目前主题并不支持站点编辑器功能',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '头像设置',
	'icon'        => '',
	'description' => 'Gravatar 头像设置',
	'fields'      => array(

		array(
			'id'      => 'gravatar_url',
			'type'    => 'radio',
			'title'   => '获取头像方式',
			'inline'  => true,
			'options' => array(
				'avatar_no'  => '默认',
				'avatar_cn'  => 'cn获取',
				'avatar_ssl' => 'ssl获取',
				'avatar_zh'  => '自定义'
			),
			'default' => 'avatar_zh',
		),

		array(
			'id'       => 'zh_url',
			'type'     => 'text',
			'title'    => '自定义获取头像地址',
			'after'    => '默认：weavatar.com/avatar/',
			'default'  => 'weavatar.com/avatar/',
		),

		array(
			'id'       => 'ban_avatars',
			'type'     => 'switcher',
			'title'    => '后台禁止头像',
		),

		array(
			'id'       => 'avatar_load',
			'type'     => 'switcher',
			'title'    => '头像延迟加载',
			'default'  => true,
		),

		array(
			'id'      => 'default_avatar_m',
			'type'    => 'radio',
			'title'   => '自定义默认头像',
			'inline'  => true,
			'options' => array(
				'default_avatar_f' => '固定',
				'default_avatar_r' => '随机'
			),
			'default' => 'default_avatar_f',
		),

		array(
			'id'       => 'default_avatar',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '默认头像',
			'default'  => $imgpath . '/logo-s.png',
			'preview'  => true,
			'after'    => '上传更改自定义固定默认头像后，需进入设置 → 讨论 → 默认头像，勾选“自定义”，并保存更改',
		),


		array(
			'id'       => 'local_avatars',
			'type'     => 'switcher',
			'title'    => '允许上传本地头像',
			'default'  => true,
		),

		array(
			'id'       => 'all_local_avatars',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '允许所有角色上传头像',
		),

		array(
			'id'       => 'avatar_size',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '上传图片限制大小',
			'after'    => '<span class="after-perch">默认200约等于200KB</span>',
			'default'  => '200',
		),

		array(
			'id'       => 'cache_avatar',
			'type'     => 'switcher',
			'title'    => '头像缓存到本地',
			'after'    => '<span class="after-perch">设置 wp-content/uploads/avatar 目录权限为 755 或 777</span>',
		),

		array(
			'id'       => 'gravatar_origin',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '获取头像地址',
			'default'  => 'https://weavatar.com/avatar/',
			'after'    => '推荐：https://weavatar.com/avatar/或官方https://www.gravatar.com/avatar/',
		),

		array(
			'id'      => 'avatar_url',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '未设置头像则显示',
			'inline'  => true,
			'options' => array(
				'letter_img' => '首字图片',
				'rand_img'   => '随机图片',
			),
			'default' => 'letter_img',
		),

		array(
			'id'    => 'random_avatar_url',
			'class'    => 'be-child-item be-child-last-item textarea-30',
			'type'  => 'textarea',
			'title' => '随机头像',
			'after'    => '多张图片链接用英文半角逗号","隔开',
			'default' => $imgpath . '/favicon.png',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '邮件SMTP',
	'icon'        => '',
	'description' => '大部分主机默认情况下都不允许发送邮件，通过第三方邮件 SMTP 实现邮件发送',
	'fields'      => array(

		array(
			'id'       => 'setup_email_smtp',
			'type'     => 'switcher',
			'title'    => '邮件SMTP',
			'default'  => true,
		),

		array(
			'id'       => 'email_name',
			'type'     => 'text',
			'title'    => '发件人名称',
			'default'  => '来自网站',
		),

		array(
			'id'       => 'email_smtp',
			'type'     => 'text',
			'title'    => '邮箱SMTP服务器',
			'default'  => 'smtp.163.com',
			'after'    => '如：smtp.qq.com、smtp.126.com、smtp.163.com',
		),

		array(
			'id'       => 'email_account',
			'type'     => 'text',
			'title'    => '邮箱账户',
			'default'  => 'beginthemes@163.com',
		),

		array(
			'id'       => 'email_authorize',
			'type'     => 'text',
			'title'    => '客户端授权密码',
			'after'    => '非邮箱登录密码',
			'default'  => 'NLSUYCUSEXUGUYHR',
		),

		array(
			'id'       => 'email_port',
			'type'     => 'text',
			'title'    => '端口',
			'after'    => '不需要改',
			'default'  => '465',
		),

		array(
			'id'       => 'email_secure',
			'type'     => 'text',
			'title'    => '加密类型',
			'after'    => '不需要改，端口25时 留空，465时 ssl',
			'default'  => 'ssl',
		),

		array(
			'id'       => 'all_ssl',
			'type'     => 'switcher',
			'title'    => '允许不安全的SSL证书',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '多条件筛选',
	'icon'        => '',
	'description' => '多条件筛选',
	'fields'      => array(

		array(
			'id'       => 'filters',
			'type'     => 'switcher',
			'title'    => '多条件筛选',
		),

		array(
			'id'       => 'filters_hidden',
			'type'     => 'switcher',
			'title'    => '筛选条件默认折叠',
		),

		array(
			'id'       => 'filters_img',
			'type'     => 'switcher',
			'title'    => '筛选结果使用图片布局',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '筛选项选择',
		),

		array(
			'id'       => 'filters_cat',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选分类',
		),

		array(
			'id'       => 'filters_a',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 A',
		),

		array(
			'id'       => 'filters_b',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 B',
		),

		array(
			'id'       => 'filters_c',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 C',
		),

		array(
			'id'       => 'filters_d',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 D',
		),

		array(
			'id'       => 'filters_e',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 E',
		),

		array(
			'id'       => 'filters_f',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 F',
		),

		array(
			'id'       => 'filters_g',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 G',
		),

		array(
			'id'       => 'filters_h',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 H',
		),

		array(
			'id'       => 'filters_i',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 I',
		),

		array(
			'id'       => 'filters_j',
			'class'    => 'be-flex-switcher',
			'type'     => 'switcher',
			'default'  => true,
			'before'   => '筛选 J',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '分类及文字',
		),

		array(
			'id'       => 'filters_cat_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入筛选分类ID',
			'after'    => $mid,
		),

		array(
			'id'       => 'filter_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '标题文字',
			'default'  => '条 件 筛 选',
		),


		array(
			'id'       => 'filters_a_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 A 文字',
			'default'  => '风格',
		),

		array(
			'id'       => 'filters_b_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 B 文字',
			'default'  => '价格',
		),

		array(
			'id'       => 'filters_c_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 C 文字',
			'default'  => '功能',
		),

		array(
			'id'       => 'filters_d_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 D 文字',
			'default'  => '大小',
		),

		array(
			'id'       => 'filters_e_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 E 文字',
			'default'  => '地域',
		),

		array(
			'id'       => 'filters_f_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 F 文字',
			'default'  => '品牌',
		),

		array(
			'id'       => 'filters_g_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 G 文字',
			'default'  => '国家',
		),

		array(
			'id'       => 'filters_h_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 H 文字',
			'default'  => '尺寸',
		),

		array(
			'id'       => 'filters_i_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '筛选 I 文字',
			'default'  => '时间',
		),

		array(
			'id'       => 'filters_j_t',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '筛选 J 文字',
			'default'  => '参数',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '前端投稿',
	'icon'        => '',
	'description' => '用于前端发表文章，新建页面并添加短代码 [bet_submission_form]',
	'fields'      => array(

		array(
			'id'       => 'front_tougao',
			'type'     => 'switcher',
			'title'    => '前端投稿',
			'default'  => true,
		),

		array(
			'id'       => 'instantly_publish',
			'type'     => 'switcher',
			'title'    => '不审核立即发表',
			'default'  => true,
		),

		array(
			'id'      => 'tougao_mode',
			'type'    => 'radio',
			'title'   => '模式选择',
			'inline'  => true,
			'options' => array(
				'post_mode' => '文章投稿',
				'info_mode' => '信息提交',
			),
			'default' => 'post_mode',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '文章投稿设置',
		),

		array(
			'id'       => 'thumbnail_required',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '允许特色图像',
		),

		array(
			'id'      => 'user_upload',
			'class'    => 'be-child-item',
			'type'    => 'radio',
			'title'   => '投稿（贡献）者上传权限',
			'inline'  => true,
			'options' => array(
				'removecap' => '禁止',
				'addcap'    => '允许',
			),
			'default' => 'removecap',
		),

		array(
			'id'      => 'not_front_cat',
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
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '信息提交设置',
		),

		array(
			'id'       => 'submit_bulletin',
			'class'    => 'be-child-item',
			'type'     => 'switcher',
			'title'    => '仅提交到“公告”文章',
			'default'  => true,
		),

		array(
			'id'       => 'info_cat',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入一个分类ID',
		),

		array(
			'class'    => 'be-parent-title be-child-item',
			'type'     => 'subheading',
			'content'  => '表单文字，留空不显示',
		),

		array(
			'id'       => 'info_a',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '表单 A 文字',
			'default'  => '姓名',
		),

		array(
			'id'       => 'info_b',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '表单 B 文字',
			'default'  => '职业',
		),

		array(
			'id'       => 'info_c',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '表单 C 文字',
			'default'  => '学历',
		),

		array(
			'id'       => 'info_d',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '表单 D 文字',
			'default'  => '电话',
		),

		array(
			'id'       => 'info_e',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '表单 E 文字',
			'default'  => '微信/QQ',
		),

		array(
			'id'       => 'info_f',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '表单 F 文字',
			'default'  => '邮箱',
		),

		array(
			'class'    => 'be-parent-title be-child-item',
			'type'     => 'subheading',
			'content'  => '单选文字，留空不显示',
		),

		array(
			'id'       => 's_info_a',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 A 文字',
			'default'  => '选择',
		),

		array(
			'id'       => 's_info_b',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 B 文字',
			'default'  => '高中',
		),

		array(
			'id'       => 's_info_e',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 C 文字',
			'default'  => '大专',
		),

		array(
			'id'       => 's_info_d',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 D 文字',
			'default'  => '本科',
		),

		array(
			'id'       => 's_info_c',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 C 文字',
			'default'  => '本科以上',
		),

		array(
			'id'       => 's_info_f',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '单选 F 文字',
			'default'  => '备用选项',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '跟随按钮设置',
	'icon'        => '',
	'description' => '跟随按钮设置',
	'fields'      => array(

		array(
			'id'       => 'scroll_z',
			'type'     => 'switcher',
			'title'    => '返回首页按钮',
		),

		array(
			'id'       => 'scroll_h',
			'type'     => 'switcher',
			'title'    => '返回顶部按钮',
			'default'  => true,
		),

		array(
			'id'       => 'scroll_b',
			'type'     => 'switcher',
			'title'    => '转到底部按钮',
			'default'  => true,
		),

		array(
			'id'       => 'read_night',
			'type'     => 'switcher',
			'title'    => '夜间模式',
			'default'  => true,
		),

		array(
			'id'       => 'scroll_s',
			'type'     => 'switcher',
			'title'    => '跟随搜索按钮',
		),

		array(
			'id'       => 'scroll_c',
			'type'     => 'switcher',
			'title'    => '跟随评论按钮',
			'default'  => true,
		),

		array(
			'id'       => 'gb2',
			'type'     => 'switcher',
			'title'    => '简繁体转换按钮',
		),

		array(
			'id'       => 'qrurl',
			'type'     => 'switcher',
			'title'    => '显示本页二维码按钮',
			'default'  => true,
		),

		array(
			'id'       => 'btn_scroll_show',
			'type'     => 'switcher',
			'title'    => '显隐动画',
			'default'  => true,
		),

		array(
			'id'      => 'scroll_hide',
			'type'    => 'radio',
			'title'   => '默认隐藏',
			'inline'  => true,
			'options' => array(
				'scroll_desktop'    => '隐藏',
				'scroll_mobile'  => '仅移动端',
			),
			'default' => 'scroll_mobile',
		),

		array(
			'id'       => 'mobile_scroll',
			'type'     => 'switcher',
			'title'    => '移动端不显示',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '自定义分类法',
	'icon'        => '',
	'description' => '是否使用自定义分类法',
	'fields'      => array(

		array(
			'id'       => 'no_bulletin',
			'type'     => 'switcher',
			'title'    => '公告',
			'default'  => true,
		),

		array(
			'id'       => 'no_gallery',
			'type'     => 'switcher',
			'title'    => '图片',
		),

		array(
			'id'       => 'no_videos',
			'type'     => 'switcher',
			'title'    => '视频',
		),

		array(
			'id'       => 'no_tao',
			'type'     => 'switcher',
			'title'    => '商品',
			'default'  => true,
		),

		array(
			'id'       => 'no_favorites',
			'type'     => 'switcher',
			'title'    => '网址',
			'default'  => true,
		),

		array(
			'id'       => 'no_products',
			'type'     => 'switcher',
			'title'    => '产品',
		),

		array(
			'id'       => 'no_type',
			'type'     => 'switcher',
			'title'    => '仅管理员及编辑可见',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '新浪微博关注按钮',
	'icon'        => '',
	'description' => '显示在网站名称右侧',
	'fields'      => array(

		array(
			'id'       => 'weibo_t',
			'type'     => 'switcher',
			'title'    => '新浪微博关注按钮',
		),

		array(
			'id'       => 'weibo_id',
			'type'     => 'text',
			'title'    => '输入新浪微博ID',
			'default'  => '1882973105',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '联系我们',
	'icon'        => '',
	'description' => '用于发送电子邮件',
	'fields'      => array(

		array(
			'id'       => 'mail_form_phone',
			'type'     => 'switcher',
			'title'    => '表单中显示电话',
			'default'  => true,
		),

		array(
			'id'       => 'mail_form_subject',
			'type'     => 'switcher',
			'title'    => '表单中显示主题',
			'default'  => true,
		),

		array(
			'id'       => 'fix_mail_form',
			'type'     => 'switcher',
			'title'    => '显示左侧固定表单',
		),

		array(
			'id'       => 'to_email',
			'type'     => 'text',
			'title'    => '收件邮箱',
			'default'  => $selectemail,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '自定义表单文字',
		),

		array(
			'id'       => 'mail_name',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '名称',
			'default'  => '您的姓名',
		),

		array(
			'id'       => 'mail_email',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '邮箱',
			'default'  => '您的邮箱',
		),

		array(
			'id'       => 'mail_phone',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '电话',
			'default'  => '您的电话',
		),

		array(
			'id'       => 'mail_subject',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '主题',
			'default'  => '邮件主题',
		),

		array(
			'id'       => 'mail_message',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '内容',
			'default'  => '邮件内容',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '在线咨询',
	'icon'        => '',
	'description' => '用于添加联系信息',
	'fields'      => array(

		array(
			'id'       => 'contact_us',
			'type'     => 'switcher',
			'title'    => '在线咨询',
		),

		array(
			'id'       => 'contactus_show',
			'type'     => 'switcher',
			'title'    => '默认显示',
			'default'  => true,
		),

		array(
			'id'       => 'weixing_us_t',
			'type'     => 'text',
			'title'    => '微信文字',
			'default'  => '微信咨询',
		),

		array(
			'id'       => 'weixing_us_id',
			'type'     => 'text',
			'title'    => '微信号',
			'default'  => '微信联系',
		),

		array(
			'id'       => 'weixing_us',
			'type'     => 'upload',
			'title'    => '微信二维码',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),

		array(
			'id'       => 'usqq_t',
			'type'     => 'text',
			'title'    => 'QQ文字',
			'default'  => 'QQ咨询',
		),

		array(
			'id'       => 'usqq_id',
			'type'     => 'text',
			'title'    => 'QQ号码',
			'default'  => '8888',
		),

		array(
			'id'       => 'usshang_t',
			'type'     => 'text',
			'title'    => '在线咨询文字',
			'default'  => '在线咨询',
		),

		array(
			'id'       => 'usshang_url',
			'type'     => 'text',
			'title'    => '在线咨询链接',
			'default'  => '#',
		),

		array(
			'id'       => 'us_phone_t',
			'type'     => 'text',
			'title'    => '电话文字',
			'default'  => '服务热线',
		),

		array(
			'id'       => 'us_phone',
			'type'     => 'text',
			'title'    => '电话号码',
			'default'  => '1308888888',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => 'QQ在线',
	'icon'        => '',
	'description' => '用于显示联系方式QQ、微信、电话等',
	'fields'      => array(

		array(
			'id'       => 'qq_online',
			'type'     => 'switcher',
			'title'    => 'QQ在线',
			'default'  => true,
		),

		array(
			'id'       => 'qq_name',
			'type'     => 'text',
			'title'    => '自定义文字',
			'default'  => '在线咨询',
		),

		array(
			'id'       => 'qq_id',
			'type'     => 'text',
			'title'    => '输入QQ号码',
			'default'  => '8888',
		),

		array(
			'id'       => 'm_phone',
			'type'     => 'text',
			'title'    => '输入手机号',
			'default'  => '13688888888',
		),

		array(
			'id'       => 'weixing_t',
			'type'     => 'text',
			'title'    => '微信说明',
			'default'  => '微信',
		),

		array(
			'id'       => 'weixing_qr',
			'type'     => 'upload',
			'title'    => '微信二维码',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '正文末尾微信二维码',
	'icon'        => '',
	'description' => '用于在正文末尾显示微信二维码',
	'fields'      => array(

		array(
			'id'       => 'single_weixin',
			'type'     => 'switcher',
			'title'    => '正文末尾微信二维码',
			'default'  => true,
		),

		array(
			'id'       => 'single_weixin_one',
			'type'     => 'switcher',
			'title'    => '只显示一个微信二维码',
			'default'  => true,
		),

		array(
			'id'       => 's_weixin_btn',
			'type'     => 'switcher',
			'title'    => '移动端显示复制按钮',
			'default'  => true,
		),

		array(
			'id'       => 'weixin_h',
			'type'     => 'text',
			'title'    => '微信文字',
			'default'  => '我的微信',
		),

		array(
			'id'       => 'weixin_h_w',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微信说明文字',
			'default'  => '微信扫一扫',
		),

		array(
			'id'       => 'weixin_s_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微信号',
			'default'  => '我的微信',
		),

		array(
			'id'       => 'weixin_h_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '微信二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),


		array(
			'id'       => 'weixin_g',
			'type'     => 'text',
			'title'    => '微信公众号文字',
			'default'  => '我的微信公众号',
		),

		array(
			'id'       => 'weixin_g_w',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '微信公众号说明文字',
			'default'  => '微信扫一扫',
		),

		array(
			'id'       => 'weixin_g_id',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '公众号',
			'default'  => '我的公众号',
		),

		array(
			'id'       => 'weixin_g_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '微信公众号二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '点赞分享',
	'icon'        => '',
	'description' => '用于在正文末尾显示点赞、打赏、分享等',
	'fields'      => array(

		array(
			'id'       => 'shar_donate',
			'type'     => 'switcher',
			'title'    => '打赏',
			'default'  => true,
		),

		array(
			'id'       => 'shar_like',
			'type'     => 'switcher',
			'title'    => '点赞',
			'default'  => true,
		),

		array(
			'id'       => 'shar_favorite',
			'type'     => 'switcher',
			'title'    => '收藏',
		),

		array(
			'id'       => 'favorite_data',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'switcher',
			'title'    => '创建数据表',
			'after'    => '<span class="after-perch">开启后，需保存两次设置，然后取消勾选</span>',
		),


		array(
			'id'       => 'shar_share',
			'type'     => 'switcher',
			'title'    => '分享',
			'default'  => true,
		),

		array(
			'id'       => 'shar_link',
			'type'     => 'switcher',
			'title'    => '链接',
			'default'  => true,
		),

		array(
			'id'       => 'shar_poster',
			'type'     => 'switcher',
			'title'    => '海报',
			'default'  => true,
		),

		array(
			'id'       => 'be_like_content',
			'type'     => 'switcher',
			'title'    => '仅移动端显示',
		),

		array(
			'id'       => 'like_left',
			'type'     => 'switcher',
			'title'    => '同时显示在左侧',
			'default'  => true,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '海报设置',
		),

		array(
			'id'       => 'poster_site_name',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '网站名称',
			'after'    => '输入空格不显示网站名称',
		),

		array(
			'id'       => 'poster_site_tagline',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '网站副标题',
			'after'    => '输入空格不显示网站副标题',
		),

		array(
			'id'       => 'poster_logo',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '海报LOGO',
			'default'  => '',
			'preview'  => true,
			'after'    => '默认调用网站标志',
		),

		array(
			'id'       => 'poster_default_img',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '海报默认图片',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
			'after'    => '文章中无图时显示默认图片',
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '打赏二维码',
		),

		array(
			'id'       => 'qr_a',
			'class'    => 'be-child-item',
			'type'     => 'upload',
			'title'    => '微信收款二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),

		array(
			'id'       => 'qr_b',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'upload',
			'title'    => '支付宝收钱二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '新建角色',
	'icon'        => '',
	'description' => '创建自定义角色',
	'fields'      => array(

		array(
			'id'      => 'del_new_roles',
			'type'    => 'radio',
			'title'   => '创建一个新角色',
			'inline'  => true,
			'options' => array(
				'no_roles'  => '无新角色',
				'new_roles' => '新建角色',
				'del_roles' => '删除角色'
			),
			'default' => 'no_roles',
		),

		array(
			'id'       => 'roles_name',
			'type'     => 'text',
			'title'    => '角色名称',
			'default'  => '会员',
		),

		array(
			'id'       => 'user_edit_posts',
			'type'     => 'switcher',
			'title'    => '允许编辑文章',
		),

		array(
			'id'       => 'user_upload_files',
			'type'     => 'switcher',
			'title'    => '允许上传附件',
		),

		array(
			'class'    => 'be-help-inf',
			'title'    => '设置说明',
			'type'    => 'content',
			'content' => '
			<b>修改角色名称</b>&nbsp;&nbsp;&nbsp;&nbsp;先选择“删除角色”，保存两次设置，修改文字，选择“新建角色”，保存两次设置<br />
			<b>修改角色权限</b>&nbsp;&nbsp;&nbsp;&nbsp;先选择“删除角色”，保存两次设置，选择权限，选择“新建角色”，保存两次设置<br />
			修改调整设置后，必须保存两次设置，否则不会生效<br />',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '获取公众号验证码',
	'icon'        => '',
	'description' => '关注微信公众号获取验证码',
	'fields'      => array(

		array(
			'id'       => 'wechat_fans',
			'type'     => 'text',
			'title'    => '微信公众号名称',
			'default'  => '公众号名称',
		),

		array(
			'id'       => 'wechat_unite',
			'type'     => 'switcher',
			'title'    => '统一的密码和关键字',
		),

		array(
			'id'       => 'weifans_pass',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '统一密码',
		),

		array(
			'id'       => 'weifans_key',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '统一关键字',
		),

		array(
			'id'       => 'wechat_qr',
			'type'     => 'upload',
			'title'    => '微信公众号二维码图片',
			'default'  => $imgpath . '/favicon.png',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '登录/评论查看自定义文字',
	'icon'        => '',
	'description' => '设置登录/评论可见短代码全局提示文字，也可以添加短代码时，自定义文字提示',
	'fields'      => array(

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '评论查看自定义文字',
		),

		array(
			'id'       => 'reply_read_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '自定义提示',
			'default'  => '此处为隐藏的内容',
		),

		array(
			'id'       => 'reply_read_c',
			'class'    => 'be-child-item be-child-last-item textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义说明',
			'default'  => '发表评论并刷新，方可查看',
			'sanitize' => false,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '登录查看自定义文字',
		),

		array(
			'id'       => 'login_read_t',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '自定义提示',
			'default'  => '此处为隐藏的内容',
		),

		array(
			'id'       => 'login_read_c',
			'class'    => 'be-child-item be-child-last-item textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义说明',
			'default'  => '注册登录后，方可查看',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '会员登录查看',
	'icon'        => '',
	'description' => '设置“会员可见”短代码全局提示文字，也可以添加短代码时，自定义文字提示',
	'fields'      => array(

		array(
			'id'      => 'user_roles',
			'type'    => 'radio',
			'title'   => '选择一个有权查看隐藏内容的角色',
			'inline'  => true,
			'options' => array(
				'administrator' => '管理员',
				'editor'        => '编辑',
				'author'        => '作者',
				'contributor'   => '贡献者',
				'subscriber'    => '订阅者',
				'vip_roles'     => '自定义角色'
			),
			'default' => 'contributor',
		),

		array(
			'id'       => 'role_visible_t',
			'type'     => 'text',
			'title'    => '自定义提示',
			'default'  => '隐藏的内容',
		),

		array(
			'id'       => 'role_visible_w',
			'type'     => 'text',
			'title'    => '无权限查看提示文字',
			'default'  => '无权限查看',
		),

		array(
			'id'       => 'role_visible_c',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义说明',
			'default'  => '会员登录后查看',
			'sanitize' => false,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '切换主题语言',
	'icon'        => '',
	'description' => '用于主题前端显示英文语言，后台→设置→常规选项→站点语言→选择 English (United States)',
	'fields'      => array(

		array(
			'id'       => 'languages_en',
			'type'     => 'switcher',
			'title'    => '英文',
			'label'    => '使用英文必须勾选这个，否则文字截断会有问题',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '网址收藏',
	'icon'        => '',
	'description' => '网址相关设置',
	'fields'      => array(

		array(
			'id'      => 'site_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fsl45,
			'default' => '4',
		),

		array(
			'id'       => 'site_p_n',
			'type'     => 'number',
			'title'    => '显示篇数',
			'default'  => 100,
		),

		array(
			'id'       => 'sites_cat_id',
			'type'     => 'text',
			'title'    => '网址页面排除的父分类ID',
		),

		array(
			'id'       => 'sites_ico',
			'type'     => 'switcher',
			'title'    => '网址显示Favicon图标',
			'default'  => true,
		),

		array(
			'id'       => 'sites_adorn',
			'type'     => 'switcher',
			'title'    => '装饰动画',
			'default'  => true,
		),

		array(
			'id'       => 'all_site_cat',
			'type'     => 'switcher',
			'title'    => '分类目录',
			'default'  => true,
		),

		array(
			'id'       => 'site_cat_fixed',
			'type'     => 'switcher',
			'title'    => '固定在左侧',
			'default'  => true,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '网址页面小工具',
		),

		array(
			'id'       => 'sites_widgets_one_n',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '输入网址分类ID，显示在指定分类下',
		),

		array(
			'id'      => 'sw_f',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $swf12,
			'default' => '2',
		),

		array(
			'id'       => 'site_sc',
			'type'     => 'switcher',
			'title'    => '网址正文显示网站截图',
			'default'  => true,
		),

		array(
			'id'      => 'screenshot_api',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '截图API接口',
			'inline'  => true,
			'options' => array(
				'api_wp'        => 's0.wp',
				'api_wordpress' => 's0.wordpress.com',
				'api_urlscan'   => 'urlscan.io',
			),
			'default' => 'api_wp',
		),

		array(
			'id'       => 'sites_url_error',
			'type'     => 'switcher',
			'title'    => '获取网站描述出错时勾选，用后取消勾选',
		),
	)
));

if ( file_exists( get_theme_file_path( '/docs/inc/docs-setup.php' ) ) ) {
	ZMOP::createSection( $prefix, array(
		'parent'      => 'aux_setting',
		'title'       => '文档设置',
		'icon'        => '',
		'description' => '开始设置文档模板补丁功能',
		'fields'      => array(

			array(
				'id'       => 'docs_name',
				'type'     => 'text',
				'title'    => '文档标题',
				'default'  => '主题使用文档',
			),

			array(
				'id'       => 'docs_name_url',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'text',
				'title'    => '文档标题链接',
				'default'  => '',
			),

			array(
				'id'       => 'docs_bread_txt',
				'type'     => 'text',
				'title'    => '面包屑导航文字',
				'default'  => '使用文档',
			),

			array(
				'id'       => 'docs_bread_url',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'text',
				'title'    => '面包屑导航链接',
				'default'  => '',
			),

			array(
				'id'       => 'docs_nav_display',
				'type'     => 'switcher',
				'title'    => '左侧菜单子项默认隐藏',
				'default'  => true,
			),

			array(
				'id'       => 'docs_logo',
				'type'     => 'upload',
				'title'    => '标志',
				'default'  => $imgpath . '/logo-s.png',
				'preview'  => true,
				'after'    => '透明png或svg图片最佳，比例 50×50px',
			),

			array(
				'id'       => 'docs_logo_svg',
				'class'    => 'textarea-30 be-child-item be-child-last-item',
				'type'     => 'textarea',
				'title'    => '输入SVG图标代码',
				'sanitize' => false,
			),

			array(
				'id'       => 'docs_notice',
				'type'     => 'switcher',
				'title'    => '文档公告',
				'default'  => true,
			),

			array(
				'id'       => 'docs_notice_id',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'text',
				'title'    => '调用指定的分类',
				'after'    => '输入一个公告分类ID',
			),

			array(
				'id'       => 'docs_notice_n',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'number',
				'title'    => '公告滚动篇数',
				'default'  => '2',
			),

			array(
				'id'       => 'docs_nav_but',
				'type'     => 'switcher',
				'title'    => '菜单自定义按钮',
				'default'  => true,
			),

			array(
				'id'       => 'docs_nav_but_text',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'text',
				'title'    => '按钮文字',
			),

			array(
				'id'       => 'docs_nav_but_url',
				'class'    => 'be-child-item be-child-last-item',
				'type'     => 'text',
				'title'    => '链接地址',
				'default'  => '',
			),

			array(
				'id'       => 'docs_footer',
				'class'    => 'textarea-30',
				'type'     => 'textarea',
				'title'    => '页脚信息',
				'sanitize' => false,
				'default'  => 'Copyright ©  站点名称  版权所有.',
			),
		)
	));
}

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => 'WOO商店',
	'icon'        => '',
	'description' => '需要安装商店插件 WooCommerce ',
	'fields'      => array(

		array(
			'id'       => 'woo_cols_n',
			'type'     => 'number',
			'title'    => '每页显示数量',
			'default'  => 20,
		),

		array(
			'id'       => 'woo_related_n',
			'type'     => 'number',
			'title'    => '相关文章数量',
			'default'  => 4,
		),

		array(
			'id'      => 'woo_f',
			'type'    => 'radio',
			'title'   => '分栏',
			'inline'  => true,
			'options' => $fl456,
			'default' => '5',
		),

		array(
			'id'       => 'woo_thumbnail',
			'type'     => 'upload',
			'title'    => '默认缩略图',
			'default'  => $imgdefault . '/random/320.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'shop_header_img',
			'type'     => 'upload',
			'title'    => '商店页面默认图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '自定义仪表盘',
	'icon'        => '',
	'description' => '隐藏仪表盘默认元素，并添加自定义内容',
	'fields'      => array(

		array(
			'id'       => 'hide_dashboard',
			'type'     => 'switcher',
			'title'    => '隐藏仪表盘默认元素',
			'default'  => true,
		),

		array(
			'id'       => 'add_dashboard',
			'type'     => 'switcher',
			'title'    => '显示自定义内容',
			'default'  => true,
		),

		array(
			'id'       => 'dashboard_title',
			'type'     => 'text',
			'title'    => '自定义标题',
			'default'  => '欢迎光临本站',
		),

		array(
			'id'       => 'dashboard_content',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '自定义内容',
			'sanitize' => false,
			'default'  => '辅助功能 → 自定义仪表盘，修改此内容 ',
			'after'    => '支持HTML代码',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '自定义媒体路径',
	'icon'        => '',
	'description' => '修改默认媒体路径',
	'fields'      => array(

		array(
			'id'       => 'be_upload_path',
			'type'     => 'switcher',
			'title'    => '启用',
		),

		array(
			'id'       => 'be_upload_path_url',
			'type'     => 'text',
			'title'    => '自定义路径',
			'default'  => 'wp-content/media',
			'after'    => 'WP缺省为wp-content/uploads',
		),

		array(
			'class'    => 'be-button-url be-button-help-url',
			'type'     => 'subheading',
			'title'    => '媒体设置',
			'content'  => '<span class="be-url-btn"><a href="' . home_url() . '/wp-admin/options-media.php" target="_blank">媒体设置</a></span>',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '综合辅助',
	'icon'        => '',
	'description' => '综合辅助',
	'fields'      => array(

		array(
			'id'       => 'links_click',
			'type'     => 'switcher',
			'title'    => '短链接',
			'label'    => '用于链接点击统计',
		),

		array(
			'id'       => 'meta_delete',
			'type'     => 'switcher',
			'title'    => '防止文章选项丢失',
			'after'    => '<span class="after-perch">在使用文章快速编辑和定时发布时使用</span>',
			'default'  => true,
		),

		array(
			'id'       => 'login_down_key',
			'type'     => 'switcher',
			'title'    => '下载模块登录查看密码',
		),

		array(
			'id'       => 'remove_jqmigrate',
			'type'     => 'switcher',
			'title'    => '移除jQuery迁移辅助',
			'after'    => '<span class="after-perch">如发现有错误，取消勾选</span>',
		),

		array(
			'id'       => 'web_queries',
			'type'     => 'switcher',
			'title'    => '在页脚显示查询次数及加载时间',
		),

		array(
			'id'       => 'all_settings',
			'type'     => 'switcher',
			'title'    => '显示WordPress设置选项字段',
		),

		array(
			'id'       => 'delete_favorite',
			'type'     => 'switcher',
			'title'    => '删除文章收藏数据表',
		),

		array(
			'id'       => 'be_feed_cache',
			'type'     => 'number',
			'title'    => 'RSS小工具缓存时间',
			'default'  => '',
			'after'    => '<span class="after-perch">例如：7200，2天</span>',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '更新文章页面',
	'icon'        => '',
	'description' => '更新文章页面设置',
	'fields'      => array(

		array(
			'title'    => '说明',
			'class'    => 'be-child-item',
			'type'    => 'content',
			'content' => '可以单独设置年、月、分类，留空则显示全部文章',
		),

		array(
			'id'       => 'year_n',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '年份',
		),

		array(
			'id'       => 'mon_n',
			'class'    => 'be-child-item',
			'type'     => 'text',
			'title'    => '月份',
		),

		array(
			'id'       => 'cat_up_n',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'text',
			'title'    => '分类ID',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'aux_setting',
	'title'       => '下载页面',
	'icon'        => '',
	'description' => '设置单独的下载页面',
	'fields'      => array(

		array(
			'id'       => 'root_down_url',
			'type'     => 'switcher',
			'title'    => '下载链接到根目录，并执行下面的操作',
		),

		array(
			'id'       => 'root_file_move',
			'type'     => 'switcher',
			'title'    => '复制下载模板到网站根目录',
			'after'    => '<span class="after-perch">自动将“inc/download.php”文件复制到网站根目录，勾选后需保存两次设置，用后取消勾选</span>',
		),

		array(
			'id'       => 'down_header_img',
			'type'     => 'upload',
			'title'    => '页面背景图片',
			'default'  => $imgdefault . '/options/1200.jpg',
			'preview'  => true,
		),

		array(
			'id'       => 'down_explain',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '版权说明',
			'default'  => '本站大部分下载资源收集于网络，只做学习和交流使用，版权归原作者所有。若您需要使用非免费的软件或服务，请购买正版授权并合法使用。本站发布的内容若侵犯到您的权益，请联系站长删除，我们将及时处理。',
			'sanitize' => false,
			'after'    => '可使用HTML代码',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '广告位',
	'icon'        => 'dashicons dashicons-admin-site-alt2',
	'description' => '设置广告位',
	'fields'      => array(

		array(
			'id'       => 'ad_h_t',
			'type'     => 'switcher',
			'title'    => '头部通栏广告位',
		),

		array(
			'id'         => 'ad_h_t_h',
			'class'      => 'be-child-item',
			'type'       => 'switcher',
			'title'      => '只在首页显示',
			'dependency' => array( 'ad_h_t', '==', 'true' ),
		),

		array(
			'id'         => 'ad_ht_c',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入头部通栏广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_h_t', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_ht_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入头部通栏广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_h_t', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_h',
			'type'     => 'switcher',
			'title'    => '头部两栏广告位',
		),

		array(
			'id'         => 'ad_h_h',
			'class'      => 'be-child-item',
			'type'       => 'switcher',
			'title'      => '只在首页显示',
			'dependency' => array( 'ad_h', '==', 'true' ),
		),

		array(
			'id'         => 'ad_h_c',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入头部左侧广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_h', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_h_c_m',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入头部左侧广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_h', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_h_cr',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入头部右侧广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_h', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/ggr.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_a',
			'type'     => 'switcher',
			'title'    => '文章列表广告位',
		),

		array(
			'id'         => 'ad_a_c',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_a', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_a_c_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_a', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_s',
			'type'     => 'switcher',
			'title'    => '正文标题广告位',
		),

		array(
			'id'         => 'ad_s_c',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_s_c_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_s_b',
			'type'     => 'switcher',
			'title'    => '正文底部广告位',
		),

		array(
			'id'         => 'ad_s_c_b',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s_b', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_s_c_b_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s_b', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_c',
			'type'     => 'switcher',
			'title'    => '评论上方广告位',
		),

		array(
			'id'         => 'ad_c_c',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_c', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_c_c_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_c', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_s_k',
			'type'     => 'switcher',
			'title'    => '设置正文短代码广告位',
		),

		array(
			'id'         => 'ad_s_z',
			'class'      => 'be-child-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => 'PC端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s_k', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'         => 'ad_s_z_m',
			'class'      => 'be-child-item be-child-last-item textarea-30',
			'type'       => 'textarea',
			'title'      => '输入文章列表广告代码',
			'before'     => '移动端',
			'sanitize'   => false,
			'dependency' => array( 'ad_s_k', '==', 'true' ),
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_down',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '文件下载页面广告代码',
			'sanitize' => false,
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_down_file',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '弹窗下载广告位',
			'sanitize' => false,
			'default'    => '<a href="#" target="_blank"><img src="' . $imgdefault . '/options/gg.jpg" alt="广告也精彩" /></a>',
		),

		array(
			'id'       => 'ad_t',
			'class'    => 'textarea-30',
			'type'     => 'textarea',
			'title'    => '需要在页头<head></head>之间加载的广告代码',
			'sanitize' => false,
			'default'  => '',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'id'     => 'style_setting',
	'title'  => '定制风格',
	'icon'  => 'dashicons dashicons-admin-appearance',
) );

ZMOP::createSection( $prefix, array(
	'parent'      => 'style_setting',
	'title'       => '页面宽度',
	'icon'        => '',
	'description' => '自定义主题全局宽度，<b>如启用了“菜单设置 → 菜单外观→ 伸展菜单”，需要相应调整宽度数值</b>',
	'fields'      => array(

		array(
			'id'       => 'custom_width',
			'type'     => 'number',
			'title'    => '固定宽度',
			'default'  => '',
			'after'    => '<span class="after-perch">默认1200，不使用自定义宽度请留空</span>',
		),

		array(
			'id'       => 'percent_width',
			'type'     => 'switcher',
			'title'    => '按百分比',
		),

		array(
			'id'       => 'adapt_width',
			'class'    => 'be-child-item be-child-last-item',
			'type'     => 'number',
			'title'    => '百分比',
			'default'  => '',
			'after'    => '<span class="after-perch">小于99，不使用自定义宽度请留空</span>',
		),

		array(
			'class'    => 'be-help-inf',
			'title'    => '提示',
			'type'    => 'content',
			'content' => '建议选择固定宽度，按百分比显示可能在笔记本小屏上还可以，但在27寸、34寸显示器中就太宽了',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'style_setting',
	'title'       => '颜色风格',
	'icon'        => '',
	'description' => '择自己喜欢的颜色，不使用自定义颜色清除即可',
	'fields'      => array(

		array(
			'id'      => 'all_color',
			'type'    => 'color',
			'title'    => '统一颜色',
			'default' => '',
		),

		array(
			'type'    => 'content',
			'title'    => '分别选择颜色',
			'content' => '',
		),

		array(
			'id'      => 'blogname_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '站点标题',
		),

		array(
			'id'      => 'blogdescription_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '站点副标题',
		),

		array(
			'id'      => 'link_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '超链接',
		),

		array(
			'id'      => 'menu_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '菜单颜色',
		),

		array(
			'id'      => 'button_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '按钮',
		),

		array(
			'id'      => 'cat_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '分类名称',
		),

		array(
			'id'      => 'slider_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '幻灯',
		),

		array(
			'id'      => 'h_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '正文H标签',
		),

		array(
			'id'      => 'z_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '分享按钮',
		),

		array(
			'id'      => 'menu_o_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '通用菜单',
		),

		array(
			'id'      => 'menu_color_f',
			'class'   => 'be-flex-color color-f',
			'type'    => 'color',
			'default' => '',
			'before'  => '通用菜单固定',
		),

		array(
			'id'      => 'epd_color',
			'class'   => 'be-flex-color',
			'type'    => 'color',
			'default' => '',
			'before'  => '会员模块',
		),
	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'style_setting',
	'title'       => '自定义样式',
	'icon'        => '',
	'description' => '',
	'fields'      => array(

		array(
			'id'       => 'custom_css',
			'class'   => 'be-custom-css',
			'type'     => 'textarea',
			'title'    => '自定义样式 CSS',
			'sanitize' => false,
		),

		array(
			'class'    => 'be-parent-title',
			'type'     => 'subheading',
			'content'  => '自定义样式代码示例',
		),

		array(
			'class'   => 'be-child-item be-child-last-item be-child-item-css',
			'title'   => '调整主菜单高度',
			'type'    => 'content',
			'content' => '
<span class="be-css-txt">
:root { 
	/** 菜单高度 **/
	--be-m-li: 66px;
	/** 不显示顶部菜单头部高度 **/
	--be-h: 66px;
	/** 显示顶部菜单头部高度 **/
	--be-h-s: 96px;
}

<i class="dashicons dashicons-warning"></i>最小高度55px，增大或减小“菜单高度”数值，相应调整“头部高度”数值。
</span>',
		),

		array(
			'class'   => 'be-child-item be-child-last-item be-child-item-css',
			'title'   => '修改主菜单颜色',
			'type'    => 'content',
			'content' => '
<span class="be-css-txt">
:root { 
	/** 文字颜色 **/
	--be-m-arrow: #ccc;
	--be-m-a: #ccc;
	--be-admin-btn: #ccc;
	/** 背景颜色 **/
	--be-bg-nav-white: #444;
	/** 背景半透明 **/
	--be-bg-glass: rgba(50, 50, 50, 0.8);
	/** 扫光动画 **/
	--be-light: rgba(50, 50, 50, 0);
	--be-real: rgba(50, 50, 50, 0.3);
	--be-border-nav-b: #444;
	--be-grey-nav-3: #ccc;
}

<i class="dashicons dashicons-warning"></i>同时在颜色风格，修改“站点标题”和“站点副标题”颜色。
</span>',
		),

		array(
			'class'   => 'be-child-item be-child-last-item be-child-item-css',
			'title'   => '顶部菜单颜色',
			'type'    => 'content',
			'content' => '
<span class="be-css-txt">
:root {
	--be-bg-grey-top: #555;
	--be-grey-top: #ccc;
	--be-admin: #ccc;
}
</span>',
		),

		array(
			'class'   => 'be-child-item be-child-last-item be-child-item-css',
			'title'   => '修改背景色',
			'type'    => 'content',
			'content' => '
<span class="be-css-txt">
:root {
	/** 主菜单 **/
	--be-bg-nav-white: #e1d1c1;
	--be-bg-white: #f5eadf;
	--be-bg-glass: rgba(225, 209, 193, 0.8);
	/** 扫光动画 **/
	--be-light: rgba(225, 209, 193, 0);
	--be-real: rgba(225, 209, 193, 0.3);
	/** 图片背景色 **/
	--be-bg-gradual: linear-gradient(to bottom, transparent 0%, #f5eadf 10%);
	--be-border-white-at: #f5eadf;
	--be-border-grey: #f5eadf;
	/** 小标题背景色 **/
	--be-bg-grey-f8: #f3e5d7;
}

<i class="dashicons dashicons-warning"></i>同时在颜色风格中修改各部分颜色，并在“自定义”里修改背景颜色或者上传背景图片。上述代码仅定义了基本的背景颜色，不包括其它细节。
</span>',
		),

	)
));

ZMOP::createSection( $prefix, array(
	'parent'      => 'style_setting',
	'title'       => '其它样式',
	'icon'        => '',
	'description' => '修改设置样式',
	'fields'      => array(

		array(
			'id'       => 'aos_scroll',
			'type'     => 'switcher',
			'title'    => '动画特效',
		),

		array(
			'id'      => 'aos_data',
			'class'    => 'be-child-item be-child-last-item',
			'type'    => 'radio',
			'title'   => '动画效果',
			'inline'  => true,
			'options' => array(
				'fade-up' => '向上',
				'fade-in' => '渐显',
				'zoom-in' => '缩放',
			),
			'default' => 'fade-up',
		),

		array(
			'id'       => 'post_no_margin',
			'type'     => 'switcher',
			'title'    => '文章列表无下边距',
		),

		array(
			'id'       => 'hover_box',
			'type'     => 'switcher',
			'title'    => '鼠标悬停阴影',
		),

		array(
			'id'       => 'title_i',
			'type'     => 'switcher',
			'title'    => '模块标题前装饰',
			'default'  => true,
		),

		array(
			'id'       => 'title_l',
			'type'     => 'switcher',
			'title'    => '文章列表悬停装饰',
			'default'  => true,
		),

		array(
			'id'       => 'more_im',
			'type'     => 'switcher',
			'title'    => '彩色标题更多按钮',
			'default'  => true,
		),

		array(
			'id'       => 'fresh_no',
			'type'     => 'switcher',
			'title'    => '标题无背景色（测试中）',
			'after'    => '<span class="after-perch">适合白色背景时使用</span>',
		),

		array(
			'id'       => 'mobile_viewport',
			'type'     => 'switcher',
			'title'    => '移动端禁止缩放',
			'default'  => true,
		),

		array(
			'id'       => 'mouse_cursor',
			'type'     => 'switcher',
			'title'    => '鼠标特效',
		),

		array(
			'id'       => 'top_progress',
			'type'     => 'switcher',
			'title'    => '顶部滚动进度条',
			'default'  => true,
		),
	)
));

ZMOP::createSection( $prefix, array(
	'title'       => '备份主题选项',
	'icon'        => 'dashicons dashicons-update',
	'description' => '将主题选项设置数据导出为“<span style="color: #000;">主题选项备份 + 日期.json</span>”文件，并下载到本地',
	'fields'      => array(

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '将导出的“<span style="color: #000;">主题选项备份 + 日期.json</span>”文件用记事本打开',
		),

		array(
			'class' => 'be-child-item',
			'type'  => 'backup',
		),

		array(
			'title'   => '',
			'class'   => 'be-des',
			'type'    => 'content',
			'content' => '请不要随意输入内容，并执行导入操作，否则所有设置将消失！',
		),
	)
) );