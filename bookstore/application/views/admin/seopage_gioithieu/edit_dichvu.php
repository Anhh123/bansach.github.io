<!-- head -->
<br></br>

<div class="line"></div>

<div class="wrapper">
    
	   	<!-- Form -->
		<form enctype="multipart/form-data" method="post" action="" id="form" class="form">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
						<h6>Chỉnh sữa thông tin seo trang dịch vụ</h6>
					</div>
							
	<div class="tab_container">
				<div class="tab_content pd0" id="tab1" style="display: block;">
<div class="formRow">
  <label class="formLeft">Ảnh favicon:<span class="req">*</span></label>
  <div class="formRight">
    <div class="left">
        <!-- <input type="file" name="image" id="image" size="25"> -->
        <input type="text" name="favicon" id="favicon" value="<?php echo $info->favicon ?>" size="50">
        
        <?php if($info->favicon != ''): ?>
        <img src="<?php echo $info->favicon ?>" width="100px" alt=""  style="display: block">
        <?php endif ?>
    </div>
    <input type="button" id="btn-browse-image" datainput="favicon" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
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
		<label for="param_name" class="formLeft">Site_title:<span class="req">*</span></label>
		<div class="formRight">
			<span class="oneTwo">
			<input type="text" _autocheck="true" id="param_site_title" name="site_title" value="<?php echo $info->site_title?>">
			</span>
			<span class="autocheck" name="name_autocheck"></span>
			<div class="clear error" name="name_error"><?php echo form_error('site_title')?></div>
		</div>
		<div class="clear"></div>
		</div>
			
			<div class="formRow">
				<label for="param_name" class="formLeft">Site_description:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
					<input type="text" _autocheck="true" id="param_site_desc" name="site_desc" value="<?php echo $info->site_desc?>">
					</span>
					<span class="autocheck" name="name_autocheck"></span>
					<div class="clear error" name="name_error"><?php echo form_error('site_desc')?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label for="param_name" class="formLeft">Site_keyword:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
					<input type="text" _autocheck="true" id="param_site_key" name="site_key" value="<?php echo $info->site_key?>">
					</span>
					<span class="autocheck" name="name_autocheck"></span>
					<div class="clear error" name="name_error"><?php echo form_error('site_key')?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow hide"></div>

			</div>				
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
