<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
			<span>Xin chào "<strong style="color: #b91919"> <?php echo isset($admin_info->name) ? $admin_info->name : ''?> </strong style="text-decoration: underline;"> " quay trở lại.</span>
		</div>
		<div class="userNav">
			<ul>

				<!-- Home -->
				<li>
					<a target="_blank" href="<?php echo base_url()?>">
						<img src="<?php echo public_url('admin')?>/images/icons/light/home.png" style="margin-top:7px;">
						<span>Trang chủ</span>
					</a>
				</li>

				<!-- Logout -->
				<li>
					<a href="<?php echo admin_url('admin/logout')?>">
						<img alt="" src="<?php echo public_url('admin')?>/images/icons/topnav/logout.png">
						<span>Đăng xuất</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>