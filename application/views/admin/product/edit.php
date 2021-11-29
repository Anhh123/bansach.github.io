<!-- head -->
<?php $this->load->view('admin/product/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
   	<!-- Form -->
	<form enctype="multipart/form-data" method="post" action="" id="form" class="form">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
					<h6>Cập nhật Sản phẩm</h6>
				</div>
			    <ul class="tabs">
	                <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
	                <li class=""><a href="#tab2">SEO Onpage</a></li>
	                <li class=""><a href="#tab3">Nội dung</a></li>
				</ul>
				<div class="tab_container">
				     <div class="tab_content pd0" id="tab1" style="display: block;">
				     	<!-- Name -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $product->name?>" name="name"></span>
								<span class="autocheck" name="name_autocheck"></span>
								<div class="clear error" name="name_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Seo title -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Slug:</label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo $product->slug ?>" _autocheck="true" id="param_name" name="slug"></span>
								<span class="autocheck" name="name_autocheck"></span>
								<div class="clear error" name="name_error"><?php echo form_error('slug')?></div>
							</div>
							<p class="formRight">Nhập slug nếu muốn thay đổi</p>
							<div class="clear"></div>
						</div>

						<!-- Image -->
						<div class="formRow">
							<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
							<div class="formRight">
								<div class="left">
						    		<input type="text" name="image" id="image" value="<?php echo $product->image_link ?>" size="50">
						    		<p style="color: red">Để hiển thị tốt kích thước ảnh tối thiểu 720 X 960 !</p>
						    		<?php if($product->image_link != ''): ?>
						    		<img src="<?php echo $product->image_link ?>" width="100px" alt=""  style="display: block">
							    	<?php endif ?>
								</div>
								<input type="button" id="btn-browse-image" datainput="image" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
								<input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
								<div class="clear error" name="image_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<?php $image_list = json_decode($product->image_list);?>

						<!-- Tác giả -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Tác giả:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo $product->tac_gia ?>" _autocheck="true" id="param_name" name="tac_gia"></span>
								<span class="autocheck" name="tac_gia_autocheck"></span>
								<div class="clear error" name="tac_gia_error"><?php echo form_error('tac_gia')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Image_2 -->
						<div class="formRow">
							<label class="formLeft">Ảnh kèm theo:</label>
							<?php if(count($image_list) > 0): ?>
							<?php foreach ($image_list as $key => $value) :?>
							<div class="formRight">
								<div class="left">
						    		<input type="text" name="image_list[]" id="<?php echo 'image_list' . $key ?>" value="<?php echo $value ?>" size="50">
						    		<img src="<?php echo $value ?>" width="100px" alt=""  style="display: block">
								</div>
								<input type="button" id="btn-browse-image" datainput="<?php echo 'image_list' . $key ?>" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
								<input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
								<div class="clear error" name="image_list_error"></div>
							</div>
							<?php endforeach;endif; ?>
							<span class="add-image btn-add-image">Add image</span>
							<div class="clear"></div>
						</div>
						<script>
							jQuery(document).ready(function($) {
								var idInput = 1;
								jQuery('.btn-add-image').on('click',function(){
									var inputAdd = jQuery(this).parent().find('.formRight').last().clone(true);
									var lastIdInput = inputAdd.find('input[type=text]').attr('id');
									lastIdInput = lastIdInput.replace(/[^0-9]/g,'');
									lastIdInput = parseInt(lastIdInput) + idInput;
									inputAdd.find('input[type=text]').attr('id','image_list'+lastIdInput);
									inputAdd.find('input[type=button]').attr('datainput','image_list'+lastIdInput);
									inputAdd.find('img').remove();
									inputAdd.find('input[type=text]').attr('value','');
									inputAdd.insertBefore(this);
									idInput++;
								});

								$( document ).on( 'click', '#btn-delete-image', function() {
									var deleteSure = confirm("Bạn chắc chắn muốn xóa");

									if (deleteSure == true) {
										console.log(jQuery(this).parent().parent().find('.formRight'));
									  if(jQuery(this).parent().parent().find('.formRight').length == 1){
									  	jQuery(this).parent().find('img').remove();
									  	jQuery(this).parent().find('input[type=text]').attr('value','');
									  }
									  else
									  	jQuery(this).parent().remove();
									}
								});
							});
						</script>

						<!-- Price -->
						<div class="formRow">
							<label for="param_price" class="formLeft">
								Giá :
							</label>
							<div class="formRight">
								<span class="oneTwo">
									<input type="text" value="<?php echo $product->price?>" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price">
									<img src="<?php echo public_url('admin')?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá gốc">
								</span>
								<span class="autocheck" name="price_autocheck"></span>
								<div class="clear error" name="price_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Giảm giá -->
						<div class="formRow">
							<label for="param_price" class="formLeft">
								Giảm Giá :
							</label>
						    <div class="formRight">
								<span class="oneTwo">
									<input type="text" value="<?php echo $product->discount; ?>" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="discount">
									<img src="<?php echo public_url('admin')?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
								</span>
								<span class="autocheck" name="price_autocheck"></span>
								<div class="clear error" name="price_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Status -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Tình trạng:<span class="req">*</span></label>
							<div class="formRight">
								<select name="status" id="status">
									<option value="0" <?php echo ($product->status == 0) ? 'selected' : ''?>>Còn hàng</option>
									<option value="1" <?php echo ($product->status == 1) ? 'selected' : ''?>>Hết hàng</option>
								</select>
								<div class="clear error" name="hsx_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Thể loại -->
						<div class="formRow">
							<label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
							<div class="formRight">
							    <select name="catalog"  class="left" >
									<option value=""></option>
										<!-- kiem tra danh muc co danh muc con hay khong -->
										<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 0):?>
						  				<optgroup label="<?php echo mb_strtoupper($row->name,'utf-8');?>">
						  				    <?php foreach ($row->subs as $sub):?>
						  				    	<?php if(count($sub->sub2) > 0):?>
						           			<optgroup label="<?php echo '--'.$sub->name;?>">
						           			     <?php foreach($sub->sub2 as $value):?>
						           			     	<option value="<?php echo $value->id?>" style="font-size:90%" <?php if($product->catalog_id == $value->id) echo 'selected'?>> <?php echo '---'.$value->name?> </option>
						           			     <?php endforeach;?>
						           			</optgroup>
						           			    <?php else:?>
						           			<option value="<?php echo $sub->id?>" <?php if($product->catalog_id == $sub->id) echo 'selected'?>> <?php echo $sub->name?> </option>
						           			    <?php endif;?>
							                <?php endforeach;?>
						           		</optgroup>
						           		<?php else:?>
						           		  <option value="<?php echo $row->id?>" style="text-transform: uppercase;" <?php if($product->catalog_id == $row->id) echo 'selected'?>><?php echo $row->name?></option>
						           		<?php endif;?>
						           		<?php endforeach;?>
								</select>
								<span class="autocheck" name="cat_autocheck"></span>
								<div class="clear error" name="cat_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Xuất bản -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Xuất bản:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->xuat_ban) ? $product->xuat_ban : ''?>" _autocheck="true" id="param_name" name="xuat_ban"></span>
								<span class="autocheck" name="xuat_ban_autocheck"></span>
								<div class="clear error" name="xuat_ban_error"><?php echo form_error('xuat_ban')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Nhà xuất bản -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Nhà xuất bản:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->nxb) ? $product->nxb : ''?>" _autocheck="true" id="param_name" name="nxb"></span>
								<span class="autocheck" name="nxb_autocheck"></span>
								<div class="clear error" name="nxb_error"><?php echo form_error('nxb')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Nhà phát hành -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Nhà phát hành:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->nph) ? $product->nph : ''?>" _autocheck="true" id="param_name" name="nph"></span>
								<span class="autocheck" name="nph_autocheck"></span>
								<div class="clear error" name="nph_error"><?php echo form_error('nph')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Dạng bìa -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Dạng bìa:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->dang_bia) ? $product->dang_bia : ''?>" _autocheck="true" id="param_name" name="dang_bia"></span>
								<span class="autocheck" name="dang_bia_autocheck"></span>
								<div class="clear error" name="dang_bia_error"><?php echo form_error('dang_bia')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Kích thước -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Kích thước:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->kich_thuoc) ? $product->kich_thuoc : ''?>" _autocheck="true" id="param_name" name="kich_thuoc"></span>
								<span class="autocheck" name="kich_thuoc_autocheck"></span>
								<div class="clear error" name="kich_thuoc_error"><?php echo form_error('kich_thuoc')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Khối lượng -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Khối lượng:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->khoi_luong) ? $product->khoi_luong : ''?>" _autocheck="true" id="param_name" name="khoi_luong"></span>
								<span class="autocheck" name="khoi_luong_autocheck"></span>
								<div class="clear error" name="khoi_luong_error"><?php echo form_error('khoi_luong')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Số trang -->
						<div class="formRow">
							<label for="param_name" class="formLeft">Số trang:</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" value="<?php echo !empty($product->so_trang) ? $product->so_trang : ''?>" _autocheck="true" id="param_name" name="so_trang"></span>
								<span class="autocheck" name="so_trang_autocheck"></span>
								<div class="clear error" name="so_trang_error"><?php echo form_error('so_trang')?></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label for="param_warranty" class="formLeft">
								Đặt làm sản phẩm nổi bật :
							</label>
							<div class="formRight">
								<select name="noi_bat" id="noi_bat">
									<option value="0" <?php echo ($product->noi_bat == 0) ? 'selected' : ''?>>Không</option>
									<option value="1" <?php echo ($product->noi_bat == 1) ? 'selected' : ''?>>Có</option>
								</select>
								<div class="clear error" name="hsx_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow hide"></div>
					</div>

					<div class="tab_content pd0" id="tab2" style="display: none;">

						<div class="formRow">
							<label for="param_site_title" class="formLeft">Title:</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"><?php echo !empty($product->site_title) ? $product->site_title : '' ?></textarea></span>
								<span class="autocheck" name="site_title_autocheck"></span>
								<div class="clear error" name="site_title_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label for="param_meta_desc" class="formLeft">Meta description:</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"><?php echo !empty($product->meta_desc) ? $product->meta_desc : '' ?></textarea></span>
								<span class="autocheck" name="meta_desc_autocheck"></span>
								<div class="clear error" name="meta_desc_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label for="param_meta_key" class="formLeft">Meta keywords:</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"><?php echo !empty($product->meta_key) ? $product->meta_key : '' ?></textarea></span>
								<span class="autocheck" name="meta_key_autocheck"></span>
								<div class="clear error" name="meta_key_error"></div>
							</div>
							<div class="clear"></div>
						</div>

					    <div class="formRow hide"></div>
					</div>

					<div class="tab_content pd0" id="tab3" style="display: none;">
						<div class="formRow">
							<label for="param_meta_key" class="formLeft">Mô tả sản phẩm:</label>
							<div class="formRight">
								<span class="">
								<textarea class="content" id="content" name="content"><?php echo $product->content ?></textarea>
								</span>
								<div class="clear error" name="content_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<script>CKEDITOR.replace( 'content' );</script>
						<div class="formRow hide"></div>
					</div>
        		</div><!-- End tab_container-->

        		<div class="formSubmit">
           			<input type="submit" class="redB" value="Cập nhật">
           			<input type="reset" class="basic" value="Hủy bỏ">
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>
