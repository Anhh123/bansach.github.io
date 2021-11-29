<!-- head -->

<br></br>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('site/message', $this->data);?>
	<div class="widget">
		<div class="title">
			<h6>Danh sách khách hàng liên hệ</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Họ và tên</td>
					<td>email</td>
					<td>Số điện thoại</td>
					<td>Nội dung</td>
					<td>Ngày tạo</td>
					<td>Xóa</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td class="textC"><?php echo $row->id?></td>
					<td>
						<span title="" class="tipS">
							<?php echo htmlspecialchars($row->name)?>
						</span>
					</td>
					<td>
						<span title="" class="tipS">
							<?php echo htmlspecialchars($row->email)?>
						</span>
					</td>
					<td>
						<span title="" class="tipS">
							<?php echo htmlspecialchars($row->phone)?>
						</span>
					</td>
					<td>
						<span title="" class="tipS">
							<?php echo htmlspecialchars($row->content)?>
						</span>
					</td>
					<td>
						<span title="<?php echo $row->phone?>" class="tipS">
							<?php echo  get_date($row->created)?>
						</span>
					</td>
					<td class="option">
						<a href="<?php echo admin_url('contact/del/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<div class="clear mt30"></div>
