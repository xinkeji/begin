<?php
header("Content-Type:text/html;charset=utf-8");
if ( !isset($_GET['qq']) || !$_GET['qq'] ) {
	echo '错误!';
	exit;
}

$qq = filter_var( $_GET['qq'], FILTER_VALIDATE_INT );
if ( !$qq ) {
	echo '错误!';
	exit; 
}

$qqurl = 'http://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?g_tk='. $qq .'&uins=';
$data = file_get_contents( $qqurl.$qq );
if (!$data) {
	echo '获取QQ头像失败!';
	exit;
}
$data = @iconv( "GBK", "UTF-8", $data );
$regex = '/portraitCallBack\((.*)\)/is';
preg_match( $regex,$data,$qq_portrait );
if ( isset( $qq_portrait[1] ) ) {
	echo $qq_portrait[1];
}