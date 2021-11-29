<!DOCTYPE html>
<html lang="vi">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo !empty($info->site_title) ? $info->site_title : $info->title?></title>
    <meta name="description" content="<?php echo isset($info->meta_desc) ? $info->meta_desc : ''?>" />
    <link rel="shortcut icon" href="<?php echo $info->image_link?>" type="image/x-icon"/>
	

    <!-- Bootstrap -->
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/uikit.min.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/uikit.gradient.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/thanhbinhpc')?>/css/tooltipster.bundle.min.css" />
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/tooltip.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/sticky.min.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/dotnav.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/slidenav.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/slideshow.min.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/components/slider.min.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/flexslider.css" rel="stylesheet">
    <link href="<?php echo public_url('site/thanhbinhpc')?>/css/style.css" rel="stylesheet">
</head>
<body>
	<header id="header" class="header">
			<section class="header-inner">
          <div class="head-top">
            
           
          </div>
           <!--End head-top-->
          <div class="bottom-head">
              <div class="uk-container uk-container-center">
                  <div class="uk-grid">
                      <div class="uk-width-large-1-5">
                         <figure class="top-logo" data-uk-scrollspy="{cls:'uk-animation-slide-left'}">
                          <p>
                            <a href="index.html">
                              <img src="<?php echo public_url('site/thanhbinhpc')?>/images/logo.png" alt="logo">
                            </a>
                          </p>  
                         </figure>
                      </div>
                      <div class="uk-width-large-3-5">
                         <div class="ht-search-form" data-uk-scrollspy="{cls:'uk-animation-slide-top'}" >
                            <form class="uk-search" action="<?php echo base_url('product/search')?>" method="get">
                               <input class="int-search-form" type="search" name="key-search" placeholder="Nhập từ khóa cần tìm..." required="">
                               <button type="submit" class="btn-search" id="btn-search" name="Gửi"><i class="uk-icon-search"></i> Tìm kiếm</button>   
                            </form>
                         </div>
                      </div>
                      <div class="uk-width-1-5 no-padding">
                         <div class="shopping-cart uk-hidden-medium uk-hidden-small" data-uk-scrollspy="{cls:'uk-animation-slide-right'}">
                            <div class="box-online">
                              <ul class="online">
                                <li>
                                <a href="tel:0<?php echo !empty($homepage->hotline) ? $homepage->hotline : ''?>"><span><i class="fa fa-phone" aria-hidden="true"></i></span>Hotline
                                </a>
                                </li>
                              </ul>
                            </div>
                            <!-- End box-online-->
                         </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End bottom-head-->
        </section>
		
	<div id="main">
		<div class="content">
			<div class="nav-menu" data-uk-sticky="">
				<?php $this->load->view('site/menu')?>
			</div>

			<div class="uk-container uk-container-center">
				<div class="uk-container uk-container-center">
					<div class="main-top uk-grid uk-grid-small">
					
						<div class="breadcrumb">
                      <ul class="uk-breadcrumb">
                          <li><a href=""><i class="uk-icon-home"></i></a></li>
                          <li><a href="<?php echo base_url('gioi-thieu')?>">Giới Thiệu</a></li>
                          <li class="uk-active"><span><?php echo $info->title?></span></li>
                        </ul>
            </div>

						<div class="menu-left uk-width-large-2-10">
							<?php $this->load->view('site/menu_left',$this->data)?>
						</div>
						<div class="uk-width-large-8-10">
							<div class="slideshow" data-uk-scrollspy="{cls:'uk-animation-slide-right'}">
								<?php //$this->load->view('site/slide',$this->data)?>
							</div>

							<div class="slider" data-uk-scrollspy="{cls:'uk-animation-slide-bottom'}">
								<?php //$this->load->view('site/slide_buttom',$this->data)?>
							</div>

							
				<div class="news-all">
                        <div class="box-details">
                          <h1><?php echo $info->title;?></h1>
                          <p>
                          		<?php echo $info->content;?>
                          </p>
                        </div>
                        <!-- <div class="news-res">
                            <h4>Các tin khác</h4>
                            <ul>
                            <?php //foreach($related_tuyendung as $row):?>
                              <li><a href="<?php //echo base_url('tuyen-dung/'.$row->slug.'.html')?>"><?php //echo $row->title; ?></a></li>
                             <?php //endforeach;?>
                              
                            </ul>
                        </div> -->
            </div>
                    <!-- End news-all-->
							
							
						</div>

					</div>
				</div>	
			</div>


		</div>
	</div>

	<footer id="footer">
	<?php $this->load->view('site/footer',$this->data)?>
		
	</footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/jquery.js" ></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/custom.js" ></script>
    
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/tooltipster.bundle.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/uikit.min.js" ></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/components/sticky.min.js"></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/components/tooltip.js"></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/components/slider.js"></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/components/slideshow.js"></script>
    <script src="<?php echo public_url('site/thanhbinhpc')?>/js/components/slideshow-fx.js"></script>
</body>
</html>


