<div id="layout-page" class="clearfix">
  <div class="col-md-12  clearfix">
    <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
      <li><a href="<?php echo base_url() ?>" target="_self">Trang chủ</a></li>
      <li><a href="<?php echo base_url('thong-tin-thanh-vien') ?>" target="_self">Tài khoản</a></li>
    </ol>
  </div>
  <h2 class="cus-title">Chỉnh sửa thông tin thành viên</h2>
  <div class="col-xs-4">
    <form accept-charset="UTF-8" action="<?php echo site_url('user/edit')?>" id="create_customer_edit" method="post">
      <input name="form_type" value="create_customer" type="hidden">
      <input name="utf8" value="✓" type="hidden">
      <div class="border_edit">
        <h3>
          Thông tin thành viên
        </h3>
        <div class="box-center"><!-- The box-center register-->
          <div class="box-content-center register"><!-- The box-content-center -->
            <form enctype="multipart/form-data" action="<?php echo base_url('user/edit')?>" method="post" class="t-form form_action">

              <div class="form-row">
                <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
                <div class="form-item">
                  <?php echo $user->email?>
                <div class="clear"></div>
                  <div id="email_error" class="error"><?php echo form_error('email')?></div>
                </div>
                <div class="clear"></div>
              </div>

              <div id="password" class="clearfix large_form">
                <label class="form-label" for="param_password">Mật khẩu:</label>
                <input value="" name="password" id="password" class="password text" size="30" type="password">
                <div class="clearfix"></div>
                <p style="text-align: right;">Nếu muốn thay đổi mật khẩu thì nhập vào</p>
                <span><?php echo form_error('password') ?></span>
              </div>

              <div id="re_password" class="clearfix large_form">
                <label class="form-label" for="param_re_password">Nhập lại lại mật khẩu:</label>
                <input value="" name="re_password" id="re_password" class="password text" size="30" type="password">
                <div class="clearfix"></div>
                <span><?php echo form_error('re_password') ?></span>
              </div>

              <div id="name" class="clearfix large_form">
                <label class="form-label" for="param_name">Họ & tên:<span class="req">*</span></label>
                <input required="" placeholder="" value="<?php echo $user->name?>" name="name" id="last_name" class="text" size="30" type="text">
                <div class="clearfix"></div>
                <span><?php echo form_error('name') ?></span>
              </div>

              <div id="phone" class="clearfix large_form">
                <label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
                <input required="" placeholder="" value="<?php echo $user->phone?>" name="phone" id="phone" class="text" size="30" type="text">
                <div class="clearfix"></div>
                <span><?php echo form_error('phone') ?></span>
              </div>

              <div id="address" class="clearfix large_form">
                <label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
                <input required="" placeholder="" value="<?php echo $user->address?>" name="address" id="address" class="text" size="30" type="text">
                <div class="clearfix"></div>
                <span><?php echo form_error('address') ?></span>
              </div>

              <div class="action-bottom action-bottom-edit">
                <input class="btn" value="Cập nhật" type="submit">
              </div>
            </form>
          </div><!-- End box-content-center register-->
        </div>

        <!-- <label class="icon-field"><span class="require">* Bắt buộc</span></label> -->
      </div>

      <div class="req_pass">
        <a class="come-back" href="<?php echo base_url('thong-tin-thanh-vien') ?>"><i class="fa fa-reply" aria-hidden="true"></i> Quay về</a>
      </div>
    </form>
  </div>
</div><!-- #register -->
<!-- #customer-register -->