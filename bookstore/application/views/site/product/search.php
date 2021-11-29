
    <div id="collection" class="row clearfix">
      <div class="col-md-12  clearfix" >
        <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
          <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
          <li>Tìm kiếm</li>
        </ol>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix main-content">

        <!-- Dah mục -->
        <div class="col-md-12 product-list">
          <div class="collection-title clearfix">
            <h1 class="pull-left" style="font-size: 16px; margin-left: 25px; text-transform: none; font-weight: normal;">
              Có <span style="color: #b91919; font-weight: bold; font-size: 24px;">"<?php echo $total_rows ?>"</span> sản phẩm phù với kết quả tìm kiềm với từ khóa <span style="color: #b91919; font-size: 24px; font-weight: bold;">"<?php echo $key ?>"</span>
            </h1>
          </div>

          <div class="products-grid row">
            <?php if(count($buy) > 0):?>
              <?php foreach($buy as $row):?>
            <div class="item col-lg-3 col-md-3 col-sm-3 col-xs-6 wow bounceIn">
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
                      <?php $price_new = $row->price - $row->discount;?> - <?php echo round(1-$price_new/$row->price,2)*100;?>%
                    </span>
                    <?php endif;?>
                  </div>
              </div>
            </div>
              <?php endforeach;?>
            <?php else:?>
            <h4 style="text-align: center; margin-bottom: 50px;">Không tìm thấy kết quả với từ khóa.</h4>
            <?php endif;?>
          </div>
        <!-- END -->
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
