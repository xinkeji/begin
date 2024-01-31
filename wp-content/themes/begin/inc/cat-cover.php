<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'admin_init', 'cat_cover_init' );
function cat_cover_init() {
	$cat_taxonomies = get_taxonomies();
	if ( is_array( $cat_taxonomies ) ) {
		foreach ( $cat_taxonomies as $cat_taxonomy ) {
			add_action( $cat_taxonomy.'_add_form_fields', 'cat_add_texonomy_field' );
			add_action( $cat_taxonomy.'_edit_form_fields', 'cat_edit_texonomy_field' );
			add_filter( 'manage_edit-' . $cat_taxonomy . '_columns', 'cat_taxonomy_columns' );
			add_filter( 'manage_' . $cat_taxonomy . '_custom_column', 'cat_taxonomy_column', 10, 3 );
		}
	}
}

function cat_cover_add_style() {
	echo '<style type="text/css" media="screen">
		th.column-thumb_cover {width:60px;}
		.form-field img.taxonomy-cover {max-width:100px;max-height:40px;border-radius: 5px;}
		.inline-edit-row fieldset .thumb_cover label span.title, .column-thumb_cover span {width:40px;height:40px;display:inline-block;overflow: hidden;border-radius: 50%;}
		.inline-edit-row fieldset .thumb_cover img,.column-thumb_cover img {width: auto;height: 40px;}
	</style>';
}

function cat_add_texonomy_field() {
	if ( get_bloginfo( 'version' ) >= 3.5)
		wp_enqueue_media();
	else {
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
	}

	echo '<div class="form-field">
		<label for="taxonomy_cover">封面</label>
		<input type="text" name="taxonomy_cover" id="taxonomy_cover" value="" />
		<br/>
		<button class="cat_upload_cover_button be-cat-but button">添加封面</button><br /><br />
	</div>'.cat_script();
}

function cat_edit_texonomy_field( $taxonomy ) {
	if ( get_bloginfo('version') >= 3.5 )
		wp_enqueue_media();
	else {
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
	}

	if ( cat_cover_url( $taxonomy->term_id, NULL, TRUE ) == ZM_IMAGE_PLACEHOLDER ) 
		$cover_url = "";
	else
		$cover_url = cat_cover_url( $taxonomy->term_id, NULL, TRUE );
	echo '<tr class="form-field">
		<th scope="row" valign="top"><label for="taxonomy_cover">封面</label></th>
		<td><img class="taxonomy-cover" src="' . cat_cover_url( $taxonomy->term_id, 'medium', TRUE ) . '"/><br/><input type="text" name="taxonomy_cover" id="taxonomy_cover" value="' . $cover_url . '" /><br />
		<button class="cat_upload_cover_button be-cat-but button">添加封面</button>
		<button class="cat_remove_cover_button be-cat-but button">删除封面</button>
		</td>
	</tr>'.cat_script();
}

function cat_script() {
	return '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var wordpress_ver = "' . get_bloginfo( "version" ) . '", upload_button;
			$(".cat_upload_cover_button").click(function(event) {
				upload_button = $(this);
				var frame;
				if (wordpress_ver >= "3.5") {
					event.preventDefault();
					if (frame) {
						frame.open();
						return;
					}
					frame = wp.media();
					frame.on( "select", function() {
						// Grab the selected attachment.
						var attachment = frame.state().get("selection").first();
						frame.close();
						if (upload_button.parent().prev().children().hasClass("tax_list")) {
							upload_button.parent().prev().children().val(attachment.attributes.url);
							upload_button.parent().prev().prev().children().attr("src", attachment.attributes.url);
						}
						else
							$("#taxonomy_cover").val(attachment.attributes.url);
					});
					frame.open();
				}
				else {
					tb_show("", "media-upload.php?type=cover&amp;TB_iframe=true");
					return false;
				}
			});
			
			$(".cat_remove_cover_button").click(function() {
				$(".taxonomy-cover").attr("src", "' . ZM_IMAGE_PLACEHOLDER . '");
				$("#taxonomy_cover").val("");
				$(this).parent().siblings(".title").children("img").attr("src","' . ZM_IMAGE_PLACEHOLDER . '");
				$(".inline-edit-col :input[name=\'taxonomy_cover\']").val("");
				return false;
			});
			
			if (wordpress_ver < "3.5") {
				window.send_to_editor = function(html) {
					imgurl = $("img",html).attr("src");
					if (upload_button.parent().prev().children().hasClass("tax_list")) {
						upload_button.parent().prev().children().val(imgurl);
						upload_button.parent().prev().prev().children().attr("src", imgurl);
					}
					else
						$("#taxonomy_cover").val(imgurl);
					tb_remove();
				}
			}
			
			$(".editinline").click(function() {	
			    var tax_id = $(this).parents("tr").attr("id").substr(4);
			    var thumb_cover = $("#tag-"+tax_id+" .thumb_cover img").attr("src");

				if (thumb_cover != "' . ZM_IMAGE_PLACEHOLDER . '") {
					$(".inline-edit-col :input[name=\'taxonomy_cover\']").val(thumb_cover);
				} else {
					$(".inline-edit-col :input[name=\'taxonomy_cover\']").val("");
				}
				
				$(".inline-edit-col .title img").attr("src",thumb_cover);
			});
	    });
	</script>';
}

