<!doctype html>
<html lang="vi">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo !empty($homepage->favicon) ? $homepage->favicon : ''?>" type="image/png" />
    <meta charset="utf-8" />
    <title> <?php echo !empty($homepage->site_title) ? $homepage->site_title : ''?> </title>
    <meta name="description" content="<?php echo !empty($homepage->site_desc) ? $homepage->site_desc : ''?>" />
    <meta name="keyword" content="<?php echo !empty($homepage->site_key) ? $homepage->site_key : ''?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
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
          $("input#text-search").autocomplete({
              source: "<?php echo site_url('product/search/1')?>",
          });
      });
    </script>

    <link href="<?php echo public_url('site/bookstore')?>/library/styles.css" rel='stylesheet' type='text/css'  media='all'  />
    <link href="<?php echo public_url('site/bookstore')?>/library/binbi.css" rel='stylesheet' type='text/css'  media='all'  />
    
    <!-- Button -->
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/vicons-font.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo public_url('site/bookstore')?>/library/css/buttons.css" />

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
    <!-- Begin: wrapper -->
    <div class="wrapper">
      <header>
        <?php $this->load->view('site/header',$this->data)?>
      </header>
      <?php if(isset($message)): ?>
        <p style="color: red"><?php echo $message ?></p>
      <?php endif; ?>
      <section id="content" class="clearfix container">
        <div class="row clearfix h400">
          <div class="col-xs-12 col-sm-3 hidden-xs">
            <div class="megamenu">
              <?php $this->load->view('site/menu_left',$this->data)?>
            </div>
          </div>
          <script>
            $(document).ready(function(){
              $('.cate-change').click(function(){
                $(this).toggleClass('on');
                $('.cate-hide').slideToggle();
              })
            })
          </script>
          <div class="col-xs-12 col-sm-6">
            <?php $this->load->view('site/slide',$this->data)?>
          </div>
          <?php $this->load->view('site/banner-top',$this->data)?>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <?php $this->load->view('site/sale-off',$this->data)?>
          </div>
          <div class="col-xs-12 col-sm-9">
            <div id="index">
              <!-- Content-->
              <div class="main-content">
                <?php $this->load->view($temp,$this->data)?>
              </div>
              <!-- Content-->

            </div>
          </div>
        </div>
        <div class="blog-index">
          <h3>
            <a href="<?php echo base_url('tin-tuc')?>">Tin tức</a>
          </h3>
          <div class="row">
            <div id="owl-blog" class="owl-carousel owl-theme">
              <?php foreach($list_news as $row):?>
              <div class="item clearfix">
                <div class="blog-img">
                  <a href="<?php echo base_url('tin-tuc/'.$row->slug)?>">
                    <img src="<?php echo $row->image_link?>" alt="<?php echo $row->title?>">
                  </a>
                </div>
                <div class="clearfix" style="height: 1px"></div>
                <div class="blog-info">
                  <h3> <a href="<?php echo base_url('tin-tuc/'.$row->slug)?>"><?php echo $row->title?></a> </h3>
                  <div class="clearfix" style="height: 1px"></div>
                  <p style="float: left; height: 70px; text-overflow: hidden"><?php echo !empty($row->intro) ? $row->intro : ''?></p>
                  <div class="clearfix" style="height: 1px"></div>
                  <a href="<?php echo base_url('tin-tuc/'.$row->slug)?>" class="readmore">Xem thêm</a>
                </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </section>

      <div class="newsletter_bg">
         <?php $this->load->view('site/letter',$this->data);?>
      </div>

      <footer class="footer_bg">
        <?php $this->load->view('site/footer',$this->data);?>
      </footer>

      <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
      <div class="copyright">
        <?php $this->load->view('site/footer-bottom', $this->data); ?>
      </div>
    </div>
    <!--Scroll to Top-->
    <a href="#" class="scrollToTop">
      <i class="fa fa-chevron-up"></i>
    </a>
    <script>
      $(document).ready(function() {

        //Check to see if the window is top if not then display button
        $('#mmenu').slicknav({
          label:'',
          prependTo:'#header-mobile-menu'
        });
        $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
          } else {
            $('.scrollToTop').fadeOut();
          }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function() {
          $('html, body').animate({
            scrollTop: 0
          }, 600);
          return false;
        });

      });
    </script>
    <script src="<?php echo public_url('site/bookstore')?>/library/owl.carousel.min.js" type='text/javascript'></script>
    <script>
      $(document).ready(function() {
        $("#owl-index").owlCarousel({
          navigation : false, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
          autoPlay: 3000
        });
        $("#sale-off").owlCarousel({
          navigation : true, // Show next and prev buttons
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"],
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
          pagination: false,
          autoPlay: 5000
        });
        $("#owl-product-new").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 2],
            [992, 3]
          ],
          itemsScaleUp : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"]
        });
        $("#owl-blog").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 2],
            [992, 3]
          ],
          itemsScaleUp : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"]
        });
        $("#sliderproduct").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 3],
            [992, 4],
          ],
            itemsScaleUp : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"],
          transitionStyle:'fadeIn'
        });
        $("#sliderproduct-mobile").owlCarousel({
          navigation : false,
          pagination: true,
          itemsCustom: [
            [0, 1],
            [480, 2],
          ],
            itemsScaleUp : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            transitionStyle:'fadeIn'
            });
            });
    </script>
    <script>
      $(document).ready(function(){
        $('.add-to-cart').click(function(){
          var quantity = 1;
          var variant_id = $(this).attr('data-variantid');
          var params = {
            type: 'POST',
            url: '/cart/add.js',
            data: 'quantity=' + quantity + '&id=' + variant_id,
            dataType: 'json',
            success: function(line_item) {
              window.location = 'cart.html';
            },
            error: function(XMLHttpRequest, textStatus) {
              BookStore.onError(XMLHttpRequest, textStatus);
            }
          };
          jQuery.ajax(params);
        });
      })
    </script>
    <script>
      $(document).ready(function(){
        $('.add-to-links a.quick-view').click(function(e){
          e.preventDefault();
          var handle = $(this).data('handle');
          $.ajax({
            url : '/products/'+handle+'?view=quickview',
            success: function(data){
              $('body').addClass('modal-open');
              $('body').append(data);
            }
          })
        })
        $('body').on('click','#quick-shop-modal .close',function(){
          $('body').removeClass('modal-open');
          $('body #quick-shop-modal').remove();
          $('body .modal-backdrop').remove();
        })
      })
    </script>
    <!-- Button -->
    <script>
      (function() {
        var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
        if(isSafari) {
          document.getElementById('support-note').style.display = 'block';
        }
      })();
    </script>
  </body>
</html>