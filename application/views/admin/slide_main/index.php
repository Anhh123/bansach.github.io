<!-- head -->
<?php $this->load->view('admin/slide_main/head', $this->data)?>

<div class="line"></div>

<div id="main_slide" class="wrapper">
	<div class="widget">
	<?php $this->load->view('admin/message')?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách Slide Main
			</h6>

		 	<div class="num f12">Số lượng: <b><?php echo count($slide_main)?></b></div>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tiêu đề</td>
					<td style="width:75px;">Thứ tự</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a url="<?php echo admin_url('slide_main/delete_all')?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>

								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
			     <?php foreach ($slide_main as $row):?>
			     <tr class="row_<?php echo $row->id?>">
					<td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
					<td class="textC"><?php echo $row->id?></td>
					<td>
					<div class="image_thumb">
						<img height="50" src="<?php echo $row->image_link?>">
						<div class="clear"></div>
					</div>
					
					<a target="_blank" title="" class="tipS" href="">
					    <b><?php echo $row->name?></b>
					</a>
					
					</td>
					<td><?php echo $row->sort_order?></td>
					
					<td class="option textC">
						 <a title="Xem chi tiết link" class="tipS" target="_blank" href="<?php echo $row->link?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
						 </a>
						 
						 <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('slide_main/edit/'.$row->id)?>">
							<img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
						</a>
						
						<a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('slide_main/del/'.$row->id)?>">
						    <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
						</a>
					</td>
				</tr>
				<?php endforeach;?>
		   </tbody>
			
		</table>
	</div>
	
</div>


