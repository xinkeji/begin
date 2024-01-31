<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if ( zm_get_option( 'front_login' ) || get_option( 'comment_registration' ) ) { ?>
<div class="login-overlay" id="login-layer">
	<div id="login" class="fadeInZoom animated">
		<div class="login-main"></div>
		<div class="off-login"></div>
	</div>
</div>
<?php } ?>