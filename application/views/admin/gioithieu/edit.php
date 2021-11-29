<!-- head -->
<?php $this->load->view('admin/tuyendung/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
    
	   	<!-- Form -->
		<form enctype="multipart/form-data" method="post" action="" id="form" class="form">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
						<h6>chỉnh sửa nội dung trang liên hệ</h6>
					</div>
<div class="tab_container">
<div class="tab_content pd0" id="tab1" style="display: block;">
		<div class="formRow">
        	<label class="formLeft">Nội dung chính:<span class="req">*</span></label>
        	<div class="formRight">
        		<textarea class="editor" id="content" name="content"><?php echo $gioithieu->content ?></textarea>
        		<div class="clear error" name="content_error"><?php echo form_error('content')?></div>
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
