<!-- head -->
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('site/message', $this->data);?>
	<div class="widget">
		<br></br>
		<div class="title">
			<h6>Thông Tin Trang Bảo Hành</h6>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Nội dung</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="textC"><?php echo $baohanh->id?></td>
					<td>
						<span title="" class="tipS">
							<?php echo $baohanh->content;?>
						</span>
					</td>
					<td class="option">
						<a href="<?php echo admin_url('baohanh/edit/'.$baohanh->id)?>" title="Chỉnh sửa" class="tipS">
						   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="clear mt30"></div>