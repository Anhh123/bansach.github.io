<!-- head -->
<?php $this->load->view('admin/homepage/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
    <?php $this->load->view('site/message', $this->data);?>
	<div class="widget">
		<div class="title">
			<h6>Cài đặt cho Home Page</h6>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Ảnh Logo</td>
					<td>Ảnh favicon</td>
					<td>Hotline</td>
					<td>Site Title</td>
					<td>Site Description</td>
					<td>Sit Keyword</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td class="textC"><?php echo $row->id?></td>

					<td>
						<img width="120" height="80" src="<?php echo $row->image_link ?>" alt="anh-logo" />
					</td>
					<td>
						<img width="120" height="80" src="<?php echo $row->favicon?>" alt="anh-favicon" />
					</td>
					<td><?php echo $row->hotline ?></td>
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
						<a href="<?php echo admin_url('homepage/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
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