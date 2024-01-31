jQuery(document).ready(function($) {
	var qqURL = goqq.qqinf;
	$(".fill-but").click(function(e) {
		if ($(e.target).closest('#qq').length == 0) {
			var qqNumber = $('#qq').val();
			$('#qq').on('focus', function() {
				$('#author').val(''); 
			});

			if (qqNumber) {
				if (!isNaN(qqNumber)) {
					$.ajax({
						url: qqURL,
						type: "get",
						data: {
							qq: qqNumber
						},
						dataType: "json",
						success: function(data) {
							$("#email").val(qqNumber + '@qq.com');
							$('#comment').focus();
							if (data == null) {
								$("#author").val('QQ游客');
							} else {
								$("#author").val(data[qqNumber][6] == "" ? 'QQ游客': data[qqNumber][6]);
							}
						},
						error: function(err) {
							qqErrorMsg('貌似没有这个QQ号');
							$('#qq').focus();
						}
					});
					return true;
				} else {
					qqErrorMsg('输入的好像不是QQ号码');
					$('#qq').focus();
				}
			} else {
				qqErrorMsg('请输入您的QQ号');
				$('#qq').focus();
			}
		}
	});

	function qqErrorMsg(message) {
		var errorMsg = '<span class="qq-alert"><i class="be be-info"></i>' + message + '</span>';
		$(".qq-error-msg").html(errorMsg);
		setTimeout(function() {
			$(".qq-error-msg").html('');
		},
		3000);
	}
});