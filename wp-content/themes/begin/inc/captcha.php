<?php
// 随机字串
class BECaptchaCode {
	function generateCode($characters) {
		$possible = 'bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 2;
		while ($i < $characters) {
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
}

// AJAX刷新验证码
add_action( 'wp_ajax_nopriv_be_get_captcha', 'be_get_captcha' );
add_action( 'wp_ajax_be_get_captcha', 'be_get_captcha' );

function be_get_captcha() {
	include_once("berc4.php");
	$be_captcha = new BECaptchaCode();
	$be_code = be_str_encrypt($be_captcha->generateCode(6));
	$url = get_template_directory_uri() . '/inc/get-captcha.php?width=120&height=35&code=' . $be_code;
	wp_send_json_success( [
		'img_url' => $url,
		'code'   => $be_code
	] );
}

function label_captcha() {
	$be_captcha = new BECaptchaCode();
	$be_code = be_str_encrypt($be_captcha->generateCode(6));
?>
<div class="clear"></div>
<div class="label-captcha zml-ico captcha-ico">
	<input type="text" name="be_security_code" class="input captcha-input" autocomplete="off" value="" placeholder="<?php _e( '验证码', 'begin' ); ?>" onfocus="this.placeholder=''" onblur="this.placeholder='<?php _e( '验证码', 'begin' ); ?>'"><br/>
	<img class="be-captcha-img" src="data:image/gif;base64,R0lGODlhAQABAHAAACH5BAUAAAAALAAAAAABAAEAAAICRAEAOw==" />
	<div class="be-get-captcha"><i class="be be-loader"></i><?php _e( '刷新验证码', 'begin' ); ?></div>
	<input type="hidden" class="be-captcha-code" name="be_security_check" value="<?php echo $be_code; ?>">
	<label id="be_hp_label" style="display: none;">HP<br/>
		<input type="text" name="be_hp" value="" class="input" size="20" tabindex="23" />
	</label>
</div>
<div class="clear"></div>
<?php }

if (zm_get_option('register_captcha')) {
	add_action('be_register_form', 'captcha_form');
}
if (zm_get_option('login_captcha')) {
	add_action('be_login_form', 'captcha_form');
}
if (zm_get_option('lost_captcha')) {
	add_action('be_lostpassword_form', 'captcha_form');
}
function captcha_form() {
	include_once("berc4.php");
	echo label_captcha();
}

if (zm_get_option('register_captcha')) {
add_action('register_post', 'register_check_code', 10, 3);
}
function register_check_code($login, $email, $errors) {
	include_once("berc4.php");
	$be_code = isset( $_POST['be_security_check'] ) ? be_str_decrypt( $_POST['be_security_check'] ) : '';
	if (($be_code != $_POST['be_security_code']) && (!empty($be_code)))
		$errors->add('crror', sprintf(__( '请输入正确的验证码', 'begin' )) );

	if (!isset($_POST['be_hp']) || !empty($_POST['be_hp']))
		$errors->add('be_error2', __('出错了，请重试'));
}

if (zm_get_option('login_captcha')) {
add_action('authenticate', 'login_check_code', 21, 1);
}
function login_check_code($errors) {
	include_once("berc4.php");
	$be_code = isset( $_POST['be_security_check'] ) ? be_str_decrypt( $_POST['be_security_check'] ) : '';
	if (isset($_POST['be_security_code']) && $_POST['be_security_code'] != $be_code && (!empty($be_code)))
		$errors = new WP_Error( 'crror', sprintf(__( '请输入正确的验证码', 'begin' )) );
		return $errors;
}

add_action('lostpassword_post', 'lost_check_code', 10, 2);
function lost_check_code($errors, $user_data) {
	include_once("berc4.php");
	$be_code = isset( $_POST['be_security_check'] ) ? be_str_decrypt( $_POST['be_security_check'] ) : '';
	if (($be_code != $_POST['be_security_code']) && (!empty($be_code)))
		$errors->add('crror', sprintf(__( '请输入正确的验证码', 'begin' )) );
		return $errors;
}