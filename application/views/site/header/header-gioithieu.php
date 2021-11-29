    <div class="wrapper">
        <header>
			<div class="header-top">
			  <div class="container">
			    <div class="row clearfix">
			      <div class="col-xs-12 col-sm-6 header-welcome pull-left">
			        <span>
        <?php if(isset($user_info)): ?>
          <a href="<?php echo site_url('thong-tin-thanh-vien') ?>" title="Thông tin thành viên" style="color: #f1f1f1">Chào mừng &nbsp;<i class="fa fa-id-badge" aria-hidden="true"><?php echo $user_info->name ?></i>&nbsp; đã ghé thăm.</a>
          <?php else: ?>
            Chào mừng &nbsp;"Bạn"&nbsp;  đã ghé thăm.
        <?php endif; ?>
			        </span>
			      </div>
			      <div class="col-xs-12 col-sm-6 header-tools clearfix hidden-xs ">
			        <div class="myaccount">
			          <div class="tongle">
			            <span>Tài khoản</span>
			          </div>
			          <div class="content">
			            <ul class="links">
              <?php if(isset($user_info)): ?>
                <li class="first"><a href="<?php echo site_url('dang-xuat') ?>">Đăng xuất</a></li>
              <?php else: ?>
                <li class="first"><a href="<?php echo site_url('dang-ki') ?>">Đăng ký</a></li>
                <li class="last"><a href="<?php echo site_url('dang-nhap') ?>">Đăng nhập</a></li>
              <?php endif; ?>
			            </ul>
			          </div>
			        </div>
			        <div class="myaccount">
			          <a href="<?php echo site_url('gio-hang') ?>" title="Giỏ hàng" style="color: #f1f1f1">Thanh toán</a>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="header-bottom">
			  <div class="container">
			    <div class="row">
			      <div id="header-mobile-menu" class="visible-xs " style="float:left;width: 50px;padding-right: 0;border: 0;"></div>
			      <div class="col-xs-12 col-sm-3 header-logo">
			        <h1>
			          <a href="<?php echo base_url()?>" class="logo">
			            <img src="<?php echo public_url('site/bookstore') ?>/library/Book-header.png" alt="<?php echo !empty($homepage->site_desc) ? $homepage->site_desc : ''?>" title="<?php echo !empty($homepage->site_title) ? $homepage->site_title : ''?>">
			          </a>
			        </h1>
			      </div>
			      <div class="hidden-xs col-sm-9 header-privacy">
			        <div class="row">
			          <div class="col-sm-6 col-md-3 no-padding">
			            <div class="single-item">
			              <div class="icon-header">
			                <i class="fa fa-truck" aria-hidden="true"></i>
			              </div>
			              <div class="item-detail">
			                <h3>vận chuyển</h3>
			                <p>miễn phí toàn quốc</p>
			              </div>
			            </div>
			          </div>
			          <div class="col-sm-6 col-md-3 no-padding">
			            <div class="single-item">
			              <div class="icon-header">
			                <i class="fa fa-refresh" aria-hidden="true"></i>
			              </div>
			              <div class="item-detail">
			                <h3>Đổi trả hàng</h3>
			                <p>trong 7 ngày</p>
			              </div>
			            </div>
			          </div>
			          <div class="col-sm-6 col-md-3 no-padding">
			            <div class="single-item">
			              <div class="icon-header">
			                <i class="fa fa-phone"></i>
			              </div>
			              <div class="item-detail">
			                <h3>0<?php echo !empty($homepage->hotline) ? number_format($homepage->hotline, 0, ',', '.') : ''?></h3>
			                <p>Hotline 24/7</p>
			              </div>
			            </div>
			          </div>
			          <div class="col-sm-6 col-md-3 header-cart no-padding">
			            <div class="mycart hidden-xs">
			              <div class="tongle">
			                <div class="cart-icon">
			                  <i class="fa fa-shopping-cart"></i>
			                </div>
			                <span class="number"><?php echo $total_items;?> Sản phẩm</span>
			              </div>
			              <div class="content">
			                <div class="block-inner">
			                  <p class="empty"><?php if($total_items > 0){ echo 'có '.$total_items.' sản phẩm trong giỏ hàng';
			                    }else{ echo 'Chưa có sản phẩm nào trong giỏ hàng.';} ?></p>
			                  <div class="info">
			                    <p class="total clearfix">
			                      <span class="total-title">TỔNG CỘNG</span>
			                      <span class="total-price"><?php echo number_format($total_amount);?> vnđ</span>
			                    </p>
			                    <div class="link-cart">
			                      <a href="<?php echo base_url('gio-hang')?>">Giỏ hàng</a>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="linked-mobile pull-right visible-xs">
			        <ul>
			          <li><a href="account/login.html"><i class="fa fa-user fa-2x"></i></a></li>
			          <li><a href="cart.html"><i class="fa fa-shopping-cart fa-2x"></i></a></li>
			        </ul>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="header-menu">
			  <div class="container">
			    <div class="menu hidden-xs index">
			      <ul class="menu-header">
			        <li class="">
			          <a href="<?php echo base_url()?>">Trang chủ</a>
			        </li>

			          <?php foreach($catalog_0 as $row):?>
			            <?php if(count($row->menu_1) <= 0):?>
			        <li class="">
			          <a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?></a>
			        </li>
			          <?php else:?>
			        <li class="" >
			          <a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?></a>
			          <ul class="sub-menu">
			            <?php foreach($row->menu_1 as $value): ?>
			              <?php if(count($value->menu_2) > 0):?>
			            <li>
			              <a href="<?php echo base_url($value->slug).'/'?>"><?php echo $value->name?></a>
			              <ul class="sub-menu-sub">
			                <?php foreach($value->menu_2 as $subs):?>
			                <li><a href="<?php echo base_url($subs->slug).'/'?>"><?php echo $subs->name?></a></li>
			                <?php endforeach;?>
			              </ul>
			            </li>
			              <?php else:?>
			            <li><a href="<?php echo base_url($value->slug).'/'?>"><?php echo $value->name?></a>
			              <?php endif;?>
			            <?php endforeach;?>
			          </ul>
			        </li>
			            <?php endif;?>
			          <?php endforeach;?>

			        <li class="">
			          <a href="<?php echo base_url('tin-tuc').'/'?>">Blog</a>
			        </li>
			        <li class="active">
			          <a href="<?php echo base_url('gioi-thieu').'/'?>">Giới thiệu</a>
			        </li>
			      </ul>
			      <div class="search hidden-xs">
			        <form class="form-search topsearch" action="<?php echo site_url('tim-kiem')?>" method="get">
			          <input type="hidden" name="type" value="product">
			          <input type="text" name="key-search" class="search-input" placeholder="Nhập tên sách, tác giả..." value="<?php echo isset($key) ? $key : '' ?>">
			          <button type="submit" class="btn-search">
			            <i class="fa fa-search"></i>
			          </button>
			        </form>
			      </div>
			    </div>
			    <ul id="mmenu" class="hidden">
			      <?php foreach($catalog_0 as $row):?>
			        <?php if(count($row->menu_1) <= 0):?>
			      <li class="">
			        <a href="<?php echo base_url($row->slug)?>"><?php echo $row->name?></a>
			      </li>
			        <?php else:?>
			      <li class="" >
			        <a href="<?php echo base_url($row->slug)?>"><?php echo $row->name?></a>
			        <ul class="sub-menu">
			          <?php foreach($row->menu_1 as $value): ?>
			            <?php if(count($value->menu_2) > 0):?>
			            <li>
			              <a href="<?php echo base_url($value->slug)?>"><?php echo $value->name?></a>
			              <ul class="sub-menu-sub">
			                <?php foreach($value->menu_2 as $subs):?>
			                <li><a href="<?php echo base_url($subs->slug)?>"><?php echo $subs->name?></a></li>
			                <?php endforeach;?>
			              </ul>
			            </li>
			            <?php else:?>
			            <li><a href="<?php echo base_url($value->slug)?>"><?php echo $value->name?></a>
			            <?php endif;?>
			          <?php endforeach;?>
			        </ul>
			      </li>
			        <?php endif;?>
			      <?php endforeach;?>
			      <li class="">
			        <a href="<?php echo base_url('tin-tuc').'/'?>">Blog</a>
			      </li>
			      <li class="">
			        <a href="<?php echo base_url('gioi-thieu').'/'?>">Giới thiệu</a>
			      </li>
			    </ul>
			  </div>
			</div>
        </header>