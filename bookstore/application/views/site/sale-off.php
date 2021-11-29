<div class="wrap-in">

  <!-- Nổi bậc -->
  <div class="block-title clearfix">
    <h3 class="index">
      <i class="fa fa-list-ol" aria-hidden="true"></i>
      <span class="title">
      Nổi Bật
      </span>
    </h3>
  </div>
  <div id="sale-off" class="products-grid owl-carousel owl-theme">
    <?php if(count($list_nb) > 0):?>
      <?php foreach($list_nb as $row):?>
    <div class="item">
      <div class="prd">
        <div class="item-img clearfix">
          <?php if($row->discount > 0 && $row->price > 0 && $row->price > $row->discount):?>
            <span class="ico-product ico-sale ico-pro-nb">
            <?php $price_new = $row->price - $row->discount;?>
              <!-- Phần trăm giá giảm -->
              <?php echo round(1-$price_new/$row->price,2)*100;?>%
            </span>
          <?php endif;?>
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
              <div class="price-box">
                <p class="old-price">
                  Giá gốc: <span class="price"><?php echo number_format($row->price)?> vnđ</span>
                </p>
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
        </div>
      </div>
    </div>
      <?php endforeach;?>
    <?php endif;?>
  </div>

  <!-- Xem Nhiều -->
  <div class="block-title clearfix">
    <h3 class="index">
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
      <div class="item-info">
        <div class="item-title">
          <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>"><?php echo $row->name?></a>
          <span style="color: #777; font-size: 12px; "><?php echo $row->tac_gia ?></span>
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
  <br>
  <!-- Bán Chạy -->
  <div class="block-title clearfix">
    <h3 class="index">
      <i class="fa fa-usd" aria-hidden="true"></i>
      <span class="title">
        Bán Chạy
      </span>
    </h3>
  </div>
  <div class="mini-products-list">

  </div>

  <!-- Banner-left -->
  <!-- <?php $this->load->view('site/banner-left',$this->data) ?> -->

    <!-- <?php if(count($list_main) > 0):?>
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

    <?php endif;?> -->




</div>