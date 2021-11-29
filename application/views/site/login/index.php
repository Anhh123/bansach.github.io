
<div id="layout-page" class="clearfix">
	<div class="col-md-12  clearfix">
		<ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
			<li><a href="/" target="_self">Trang chủ</a></li>
			<li><a href="/account" target="_self">Tài khoản</a></li>
			<li class="active">
				<span id="customer-login-breadcrumb">Đăng nhập</span>
				<span id="customer-recover-breadcrumb" class="no-display">Phục hồi</span>
			</li>
		</ol>
	</div>
	<h2 class="cus-title">Đăng nhập hoặc tạo tài khoản</h2>
	<div class="col-xs-12 col-sm-6">
		<div class="border">
			<h3>
				Khách hàng mới
			</h3>
			<p>
				Nếu bạn chưa có tài khoản thì hãy nhanh tay đăng ký để nhận nhiều ưu đãi hấp dẫn của chúng tôi.
			</p>
		</div>
		<div class="action-bottom">
			<a href="/account/register" class="register">Tạo tài khoản</a>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6" id="customer-login">
		<div id="login" class="userbox">
			<form accept-charset="UTF-8" action="/account/login" id="customer_login" method="post">
				<input name="form_type" type="hidden" value="customer_login">
				<input name="utf8" type="hidden" value="✓">
				<div class="border">
					<h3> Khách hàng đăng nhập </h3>
					<p> Nếu bạn đã có tài khoản, vui lòng đăng nhập. </p>
					<div class="clearfix large_form">
						<label class="icon-field"><span class="require">*</span> Địa chỉ email</label>
						<input required="" type="email" value="" name="customer[email]" id="customer_email" class="text">
					</div>
					<div class="clearfix large_form">
						<label class="icon-field"><span class="require">*</span> Mật khẩu</label>
						<input required="" type="password" value="" name="customer[password]" id="customer_password" class="text" size="16">
					</div>
					<label class="icon-field"><span class="require">* Bắt buộc</span></label>
				</div>
				<div class="req_pass">
					<a href="#" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
				</div>
				<div class="action-bottom">
					<input class="btn btn-signin" type="submit" value="Đăng nhập">
				</div>
			</form>
		</div>
		<div id="recover-password" style="display:none;" class="userbox">
			<form accept-charset="UTF-8" action="/account/recover" method="post">
				<input name="form_type" type="hidden" value="recover_customer_password">
				<input name="utf8" type="hidden" value="✓">
				<div class="border">
					<h3> Phục hồi mật khẩu </h3>
					<label class="icon-field"><span class="require">*</span> Địa chỉ email</label>
					<input type="email" value="" size="30" name="email" id="recover-email" class="text">
					<label class="icon-field"><span class="require">* Bắt buộc</span></label>
				</div>
				<div class="req_pass">
					<a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
				</div>
				<div class="action-bottom">
					<input class="btn" type="submit" value="Gửi">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	function showRecoverPasswordForm(){
	document.getElementById('recover-password').style.display = 'block';
	document.getElementById('login').style.display='none';
	}

	function hideRecoverPasswordForm(){
	document.getElementById('recover-password').style.display = 'none';
	document.getElementById('login').style.display = 'block';
	}

	if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>