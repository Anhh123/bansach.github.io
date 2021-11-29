<!-- head -->
<?php $this->load->view('admin/ads/head', $this->data)?>

<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('site/message', $this->data);?>
    <!-- banner-top -->
	<div class="widget">
		<div class="title">
			<h6>Danh sách Banner Top</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total_ads?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tên</td>
					<td>Vị trí</td>
					<td>Tên file ảnh</td>
					<td>Ảnh thumbnail</td>
					<td>Link liên kết</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td class="textC"><?php echo $row->id?></td>
					<td>
						<span title="<?php echo $row->name?>" class="tipS">
							<?php echo $row->name?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->vi_tri?>" class="tipS">
							<?php echo $row->vi_tri?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->image_link?>" class="tipS">
							<?php echo $row->image_link?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->name?>" class="tipS">
							<img width="100" height="40" src="<?php echo $row->image_link?>" alt="">
						</span>
					</td>
					<td>
						<span title="<?php echo $row->href?>" class="tipS">
						<?php echo $row->href?>
						</span>
					</td>
					<td class="option">
						<a href="<?php echo admin_url('ads/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
						   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
						</a>
						<a href="<?php echo admin_url('ads/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>

	<!-- banner-left -->
	<!-- <div class="widget">
		<div class="title">
			<h6>Danh sách Banner Left</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total_ads?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tên</td>
					<td>Vị trí</td>
					<td>Tên file ảnh</td>
					<td>Ảnh thumbnail</td>
					<td>Link liên kết</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td class="textC"><?php echo $row->id?></td>
					<td>
						<span title="<?php echo $row->name?>" class="tipS">
							<?php echo $row->name?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->vi_tri?>" class="tipS">
							<?php echo $row->vi_tri?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->image_link?>" class="tipS">
							<?php echo $row->image_link?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->name?>" class="tipS">
							<img width="100" height="40" src="<?php echo $row->image_link?>" alt="">
						</span>
					</td>
					<td>
						<span title="<?php echo $row->href?>" class="tipS">
						<?php echo $row->href?>
						</span>
					</td>
					<td class="option">
						<a href="<?php echo admin_url('ads/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
						   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
						</a>
						<a href="<?php echo admin_url('ads/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div> -->
</div>
<div class="clear mt30"></div>
