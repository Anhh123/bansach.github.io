
    <div id="collection" class="row clearfix">
      <div class="col-md-12  clearfix" >
        <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
          <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
          <li><a href="<?php echo base_url($catalog->slug).'/'?>" target="_self">Danh mục</a></li>
          <li class="active"><span><?php echo $catalog->name?></span></li>
        </ol>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix main-content">
          <div class="col-md-3">
            <div class="wrap-in">
              <div class="menu-collection hidden-xs">
                <?php $this->load->view('site/menu_left', $this->data) ?>
              </div>
              <div class="hidden-xs">
                <!-- Xem Nhiều -->
                <div class="block-title clearfix">
                  <h3 class="">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                    <span class="title">
                      Được Xem Nhiều
                    </span>
                  </h3>
                </div>
                <div class="mini-products-list">
                  <?php if(count($list_view) > 0):?>
                    <?php foreach($list_view as $row):?>
                  <div class="item clearfix">
                    <div class="item-img">
                      <a class="product-image img-small" href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
                        <img src="<?php echo $row->image_link;?>" alt="<?php echo $row->name?>">
                      </a>
                    </div>
                    <!-- Thông tin -->
                    <div class="item-info">
                      <!-- Thông tin sách -->
                      <div class="item-title">
                        <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>"><?php echo $row->name?></a>
                        <span style="color: #777; font-size: 12px"><?php echo $row->tac_gia ?></span>
                        <span style="display: inline-block; font-size: 20px; margin-top: 5px; float: right; padding-right: 50px">
                          <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060919" >
                          <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                        </span>
                      </div>
                      <div style="height: 1px;border-bottom: 1px solid #777;margin:5px 50px 10px 20px;"></div>
                      <?php if($row->discount > 0 && $row->price > 0):?>

                      <div class="special-price">
                        Giá bán: <span class="price"><?php echo number_format($row->price - $row->discount)?> vnđ</span>
                      </div>
                      <?php else:?>
                      <div class="special-price sp-pr-nb">
                        <span class="price"><?php if($row->price != 0){echo number_format($row->price).' vnđ';}else{echo 'Liên Hệ';} ?></span>
                      </div>
                      <?php endif;?>
                    </div>
                  </div>
                    <?php endforeach;?>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
          <!-- END -->
        <script>
          $(document).ready(function(){
            $('.filter > ul > li').click(function(){
              $(this).toggleClass('check');
              Stringfilter();
            })
            var str = "";
            var Stringfilter = function(){
              var q="", gia="",vendor="", total_page=0, cur_page=1;
                q="filter=(collectionid:product=1000449226)";
                $('ul.price-choise li.check a').each(function(){
                  gia = gia + $(this).data('price') + '||';
                })

                $('ul.vendor-choise li.check a').each(function(){
                  vendor = vendor + $(this).data('vendor') + '||';
                })
                gia=gia.substring(0,gia.length -2);
                 if(gia != ""){
                   gia='&&('+gia+')';
                   q+=gia;
                 }
                 vendor=vendor.substring(0,vendor.length -2);
                 if(vendor != ""){
                   vendor='&&('+vendor+')';
                   q+=vendor;
                 }
                 //console.log(q);
                 str = q;
                 $.ajax({ // lấy tổng số trang của kết quả filter
                   url: "/search?q="+q+"&view=page",  
                   async: false,
                   success:function(data){
                     total_page = parseInt(data);
                   }
                 })
                 if(cur_page <= total_page){
                   $.ajax({
                     url : "/search?q="+q+"&view=filter",
                     success: function(data){
                       $(".products-grid.row").html(data);
                     }
                   })
                   $.ajax({  // đoạn code 
                     url: "/search?q="+q+"&view=paginate",
                     async: false,
                     success:function(data){
                       $(".paginate").html(data); // in phân trang
                     }
                   })
                 }else{
                   $(".products-grid.row").html("<div class='col-sm-12 text-center'>Không có sản phẩm phù hợp!</div>");
                 }

                }
                $('.paginate').on("click","a",function(){ // bắt sự kiện click các nút phân trang
                  var link = $(this).attr("data-link");
                  if(link == 'm'){
                    link = cur - 1;
                  }
                  if(link == 'p'){
                    link = cur + 1;
                  }
                  link = parseInt(link);
                  $.ajax({
                    url : "/search?q="+str+"&view=filter&page="+link,
                    success: function(data){
                      $(".products-grid.row").html(data);
                      cur = link;
                    }
                  })
                  $.ajax({
                    url: "/search?q="+str+"&view=paginate&page="+link,
                    success:function(data){
                      $(".paginate").html(data);
                    }
                  })
                })
               })
        </script>
        <script>
          $(document).ready(function(){
            $('.block-title i').click(function(){
              if($(this).hasClass('fa-plus-square')){
                $(this).removeClass('fa-plus-square');
                $(this).addClass('fa-minus-square');
                $(this).parents().find('.filter').css('display','block');
              }
              else{
                $(this).removeClass('fa-minus-square');
                $(this).addClass('fa-plus-square');
                $(this).parents().find('.filter').css('display','none');
              }
            })
          })
        </script>

        <!-- Dah mục -->
        <div class="col-md-9 product-list">
          <?php if(count($buy) > 0):?>
            <div class="collection-title clearfix">
              <h1 class="pull-left">
                <?php echo $catalog->name?> <span style="font-size: 15px; color: #777;">(Có <?php echo $total_rows ?> sản phẩm)</span>
              </h1>
          </div>
          <?php endif;?>
          <div class="products-grid row">
            <?php if(count($buy) > 0):?>
              <?php foreach($buy as $row):?>
              <div class="item col-lg-4 col-md-4 col-sm-4 col-xs-6 wow bounceIn">
                 <div class="prd">
                    <div class="item-img clearfix">
                      <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
                        <span class="img-main">
                          <img  src="<?php echo $row->image_link?>" alt="<?php echo $row->name?>">
                        </span>
                      </a>
                      <div class="action-bot hidden-xs">
                        <ul class="add-to-links clearfix">
                          <li>
                            <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060919" class="add-to-cart collection-cart">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title">
                          <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
                            <?php echo $row->name?></a><br>
                            <span style="color: #777;font-size: 13px"><?php echo $row->tac_gia?></span>
                        </div>
                        <div class="item-price">
                        <?php if($row->discount > 0 && $row->price > 0):?>
                          <div class="price-box price-box-sp-new">
                            <p class="old-price">
                              Giá gốc: <span class="price"><?php echo number_format($row->price)?> vnđ</span>
                            </p><br>
                            <p class="special-price">
                              Giá bán: <span class="price"><?php echo number_format($row->price - $row->discount)?> vnđ</span>
                            </p>
                          </div>
                        <?php else:?>
                          <div class="price-box">
                            <p class="special-price">
                              <span class="price"><?php if($row->price != 0){echo number_format($row->price).'vnđ';}else{echo 'Liên Hệ';} ?></span>
                            </p>
                          </div>
                        <?php endif;?>
                        </div>
                      </div>
                      <?php if($row->discount > 0 && $row->price > 0 && $row->price > $row->discount):?>
              <span class="ico-product-sp-new ico-sale">
                <?php $price_new = $row->price - $row->discount;?>
                -<?php echo round(1-$price_new/$row->price,2)*100;?>%
              </span>
              <i class="" style="position: absolute; right: 15px; bottom: 5px; font-size: 12px">Lượt xem: <?php echo $row->view ?></i>
              <?php endif;?>
                    </div>
                </div>
              </div>
              <?php endforeach;?>
            <?php else:?>
              <h4>Danh mục <?php echo $catalog->name; ?> chưa có sản phẩm.</h4>
            <?php endif;?>
          </div>
          <div class="row paginate">
            <div class='pagination'>
              <?php echo $this->pagination->create_links()?>
            </div>
        </div>
        <!-- END -->

        <div class="col-md-3 visible-xs">
          <div class="wrap-in">
            <div class="block-title clearfix">
              <h3 >
                <i class="fa fa-star-half-o"></i>
                <span class="title">
                  Bán Chạy
                </span></h3>
            </div>
            <div class="mini-products-list">
                <?php if(count($list_view) > 0):?>
                  <?php foreach($list_view as $row):?>
                      <div class="item clearfix">
                        <div class="item-img">
                          <a class="product-image img-small" href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
                          <img src="<?php echo $row->image_link;?>" alt="<?php echo $row->name?>">
                          </a>
                        </div>
                        <div class="item-info">
                          <div class="item-title">
                            <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>"> <?php echo $row->name?></a>
                          </div>
                        <?php if($row->discount > 0 && $row->price > 0):?>
                          <div class="special-price">
                            <span class="price"><?php echo number_format($row->price - $row->discount)?>₫</span>
                          </div>
                        <?php else:?>
                          <div class="special-price">
                            <span class="price"><?php if($row->price != 0){echo number_format($row->price).'₫';}else{echo 'Liên Hệ';} ?></span>
                          </div>
                        <?php endif;?>
                        </div>
                      </div>
                  <?php endforeach;?>
                <?php endif;?>
            </div>
            <?php if(count($list_main) > 0):?>
            <?php foreach($list_main as $row):?>
                  <div class="image-promotion mb15">
                    <div class="overlay">
                      <a href="<?php echo $row->link?>"><i class="fa fa-plus"></i></a>
                    </div>
                    <a href="<?php echo $row->link?>">
                    <img src="<?php echo $row->image_link;?>"  alt="<?php echo $row->name?>"/>
                    </a>
                  </div>
            <?php endforeach;?>
              <?php else:?>
            <div class="image-promotion mb15">
              <div class="overlay">
                  <a href="collections/all.html"><i class="fa fa-plus"></i></a>
              </div>
              <a href="collections/all.html">
                  <img src="<?php echo public_url('site/bookstore')?>/library/promotion.png?v=230"  alt="Banner ad"/>
              </a>
            </div>
            <div class="image-promotion">
              <div class="overlay">
                <a href="collections/all.html"><i class="fa fa-plus"></i></a>
              </div>
              <a href="collections/all.html">
              <img src="<?php echo public_url('site/bookstore')?>/library/promotion-2.png?v=230" alt="Banner ad"/>
              </a>
            </div>
            <?php endif;?>
          </div>
        </div>
        </div>
      </div>
    <!-- End no products -->
    </div>
      <script>
        Haravan.queryParams = {};
        if (location.search.length) {
          for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
            aKeyValue = aCouples[i].split('=');
            if (aKeyValue.length > 1) {
              Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
            }
          }
        }
        jQuery('.sort-by')
        .val('title-ascending')
        .bind('change', function() {
          Haravan.queryParams.sort_by = jQuery(this).val();
          location.search = jQuery.param(Haravan.queryParams);
        });
      </script>

      <style>
        .wrap-in ul li.check:before{
        border: 1px solid #d31c23 !important;
        content: '\f00c';
        display: inline-block;
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        width: 10px;
        height: 10px;
        text-align: center;
        line-height: 10px;
        color: #d31c23;
        font-size: 11px;
        }
      </style>
