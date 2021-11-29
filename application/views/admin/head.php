<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>.: Trang Quản Trị :.</title>

<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="<?php echo public_url('admin')?>/images/icon_.png" type="image/x-icon"/>
<!-- Fonts Google -->
<link href="https://fonts.googleapis.com/css?family=Orbitron:500,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo public_url('admin/crown') ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo public_url('admin')?>/css/css.css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php echo public_url('admin/crown')?>/css/font-awesome.min.css" media="screen" />

<script type="text/javascript">
	var admin_url 	= '';
	var base_url 	= '';
	var public_url 	= '';
</script>

<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/forms/jquery.inputlimiter.min.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown') ?>/js/custom.js"></script>

<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/scrollTo/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/number/jquery.number.min.js"></script>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/zclip/jquery.zclip.js"></script>

<script type="text/javascript" src="<?php echo public_url()?>/js/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo public_url()?>/js/jquery/colorbox/colorbox.css" media="screen" />

<script type="text/javascript" src="<?php echo public_url()?>/js/custom_admin.js" type="text/javascript"></script>

<script>
	var ckeditor_config = {
        base_url : '<?php echo $this->config->base_url('admin') ?>/',
        connector_path : 'ckfinder/gallery/connector',
        html_path : 'ckfinder/gallery/editorhtml'
    };
</script>
<script src="<?php echo $this->config->base_url() ?>public/ckfinder/ckfinder.js"></script>
<script src="<?php echo $this->config->base_url() ?>public/ckeditor/ckeditor.js"></script>
<script>
	function BrowseServer(event){

		// var a = event.target;
		var event  = jQuery(event).attr('datainput');

		// console.log(event);
		var finder = new CKFinder();
		finder.event = event;
		finder.basePath = '../';
		finder.selectActionFunction = SetFileField;
		finder.popup();
	}

	// This is a sample function which is called when a file is selected in CKFinder.
	function SetFileField( fileUrl ){

		// console.log(this.config.event);
		document.getElementById( this.config.event ).value = fileUrl;
	}

</script>