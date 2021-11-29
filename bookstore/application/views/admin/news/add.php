<!-- head -->
<?php $this->load->view('admin/news/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
	   	<!-- Form -->
		<form enctype="multipart/form-data" method="post" action="<?php echo admin_url('news/add')?>" id="form" class="form">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
						<h6>Thêm mới bài viết tin tức</h6>
					</div>
					
				    <ul class="tabs">
		                <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
		                
					</ul>
					
					<div class="tab_container">
<div class="tab_content pd0" id="tab1" style="display: block;">
	<div class="formRow">
		<label for="param_name" class="formLeft">Tiêu đề:<span class="req">*</span></label>
		<div class="formRight">
			<span class="oneTwo"><input type="text" _autocheck="true" id="param_title" name="title"></span>
			<span class="autocheck" name="name_autocheck"></span>
			<div class="clear error" name="name_error"><?php echo form_error('title')?></div>
		</div>
		<div class="clear"></div>
</div>
	  <div class="formRow">
            <label for="param_name" class="formLeft">Slug:</label>
            <div class="formRight">
              <span class="oneTwo"><input type="text" value="<?php echo set_value('slug'); ?>" _autocheck="true" id="param_name" name="slug"></span>

              <span class="autocheck" name="name_autocheck"></span>
              <div class="clear error" name="name_error"><?php echo form_error('slug')?></div>
            </div>
            <p class="formRight">Nhập slug nếu muốn thay đổi</p>
            <div class="clear"></div>
       </div>

<div class="tab_content pd0" id="tab1" style="display: block;">
<div class="formRow">
		<label for="param_name" class="formLeft">Seo title:</label>
		<div class="formRight">
			<span class="oneTwo"><input type="text" _autocheck="true" id="param_title" name="site_title"></span>
			<span class="autocheck" name="site_title_autocheck"></span>
			<div class="clear error" name="site_title_error"><?php echo form_error('site_title')?></div>
		</div>
		<div class="clear"></div>
</div>

	<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left">
    		<!-- <input type="file" name="image" id="image" size="25"> -->
    		<input type="text" name="image" id="image" value="" size="50">
    		
		</div>
		<input type="button" id="btn-browse-image" datainput="image" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
		<input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
		<div class="clear error" name="image_error"></div>
		
	</div>
	<div class="clear"></div>
	<script>
		jQuery(document).ready(function($) {
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
</div>

	<div class="formRow">
		<label for="param_name" class="formLeft">Đặt làm tin tức nổi bật: </label>
		<div class="formRight">
			<select name="status" id="status">
				<option value="0">Không</option>
				<option value="1">Có</option>
			</select>
		<div class="clear error" name="name_error"></div>
		</div>
		<div class="clear"></div>
	</div>


<div class="formRow">
	<label for="param_meta_desc" class="formLeft">Meta description:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"></textarea></span>
		<span class="autocheck" name="meta_desc_autocheck"></span>
		<div class="clear error" name="meta_desc_error"></div>
	</div>
	<div class="clear"></div>
</div>


<div class="formRow">
	<label for="param_meta_key" class="formLeft">Meta keywords:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"></textarea></span>
		<span class="autocheck" name="meta_key_autocheck"></span>
		<div class="clear error" name="meta_key_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label for="param_meta_desc" class="formLeft">Nội dung Read More:</label>
	<div class="formRight">
		<textarea _autocheck="true" id="intro" name="intro"></textarea>
		<span class="autocheck" name="meta_desc_autocheck"></span>
		<div class="clear error" name="meta_desc_error"></div>
	</div>
	<div class="clear"></div>
</div>
<script>CKEDITOR.replace( 'intro' );</script>	
	<div class="formRow">
    	<label class="formLeft">Nội dung:</label>
    	<div class="formRight">
    		<textarea class="editor" id="content" name="content"></textarea>
    		<div class="clear error" name="content_error"></div>
    	</div>
    	<div class="clear"></div>
    </div>

				         
</div>
<script>CKEDITOR.replace( 'content' );</script>						 					
</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           			
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>
