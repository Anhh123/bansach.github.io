<!-- head -->
<br></br>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('site/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			
			<h6>Cài đặt Seo cho page giới thiệu</h6>
		 	
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>ảnh favicon</td>
					<td>site_title</td>
					<td>site_description</td>
					<td>site_keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($list as $row):?>
			<tr>
						
						<td class="textC"><?php echo $row->id?></td>

					
						
						<td>
							<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />						
						</td>
						<td>
							<?php echo $row->site_title?>
						</td>
						<td>
							<?php echo $row->site_desc?>
						</td>
						<td>
							<?php echo $row->site_key?>
						</td>
						
						<td class="option">
							<a href="<?php echo admin_url('seopage_gioithieu/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>

	<br><br>

<div class="widget">
	<div class="title">
			
			<h6>Cài đặt Seo cho page tin tức</h6>
		 	
	</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>ảnh favicon</td>
					<td>site_title</td>
					<td>site_description</td>
					<td>site_keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($list1 as $row):?>
			<tr>
						
						<td class="textC"><?php echo $row->id?></td>

					
						
						<td>
							<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />						
						</td>
						<td>
							<?php echo $row->site_title?>
						</td>
						<td>
							<?php echo $row->site_desc?>
						</td>
						<td>
							<?php echo $row->site_key?>
						</td>
						
						<td class="option">
							<a href="<?php echo admin_url('seopage_gioithieu/edit_news/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>


	<div class="widget">
	<div class="title">
			
			<h6>Cài đặt Seo cho page dịch vụ</h6>
		 	
	</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>ảnh favicon</td>
					<td>site_title</td>
					<td>site_description</td>
					<td>site_keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($list2 as $row):?>
			<tr>
						
						<td class="textC"><?php echo $row->id?></td>

					
						
						<td>
							<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />						
						</td>
						<td>
							<?php echo $row->site_title?>
						</td>
						<td>
							<?php echo $row->site_desc?>
						</td>
						<td>
							<?php echo $row->site_key?>
						</td>
						
						<td class="option">
							<a href="<?php echo admin_url('seopage_gioithieu/edit_dichvu/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>

<div class="widget">
	<div class="title">
			<h6>Cài đặt Seo cho page bảo hành</h6>
	</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>ảnh favicon</td>
					<td>site_title</td>
					<td>site_description</td>
					<td>site_keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list3 as $row):?>
			<tr>
						<td class="textC"><?php echo $row->id?></td>
						<td>
							<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />						
						</td>
						<td>
							<?php echo $row->site_title?>
						</td>
						<td>
							<?php echo $row->site_desc?>
						</td>
						<td>
							<?php echo $row->site_key?>
						</td>
						<td class="option">
							<a href="<?php echo admin_url('seopage_gioithieu/edit_baohanh/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
</div>


<div class="widget">
	<div class="title">
			<h6>Cài đặt Seo cho page tuyển dụng</h6>
	</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>ảnh favicon</td>
					<td>site_title</td>
					<td>site_description</td>
					<td>site_keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list4 as $row):?>
			<tr>
						<td class="textC"><?php echo $row->id?></td>

						<td>
							<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />						
						</td>
						<td>
							<?php echo $row->site_title?>
						</td>
						<td>
							<?php echo $row->site_desc?>
						</td>
						<td>
							<?php echo $row->site_key?>
						</td>
						<td class="option">
							<a href="<?php echo admin_url('seopage_gioithieu/edit_tuyendung/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>

</div>

<div class="clear mt30"></div>