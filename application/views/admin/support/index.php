<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('site/message', $this->data);?>
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>Danh mục thông tin Hỗ Trợ</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:80px;">Mã số</td>
					<td>Tiêu đề</td>
					<td>Link</td>
					<td>Thứ tự hiển thị</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a url="<?php echo admin_url('suppport/delete_all')?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
					<td class="textC"><?php echo $row->id?></td>
					<td>
					<span title="<?php echo $row->name?>" class="tipS">
						<?php echo $row->name?>				
					</span></td>
					<td><span title="<?php echo $row->link?>" class="tipS">
						<?php echo $row->link?>					
					</span></td>

					<td><span title="<?php echo $row->sort_order?>" class="tipS">
						<?php echo $row->sort_order?>					
					</span></td>
					<td class="option">
						<a href="<?php echo admin_url('support/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
						   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
						</a>
						<a href="<?php echo admin_url('support/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
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
