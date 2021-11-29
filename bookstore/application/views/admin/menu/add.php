<!-- head -->
<?php $this->load->view('admin/menu/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
  <div class="widget">
    <div class="title">
		 <h6>Thêm mới menu</h6>
	  </div>
    <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
      <fieldset>
        <div class="formRow">
        	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
        	<div class="formRight">
        		<span class="oneTwo"><input type="text" _autocheck="true" id="param_title" value="<?php echo set_value('title')?>" name="title"></span>
        		<span class="autocheck" name="title_autocheck"></span>
        		<div class="clear error" name="title_error"><?php echo form_error('title')?></div>
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
        <div class="formRow">
          <label for="param_name" class="formLeft">Seo title:</label>
          <div class="formRight">
            <span class="oneTwo">
            <input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('site_title')?>" name="site_title">
            <p>Nếu không nhập sẽ tự động lấy tên sản phẩm làm title</p>
            </span>
            <span class="autocheck" name="name_autocheck"></span>
            <div class="clear error" name="name_error"><?php echo form_error('site_title')?></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label for="param_meta_desc" class="formLeft">Meta description:</label>
          <div class="formRight">
            <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"></textarea></span>
            <span class="autocheck" name="meta_desc_autocheck"></span>
            <div class="clear error" name="meta_desc_error"><?php echo form_error('meta_desc')?></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label for="param_meta_desc" class="formLeft">Meta keyword:</label>
          <div class="formRight">
            <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_key"></textarea></span>
            <span class="autocheck" name="meta_key_autocheck"></span>
            <div class="clear error" name="meta_key_error"><?php echo form_error('meta_key')?></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
        	<label for="param_name" class="formLeft">Menu cha:</label>
        	<div class="formRight">
        		<span class="oneTwo">
            		<select _autocheck="true" id="param_parent_id"  name="parent_id">
            		  <option value="0">Là menu cha</option>
            		    <?php foreach ($list as $row):?>
            		  <option value="<?php echo $row->id?>"><?php echo $row->title?></option>
            		    <?php endforeach;?>
            		</select>
        		</span>
        		<span class="autocheck" name="parent_id_autocheck"></span>
        		<div class="clear error" name="parent_id_error"><?php echo form_error('parent_id')?></div>
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
                var deleteSure = confirm("Báº¡n cháº¯c cháº¯n muá»‘n xÃ³a");

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
        	<label for="param_name" class="formLeft">Thứ tự hiển thị:</label>
        	<div class="formRight">
        		<span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?php echo set_value('sort_order')?>" name="sort_order"></span>
        		<span class="autocheck" name="sort_order_autocheck"></span>
        		<div class="clear error" name="sort_order_error"><?php echo form_error('sort_order')?></div>
        	</div>
        	<div class="clear"></div>
        </div>
        <div class="formSubmit">
     			<input type="submit" class="redB" value="Thêm mới">
     	 </div>
      </fieldset>
    </form>
  </div>
</div>
