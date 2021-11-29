<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php $this->load->view('admin/message',$this->data)?>
<div class="line"></div>
<div class="wrapper">
	<div class="widgets">
	     <!-- Stats -->
		<div class="widget">
			<div class="title">
				<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span>
				<input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;"></span></div></span>
				<h6>Chi tiết đơn hàng</h6>
			</div>
			<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png"></td>
						<td style="width:60px;">Mã giao dịch</td>
						<td style="width:75px;">Tên sản phẩm</td>
						<td style="width:75px;">Hình ảnh</td>
						<td>Số lượng</td>
						<td>Số tiền</td>
					</tr>
				</thead>
	 			<tfoot class="auto_check_pages">
					<tr>
						<td colspan="8">
							 <div class='pagination'>
						          <?php echo $this->pagination->create_links()?>
				        	 </div>
						</td>
					</tr>
				</tfoot>
				<tbody class="list_item">
					<?php foreach($list as $row):?>
					<tr>
						<td><div class="checker" id="uniform-undefined"><span><input type="checkbox" value="21" name="id[]" style="opacity: 0;"></span></div></td>
						<td class="textC"><?php echo $row->transaction_id?></td>
						<td>
							<?php echo $row->product_name?>
						</td>
						<td>
							<img style="width:80px; height: 60px" src="<?php echo base_url('upload/product/'.$row->image_link)?>" title="hình sản phẩm" alt="thanhbinh PC" />
						</td>
						<td>
							<?php echo $row->qty?>
						</td>
						<td class="textR red"><?php echo number_format($row->amount)?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
</div>
<div class="clear mt30"></div>