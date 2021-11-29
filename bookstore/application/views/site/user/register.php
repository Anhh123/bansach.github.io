<div id="layout-page" class="clearfix">
  <div class="col-md-12  clearfix">
    <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
      <li><a href="/" target="_self">Trang chủ</a></li>
      <li><a href="/account" target="_self">Tài khoản</a></li>
      <li class="active"><span>Đăng ký</span></li>
    </ol>
  </div>
  <h2 class="cus-title">Thành viên đăng kí</h2>
  <div class="col-xs-4">
    <form accept-charset="UTF-8" action="<?php echo site_url('user/register')?>" id="create_customer" method="post">
      <input name="form_type" value="create_customer" type="hidden">
      <input name="utf8" value="✓" type="hidden">
      <div class="border">
        <h3>
          Thông tin đăng ký
        </h3>

        <div id="name" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Họ & tên" value="<?php echo set_value('name')?>" name="name" id="last_name" class="text" size="30" type="text">
          <div class="clearfix"></div>
          <span><?php echo form_error('name') ?></span>
        </div>

        <div id="phone" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Số điện thoại" value="<?php echo set_value('phone')?>" name="phone" id="phone" class="text" size="30" type="text">
          <div class="clearfix"></div>
          <span><?php echo form_error('phone') ?></span>
        </div>

        <div id="address" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Địa chỉ" value="<?php echo set_value('address')?>" name="address" id="address" class="text" size="30" type="text">
          <div class="clearfix"></div>
          <span><?php echo form_error('address') ?></span>
        </div>

        <div id="email" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Email" value="<?php echo set_value('email')?>" name="email" id="email" class="text" size="30" type="email">
          <div class="clearfix"></div>
          <span><?php echo form_error('email') ?></span>
        </div>

        <!-- <div id="username" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Tên đăng nhập" value="<?php echo set_value('username')?>" name="username" id="username" class="text" size="30" type="text">
          <div class="clearfix"></div>
          <span><?php echo form_error('username') ?></span>
        </div> -->

        <div id="password" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Mật khẩu" value="" name="password" id="password" class="password text" size="30" type="password">
          <div class="clearfix"></div>
          <span><?php echo form_error('password') ?></span>
        </div>

        <div id="re_password" class="clearfix large_form">
          <label class="icon-field"><span class="require"></span></label>
          <input required="" placeholder="Nhập lại mật khẩu" value="" name="re_password" id="re_password" class="password text" size="30" type="password">
          <div class="clearfix"></div>
          <span><?php echo form_error('re_password') ?></span>
        </div>
        <!-- <label class="icon-field"><span class="require">* Bắt buộc</span></label> -->
      </div>

      <div style="height: 0; width: 0; position: absolute; visibility: hidden;" aria-hidden="true">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" focusable="false">
          <symbol id="ripply-scott" viewBox="0 0 100 100">
            <g>
              <polygon points="5.6,77.4 0,29 39.1,0 83.8,19.3 89.4,67.7 50.3,96.7" />
              <polygon fill="rgba(255,255,255,0.35)" transform="scale(0.5), translate(50, 50)" points="5.6,77.4 0,29 39.1,0 83.8,19.3 89.4,67.7 50.3,96.7" />
              <polygon fill="rgba(255,255,255,0.25)" transform="scale(0.25), translate(145, 145)" points="5.6,77.4 0,29 39.1,0 83.8,19.3 89.4,67.7 50.3,96.7" />
            </g>
          </symbol>
        </svg>
      </div>
      <div class="action-bottom">
        <button id="js-ripple-btn" class="button styl-material btn" type="submit">
          ĐĂNG NHẬP
          <svg class="ripple-obj" id="js-ripple">
            <use width="4" height="4" xlink:href="#ripply-scott" class="js-ripple"></use>
          </svg>
        </button>
      </div>
      <!-- /action-bottom -->
      <div class="req_pass">
        <a class="come-back" href="<?php echo base_url() ?>" title="Home"><i class="fa fa-reply" aria-hidden="true"></i> Quay về</a>
      </div>
    </form>
  </div>
</div><!-- #register -->
<!-- #customer-register -->