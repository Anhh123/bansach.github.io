
            <script src="<?php echo public_url('site/bookstore')?>/library/jquery.elevatezoom.min.js?v=232" type='text/javascript'></script>
            <div id="blog">
                <div class="main-content row">
                    <div class="col-md-12  clearfix" >
                        <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                            <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
                            <li class="active"><span>Blog - Tin tức</span></li>
                        </ol>
                    </div>

                    <!-- Begin content -->
                    <div class="blog-content col-sm-12">
                        <div class="row">
                            <div id="sns_main" class="col-md-9 col-main">
                                <div class="blogs-page">
                                    <div class="page-title">
                                      <h1>Tin tức</h1>
                                    </div>
                                    <?php if(count($list_all) > 0):?>
                                        <?php foreach($list_all as $row):?>
                                    <div class="postWrapper">
                                        <div class="postTitle">
                                            <h2><a href="<?php echo base_url('tin-tuc/'.$row->slug)?>"><?php echo $row->title?></a></h2>
                                        </div>
                                        <div class="postContent clearfix">
                                            <div class="image-article" style="float: ">
                                                <a href="<?php echo base_url('tin-tuc/'.$row->slug)?>">
                                                    <img src="<?php echo $row->image_link?>" alt="<?php echo $row->title?>">
                                                </a>
                                            </div>
                                            <span style="width: 50%; float: left;text-align: justify; margin-left: 10px"><?php echo !empty($row->intro) ? $row->intro : ''?><br></span>
                                            <p class="date" style="text-align: right;"><i class="fa fa-calendar" aria-hidden="true" style="margin-bottom: ; font-size: 20px"></i>&nbsp;&nbsp;<?php echo get_date_full($row->created);?></p>
                                            <a class="aw-blog-read-more" style="float: right;background-color: #f5f5f5;padding: 5px 15px;border-radius: 5px;border-bottom: 2px solid #aaa; margin-right: 15px" href="<?php echo base_url('tin-tuc/'.$row->slug)?>">Xem thêm</a>
                                        </div>
                                    </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                                <div class="row">

                                    <!-- Begin: Phân trang blog -->
                                    <div id="pagination" class="pagination">
                                         <?php echo $this->pagination->create_links();?>
                                    </div>
                                    <style>
                                        span.page-node.current{
                                            line-height: 30px;
                                            text-align: center;
                                            color: #d31c23;
                                            font-size: 15px;
                                            padding:0px 8px;
                                        }
                                        div#pagination a{
                                            font-size: 15px;
                                            padding: 0px 8px;
                                            border: none;
                                            background: none;
                                            border-radius: 0;
                                            color: #666;
                                            line-height: 30px;
                                        }
                                    </style>

                                    <!-- End: Phân trang blog -->
                                </div>
                            </div>
                            <div class="col-sm-3 clearfix">

                            <!-- Begin sidebar blog -->
                            <div class="wrap-in">
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
                                                <a class="product-image img-small" href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>">
                                                    <img src="<?php echo $row->image_link;?>" alt="<?php echo $row->name?>">
                                                </a>
                                            </div>
                                          <div class="item-info">
                                            <div class="item-title">
                                                <a href="<?php echo base_url($row->slug_catalog.'/'.$row->slug.'.html')?>" title="<?php echo $row->name?>"> <?php echo $row->name?></a>
                                                <span style="color: #777; font-size: 12px; "><?php echo $row->tac_gia ?></span>
                                                <span style="display: inline-block; font-size: 20px; margin-top: 5px; float: right; padding-right: 50px">
                                                    <a href="<?php echo base_url('cart/add/'.$row->id)?>" data-variantid="1007060919" >
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                </span>
                                            </div>
                                            <div style="height: 1px;border-bottom: 1px solid #777;margin:5px 50px 10px 20px;"></div>
                                            <?php if($row->discount > 0 && $row->price > 0):?>
                                            <div class="special-price">
                                              Giá bán: <span class="price"><?php echo number_format($row->price - $row->discount)?>vnđ</span>
                                            </div>
                                            <?php else:?>
                                            <div class="special-price">
                                              <span class="price"><?php if($row->price != 0){echo number_format($row->price).'vnđ';}else{echo 'Liên Hệ';} ?></span>
                                            </div>
                                            <?php endif;?>
                                          </div>
                                        </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <!-- End sidebar blog -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content -->
            </div>

