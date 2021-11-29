<div class="main_content">
              
        <div class="box_product">
                  <div class="tlt_product">
                      <h1 class="tlt_ct">Dự Án</h1>
                    </div>
          
                </div>
                <div class="box_news0911 clearfix">
                  <ul>
              <?php if($list_all):?>
                <?php foreach($list_all as $row):?>
                      <li>
                          <div class="item_news">
                              <a href="<?php echo base_url('du-an/'.$row->slug.'.html')?>" class="img_news0911"><img src="<?php echo !empty($row->image_link) ? $row->image_link : ''?>" alt="<?php echo $row->title?>"></a>
                                <div class="txt_news0911">
                                  <h2><a href="<?php echo base_url('du-an/'.$row->slug.'.html')?>"><?php echo $row->title?></a></h2>
                  <?php echo !empty($row->intro) ? $row->intro : '' ?>
                  <a href="<?php echo base_url('du-an/'.$row->slug.'.html')?>" class="btn_news">Chi tiết »</a>
                                </div>
                            </div>
                        </li>
                <?php endforeach;?>
              <?php endif;?>
                    </ul>
                </div>
                
              <div class="pagi">
                <ul class="pagination">
                      <?php echo $this->pagination->create_links()?>
                </ul>
              </div>
            </div>