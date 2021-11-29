<!-- head -->
<?php $this->load->view('admin/menu/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('site/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon">
			<div class="checker" id="uniform-titleCheck">
    			<span>
    			   <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
    			</span>
			</div>
			</span>
			<h6>Danh sách Menu</h6>
		 	<div class="num f12">Tổng số: <b><?php echo count($list_menu)?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;">Mã số</td>
					<td style="width:80px;">Thư tự</td>
					<td>Tên menu</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				
			</tfoot>
 			
			<tbody>
			<?php foreach ($menu_parent as $row):?>
			<?php if(count($row->menu_sub) > 0):?>
			<tr class="row_<?php echo $row->id?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id?>" /></td>
						
						<td class="textC"><?php echo $row->id?></td>

                        <td class="textC"><?php echo $row->sort_order?></td>
                        
						<td>
						<span title="<?php echo $row->title?>" class="tipS" style="font-weight: bold">
							<?php echo $row->title?>				
						</span>
						</td>
						<td class="option">
							<a href="<?php echo admin_url('menu/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('menu/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>

				<?php foreach($row->menu_sub as $sub):?>
					<tr class="">
						<td><input type="checkbox" name="id[]" value="<?php echo $sub->id?>" /></td>
						
						<td class="textC"><?php echo $sub->id?></td>

                        <td class="textC"><?php echo $sub->sort_order?></td>
                        
						<td>
						<span class="tipS" style="padding-left:40px">
							<?php echo $sub->title?>				
						</span>
						</td>
						<td class="option">
							<a href="<?php echo admin_url('menu/edit/'.$sub->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('menu/delete/'.$sub->id)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
				<?php endforeach;?>
						

				<?php else:?>
					<tr class="row_<?php echo $row->id?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id?>" /></td>
						
						<td class="textC"><?php echo $row->id?></td>

                        <td class="textC"><?php echo $row->sort_order?></td>
                        
						<td>
						<span title="<?php echo $row->title?>" class="tipS" style="font-weight: bold">
							<?php echo $row->title?>				
						</span>
						</td>
						<td class="option">
							<a href="<?php echo admin_url('menu/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('menu/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>

				<?php endif;?>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
