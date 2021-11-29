

<div id="article" class="article-detail clearfix">
  <div class="row article" >
    <div class="main-content">
      <div class="col-md-12 blog-breadcrumb clearfix" >
        <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
          <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
          <li>Bảo Hành</li>
        </ol>
      </div>
      <!-- Begin article -->
      <div class="article-body">
        <div class="col-md-9 articles clearfix" id="layout-page">
			<div class="main_content">
			    <div class="box_product">
			        <div class="tlt_product">
			            <h2 class="tlt_ct">Bảo Hành</h2>
			        </div>
			        <div class="box_content">
			          <?php echo $baohanh->content?>
			        </div>
			    </div>
			</div>
        </div>
        <!-- End article-->
        <div class="col-sm-3 clearfix">
	        <!-- Begin sidebar blog -->
	        <div class="wrap-in ">
	            <div class="block-title">
	              <div class="block-title clearfix">
	                <h3 >
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
	                    <a class="product-image img-small" href="<?php echo base_url($row->slug_catalog.'/'.$row->slug)?>" title="<?php echo $row->name?>">
	                    <img src="<?php echo $row->image_link;?>" alt="<?php echo $row->name?>">
	                    </a>
	                  </div>
	                  <div class="item-info">
	                    <div class="item-title">
	                      	<a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug)?>" title="<?php echo $row->name?>"> <?php echo $row->name?></a>
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
	         <!-- /Được xem nhiều -->
        </div>
      </div>
    </div>
  </div>
</div>