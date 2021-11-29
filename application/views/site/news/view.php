<script src="<?php echo public_url('site/bookstore')?>/library/jquery.elevatezoom.min.js" type='text/javascript'></script>
<div id="article" class="article-detail clearfix">
  <div class="row article" >
    <div class="main-content">
      <div class="col-md-12 blog-breadcrumb clearfix" >
        <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
          <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
          <li><a href="<?php echo base_url('tin-tuc').'/';?>" target="_self">Tin tức</a> </li>
          <li class="active"><span><?php echo $info->title?></span></li>
        </ol>
      </div>
      <!-- Begin article -->
      <div class="article-body">
        <div class="col-md-9 articles clearfix" id="layout-page">
          <div class="page-title">
            <h1><?php echo $info->title?></h1>
          </div>
          <p class="date">Ngày đăng: <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_date_full($info->created,$full_time=false);?></p>
          <div class="content-page">
            <div class="col-md-12 article-content">
              <div class="body-content">
                  <?php echo $info->content;?>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="col-md-12  pl0">
              <!-- Begin article comments -->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;padding:0px;">
              </div>
              <!-- End article comments -->
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
                      <span style="color: #777; font-size: 12px; "><?php echo $row->tac_gia ?></span>
                      <span style="display: inline-block; font-size: 20px; margin-top: 5px; float: right; padding-right: 50px">
                        <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060919" >
                        <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                      </span>
                    </div>
                    <div style="height: 1px;border-bottom: 1px solid #777;margin:5px 50px 10px 20px;"></div>
                  <?php if($row->discount > 0 && $row->price > 0):?>
                    <div class="special-price">
                      Giá bán:<span class="price"><?php echo number_format($row->price - $row->discount)?> vnđ</span>
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
          <div class="wrap-in ">
            <div class="block-title">
              <div class="block-title clearfix">
                <h3 >
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span class="title">
                    Tin Liên Quan
                  </span>
                </h3>
              </div>
              <div class="postDetails">
              <?php foreach($related_news as $row):?>
                <p class="create-time text-right">
                  <a href="<?php echo base_url('tin-tuc/'.$row->slug)?>"><?php echo $row->title?></a>
                </p>
              <?php endforeach;?>
              </div>
            </div>
          </div>
          <!-- /Tin liên quan -->
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  ul.nav.visible-lg.visible-md li a{
  }
  h4.username {
    font-size: 100%;
    line-height: normal;
    color: #d31c23;
  }
  input, textarea, select {
    display: inline-block;
    padding: 6px;
    line-height: 1.428571429;
    vertical-align: middle;
    border: 1px solid #ddd;
  }
  input#comment_author{
    margin: 0 0;
    padding: 5px 10px;
    max-width: 215px;
  }
  input#comment_email{
    margin: 0 0;
    padding: 5px 10px;
    max-width: 215px;
  }
  textarea#comment_body{
    height: 180px;
    width: 95%;
  }
  .cmt-heading h2 {
    font-size: 125%;
    line-height: 24px;
  }
  .input-box.cmt-user, .input-box.cmt-email{
    margin-bottom: 20px;
  }
  button#comment-submit{
    font-size: 100%;
    -webkit-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -ms-transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    text-transform: uppercase;
    padding: 7px 50px;
    line-height: 20px;
    height: 45px;
    border: none;
    background: none;
    color: #666;
    background: #f5f5f5;
    display: inline-block;
    vertical-align: middle;
    position: relative;
    margin-top: 10px;
  }
  .notice {
    margin: 5px 0px;
  }
  .postDetails {
    margin-top: 20px;
  }
  div#binhluan .comment {
    margin: 0px 0px 20px 0px;
  }
  div#binhluan {
    margin: 10px 0px;
    padding: 0px;
  }
  .product-comment{
    margin-top:0px;
  }
  button#comment-submit:hover {
    background: #d31c23;
    color: #fff;
  }
</style>