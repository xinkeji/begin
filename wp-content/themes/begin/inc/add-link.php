<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// 自助友链
if ( zm_get_option( 'add_link' ) ) {
	add_action( 'wp_ajax_nopriv_submit_link', 'add_link_ajax' );
	add_action( 'wp_ajax_submit_link', 'add_link_ajax' );

	function add_link_ajax() {
		// 处理 AJAX 请求的逻辑
		if ( isset( $_POST['begin_form'] ) && $_POST['begin_form'] == 'send' ) {
			global $wpdb;

			$link_name        = isset( $_POST['begin_name'] ) ? trim( htmlspecialchars( $_POST['begin_name'], ENT_QUOTES ) ) : '';
			$link_url         = isset( $_POST['begin_url'] ) ? trim( htmlspecialchars( $_POST['begin_url'], ENT_QUOTES ) ) : '';
			$link_description = isset( $_POST['begin_description'] ) ? trim( htmlspecialchars( $_POST['begin_description'], ENT_QUOTES ) ) : '';
			$link_notes       = isset( $_POST['link_notes'] ) ? trim( htmlspecialchars( $_POST['link_notes'], ENT_QUOTES ) ) : '';
			$link_target      = "_blank";
			$link_visible     = "N";
			$errors = '';
			if ( empty( $link_name ) || mb_strlen( $link_name ) > 20 ){
				$errors .= '<p class="add-link-tip fd">请填写网站名称，不超过20字！</p>';
			}

			if ( empty( $link_url ) || strlen( $link_url ) > 60 || !preg_match( "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link_url ) ){
				$errors .= '<p class="add-link-tip fd">请正确填写网站链接！</p>';
			}

			if ( empty( $link_notes ) ){
				$errors .= '<p class="add-link-tip fd">请填写QQ号，方便联系！</p>';
			} else {
				if ( empty( $link_notes ) || ! is_numeric( $link_notes ) ){
					$errors .= '<p class="add-link-tip fd">貌似填写的不是QQ号！</p>';
				}
			}

			if ( empty( $link_description ) || mb_strlen( $link_description ) > 100 ){
				$errors .= '<p class="add-link-tip fd">请填写网站描述，不超过100字！</p>';
			}

			$lkname  = $link_name . ' — 待审核';
			$lk_name = $wpdb->get_row( "select * from $wpdb->links  where link_name ='$lkname'" );
			if ( $lk_name ) {
				$errors .= '<p class="add-link-tip fd">网站名称已经存在，请勿重复申请！</p>';
			}

			$lk_url =  $wpdb->get_row( "select * from $wpdb->links  where link_url ='$link_url'" );
			if ( $lk_url ){
				$errors .= '<p class="add-link-tip fd">网站链接已经存在，请勿重复申请！</p>';
			}

			if ( empty( $errors ) ) {
				$sql_link = $wpdb->prepare( "INSERT INTO $wpdb->links ( link_name, link_url, link_target, link_description, link_notes, link_visible ) VALUES ( %s, %s, %s, %s, %s, %s )",
					$link_name.' — 待审核',
					$link_url,
					$link_target,
					$link_description,
					$link_notes,
					$link_visible
				);

				$result = $wpdb->get_results( $sql_link );
				$errors .= '<p class="add-link-tip add-link-succeed fd">提交成功，请等待站长审核中！</p>';
			}

			// 返回错误消息
			if ( ! empty( $errors ) ) {
				wp_send_json_error( $errors );
			}
		}

		// 返回成功消息
		wp_send_json_success( '提交成功，等待站长审核中' );
	}
}