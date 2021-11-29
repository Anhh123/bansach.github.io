

            <script src="<?php echo public_url('site/bookstore')?>/library/jquery.elevatezoom.min.js" type='text/javascript'></script>
            <div class="row">
                <div class="col-md-12  clearfix" >
                    <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                        <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
                        <!-- <li><a href="<?php echo base_url($catalog->slug).'/'?>" target="_self"><?php echo $catalog->name; ?></a></li> -->
                        <li><a href="<?php echo base_url($catalog->slug).'/'?>" target="_self"><?php echo $catalog->name?></a></li>
                        <li class="active"><span><?php echo $product->name?></span></li>
                    </ol>
                </div>
            </div>
            <div class="products clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <div  id="wrapper-detail">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <div id="surround">
                                        <div class="img-product">
                                            <img class=" product-image-feature hidden-xs" src="<?php echo $product->image_link?>" alt="<?php echo $product->name;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-xs-12 fix-mobile">
                                    <div class="product-title">
                                        <h3 style="margin-top: 5px"><?php echo $product->name;?></h3>
                                        <!-- <?php if(!empty($product->tac_gia)):?> -->
                                        <p class="product-vendor"> <strong>Tác giả :</strong> <?php echo $product->tac_gia;?> </p>
                                        <p class="product-vendor"> <strong>Xuất bản :</strong> <?php echo $product->xuat_ban;?> </p>
                                        <p class="product-vendor"> <strong>Nhà xuất bản :</strong> <?php echo $product->nxb;?> </p>
                                        <p class="product-vendor"> <strong>Nhà phát hành :</strong> <?php echo $product->nph;?> </p>
                                        <p class="product-vendor"> <strong>Dạng bìa :</strong> <?php echo $product->dang_bia;?> </p>
                                        <p class="product-vendor"> <strong>Kích thước :</strong> <?php echo $product->kich_thuoc;?> </p>
                                        <p class="product-vendor"> <strong>Khối lượng :</strong> <?php echo $product->khoi_luong;?> </p>
                                        <p class="product-vendor"> <strong>Sô trang :</strong> <?php echo $product->so_trang;?> </p>
                                        <!-- <?php endif;?> -->
                                    </div>
                                    <?php if($product->discount > 0 && $product->price > 0):?>
                                    <div class="product-price" id="price-preview">
                                        <p>
                                            <span class="title-price">Giá bán: </span>
                                            <span class="price-view"> <?php echo number_format($product->price - $product->discount)?> vnđ</span>
                                            <span class="title-price">&nbsp;&nbsp;Giá gốc: </span>
                                            <del><?php echo number_format($product->price)?> vnđ</del>
                                            <span class="title-price-3">Tiết kiệm: 
                                                <span class="ico-product-sp-new ico-sale">
                                                    <?php $price_new = $product->price - $product->discount;?>
                                                    -<?php echo round(1-$price_new/$product->price,2)*100;?>%
                                                </span>
                                            </span>
                                        </p>
                                    </div>
                                    <?php else:?>
                                    <span>
                                        <?php
                                            if($product->price != 0){echo number_format($product->price).'vnđ';}
                                            else{echo 'Giá: Liên Hệ';}
                                        ?>
                                    </span>
                                    <?php endif;?>
                                    <p class="inventory">
                                        <strong>Tình trạng :</strong>
                                        <?php
                                            if($product->status == 0){
                                                echo 'Còn hàng';
                                            }
                                            else{
                                                echo 'Hết hàng';
                                            }
                                        ?>
                                    </p>
                                    <form id="add-item-form" action="<?php echo base_url('cart/add/'.$product->id)?>" method="post" class="variants clearfix">
                                        <div class="select-wrapper">
                                            <label>Số lượng :</label>
                                            <input id="quantity" type="text" name="qty" value="1" class="item-quantity" />
                                            <button id="" class="button button--naira button--round-s button--border-thin button--naira-up" name="add">
                                                <i class="button__icon fa fa-cart-plus"></i><span>Thêm vào giỏ</span>
                                            </button>
                                        </div>

                                        <!-- Gio hang duoi -->
                                        <!-- <div class="actions-btn">
                                        </div> -->
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div role="tabpanel" class="product-comment">
                                        <!-- Nav tabs -->
                                        <ul class="nav title-line" role="tablist">
                                            <li role="presentation" class="active"><h3><span>Mô tả sản phẩm</span></h3></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div id="mota">
                                            <div class="container-fluid product-description-wrapper">
                                                <?php echo !empty($product->content) ? $product->content : '' ;?>
                                            </div>
                                        </div>
                                        <div id="binhluan">
                                            <div class="title-line">
                                                <h3><span>Bình luận</span></h3>
                                            </div>
                                            <div class="bl-mobile">
                                                <div class="fb-like" data-href="<?php echo base_url($catalog->slug.'/'.$product->slug.'.html')?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                                <div class="fb-comments" data-href="<?php echo base_url($catalog->slug.'/'.$product->slug.'.html')?>" data-numposts="5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="wrap-in">
                            <div class="block-title clearfix">
                                <h3 >
                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                    <span class="title">
                                        Được Xem Nhiều
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
                                            <span style="color: #777; font-size: 12px"><?php echo $row->tac_gia ?></span>
                                            <span style="display: inline-block; font-size: 20px; margin-top: 5px; float: right; padding-right: 50px">
                                              <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060919" >
                                              <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                            </span>
                                        </div>
                                        <div style="height: 1px;border-bottom: 1px solid #777;margin:5px 50px 10px 20px;"></div>
                                      <?php if($row->discount > 0 && $row->price > 0):?>
                                        <div class="special-price">
                                          <span class="price"><?php echo number_format($row->price - $row->discount)?> vnđ</span>
                                        </div>
                                      <?php else:?>
                                        <div class="special-price">
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
                <div class="list-like">
                    <div id="like" class="products-grid clearfix">
                        <div class="title-line">
                            <h3><span>Sản phẩm liên quan</span></h3>
                        </div>
                        <div class="row clearfix content-product-list">
                        <?php if(count($buy) > 0):?>
                          <?php foreach($buy as $row):?>
                            <div class="item col-sm-3 col-xs-6">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <!-- <?php if($row->discount > 0 && $row->price > 0 && $row->price > $row->discount):?>
                                        <span class="ico-product ico-sale">
                                            <?php $price_new = $row->price - $row->discount;?>
                                            <?php echo round(1-$price_new/$row->price,2)*100;?>%
                                        </span>
                                        <?php endif;?> -->
                                        <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
                                            <span class="img-main">
                                                <img  src="<?php echo $row->image_link?>" alt="<?php echo $row->name?>">
                                            </span>
                                        </a>
                                        <div class="action-bot hidden-xs">
                                            <ul class="add-to-links clearfix">
                                                <li>
                                                    <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060918" class="add-to-cart collection-cart">
                                                        <i class="fa fa-shopping-cart"></i></a>
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
                                                    <span class="price"><?php if($row->price != 0){echo number_format($row->price).' vnđ';}else{echo 'Liên Hệ';} ?></span>
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
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                           <?php endforeach;?>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(".product-thumb img").click(function(){
                    $(".product-image-feature").attr("src",$(this).attr("data-image"));
                    $(".product-image-feature").attr("data-zoom-image",$(this).attr("data-zoom-image"));
                });

                $(document).ready(function(){
                    $('a[data-spy=scroll]').click(function(){
                        event.preventDefault() ;
                        $('body').animate({scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'}, 500);
                    })
                });

                var selectCallback = function(variant, selector) {
                    if(variant!=null && variant.featured_image!=null){
                        $(".product-thumb img[data-image='"+BookStore.resizeImage(variant.featured_image.src,'master')+"']").click();
                    }

                    if (variant && variant.available) {
                        jQuery('#add-to-cart').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");;
                        jQuery('#buy-now').removeAttr('disabled').removeClass('disabled').html("Mua ngay").show();
                        jQuery('.inventory').html("Tình trạng : <strong>Còn hàng</strong>");
                        if(variant.price < variant.compare_at_price){
                            jQuery('#price-preview').html("<del>" + BookStore.formatMoney(variant.compare_at_price, "{{amount}}₫") + "</del><span>" + BookStore.formatMoney(variant.price, "{{amount}}₫") + "</span>");
                            var pro_sold = variant.price ;
                            var pro_comp = variant.compare_at_price / 100;
                            var sale = 100 - (pro_sold / pro_comp) ;
                            var kq_sale = Math.round(sale);
                            jQuery('#surround .product-sale span').html("<label class='sale-lb'>Sale</label> "+kq_sale + '%');
                        }
                        else {
                            jQuery('#price-preview').html("<span>" + BookStore.formatMoney(variant.price, "{{amount}}₫" + "</span>"));
                        }

                    }
                    else {
                        jQuery('#add-to-cart').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng");
                        jQuery('#buy-now').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng").hide();
                        jQuery('.inventory').html("Tình trạng : <strong>Hết hàng</strong>");
                    }
                };

                jQuery(document).ready(function($){
                });
                $(document).ready(function(){
                     $('.product-thumb img').click(function(){
                         $('.product-thumb').removeClass('active');
                         $(this).parents('.product-thumb').addClass('active');
                     });
                     $('.product-thumb:first').addClass('active');
                })
            </script>
            <script>
                if($(window).width() > 991){
                    jQuery(".product-image-feature").elevateZoom({
                        gallery:'sliderproduct',
                        zoomType    : "lens", 
                        lensShape : "round",
                        lensSize : 250
                    });
                }
            </script>
            <script>
                var BookStore = BookStore || {};
                BookStore.optionsMap = {};
                BookStore.updateOptionsInSelector = function(selectorIndex) {
                    switch (selectorIndex) {
                        case 0:
                            var key = 'root';
                            var selector = jQuery('.single-option-selector:eq(0)');
                        break;
                        case 1:
                            var key = jQuery('.single-option-selector:eq(0)').val();
                            var selector = jQuery('.single-option-selector:eq(1)');
                        break;
                        case 2:
                            var key = jQuery('.single-option-selector:eq(0)').val();
                            key += ' / ' + jQuery('.single-option-selector:eq(1)').val();
                            var selector = jQuery('.single-option-selector:eq(2)');
                    }

                    var initialValue = selector.val();
                    selector.empty();
                    var availableOptions = BookStore.optionsMap[key];
                    for (var i=0; i<availableOptions.length; i++) {
                        var option = availableOptions[i];
                        var newOption = jQuery('<option></option>').val(option).html(option);
                        selector.append(newOption);
                    }
                    jQuery('.swatch[data-option-index="' + selectorIndex + '"] .swatch-element').each(function() {
                        if (jQuery.inArray($(this).attr('data-value'), availableOptions) !== -1) {
                            $(this).removeClass('soldout').show().find(':radio').removeAttr('disabled','disabled').removeAttr('checked');
                        }
                        else {
                            $(this).addClass('soldout').hide().find(':radio').removeAttr('checked').attr('disabled','disabled');
                        }
                    });
                    if (jQuery.inArray(initialValue, availableOptions) !== -1) {
                        selector.val(initialValue);
                    }
                    selector.trigger('change');
                };
                BookStore.linkOptionSelectors = function(product) {
                  // Building our mapping object.
                    for (var i=0; i<product.variants.length; i++) {
                        var variant = product.variants[i];
                        if (variant.available) {
                            // Gathering values for the 1st drop-down.
                            BookStore.optionsMap['root'] = BookStore.optionsMap['root'] || [];
                            BookStore.optionsMap['root'].push(variant.option1);
                            BookStore.optionsMap['root'] = BookStore.uniq(BookStore.optionsMap['root']);
                            // Gathering values for the 2nd drop-down.
                            if (product.options.length > 1) {
                                var key = variant.option1;
                                BookStore.optionsMap[key] = BookStore.optionsMap[key] || [];
                                BookStore.optionsMap[key].push(variant.option2);
                                BookStore.optionsMap[key] = BookStore.uniq(BookStore.optionsMap[key]);
                            }
                            // Gathering values for the 3rd drop-down.
                            if (product.options.length === 3) {
                                var key = variant.option1 + ' / ' + variant.option2;
                                BookStore.optionsMap[key] = BookStore.optionsMap[key] || [];
                                BookStore.optionsMap[key].push(variant.option3);
                                BookStore.optionsMap[key] = BookStore.uniq(BookStore.optionsMap[key]);
                            }
                        }
                    }
                    // Update options right away.
                    BookStore.updateOptionsInSelector(0);
                    if (product.options.length > 1) BookStore.updateOptionsInSelector(1);
                    if (product.options.length === 3) BookStore.updateOptionsInSelector(2);
                    // When there is an update in the first dropdown.
                    jQuery(".single-option-selector:eq(0)").change(function() {
                        BookStore.updateOptionsInSelector(1);
                        if (product.options.length === 3) BookStore.updateOptionsInSelector(2);
                        return true;
                    });
                    // When there is an update in the second dropdown.
                    jQuery(".single-option-selector:eq(1)").change(function() {
                        if (product.options.length === 3) BookStore.updateOptionsInSelector(2);
                        return true;
                    });
                };
            </script>

