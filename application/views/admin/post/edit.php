<!-- head -->

<?php $this->load->view('admin/post/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
    
      <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
      <fieldset>
        <div class="widget">
            <div class="title">
            <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
            <h6>Thêm mới bài viết</h6>
          </div>
          
            <ul class="tabs">
                    <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
                    <li class=""><a href="#tab2">SEO Onpage</a></li>
                    <li class=""><a href="#tab3">Nội Dung</a></li>
                    
          </ul>
          
          <div class="tab_container">
               <div class="tab_content pd0" id="tab1" style="display: block;">
<div class="formRow">
  <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
  <div class="formRight">
    <span class="oneTwo"><input type="text" value="<?php echo $info->title ?>" _autocheck="true" id="param_name" name="title"></span>
    <span class="autocheck" name="title_autocheck"></span>
    <div class="clear error" name="title_error"><?php echo form_error('title')?></div>
  </div>
  <div class="clear"></div>
</div>

<div class="formRow">
  <label for="param_name" class="formLeft">Slug:</label>
  <div class="formRight">
    <span class="oneTwo"><input type="text" value="<?php echo $info->slug ?>" _autocheck="true" id="param_name" name="slug"></span>

    <span class="autocheck" name="name_autocheck"></span>
    <div class="clear error" name="name_error"><?php echo form_error('slug')?></div>
  </div>
  <p class="formRight">Nhập slug nếu muốn thay đổi</p>
  <div class="clear"></div>
</div>

<div class="formRow">
    <label for="param_name" class="formLeft">Đặt làm bài viết nổi bật: </label>
    <div class="formRight">
      <select name="status" id="status">
        <option value="0" <?php echo ($info ->status == 0) ? 'selected' : ''?>>Không</option>
        <option value="1" <?php echo ($info ->status == 1) ? 'selected' : ''?>>Có</option>
      </select>
    <div class="clear error" name="name_error"></div>
    </div>
    <div class="clear"></div>
  </div>

<div class="formRow">
  <label class="formLeft">Ảnh đại diện:<span class="req">*</span></label>
  <div class="formRight">
    <div class="left">
        <!-- <input type="file" name="image" id="image" size="25"> -->
        <input type="text" name="image" id="image" value="<?php echo !empty($info->image_link) ? $info->image_link : ''?>" size="50">
    </div>
    <input type="button" id="btn" datainput="image" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
    <input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">

    <div class="clear error" name="image_error"><?php echo form_error('image')?></div>
  </div>
  <div class="clear"></div>
</div>
<?php $image_list = json_decode($info->image_list);?>
<div class="formRow">
  <label class="formLeft">Ảnh kèm theo:</label>
<?php if(count($image_list) > 0):?>
  <?php foreach($image_list as $img):?>
  <div class="formRight">
    <div class="left">
        <!-- <input type="file" name="image" id="image" size="25"> -->
        <input type="text" name="image_list[]" id="image_list1" value="<?php echo $img;?>" size="50">
        <!-- <p>Để hiển thị tốt kích thước ảnh tối thiểu 720 X 960</p> -->
    </div>
    <input type="button" id="btn" datainput="image_list1" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
    <input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
    <div class="clear error" name="image_list_error"></div>
  </div>
<?php endforeach;?>
<?php endif;?>
  <span class="add-image btn-add-image">Add image</span>
  <div class="clear"></div>
</div>
<script>
  jQuery(document).ready(function($) {
    var idInput = 1;
    jQuery('.btn-add-image').on('click',function(){
      var inputAdd = jQuery(this).parent().find('.formRight').eq(0).clone(true);
      var lastIdInput = inputAdd.find('input[type=text]').attr('id');
      lastIdInput = lastIdInput.replace(/[^0-9]/g,'');
      lastIdInput = parseInt(lastIdInput) + idInput;
      
      inputAdd.find('input[type=text]').attr('id','image_list'+lastIdInput);
      inputAdd.find('input[type=button]').attr('datainput','image_list'+lastIdInput);
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

<div class="formRow">
  <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
  <div class="formRight">
      <select name="menu"  class="left" >
      <option value=""></option>
        <!-- kiem tra danh muc co danh muc con hay khong -->
        <?php foreach ($menu as $row):?>
        <?php if(count($row->sub_menu) >= 1):?>
          <optgroup label="<?php echo $row->title?>">
              <?php foreach ($row->sub_menu as $sub):?>
                <option value="<?php echo $sub->id?>" <?php echo ($info->id == $sub->id) ? 'selected' : '' ?>> <?php echo $sub->title?> </option>
              <?php endforeach;?>
              </optgroup>
              <?php else:?>
                <option style="font-weight: bold" value="<?php echo $row->id?>" <?php echo ($info->id == $row->id) ? 'selected' : ''?>><?php echo $row->title?></option>
              <?php endif;?>
              <?php endforeach;?>
    </select>
    <span class="autocheck" name="cat_autocheck"></span>
    <div class="clear error" name="cat_error"><?php echo form_error('menu')?></div>
  </div>
  <div class="clear"></div>
</div>

<div class="formRow hide"></div>
 </div>
 
 <div class="tab_content pd0" id="tab2" style="display: none;">
                    
<div class="formRow">
  <label for="param_site_title" class="formLeft">Title:</label>
  <div class="formRight">
    <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"><?php echo !empty($info->site_title) ? $info->site_title : '' ?></textarea></span>
    <span class="autocheck" name="site_title_autocheck"></span>
    <div class="clear error" name="site_title_error"></div>
  </div>
  <div class="clear"></div>
</div>

<div class="formRow">
  <label for="param_meta_desc" class="formLeft">Meta description:</label>
  <div class="formRight">
    <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"><?php echo !empty($info->meta_desc) ? $info->meta_desc : '' ?></textarea></span>
    <span class="autocheck" name="meta_desc_autocheck"></span>
    <div class="clear error" name="meta_desc_error"></div>
  </div>
  <div class="clear"></div>
</div>

<div class="formRow">
  <label for="param_meta_key" class="formLeft">Meta keywords:</label>
  <div class="formRight">
    <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"><?php echo !empty($info->meta_key) ? $info->meta_key : '' ?></textarea></span>
    <span class="autocheck" name="meta_key_autocheck"></span>
    <div class="clear error" name="meta_key_error"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow hide"></div>
     </div>        
<div class="tab_content pd0" id="tab3" style="display: none;">
    <div class="formRow">
      <label class="formLeft">Nội Dung:</label>
      <div class="formRight">
        <textarea class="editor" id="param_content" name="content"><?php echo !empty($info->content) ? $info->content : ''?></textarea>
        <div class="clear error" name="content_error"></div>
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
