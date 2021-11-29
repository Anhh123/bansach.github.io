<div id="leftSide" style="padding-top:30px;">

<!-- Account panel -->
<div class="sideProfile">
	<a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin')?>/images/user.png" width="60"></a>
	<span style="text-align: justify;">Chúc
		<strong style="color: #b91919; font-family: Orbitron; font-weight: 500; letter-spacing: 1.5px;">
			<?php
				if($admin_info->level == 1){
					echo 'Admin';
				}
				else{
					echo 'Editor';
				}
			?>
		</strong>một ngày làm việc hiệu quả &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--- Chazô ---  ^^] !
	</span>

	<!-- Ẩn đi -->
	<!-- <?php echo isset($admin_info->name) ? $admin_info->name : ''?> -->
	<div class="clear"></div>
</div>
<div class="sidebarSep"></div>
	<!-- Left navigation -->
	<ul id="menu" class="nav">
		<li class="home">
			<a href="<?php echo admin_url('home')?>" class="active" id="current">
				<span>Dao dịch bán hàng</span>
				<strong></strong>
			</a>
		</li>
		<li class="product">
			<a href="" class="exp inactive">
				<span>Sản phẩm</span>
				<strong>2</strong>
			</a>
		    <ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('product')?>">
						Sản phẩm
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('catalog')?>">
						Danh mục
					</a>
				</li>
			</ul>
		</li>
		<li class="account">
			<a href="" class="exp inactive">
				<span>Tài khoản</span>
				<strong>1</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('admin')?>">
						Ban quản trị
					</a>
				</li>
			</ul>
		</li>
		<li class="support">
			<a href="" class="exp inactive">
				<span>Liên hệ</span>
				<strong>1</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('contact')?>">
						Danh sách khách hàng liên hệ
					</a>
				</li>
			</ul>
		</li>
		<li class="content">
			<a href="" class="exp inactive">
				<span>Seo onpage-slide</span>
				<strong>4</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('homepage')?>">
						Homepage
					</a>
				</li>

				<li>
					<a href="<?php echo admin_url('seopage_gioithieu')?>">
						Page
					</a>
				</li>

				<li>
					<a href="<?php echo admin_url('ads')?>">
						Banner
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('slide')?>">
						Slide
					</a>
				</li>
			</ul>
		</li>
		<li class="content">
			<a href="" class="exp inactive">
				<span>Quản lý page</span>
				<strong>2</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('homepage')?>">
						Home Page</a>
				</li>
				<li>
					<a href="<?php echo admin_url('news')?>">
						Tin tức</a>
				</li>
			</ul>
		</li>
		<li class="support">
			<a href="" class="exp inactive">
				<span>Quản lý footer</span>
				<strong>6</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('chantrang')?>">
						Thông tin công ty
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('chinh_sach')?>">
						Chính sách
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('support')?>">
						Hộ trợ khách hàng
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('social')?>">
						Social
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('baohanh')?>">
					Bảo hành
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('gioithieu')?>">
					Giới thiệu
					</a>
				</li>
			</ul>
		</li>
		<li class="support">
			<a href="<?php echo admin_url('ckfinder/gallery/html')?>">
				<span>Quản lý thư viện</span>
				<strong></strong>
			</a>
		</li>
	</ul>
</div>
<div class="clear"></div>