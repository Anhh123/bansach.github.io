<!-- head -->
<?php $this->load->view('admin/user/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('site/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			
			<h6>Danh sách thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>Họ và tên</td>
					<td>email</td>
					<td>Số điện thoại</td>
					<td>Địa chỉ</td>
					
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($list_user as $row):?>
			<tr>
						
						<td class="textC"><?php echo $row->id?></td>

						<td>
						<span title="<?php echo $row->name?>" class="tipS">
							<?php echo $row->name?>				
						</span></td>
						
						<td><span title="<?php echo $row->email?>" class="tipS">
							<?php echo $row->email?>					
						</span></td>

						<td><span title="<?php echo $row->phone?>" class="tipS">
							<?php echo $row->phone?>					
						</span></td>
						<td><span title="<?php echo $row->phone?>" class="tipS">
							<?php echo $row->address?>					
						</span></td>
						
						
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
