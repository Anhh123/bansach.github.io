<!-- head -->
<?php $this->load->view('admin/ads/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
   	<!-- Form -->
	<form enctype="multipart/form-data" method="post" action="<?php echo admin_url('ads/add')?>" id="form" class="form">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
					<h6>Thêm mới Banner</h6>
				</div>
				<div class="tab_container">
					<div class="tab_content pd0" id="tab1" style="display: block;">
						<div class="formRow">
							<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="name"></span>
								<span class="autocheck" name="name_autocheck"></span>
								<div class="clear error" name="name_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label for="param_name" class="formLeft">Vị trí:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" _autocheck="true" id="param_vi_tri" name="vi_tri"></span>
								<span class="autocheck" name="name_autocheck"></span>
								<div class="clear error" name="name_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Hình ảnh icon:<span class="req">*</span></label>
							<div class="formRight">
							    <div class="left">
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
							<label for="param_name" class="formLeft">Link liên kết:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input type="text" _autocheck="true" id="param_href" name="href"></span>
								<span class="autocheck" name="name_autocheck"></span>
								<div class="clear error" name="name_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow hide"></div>
					</div>
				</div>
				<!-- End tab_container-->
        		<div class="formSubmit">
           			<input type="submit" class="redB" value="Thêm mới">
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>
