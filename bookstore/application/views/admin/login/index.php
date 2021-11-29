<html>
    <title>Form Đăng Nhập</title>
    <link rel="icon" href="<?php echo public_url('admin')?>/images/icon_.png">
    <head>
         <?php $this->load->view('admin/head');?>
         <style>
             div img.logovina{ width: 320px; padding-top: 70px; }
         </style>
    </head>

    <body class="nobg loginPage" style="min-height:100%;">
        <div style="text-align: center;">
            <img class="logovina" src="<?php echo public_url('admin')?>/images/Book-header.png" /> <!-- Logo -->
        </div>
         <div style="top:45%;" class="loginWrapper">
    	    <div style="height:auto; margin:auto;" id="admin_login" class="widget">
    	        <div class="title"><img class="titleIcon" alt="" src="<?php echo public_url('admin') ?>/images/icon_.png">
    	        	<h6>Đăng Nhập</h6>
    	        </div>
    	        <form method="post" action="" id="form" class="form">
    	           <fieldset>
    	                <div class="formRow">
    	                    <label for="param_username">Tên đăng nhập:</label>
    	                    <div class="loginInput"><input type="text" id="param_username" name="username"></div>
    	                    <div class="clear"></div>
    	                </div>
    	                <div class="formRow">
    	                    <label for="param_password">Mật khẩu:</label>
    	                    <div class="loginInput"><input type="password" id="param_password" name="password"></div>
    	                    <div class="clear"></div>
    	                </div>
    	                <div class="loginControl">
    	                    <div style="color:red;font-weight:blod;text-align:center"><?php echo form_error('login');?></div>
    	                    <input type="hidden" value="1" name="submit">
    	                    <input type="submit" class="dredB logMeIn" value="Đăng nhập">
    	                    <div class="clear"></div>
    	                </div>
    	            </fieldset>
    	        </form>
    	    </div>
	    </div>
    	<?php $this->load->view('admin/footer')?>
    </body>
</html>
