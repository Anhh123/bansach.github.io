 <!-- Sản Phẩm Mới -->
 <div class="products-grid clearfix" >
    <div class="title-line">
      <h3><a>Sản phẩm mới</a></h3>
    </div>
    <!--Product loop-->
    <div class="row">
      <div id="owl-product-new" class="owl-carousel owl-theme">
        <?php foreach($pro_new as $row):?>
        <div class="item">
          <div class="prd">
            <div class="item-img clearfix">
              <span class="ico-product ico-sale ico-pro-color">
                <img src="<?php echo public_url('site/bookstore')?>/library/new.gif" alt="">
              </span>
              <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
                
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
            <!-- Thoong tin -->
            <div class="item-info">
              <div class="info-inner">
                <!-- Thông tin sách -->
                <div class="item-title">
                  <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
                  <?php echo $row->name?></a><br>
                  <span style="color: #777;font-size: 13px"><?php echo $row->tac_gia?></span>
                </div>
                <!-- Giá -->
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
              <i class="" style="position: absolute; right: 15px; bottom: 5px; font-size: 12px">Lượt xem: <?php echo $row->view ?></i>
              <?php endif;?>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
 </div>

<!-- Sản phẩm văn học -->
<?php if(!empty($info_1)):?>
<div class="products-grid clearfix ">
  <div class="title-line">
    <h3><a href="<?php echo base_url($info_1->slug).'/'?>"><?php echo $info_1->name?></a></h3>
  </div>
  <div class="row content-product-list products-resize">
    <?php foreach($list_1 as $row):?>
    <div class="item col-sm-4 col-xs-6">
      <div class="prd">
        <div class="item-img clearfix">
          <a href="<?php echo base_url($info_1->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
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
            <!-- Thông tin sách-->
            <div class="item-title">
              <a href="<?php echo base_url($info_1->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
              <?php echo $row->name?></a><br>
              <span style="color: #777;font-size: 13px"><?php echo $row->tac_gia?></span>
            </div>
            <!-- Giá -->
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
          <i class="" style="position: absolute; right: 15px; bottom: 5px; font-size: 12px">Lượt xem: <?php echo $row->view ?></i>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>

<!-- Sách đáng chú ý -->
<?php if(!empty($info_2)):?>
<div class="products-grid clearfix ">
  <div class="title-line">
    <h3><a href="<?php echo base_url($info_2->slug).'/'?>"><?php echo $info_2->name?></a></h3>
  </div>
  <div class="row content-product-list products-resize">
    <?php foreach($list_2 as $row):?>
    <div class="item col-sm-4 col-xs-6">
      <div class="prd">
        <div class="item-img clearfix">

          <a href="<?php echo base_url($info_2->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
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
            <!-- Thông tin sách-->
            <div class="item-title">
              <a href="<?php echo base_url($info_1->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
              <?php echo $row->name?></a><br>
              <span style="color: #777;font-size: 13px"><?php echo $row->tac_gia?></span>
            </div>
            <!-- Giá -->
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
          <i class="" style="position: absolute; right: 15px; bottom: 5px; font-size: 12px">Lượt xem: <?php echo $row->view ?></i>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>

<!-- Văn học theo quốc gia -->
<?php if(!empty($info_3)):?>
<div class="products-grid clearfix ">
  <div class="title-line">
    <h3><a href="<?php echo base_url($info_3->slug).'/'?>"><?php echo $info_3->name?></a></h3>
  </div>
  <div class="row content-product-list products-resize">
    <?php foreach($list_3 as $row):?>
    <div class="item col-sm-4 col-xs-6">
      <div class="prd">
        <div class="item-img clearfix">

          <a href="<?php echo base_url($info_3->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>" class="product-image have-additional">
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
            <!-- Thông tin sách-->
            <div class="item-title">
              <a href="<?php echo base_url($info_1->slug.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
              <?php echo $row->name?></a><br>
              <span style="color: #777;font-size: 13px"><?php echo $row->tac_gia?></span>
            </div>
            <!-- Giá -->
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
          <i class="" style="position: absolute; right: 15px; bottom: 5px; font-size: 12px">Lượt xem: <?php echo $row->view ?></i>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>