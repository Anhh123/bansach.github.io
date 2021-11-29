<div class="news-all">
  <div class="title_box_center">
     <h2 class="cufon h_title">
        Danh sách tin tuyển dụng
     </h2>
  </div>
    <?php foreach($list_tuyendung as $row):?>
  <div class="news-box">
    <div class="uk-grid uk-grid-small">
      <div class="img-outer uk-width-large-2-10">
        <div class="img-thum">
            <a class="uk-thumbnail" href="<?php echo base_url('tuyen-dung/'.$row->slug.'.html')?>">
                <img src="<?php echo ($row->image_link)?>" alt="<?php echo $row->title;?>" />
            </a>
        </div>
      </div>
      <div class="content-outer uk-width-large-6-10">
          <div class="content-inner">
              <div class="uk-panel">
                  <h3 class="uk-panel-title"><a href="<?php echo base_url('tuyen-dung/'.$row->slug.'.html')?>"><?php echo $row->title;?></a></h3>
                  <p><?php echo $row->intro;?></p>
              </div>
          </div>
      </div>
    </div>
  </div>
  <!-- End news-box -->
    <?php endforeach;?>
</div>