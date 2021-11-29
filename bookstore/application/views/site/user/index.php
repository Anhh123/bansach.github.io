<div id="layout-page" class="clearfix">
  <div class="col-md-12  clearfix">
    <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
      <li><a href="<?php echo base_url() ?>" target="_self">Trang chủ</a></li>
      <li><a href="" target="_self">Tài khoản</a></li>
    </ol>
  </div>
  <h2 class="cus-title">Chỉnh sửa thông tin thành viên</h2>
  <div class="col-xs-4">
    <form accept-charset="UTF-8" action="<?php echo site_url('user/login')?>" id="create_customer" method="post">
      <input name="form_type" value="create_customer" type="hidden">
      <input name="utf8" value="✓" type="hidden">
      <div class="border">
        <h3>
          Thông tin thành viên
        </h3>
        <div class="box-center"><!-- The box-center register-->
          <div class="tittle-box-center">
            <!-- <h2>Thông tin thành viên</h2> -->
          </div>
          <div class="box-content-center register"><!-- The box-content-center -->
            <table>
              <tr>
                <td>Họ & tên </td>
                <td><?php echo $user->name?></td>
              </tr>

              <tr>
                <td>Số điện thoại </td>
                <td><?php echo $user->phone?></td>
              </tr>

              <tr>
                <td>Địa Chỉ </td>
                <td><?php echo $user->address?></td>
              </tr>

              <tr>
                <td>Email </td>
                <td><?php echo $user->email?></td>
              </tr>

              <tr>
                <td>Ngày tạo </td>
                <td><?php echo get_date($user->created)?></td>
              </tr>
            </table>
            <style type="text/css" media="screen">
              table{ margin: 0 auto; }
              table tr{ border-bottom: 1px solid #ccc; }
              table tr:last-child{ border-bottom: none; }
              table td{ padding: 5px; }
              table td:first-child{ font-weight: bold; }
            </style>
          </div>
        </div>

        <!-- <label class="icon-field"><span class="require">* Bắt buộc</span></label> -->
      </div>
      <div class="action-bottom">
        <a class="btn" style="background: #b91919; border-radius: 5px; color: #fff; margin-right: 10px" href="<?php echo site_url('chinh-sua-thong-tin')?>">Sửa Thông Tin</a>
      </div>
      <div class="req_pass">
        <a class="come-back" href="<?php echo base_url('') ?>"><i class="fa fa-reply" aria-hidden="true"></i> Quay về</a>
      </div>
    </form>
  </div>
</div><!-- #register -->
<!-- #customer-register -->

