<div class="main_content">
              
        <div class="box_product">
                  <div class="bread clearfix">
                      <ul>
                          <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="<?php echo base_url('du-an')?>">Dự Án</a></li>
                        </ul>
                    </div>
          <div class="box_content">
          <h1><?php echo $info->title?></h1>
            <?php echo !empty($info->content) ? $info->content : ''?>
          </div>      
                </div>
                <div class="news_lq1011">
                  <div class="tlt_contact">
                      <h2 class="tlt_txt">Các Tin khác </h2>
                    </div>
                    <div class="ul_news1011">
                      <ul>
                      <?php if($related_dichvu):?>
                      <?php foreach($related_dichvu as $row):?>
                          <li>
                          <a href="<?php echo base_url('du-an/'.$row->slug.'.html')?>"><?php echo $row->title?><span>(<?php echo get_date($row->created)?>)</span></a>
                          </li>
                        <?php endforeach;?>
                     <?php endif;?>
                      </ul>
                    </div>
                </div>
            </div>