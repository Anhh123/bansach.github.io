<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo !empty($homepage->favicon) ? $homepage->favicon : ''?>" type="image/png" />
    <meta charset="utf-8" />
    <title>Book Store : Blog - Tin Tức</title>
    <!-- <title> <?php echo !empty($info->site_title) ? $info->site_title : $info->title ?> </title> -->
    <meta name="description" content="<?php echo !empty($homepage->site_desc) ? $homepage->site_desc : ''?>" />
    <meta name="keyword" content="<?php echo !empty($homepage->site_key) ? $homepage->site_key : ''?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="canonical" href="<?php echo base_url();?>" />
    <script src="<?php echo public_url('site/bookstore')?>/library/global/design/js/jquery.min.1.11.0.js"></script>
    <script src="<?php echo public_url('site/bookstore')?>/library/global/design/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('site/bookstore')?>/library/global/option_selection.js" type='text/javascript'></script>
    <script src="<?php echo public_url('site/bookstore')?>/library/global/api.jquery.js" type='text/javascript'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/global/design/member/fonts/robotoslab.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo public_url('site/bookstore')?>/library/global/design/css/bootstrap.3.3.1.css">
    <!-- Latest compiled and minified JavaScript -->
    <link href="<?php echo public_url('site/bookstore')?>/library/global/design/plugins/font-awesome/4.6.3/css/font-awesome.min.css" rel='stylesheet' type='text/css'  media='all'  />
    <link href="<?php echo public_url('site/bookstore')?>/library/slicknav.css" rel='stylesheet' type='text/css'  media='all'  />
    <script src="<?php echo public_url('site/bookstore')?>/library/jquery.slicknav.min.js" type='text/javascript'></script>
    <link href="<?php echo public_url('site/bookstore')?>/library/owl.carousel.css" rel='stylesheet' type='text/css'  media='all'  />
    <link href="<?php echo public_url('site/bookstore')?>/library/owl.theme.css" rel='stylesheet' type='text/css'  media='all'  />
    <!-- Search -->
    <link rel="stylesheet" href="<?php echo public_url('site/bookstore')?>/library/jquery-ui-1.8.16.custom.css" type="text/css">
    <script src="<?php echo public_url('site/bookstore')?>/library/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {
          $("#text-search").autocomplete({
              source: "<?php echo site_url('product/search/1')?>",
          });
      });
    </script>

    <link href="<?php echo public_url('site/bookstore')?>/library/styles.css" rel='stylesheet' type='text/css'  media='all'  />
    <link rel="stylesheet" href="<?php echo public_url('dathang')?>/css/vinastar.css">
    <link href="<?php echo public_url('site/bookstore')?>/library/binbi.css" rel='stylesheet' type='text/css'  media='all'  />

    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/component.css" />
</head>
<body>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>