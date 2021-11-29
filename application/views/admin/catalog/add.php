<!-- head -->
<?php $this->load->view('admin/catalog/head', $this->data)?>

<div class="line"></div>
<div class="wrapper">
  <div class="widget">
    <div class="title">
			<h6>Thêm mới danh mục sản phẩm</h6>
		</div>
    <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
      <fieldset>
        <div class="formRow">
        	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
        	<div class="formRight">
        		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('name')?>" name="name"></span>
        		<span class="autocheck" name="name_autocheck"></span>
        		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
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
          <label for="param_meta_key" class="formLeft">Intro editor:</label>
          <div class="formRight">
            <span class="">
            <textarea class="tong_quan" id="tong_quan" name="intro"><?php echo set_value('intro'); ?></textarea>
            </span>
            <div class="clear error" name="meta_key_error"></div>
          </div>
          <div class="clear"></div>
        </div>

        <script>CKEDITOR.replace( 'tong_quan' );</script>

        <div class="formRow">
        	<label for="param_name" class="formLeft">Danh mục cha:</label>
        	<div class="formRight">
        		<span class="oneTwo">
            	<select _autocheck="true" id="param_parent_id"  name="parent_id">
            		<option value="0">Là danh mục cha</option>
                  <?php foreach ($list as $row):?>
                  <?php if(count($row->subs) > 0):?>
        		    <option value="<?php echo $row->id?>" style="font-weight: bold;text-transform: uppercase;"><?php echo $row->name?></option>
                  <?php foreach($row->subs as $value):?>
                <option value="<?php echo $value->id?>" style="font-size:95%"><?php echo '--' .$value->name?></option>
                  <?php endforeach;?>
        		      <?php else:?>
                <option value="<?php echo $row->id?>" style="font-weight: bold;text-transform: uppercase;"><?php echo $row->name?></option>
                  <?php endif;?>
                  <?php endforeach;?>
            	</select>
        		</span>
        		<span class="autocheck" name="parent_id_autocheck"></span>
        		<div class="clear error" name="parent_id_error"><?php echo form_error('parent_id')?></div>
        	</div>
        	<div class="clear"></div>
        </div>

        <div class="formRow">
          <label for="param_name" class="formLeft">Chọn vị trí hiển thị ra trang chủ:<span class="req">*</span></label>
          <div class="formRight">
            <span class="oneTwo">
              <select _autocheck="true" id="param_parent_id" name="status">
                <option value="0">Không hiển thị</option>
                <option value="1">vị trí 1</option>
                <option value="2">vị trí 2</option>
                <option value="3">vị trí 3</option>
                <option value="4">vị trí 4</option>
                <option value="5">vị trí 5</option>
                <option value="6">vị trí 6</option>
                <option value="7">vị trí 7</option>
                <option value="8">vị trí 8</option>
                <option value="9">vị trí 9</option>
              </select>
            </span>
            <span class="autocheck" name="name_autocheck"></span>
            <div class="clear error" name="name_error"><?php echo form_error('name')?></div>
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
          <label class="formLeft">Hình ảnh banner:<span class="req">size : 960 X 234</span></label>
          <div class="formRight">
            <div class="left">
                <input type="text" name="banner" id="banner" value="" size="50">
            </div>
            <input type="button" id="btn-browse-image" datainput="banner" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
            <input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
            <div class="clear error" name="image_error"></div>
          </div>
          <div class="clear"></div>
          <script>
            jQuery(document).ready(function($) {
              $( document ).on( 'click', '#btn-delete-image', function() {
                var deleteSure = confirm("B&#7841;n ch&#7855;c ch&#7855;n mu&#7889;n xóa");
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
        	<label for="param_name" class="formLeft">Thứ tự hiển thị menu bên trái:</label>
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