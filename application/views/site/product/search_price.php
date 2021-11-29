<?php if(!empty($list)):?>
 <div class="main container">
            <div class="col-main">
              <div id="loading-mask">
                <div class ="background-overlay"></div>
                <p id="loading_mask_loader" class="loader">
                  <i class="ajax-loader large animate-spin"></i>
                </p>
              </div>
              <div id="after-loading-success-message">
                <div class ="background-overlay"></div>
                <div id="success-message-container" class="loader" >
                  <div class="msg-box">Product was successfully added to your shopping cart.</div>
                  <button type="button" name="finish_and_checkout" id="finish_and_checkout" class="button btn-cart" ><span><span>
                  Go to cart page       </span></span></button>
                  <button type="button" name="continue_shopping" id="continue_shopping" class="button btn-cart" >
                  <span><span>
                  Tiếp tục      </span></span></button>
                </div>
              </div>
              <script type='text/javascript'>
                Glacetheme_1102('#finish_and_checkout').click(function(){
                       try{
                           parent.location.href = 'checkout/cart/index.html';
                       }catch(err){
                           location.href = 'checkout/cart/index.html';
                       }
                   });
                Glacetheme_1102('#continue_shopping').click(function(){
                       Glacetheme_1102('#after-loading-success-message').fadeOut(200);
                       clearTimeout(easyajaxcart_timer);
                       setTimeout(function(){
                           Glacetheme_1102('#after-loading-success-message .timer').text(easyajaxcart_sec);
                       }, 1000);});
              </script>
              <div class="std">
                <div class="row">
                  <div class="col-md-9 col-sm-8 small-padding">
                    <div class="easyfilterproduct-tab">
                      <div class="filter-title">
                        <ul class="content">
                          <li id="tab_featured" class="active first"><a href="#"><strong>Kết quả tìm kiếm với giá từ <?php echo number_format($price_from)?> vnđ tới <?php echo number_format($price_to)?> vnđ</strong></a></li>
                          <!-- <li id="tab_latest"><a href="#"><strong>SẢN PHẨM MỚI</strong></a></li> -->
                        </ul>
                      </div>
                      <div class="clearer"></div>
                      <div class="tab-content" id="tab_featured_contents">
                        <div id="featured_product" class="hide-addtolinks move-action">
                          <div class="category-products">
                            <ul class="products-grid columns4">
                        
                          <?php foreach($list as $row):?>
                              <li class="item">
                                <div class="item-area">
                                  <div class="product-image-area">
                                    <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" class="quickview-icon"><i class="icon-export"></i><span>Quick View</span></a>
                                    <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="Đồng hồ Casio 6523" class="product-image">
                                    <img class="defaultImage" src="<?php echo $row->image_link; ?>" alt="<?php echo $row->name?>"/>
                                    <img class="hoverImage" src="<?php echo $row->image_link; ?>" alt="<?php echo $row->name?>"/>
                                    </a>
                                  </div>
                                  <div class="details-area">
                                    <h2 class="product-name"><a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="Đồng hồ Casio 6523"><?php echo $row->name?></a></h2>
                                    <div class="ratings">
                                      <div class="rating-box">
                                        <div class="rating"></div>
                                      </div>
                                    </div>
                                    <div class="price-box">
                                      <span class="regular-price" id="product-price-982">
                                      <span class="price"><?php echo ($row->price != 0) ? number_format($row->price).' VNĐ' : 'Liên Hệ'?></span>                                    </span>
                                    </div>
                                    <div class="actions">
                                      <a href="<?php echo base_url('cart/add/'.$row->id)?>" class="addtocart" title="MUA NGAY"><i class="icon-cart"></i><span>&nbsp;MUA NGAY</span></a>
                                      <div class="clearer"></div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                          <?php endforeach;?>
                        
                            </ul>
                            <script type="text/javascript">
                              Glacetheme_1102('.col-main .products-grid li:nth-child(2n)').addClass('nth-child-2n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(2n+1)').addClass('nth-child-2np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(3n)').addClass('nth-child-3n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(3n+1)').addClass('nth-child-3np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(4n)').addClass('nth-child-4n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(4n+1)').addClass('nth-child-4np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(5n)').addClass('nth-child-5n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(5n+1)').addClass('nth-child-5np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(6n)').addClass('nth-child-6n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(6n+1)').addClass('nth-child-6np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(7n)').addClass('nth-child-7n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(7n+1)').addClass('nth-child-7np1');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(8n)').addClass('nth-child-8n');
                              Glacetheme_1102('.col-main .products-grid li:nth-child(8n+1)').addClass('nth-child-8np1');
                            </script>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <script type="text/javascript">new Varien.Tabs('.easyfilterproduct-tab > div.filter-title > ul');</script>
                
                 
                    
                  </div>
                  <div class="col-md-3 col-sm-4 sidebar">
                    <div class="custom-block">
                      <div class="block block-category-nav">
                        <div class="block-title">
                          <strong><span>Danh mục</span></strong>
                        </div>
                        <div class="block-content">
                          <ul class="category-list">
                          <?php if($catalog_list) :?>
                            <?php foreach($catalog_list as $row):?>
                              <?php if(count($row->subs) > 0) :?>
                            <li class="has-children">
                              <a href="<?php echo base_url($row->slug).'/'?>" ><?php echo $row->name?></a><a href="javascript:void(0)" class="plus"><i class="icon-plus-squared"></i></a>
                              <ul>
                              <?php foreach($row->subs as $subs):?>
                                <li class="has-no-children">
                                  <a href="<?php echo base_url($subs->slug).'/'?>"><?php echo $subs->name?></a>
                                </li>
                              <?php endforeach;?>
                              </ul>
                            </li>
                              <?php else:?>
                                 <li class="has-no-children"><a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?></a></li>
                              <?php endif;?>
                          <?php endforeach;?>
                          <?php endif;?>
                          </ul>
                        </div>
                        <script type="text/javascript">
                          Glacetheme_1102(function($){
                              $(".block.block-category-nav .block-title strong").click(function(){
                                  if($(this).hasClass("closed")){
                                      $(".block.block-category-nav .block-content").slideDown();
                                      $(this).removeClass("closed");
                                  } else {
                                      $(".block.block-category-nav .block-content").slideUp();
                                      $(this).addClass("closed");
                                  }
                              });
                              $(".block.block-category-nav .category-list a.plus").click(function(){
                                  if($(this).parent().hasClass("opened")){
                                      $(this).parent().children("ul").slideUp();
                                      $(this).parent().removeClass("opened");
                                      $(this).children("i.icon-minus-squared").removeClass("icon-minus-squared").addClass("icon-plus-squared");
                                  } else {
                                      $(this).parent().children("ul").slideDown();
                                      $(this).parent().addClass("opened");
                                      $(this).children("i.icon-plus-squared").removeClass("icon-plus-squared").addClass("icon-minus-squared");
                                  }
                              });
                          });
                        </script>
                      </div>
                    </div>
                    <style type="text/css">.recent-posts .item .col-sm-5, .recent-posts .item .col-sm-7{width:100%;}</style>
                    <script type="text/javascript">
                      Glacetheme_1102(function($){
                          $("#latest_news .owl-carousel").owlCarousel({
                              lazyLoad: true,
                              responsiveRefreshRate: 50,
                              slideSpeed: 500,
                              paginationSpeed: 500,
                              scrollPerPage: true,
                              stopOnHover: true,
                              rewindNav: true,
                              rewindSpeed: 600,
                              pagination: true,
                              navigation: false,
                              autoPlay: true,
                              singleItem: true
                          });
                      });
                    </script>
                    <h2>Webshop Đồng hồ thời trang</h2>
                    <h5>Miễn phí cài đặt toàn bộ giao diện.</h5>
                    <p>Khởi nghiệp ngay hôm nay cùng Vinastar.net</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php else:?>
  <h4 style="color:red"> Không có sản phẩm nào được tìm thấy, vui lòng điền lại giá"</h4>
<?php endif;?>