add_action( 'edit_term','cat_save_taxonomy_cover' );
add_action( 'create_term','cat_save_taxonomy_cover' );
function cat_save_taxonomy_cover( $term_id ) {
	if ( isset( $_POST['taxonomy_cover'] ) )
		update_option( 'cat_taxonomy_cover' . $term_id, $_POST['taxonomy_cover'], NULL );
}

function cat_get_attachment_id_by_url( $cover_src ) {
	global $wpdb;
	$query = $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid = %s", $cover_src );
	$id = $wpdb->get_var( $query );
	return ( !empty($id ) ) ? $id : NULL;
}

function cat_cover_url( $term_id = NULL, $size = 'full', $return_placeholder = FALSE ) {
	if ( ! $term_id ) {
		if ( is_category() )
			$term_id = get_query_var( 'cat' );
		elseif (is_tag())
			$term_id = get_query_var( 'tag_id' );
		elseif ( is_tax() ) {
			$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$term_id = $current_term->term_id;
		}
	}

	$taxonomy_cover_url = get_option( 'cat_taxonomy_cover'.$term_id );
	if ( !empty( $taxonomy_cover_url ) ) {
		$attachment_id = cat_get_attachment_id_by_url( $taxonomy_cover_url );
		if ( !empty( $attachment_id ) ) {
			$taxonomy_cover_url = wp_get_attachment_image_src( $attachment_id, $size );
			$taxonomy_cover_url = $taxonomy_cover_url[0];
		}
	} else {
		$taxonomy_cover_url = zm_get_option( 'cat_cover_d' );
	}

	if ( !$return_placeholder ) {
		return ( $taxonomy_cover_url != '' ) ? $taxonomy_cover_url : '55555';
	} else {
		return $taxonomy_cover_url;
	}
}

function cat_quick_edit_custom_box( $column_name, $screen, $name ) {
	if ($column_name == 'thumb_cover') 
		echo '<fieldset>
		<div class="thumb inline-edit-col">
			<label>
				<span class="title"><img src="" alt="Thumbnail"/></span>
				<span class="input-text-wrap"><input type="text" name="taxonomy_cover" value="" class="tax_list" /></span>
				<span class="input-text-wrap">
					<button class="cat_upload_cover_button be-cat-but button">添加封面</button>
					<button class="cat_remove_cover_button be-cat-but button">删除封面</button>
				</span>
			</label>
		</div>
	</fieldset>';
}

function cat_taxonomy_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = !empty( $columns['cb'] ) ? 1 : 0;
	$new_columns['thumb_cover'] = '封面';
	unset( $columns['cb'] );
	return array_merge( $new_columns, $columns );
}

function cat_taxonomy_column( $columns, $column, $id ) {
	if ( $column == 'thumb_cover' )
		$columns = '<span><img src="' . cat_cover_url( $id, 'thumbnail', TRUE ) . '" alt="' . __('Thumbnail', 'begin') . '" class="wp-post-cover" /></span>';

	return $columns;
}

function cat_change_insert_button_text($safe_text, $text) {
	return str_replace( "Insert into Post", "Use this cover", $text );
}

if (strpos( $_SERVER['SCRIPT_NAME'], 'term.php' ) > 0 ) {
	add_action( 'admin_head', 'cat_cover_add_style' );
}
if ( strpos( $_SERVER['SCRIPT_NAME'], 'edit-tags.php' ) > 0 ) {
	add_action( 'admin_head', 'cat_cover_add_style' );
	// add_action('quick_edit_custom_box', 'cat_quick_edit_custom_box', 10, 3);
	add_filter("attribute_escape", "cat_change_insert_button_text", 10, 2);
}

function cat_taxonomy_cover( $term_id = NULL, $size = 'full', $attr = NULL, $echo = TRUE ) {
	if ( !$term_id ) {
		if ( is_category() )
			$term_id = get_query_var( 'cat' );
		elseif ( is_tag() )
			$term_id = get_query_var( 'tag_id' );
		elseif ( is_tax() ) {
			$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$term_id = $current_term->term_id;
		}
	}

	$taxonomy_cover_url = get_option( 'cat_taxonomy_cover'.$term_id );
	if ( !empty( $taxonomy_cover_url ) ) {
		$attachment_id = cat_get_attachment_id_by_url( $taxonomy_cover_url );
		if ( !empty( $attachment_id ) )
			$taxonomy_cover = wp_get_attachment_cover( $attachment_id, $size, FALSE, $attr );
		else {
			$cover_attr = '';
			if ( is_array( $attr ) ) {
				if ( !empty( $attr['class'] ) )
					$cover_attr .= ' class="' . $attr['class'] . '" ';
				if ( !empty( $attr['alt'] ) )
					$cover_attr .= ' alt="' . $attr['alt'] . '" ';
				if (!empty($attr['width']))
					$cover_attr .= ' width="' . $attr['width'] . '" ';
				if ( !empty( $attr['height'] ) )
					$cover_attr .= ' height="' . $attr['height'] . '" ';
				if ( !empty( $attr['title'] ) )
					$cover_attr .= ' title="' . $attr['title'] . '" ';
			}
			$taxonomy_cover = '<img src="' . $taxonomy_cover_url . '" ' . $cover_attr . '/>';
		}
	}

	if ( $echo )
		echo $taxonomy_cover;
	else
		return $taxonomy_cover;
}