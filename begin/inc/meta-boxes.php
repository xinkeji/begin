<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 文章SEO
$seo_post_meta_boxes =
array(
	"seo_help"  => array(
		"name"  => "seo_help",
		"std"   => "本选项并不是必须的，主题会自动生成文章描述和关键字",
		"title" => "",
		"type"  => "help"
	),

	"custom_title" => array(
		"name"  => "custom_title",
		"std"   => "",
		"title" => "SEO自定义文章标题",
		"type"  => "text"
	),

	"description" => array(
		"name"  => "description",
		"std"   => "",
		"title" => "SEO文章描述，留空则自动截取首段一定字数作为文章描述",
		"type"  => "textarea"
	),

	"keywords"  => array(
		"name"  => "keywords",
		"std"   => "",
		"title" => "SEO文章关键词，多个关键词用半角逗号隔开，留空则自动将文章标签做为关键词",
		"type"  => "text"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function seo_post_meta_boxes() {
	global $post, $seo_post_meta_boxes;

	foreach ($seo_post_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'help':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field">' . $meta_box['std'] . '</span><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function seo_post_meta_box() {
	global $theme_name;
	$be_post_types = array( 'post', 'bulletin', 'picture', 'video', 'tao', 'show', 'other_custom_post_type' );
	foreach ( $be_post_types as $post_type ) {
		if (function_exists('add_meta_box')) {
			add_meta_box( 'seo_post_meta_box', 'SEO', 'seo_post_meta_boxes', $post_type, 'normal', 'high' );
		}
	}
}

function save_seo_post_postdata($post_id) {
	global $post, $seo_post_meta_boxes;
	foreach ($seo_post_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
if (zm_get_option('wp_title')) {

add_action('admin_menu', 'seo_post_meta_box');
add_action('save_post', 'save_seo_post_postdata');
}
// 文章添加到
$added_post_meta_boxes =
array(
	"cat_top"   => array(
		"name"  => "cat_top",
		"std"   => "",
		"title" => "分类推荐文章",
		"type"  => "checkbox"
	),

	"hot" => array(
		"name"  => "hot",
		"std"   => "",
		"title" => "本站推荐小工具中",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function added_post_meta_boxes() {
	global $post, $added_post_meta_boxes;

	foreach ($added_post_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function added_post_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('added_post_meta_box', '将文章添加到', 'added_post_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_added_post_postdata($post_id) {
	global $post, $added_post_meta_boxes;
	foreach ($added_post_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'added_post_meta_box');
add_action('save_post', 'save_added_post_postdata');

// 文章手动缩略图
$thumbnail_post_meta_boxes =
array(
	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "调用指定缩略图",
		"type"  => "upload"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function thumbnail_post_meta_boxes() {
	global $post, $thumbnail_post_meta_boxes;

	foreach ($thumbnail_post_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function thumbnail_post_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('thumbnail_post_meta_box', '手动缩略图', 'thumbnail_post_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_thumbnail_post_postdata($post_id) {
	global $post, $thumbnail_post_meta_boxes;
	foreach ($thumbnail_post_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'thumbnail_post_meta_box');
add_action('save_post', 'save_thumbnail_post_postdata');

// 标题幻灯
$header_show_meta_boxes =
array(
	"header_img" => array(
		"name"   => "header_img",
		"std"    => "",
		"title"  => "添加图片，一行一个不能有空行和空格，图片尺寸必须相同",
		"type"   => "textarea"
	),

	"header_img_wide" => array(
		"name"  => "header_img_wide",
		"std"   => "",
		"title" => "通栏显示",
		"type"  => "checkbox"
	),

	"no_show_title" => array(
		"name"  => "no_show_title",
		"std"   => "",
		"title" => "隐藏标题",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function header_show_meta_boxes() {
	global $post, $header_show_meta_boxes;

	foreach ($header_show_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" class="file-uploads" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><a href="javascript:;" class="show_file button">选择图片</a>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function header_show_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('header_show_meta_box', '标题幻灯', 'header_show_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_header_show_postdata($post_id) {
	global $post, $header_show_meta_boxes;
	foreach ($header_show_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'header_show_meta_box');
add_action('save_post', 'save_header_show_postdata');

// 文章标题图片
$header_bg_meta_boxes =
array(
	"header_img" => array(
		"name"   => "header_bg",
		"std"    => "",
		"title"  => "添加图片",
		"type"   => "text"
	),

	"header_img_wide" => array(
		"name"  => "header_bg_wide",
		"std"   => "",
		"title" => "通栏显示",
		"type"  => "checkbox"
	),

	"no_img_title" => array(
		"name"  => "no_img_title",
		"std"   => "",
		"title" => "隐藏标题",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function header_bg_meta_boxes() {
	global $post, $header_bg_meta_boxes;

	foreach ($header_bg_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function header_bg_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('header_bg_meta_box', '标题图片', 'header_bg_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_header_bg_postdata($post_id) {
	global $post, $header_bg_meta_boxes;
	foreach ($header_bg_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'header_bg_meta_box');
add_action('save_post', 'save_header_bg_postdata');

// 文章其它设置
$other_post_meta_boxes =
array(
	"no_sidebar" => array(
		"name"   => "no_sidebar",
		"std"    => "",
		"title"  => "隐藏侧边栏",
		"type"   => "checkbox"
	),

	"sidebar_l" => array(
		"name"  => "sidebar_l",
		"std"   => "",
		"title" => "侧边栏居左",
		"type"  => "checkbox"
	),

	"no_abstract" => array(
		"name"  => "no_abstract",
		"std"   => "",
		"title" => "隐藏摘要",
		"type"  => "checkbox"
	),

	"user_only" => array(
		"name"  => "user_only",
		"std"   => "",
		"title" => "登录查看",
		"type"  => "checkbox"
	),

	"not_more" => array(
		"name"  => "not_more",
		"std"   => "",
		"title" => "不显示展开全文",
		"type"  => "checkbox"
	),

	"no_toc" => array(
		"name"  => "no_toc",
		"std"   => "",
		"title" => "不显示目录",
		"type"  => "checkbox"),

	"allow_copy" => array(
		"name"  => "allow_copy",
		"std"   => "",
		"title" => "允许复制",
		"type"  => "checkbox"
	),

	"toc_four" => array(
		"name"  => "toc_four",
		"std"   => "",
		"title" => "仅四级目录",
		"type"  => "checkbox"
	),

	"sub_section" => array(
		"name"  => "sub_section",
		"std"   => "",
		"title" => "三、四级章节",
		"type"  => "checkbox"
	),

	"show_line" => array(
		"name"  => "show_line",
		"std"   => "",
		"title" => "时间轴不隐藏",
		"type"  => "checkbox"
	),

	"no_today" => array(
		"name"  => "no_today",
		"std"   => "",
		"title" => "不显示历史文章",
		"type"  => "checkbox"
	),

	"down_link_much" => array(
		"name"  => "down_link_much",
		"std"   => "",
		"title" => "多栏下载按钮",
		"type"  =>"checkbox"),

	"go_direct" => array(
		"name"  => "go_direct",
		"std"   => "",
		"title" => "文章标题直达链接（用于“链接”文章形式）",
		"type"  => "checkbox"
	),

	"mark" => array(
		"name"  => "mark",
		"std"   => "",
		"title" => "标题后缀说明",
		"type"  => "text"
	),

	"direct" => array(
		"name"  => "direct",
		"std"   => "",
		"title" => "直达链接地址",
		"type"  => "text"
	),

	"direct_btn" => array(
		"name"  => "direct_btn",
		"std"   => "",
		"title" => "直达链接按钮名称",
		"type"  => "text"
	),

	"link_inf" => array(
		"name"  => "link_inf",
		"std"   => "",
		"title" => "自定义文章信息（用于“链接”文章形式）",
		"type"  => "text"
	),

	"down_doc" => array(
		"name"  => "down_doc",
		"std"   => "",
		"title" => "固定下载按钮链接",
		"type"  => "text"
	),

	"doc_name" => array(
		"name"  => "doc_name",
		"std"   => "",
		"title" => "固定下载按钮名称",
		"type"  => "text"
	),

	"button1" => array(
		"name"  => "button1",
		"std"   => "",
		"title" => "弹窗按钮名称",
		"type"  => "text"
	),

	"url1" => array(
		"name"  => "url1",
		"std"   => "",
		"title" => "弹窗下载链接",
		"type"  => "text"
	),

	"from" => array(
		"name"  => "from",
		"std"   => "",
		"title" => "文章来源",
		"type"  => "text"
	),

	"copyright" => array(
		"name"  => "copyright",
		"std"   => "",
		"title" => "原文链接",
		"type"  => "text"
	),

	"slider_gallery_n" => array(
		"name"  => "slider_gallery_n",
		"std"   => "",
		"title" => "幻灯短代码每页显示图片数",
		"type"  => "text"
	),

	"fancy_box" => array(
		"name"  => "fancy_box",
		"std"   => "",
		"title" => "添加图片，用于点击缩略图查看原图",
		"type"  => "upload"
	),

	"poster_img" => array(
		"name"  => "poster_img",
		"std"   => "",
		"title" => "自定义海报图片",
		"type"  => "upload"
	),

	"be_img_fill" => array(
		"name"  => "be_img_fill",
		"std"   => "",
		"title" => "图片背景",
		"type"  => "checkbox"
	),

	"bg_img_help"  => array(
		"name"  => "bg_img_help",
		"std"   => "用于图片布局中，以图片替换背景色",
		"title" => "",
		"type"  => "help"
	),

	"be_bg_img" => array(
		"name"  => "be_bg_img",
		"std"   => "",
		"title" => "自定义背景图片",
		"type"  => "upload"
	),


	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function other_post_meta_boxes() {
	global $post, $other_post_meta_boxes;

	foreach ($other_post_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
			case 'help':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field">' . $meta_box['std'] . '</span><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function other_post_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('other_post-meta-boxes', '其它设置', 'other_post_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_other_post_postdata($post_id) {
	global $post, $other_post_meta_boxes;
	foreach ($other_post_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'other_post_meta_box');
add_action('save_post', 'save_other_post_postdata');

// 页面SEO
$seo_page_meta_boxes =
array(
	"custom_title" => array(
		"name"  => "custom_title",
		"std"   => "",
		"title" => "SEO自定义页面标题",
		"type"  => "text"
	),

	"description" => array(
		"name"  => "description",
		"std"   => "",
		"title" => "页面描述",
		"type"  => "textarea"
	),

	"keywords"  => array(
		"name"  => "keywords",
		"std"   => "",
		"title" => "页面关键词，多个关键词用半角逗号隔开",
		"type"  => "text"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function seo_page_meta_boxes() {
	global $post, $seo_page_meta_boxes;

	foreach ($seo_page_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function seo_page_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('seo_post_meta_box', 'SEO设置', 'seo_page_meta_boxes', 'page', 'normal', 'high');
	}
}

function save_seo_page_postdata($post_id) {
	global $post, $seo_page_meta_boxes;
	foreach ($seo_page_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'seo_page_meta_box');
add_action('save_post', 'save_seo_page_postdata');

// 页面相关自定义栏目
$new_meta_page_boxes =
array(
	"no_sidebar" => array(
		"name"  => "no_sidebar",
		"std"   => "",
		"title" => "隐藏侧边栏",
		"type"  => "checkbox"
	),

	"down_link_much" => array(
		"name"  => "down_link_much",
		"std"   => "",
		"title" => "多栏下载按钮",
		"type"  => "checkbox"
	),

	"sidebar_l" => array(
		"name"  => "sidebar_l",
		"std"   => "",
		"title" => "侧边栏居左",
		"type"  => "checkbox"
	),

	"no_toc" => array(
		"name"  => "no_toc",
		"std"   => "",
		"title" => "不显示目录",
		"type"  => "checkbox"
	),

	"toc_four" => array(
		"name"  => "toc_four",
		"std"   => "",
		"title" => "仅四级目录",
		"type"  => "checkbox"
	),

	"sub_section" => array(
		"name"  => "sub_section",
		"std"   => "",
		"title" => "三、四级章节",
		"type"  => "checkbox"
	),

	"show_line" => array(
		"name"  => "show_line",
		"std"   => "",
		"title" => "时间轴不隐藏",
		"type"  => "checkbox"
	),

	"group_strong" => array(
		"name"  => "group_strong",
		"std"   => "",
		"title" => "添加到公司首页咨询模块",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);


function new_meta_page_boxes() {
	global $post, $new_meta_page_boxes;

	foreach ($new_meta_page_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function create_meta_page_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '页面设置', 'new_meta_page_boxes', 'page', 'normal', 'high');
	}
}
function save_page_postdata($post_id) {
	global $post, $new_meta_page_boxes;
	foreach ($new_meta_page_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_page_box');
add_action('save_post', 'save_page_postdata');

// 专题
$special_page_meta_boxes =
array(
	"special" => array(
		"name"  => "special",
		"std"   => "",
		"title" => "与该专题关联的标签名称/别名",
		"type"  => "text"
	),

	"special_img" => array(
		"name"  => "special_img",
		"std"   => "",
		"title" => "图片布局",
		"type"  => "checkbox"
	),

	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "专题封面图片",
		"type"  => "upload"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);


function special_page_meta_boxes() {
	global $post, $special_page_meta_boxes;

	foreach ($special_page_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '（功能已弃用）</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function special_page_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('special_page_meta_box', '专题模板设置', 'special_page_meta_boxes', 'page', 'normal', 'high');
	}
}

function save_special_page_postdata($post_id) {
	global $post, $special_page_meta_boxes;
	foreach ($special_page_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'special_page_meta_box');
add_action('save_post', 'save_special_page_postdata');

// 标题幻灯
$header_show_page_meta_boxes =
array(
	"header_img" => array(
		"name"  => "header_img",
		"std"   => "",
		"title" => "添加图片，一行一个不能有多余的回行和空格，图片尺寸必须相同",
		"type"  => "textarea"
	),

	"header_img_wide" => array(
		"name"  => "header_img_wide",
		"std"   => "",
		"title" => "通栏显示",
		"type"  => "checkbox"
	),

	"no_show_title" => array(
		"name"  => "no_show_title",
		"std"   => "",
		"title" => "隐藏标题",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);


function header_show_page_meta_boxes() {
	global $post, $header_show_page_meta_boxes;

	foreach ($header_show_page_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" class="file-uploads" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><a href="javascript:;" class="begin_file button">选择图片</a>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function header_show_page_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('header_show_page_meta_box', '标题幻灯', 'header_show_page_meta_boxes', 'page', 'normal', 'high');
	}
}

function save_header_show_page_postdata($post_id) {
	global $post, $header_show_page_meta_boxes;
	foreach ($header_show_page_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'header_show_page_meta_box');
add_action('save_post', 'save_header_show_page_postdata');

// 页面标题图片
$header_bg_page_meta_boxes =
array(
	"header_img" => array(
		"name"  => "header_bg",
		"std"   => "",
		"title" => "添加图片",
		"type"  => "upload"
	),

	"header_img_wide" => array(
		"name"  => "header_bg_wide",
		"std"   => "",
		"title" => "通栏显示",
		"type"  => "checkbox"
	),

	"no_img_title" => array(
		"name"  => "no_img_title",
		"std"   => "",
		"title" => "隐藏标题",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function header_bg_page_meta_boxes() {
	global $post, $header_bg_page_meta_boxes;

	foreach ($header_bg_page_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function header_bg_page_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('header_bg_page_meta_box', '标题图片', 'header_bg_page_meta_boxes', 'page', 'normal', 'high');
	}
}

function save_header_bg_pagedata($post_id) {
	global $post, $header_bg_page_meta_boxes;
	foreach ($header_bg_page_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'header_bg_page_meta_box');
add_action('save_post', 'save_header_bg_pagedata');

// 产品页面
$cp_page_meta_boxes =
array(
	"cp_cat_id" => array(
		"name"  => "cp_cat_id",
		"std"   => "",
		"title" => "输入分类ID",
		"type"  =>"text"
	),

	"cp_number" => array(
		"name"  => "cp_number",
		"std"   => "",
		"title" => "数量",
		"type"  => "text"
	),

	"cp_style"  => array(
		"name"  => "cp_style",
		"std"   => "",
		"title" => "样式布局",
		"type"  => "text"
	),

	"cp_style_t" => array(
		"name"   => "cp_style_t",
		"after"  => "图片样式：留空&nbsp;&nbsp;&nbsp;&nbsp;卡片样式输入：grid&nbsp;&nbsp;&nbsp;&nbsp;正常样式输入：default",
		"type"   => "be_after"
	),

	"cp_column" => array(
		"name"  => "cp_column",
		"std"   => "",
		"title" => "分栏",
		"type"  => "text"
	),

	"cp_column_t" => array(
		"name"    => "cp_column_t",
		"after"   => "图片样式：4/5/6&nbsp;&nbsp;&nbsp;&nbsp;卡片样式：2/3/4",
		"type"    => "be_before"
	),

	"cp_sidebar_r" => array(
		"name"     => "cp_sidebar_r",
		"std"      => "",
		"title"    => "侧边栏居右",
		"type"     => "checkbox"
	),

	"cp_more"    => array(
		"name"   => "cp_more",
		"std"    => "",
		"title"  => "更多按钮",
		"type"   => "checkbox"
	),

	"cp_infinite" => array(
		"name"    => "cp_infinite",
		"std"     => "",
		"title"   => "滚动加载",
		"type"    => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);


function cp_page_meta_boxes() {
	global $post, $cp_page_meta_boxes;

	foreach ($cp_page_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'be_after':
				echo '<span class="form-be-after">' . $meta_box['after'] . '</span>';
			break;
			case 'be_before':
				echo '<span class="form-be-before">' . $meta_box['after'] . '</span>';
			break;
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function cp_page_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('cp_page_meta_box', '产品展示模板设置', 'cp_page_meta_boxes', 'page', 'normal', 'high');
	}
}

function save_cp_page_postdata($post_id) {
	global $post, $cp_page_meta_boxes;
	foreach ($cp_page_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'cp_page_meta_box');
add_action('save_post', 'save_cp_page_postdata');

// 图片日志
$new_meta_picture_boxes =
array(
	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "添加图片地址，调用指定缩略图，图片尺寸要求与主题选项中对应的缩略图大小相同",
		"type"  => "upload"
	),

	"fancy_box" => array(
		"name"  => "fancy_box",
		"std"   => "",
		"title" => "添加图片，用于点击缩略图查看原图",
		"type"  => "upload"
	),

	"poster_img" => array(
		"name"  => "poster_img",
		"std"   => "",
		"title" => "自定义海报图片",
		"type"  => "upload"
	),

	"slider_gallery_n" => array(
		"name"  => "slider_gallery_n",
		"std"   => "",
		"title" => "相册每页显示图片数",
		"type"  => "text"
	),

	"no_sidebar" => array(
		"name"  => "no_sidebar",
		"std"   => "",
		"title" => "隐藏侧边栏",
		"type"  => "checkbox"
	),

	"down_link_much" => array(
		"name"  => "down_link_much",
		"std"   => "",
		"title" => "多栏下载按钮",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function new_meta_picture_boxes() {
	global $post, $new_meta_picture_boxes;

	foreach ($new_meta_picture_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_meta_picture_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '图片设置', 'new_meta_picture_boxes', 'picture', 'normal', 'high');
	}
}
function save_picture_postdata($post_id) {
	global $post, $new_meta_picture_boxes;
	foreach ($new_meta_picture_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_picture_box');
add_action('save_post', 'save_picture_postdata');

// 视频日志
$new_meta_video_boxes =
array(
	"small" => array(
		"name"  => "small",
		"std"   => "",
		"title" => "添加图片地址，调用指定缩略图，图片尺寸要求与主题选项中缩略图大小相同",
		"type"  => "upload"
	),

	"poster_img" => array(
		"name"  => "poster_img",
		"std"   => "",
		"title" => "自定义海报图片",
		"type"  => "upload"
	),

	"slider_gallery_n" => array(
		"name"  => "slider_gallery_n",
		"std"   => "",
		"title" => "相册每页显示图片数",
		"type"  => "text"
	),

	"no_sidebar" => array(
		"name"  => "no_sidebar",
		"std"   => "",
		"title" => "隐藏侧边栏",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),

);

// 面板内容
function new_meta_video_boxes() {
	global $post, $new_meta_video_boxes;

	foreach ($new_meta_video_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_meta_video_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '视频设置', 'new_meta_video_boxes', 'video', 'normal', 'high');
	}
}
function save_video_postdata($post_id) {
	global $post, $new_meta_video_boxes;
	foreach ($new_meta_video_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_video_box');
add_action('save_post', 'save_video_postdata');

// 淘客
$new_meta_tao_boxes =
array(
	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "添加图片地址，调用指定缩略图，图片尺寸要求与主题选项中对应的缩略图大小相同",
		"type"  => "upload"
	),

	"fancy_box" => array(
		"name"  => "fancy_box",
		"std"   => "",
		"title" => "添加图片，用于点击缩略图查看原图",
		"type"  => "upload"
	),

	"poster_img" => array(
		"name"  => "poster_img",
		"std"   => "",
		"title" => "自定义海报图片",
		"type"  => "upload"
	),

	"product" => array(
		"name"  => "product",
		"std"   => "",
		"title" => "商品描述",
		"type"  => "textarea"
	),

	"pricex" => array(
		"name"  => "pricex",
		"std"   => "",
		"title" => "商品现价",
		"type"  => "text"
	),

	"pricey" => array(
		"name"  => "pricey",
		"std"   => "",
		"title" => "商品原价（可选）",
		"type"  => "text"
	),

	"taourl" => array(
		"name"  => "taourl",
		"std"   => "",
		"title" => "商品购买链接",
		"type"  => "text"
	),

	"m_taourl" => array(
		"name"  => "m_taourl",
		"std"   => "",
		"title" => "商品购买链接移动端（可选）",
		"type"  => "text"
	),

	"taourl_t" => array(
		"name"  => "taourl_t",
		"std"   => "",
		"title" => "购买链接文字（可选）",
		"type"  => "text"
	),

	"vip_url" => array(
		"name"  => "vip_url",
		"std"   => "",
		"title" => "升级VIP链接",
		"type"  => "text"
	),

	"vip_login_text" => array(
		"name"  => "vip_login_text",
		"std"   => "",
		"title" => "会员免费文字",
		"type"  => "text"
	),

	"vip_text" => array(
		"name"  => "vip_text",
		"std"   => "",
		"title" => "立即升级文字",
		"type"  => "text"
	),

	"spare_t" => array(
		"name"  => "spare_t",
		"std"   => "",
		"title" => "备用文字（可选）",
		"type"  => "text"
	),

	"tao_img_t" => array(
		"name"  => "tao_img_t",
		"std"   => "",
		"title" => "缩略图文字（可选）",
		"type"  => "text"
	),

	"discount" => array(
		"name"  => "discount",
		"std"   => "",
		"title" => "添加优惠卷（可选）",
		"type"  => "text"
	),

	"discounturl" => array(
		"name"  => "discounturl",
		"std"   => "",
		"title" => "优惠卷链接（可选）",
		"type"  => "text"
	),

	"slider_gallery_n" => array(
		"name"  => "slider_gallery_n",
		"std"   => "",
		"title" => "相册每页显示图片数",
		"type"  => "text"
	),

	"no_sidebar" => array(
		"name"  => "no_sidebar",
		"std"   => "",
		"title" => "隐藏侧边栏",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function new_meta_tao_boxes() {
	global $post, $new_meta_tao_boxes;

	foreach ($new_meta_tao_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_meta_tao_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '商品设置', 'new_meta_tao_boxes', 'tao', 'normal', 'high');
	}
}
function save_tao_postdata($post_id) {
	global $post, $new_meta_tao_boxes;
	foreach ($new_meta_tao_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_tao_box');
add_action('save_post', 'save_tao_postdata');

// 网址
$new_meta_sites_boxes =
array(
	"sites_link" => array(
		"name"  => "sites_link",
		"std"   => "",
		"title" => "输入网址链接，发表后点更新，可自动获取网站描述",
		"type"  => "text"
	),

	"sites_url" => array(
		"name"  => "sites_url",
		"std"   => "",
		"title" => "输入网址链接，适合无法获取描述的网站",
		"type"  => "text"
	),

	"sites_des" => array(
		"name"  => "sites_des",
		"std"   => "",
		"title" => "自定义网站描述",
		"type"  => "textarea"
	),

	"keywords" => array(
		"name"  => "keywords",
		"std"   => "",
		"title" => "自定义关键词，留空则自动将文章标题做为关键词",
		"type"  => "text"
	),

	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "网站截图",
		"type"  => "upload"
	),

	"sites_ico" => array(
		"name"  => "sites_ico",
		"std"   => "",
		"title" => "自定义图标",
		"type"  => "upload"
	),

	"order" => array(
		"name"  => "sites_order",
		"std"   => "0",
		"title" => "网址排序数值越大越靠前",
		"type"  => "text"
	),

	"no_sidebar" => array(
		"name"  => "no_sidebar",
		"std"   => "",
		"title" => "隐藏侧边栏",
		"type"  => "checkbox"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function new_meta_sites_boxes() {
	global $post, $new_meta_sites_boxes;

	foreach ($new_meta_sites_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_meta_sites_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '添加链接', 'new_meta_sites_boxes', 'sites', 'normal', 'high');
	}
}
function save_sites_postdata($post_id) {
	global $post, $new_meta_sites_boxes;
	foreach ($new_meta_sites_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_sites_box');
add_action('save_post', 'save_sites_postdata');

// 下载链接（文章）
$down_post_meta_boxes =
array(
	"down_start" => array(
		"name"  => "down_start",
		"std"   => "",
		"title" => "启用下载",
		"type"  => "checkbox"
	),

	"down_name" => array(
		"name"  => "down_name",
		"std"   => "",
		"title" => "资源名称",
		"type"  => "be_text"
	),

	"be_down_name" => array(
		"name"  => "be_down_name",
		"std"   => "",
		"title" => "预设名称",
		"type"  => "be_checkbox"
	),

	"file_os" => array(
		"name"  => "file_os",
		"std"   => "",
		"title" => "应用平台",
		"type"  => "be_text"
	),

	"be_file_os" => array(
		"name"  => "be_file_os",
		"std"   => "",
		"title" => "预设名称",
		"type"  => "be_checkbox"
	),

	"file_inf"  => array(
		"name"  => "file_inf",
		"std"   => "",
		"title" => "资源版本",
		"type"  => "be_text"
	),

	"be_file_inf" => array(
		"name"  => "be_file_inf",
		"std"   => "",
		"title" => "预设名称",
		"type"  => "be_checkbox"
	),

	"down_size" => array(
		"name"  => "down_size",
		"std"   => "",
		"title" => "资源大小",
		"type"  => "be_text"
	),

	"be_down_size" => array(
		"name"  => "be_down_size",
		"std"   => "",
		"title" => "预设名称",
		"type"  => "be_checkbox"
	),

	"links_id"  => array(
		"name"  => "links_id",
		"std"   => "",
		"title" => "下载次数（输入短链接 ID）",
		"type"  => "text"
	),

	"password_down" => array(
		"name"  => "password_down",
		"std"   => "",
		"title" => "启用下载链接回复/登录可见",
		"type"  => "checkbox"
	),

	"down_demo" => array(
		"name"  => "down_demo",
		"std"   => "",
		"title" => "演示链接",
		"type"  => "text"
	),

	"baidu_pan" => array(
		"name"  => "baidu_pan",
		"std"   => "",
		"title" => "网盘下载链接",
		"type"  => "text"
	),

	"baidu_pan" => array(
		"name"  => "baidu_pan",
		"std"   => "",
		"title" => "网盘下载链接",
		"type"  => "text"
	),

	"baidu_pan_btn" => array(
		"name"  => "baidu_pan_btn",
		"std"   => "",
		"title" => "网盘按钮名称",
		"type"  => "text"
	),

	"baidu_password" => array(
		"name"  => "baidu_password",
		"std"   => "",
		"title" => "网盘密码",
		"type"  => "text"
	),

	"r_baidu_password" => array(
		"name"  => "r_baidu_password",
		"std"   => "",
		"title" => "网盘密码 ( 回复或登录可见 )",
		"type"  => "text"
	),

	"vip_purview" => array(
		"name"  => "vip_purview",
		"std"   => "",
		"title" => "会员可见网盘密码",
		"type"  => "text"
	),

	"down_local" => array(
		"name"  => "down_local",
		"std"   => "",
		"title" => "本站下载链接",
		"type"  => "text"
	),

	"down_local_btn" => array(
		"name"  => "down_local_btn",
		"std"   => "",
		"title" => "本站下载按钮名称",
		"type"  => "text"
	),

	"wechat_follow" => array(
		"name"  => "wechat_follow",
		"std"   => "",
		"title" => "输入公众号自动回复“关键字”获取解压密码",
		"type"  => "text"
	),

	"rar_password" => array(
		"name"  => "rar_password",
		"std"   => "",
		"title" => "解压密码",
		"type"  => "text"
	),

	"r_rar_password" => array(
		"name"  => "r_rar_password",
		"std"   => "",
		"title" => "解压密码 ( 回复或登录可见 )",
		"type"  => "text"
	),

	"down_official" => array(
		"name"  => "down_official",
		"std"   => "",
		"title" => "官网下载链接",
		"type"  => "text"
	),

	"down_official_btn" => array(
		"name"  => "down_official_btn",
		"std"   => "",
		"title" => "官网下载按钮名称",
		"type"  => "text"
	),

	"down_img"  => array(
		"name"  => "down_img",
		"std"   => "",
		"title" => "输入演示图地址",
		"type"  => "upload"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

function down_post_meta_boxes() {
	global $post, $down_post_meta_boxes;
	foreach ($down_post_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")
		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'be_text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span>';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field file-uploads"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
			break;
			case 'be_checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label class="be-label"><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label>';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}

function down_post_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('down_post_meta_box', '下载信息', 'down_post_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_down_post_postdata($post_id) {
	global $post, $down_post_meta_boxes;
	foreach ($down_post_meta_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}

add_action('admin_menu', 'down_post_meta_box');
add_action('save_post', 'save_down_post_postdata');

// 产品
$new_meta_show_boxes =
array(
	"slider_gallery_n" => array(
		"name"  => "slider_gallery_n",
		"std"   => "",
		"title" => "相册每页显示图片数",
		"type"  => "text"
	),

	"down_link_much" => array(
		"name"  => "down_link_much",
		"std"   => "",
		"title" => "多栏按钮",
		"type"  => "checkbox"
		),

	"thumbnail" => array(
		"name"  => "thumbnail",
		"std"   => "",
		"title" => "调用指定缩略图",
		"type"  => "upload"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

// 面板内容
function new_meta_show_boxes() {
	global $post, $new_meta_show_boxes;

	foreach ($new_meta_show_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><label><input type="checkbox" class="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '' . $meta_box['title'] . '</label><br />';
				break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_meta_show_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', '产品设置', 'new_meta_show_boxes', 'show', 'normal', 'high');
	}
}
function save_show_postdata($post_id) {
	global $post, $new_meta_show_boxes;
	foreach ($new_meta_show_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = isset($_POST[$meta_box['name'] . '']) ? $_POST[$meta_box['name'] . ''] : null;
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_meta_show_box');
add_action('save_post', 'save_show_postdata');

// 产品幻灯
$new_meta_show_h_a_boxes =
array(
	"s_a_img_d" => array(
		"name"  => "s_a_img_d",
		"std"   => "",
		"title" => "大背景图地址",
		"type"  => "upload"
	),

	"s_a_img_x" => array(
		"name"  => "s_a_img_x",
		"std"   => "",
		"title" => "浮动层小图地址",
		"type"  => "upload"
	),

	"s_a_t_a"   => array(
		"name"  => "s_a_t_a",
		"std"   => "",
		"title" => "第一行文字",
		"type"  => "text"
	),

	"s_a_t_b"   => array(
		"name"  => "s_a_t_b",
		"std"   => "",
		"title" => "第二行文字（大字）",
		"type"  => "text"
	),

	"s_a_t_c"   => array(
		"name"  => "s_a_t_c",
		"std"   => "",
		"title" => "第三行文字",
		"type"  => "text"),

	"s_a_n_b"   => array(
		"name"  => "s_a_n_b",
		"std"   => "",
		"title" => "按钮名称",
		"type"  => "text"
	),

	"s_a_n_b_l" => array(
		"name"  => "s_a_n_b_l",
		"std"   => "",
		"title" => "按钮链接",
		"type"  => "text"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

// 面板内容
function new_meta_show_h_a_boxes() {
	global $post, $new_meta_show_h_a_boxes;

	foreach ($new_meta_show_h_a_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'upload':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /><a href="javascript:;" class="begin_file button">选择图片</a></span>';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_show_h_a_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('create_show_h_a_meta_box', '产品头部图片设置', 'new_meta_show_h_a_boxes', 'show', 'normal', 'high');
	}
}
function save_show_h_a_postdata($post_id) {
	global $post, $new_meta_show_h_a_boxes;
	foreach ($new_meta_show_h_a_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = $_POST[$meta_box['name'] . ''];
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_show_h_a_meta_box');
add_action('save_post', 'save_show_h_a_postdata');

// 标题及其它
$new_meta_show_q_boxes =
array(
	"s_j_t"     => array(
		"name"  => "s_j_t",
		"std"   => "",
		"title" => "简介标题",
		"type"  => "text"
	),

	"s_j_e"     => array(
		"name"  => "s_j_e",
		"std"   => "",
		"title" => "简介描述",
		"type"  => "text"
	),

	"s_c_t"     => array(
		"name"  => "s_c_t",
		"std"   => "正文标题",
		"title" => "正文标题",
		"type"  => "text"
	),

	"s_f_t"     => array(
		"name"  => "s_f_t",
		"std"   => "附加模块标题",
		"title" => "附加模块标题",
		"type"  => "text"
	),

	"s_f_e"     => array(
		"name"  => "s_f_e",
		"std"   => "",
		"title" => "附加模块内容",
		"type"  => "textarea"
	),

	"s_f_n_a"   => array(
		"name"  => "s_f_n_a",
		"std"   => "<i class='be be-stack'></i> 详细查看",
		"title" => "附加模块按钮A文字",
		"type"  => "text"
	),

	"s_f_n_a_l" => array(
		"name"  => "s_f_n_a_l",
		"std"   => "",
		"title" => "附加模块按钮A链接",
		"type"  => "text"
	),

	"s_f_n_b"   => array(
		"name"  => "s_f_n_b",
		"std"   => "<i class='be be-phone'></i> 联系方式",
		"title" => "附加模块按钮b文字",
		"type"  => "text"
	),

	"s_f_n_b_l" => array(
		"name"  => "s_f_n_b_l",
		"std"   => "",
		"title" => "附加模块按钮B链接",
		"type"  => "text"
	),

	"empty"     => array(
		"name"  => "empty",
		"type"  => "empty"
	),
);

// 面板内容
function new_meta_show_q_boxes() {
	global $post, $new_meta_show_q_boxes;

	foreach ($new_meta_show_q_boxes as $meta_box) {
		$meta_box_value = get_post_meta(get_the_ID(), $meta_box['name'] . '', true);
		if ($meta_box_value != "")

		$meta_box['std'] = $meta_box_value;
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

		switch ($meta_box['type']) {
			case 'title':
				echo '<h4>' . $meta_box['title'] . '</h4>';
			break;
			case 'text':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<span class="form-field"><input type="text" size="40" name="' . $meta_box['name'] . '" value="' . $meta_box['std'] . '" /></span><br />';
			break;
			case 'textarea':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				echo '<textarea id="seo-excerpt" cols="40" rows="2" name="' . $meta_box['name'] . '">' . $meta_box['std'] . '</textarea><br />';
			break;
			case 'radio':
				echo '<h4>' . $meta_box['title'] . '</h4>';
				$counter = 1;
				foreach ($meta_box['buttons'] as $radiobutton) {
					$checked = "";
					if (isset($meta_box['std']) && $meta_box['std'] == $counter) {
						$checked = 'checked = "checked"';
					}
					echo '<input ' . $checked . ' type="radio" class="kcheck" value="' . $counter . '" name="' . $meta_box['name'] . '_value"/>' . $radiobutton;
					$counter++;
				}
			break;
			case 'checkbox':
				if (isset($meta_box['std']) && $meta_box['std'] == 'true') $checked = 'checked = "checked"';
				else $checked = '';
				echo '<br /><input type="checkbox" name="' . $meta_box['name'] . '" value="true"  ' . $checked . ' />';
				echo '<label>' . $meta_box['title'] . '</label><br />';
			break;
			case 'empty':
				echo '<p></p>';
			break;
		}
	}
}
function create_show_q_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('create_show_q_meta_box', '标题及其它', 'new_meta_show_q_boxes', 'show', 'normal', 'high');
	}
}
function save_show_q_postdata($post_id) {
	global $post, $new_meta_show_q_boxes;
	foreach ($new_meta_show_q_boxes as $meta_box) {
		if ( !isset($_POST[$meta_box['name'] . '_noncename']) || !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}
		$data = $_POST[$meta_box['name'] . ''];
		if (get_post_meta($post_id, $meta_box['name'] . '') == "") add_post_meta($post_id, $meta_box['name'] . '', $data, true);
		elseif ($data != get_post_meta($post_id, $meta_box['name'] . '', true)) update_post_meta($post_id, $meta_box['name'] . '', $data);
		elseif ($data == "") delete_post_meta($post_id, $meta_box['name'] . '', get_post_meta($post_id, $meta_box['name'] . '', true));
	}
}
add_action('admin_menu', 'create_show_q_meta_box');
add_action('save_post', 'save_show_q_postdata');

function upload_js() { ?>
<script>
jQuery(document).ready(function($) {
	$('body').on('click', '.begin_file',
	function(e) {
		e.preventDefault();
		var buon = $(this),
		custom_uploader = wp.media({
			title: '添加图片',
			library: {
				type: 'image'
			},
			button: {
				text: '选择'
			},

			multiple: false // 选择多个 true
		}).on('select',
		function() {
			var id = buon.prev();
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$(id).val(attachment.url);
		}).open();
	});


	var $ = jQuery;
	if (typeof wp !== 'undefined' && wp.media && wp.media.editor) {
		$(document).on('click', '.show_file',
		function(e) {
			e.preventDefault();
			var button = $(this);
			var id = button.prev();
			wp.media.editor.send.attachment = function(props, attachment) {
				if ($.trim(id.val()) != '') {
					id.val(id.val() + '\n' + attachment.url);
				} else {
					id.val(attachment.url);
				}
			};
			wp.media.editor.open(button);
			return false;
		});
	}
});
</script>
<?php };
add_action('admin_head', 'upload_js');