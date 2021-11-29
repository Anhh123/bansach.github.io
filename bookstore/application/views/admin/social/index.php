<!-- head -->

<br></br>
<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data);?>
	<div class="widget">
		<div class="title">
			<h6>Danh sách Social</h6>
		 	<div class="num f12">Tổng số: <b>4</b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tên</td>
					<td>Link</td>
					<td style="width:100px;">Hình ảnh Social</td>
					<td>Thứ tự</td>
					<td style="width:100px;">Chỉnh sửa </td>
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
						<span title="<?php echo $row->link?>" class="tipS">
							<?php echo $row->link?>
						</span>
					</td>
					<td>
						<span><?php echo $row->image_social ?></span>
					</td>
					<td>
						<span title="<?php echo $row->sort_order?>" class="tipS">
							<?php echo $row->sort_order?>
						</span>
					</td>
					<td class="option">
						<a href="<?php echo admin_url('social/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
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
