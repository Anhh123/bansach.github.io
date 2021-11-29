<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
      <h4>
        <a href="index.html" class="logo">
        <img src="<?php echo public_url('site/bookstore')?>/library/Book-header.png " alt="Shop">
        </a>
      </h4>
      <p class="footer-intro">
        Với mong muốn mang lại cho người mua một điểm đến lý tưởng và đáng tin cậy với những trải nghiệm tốt nhất. Bạn sẽ cỏ thể dễ dàng và nhanh chóng lựa chọn được những quyển sách ưng ý và giá lại phải chăng!<br/>
        Shop cảm ơn tất cả mọi người đã luôn ủng hộ và cam kết phục vụ bạn hết mình.
      </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
      <h4> Địa chỉ </h4>
      <div class="footer-address clearfix">
        <span><i class="fa fa-map-marker"></i></span>
        <p> Hoàng Mai , Hà Nội </p>
      </div>
      <div class="footer-address clearfix">
        <span><i class="fa fa-mobile"></i></span>
        <p> 0123456789 </p>
      </div>
      <div class="footer-address clearfix">
        <span class="email"><i class="fa fa-envelope-o"></i></span>
        <p> bucsotore@shop.com </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
      <h4> Mua sắm </h4>
      <ul>
        <?php foreach($catalog_0 as $row):?>
          <?php if(count($row->menu_1) <= 0):?>
        <li><a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?></a></li>
          <?php else:?>
        <li>
          <a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?>
          </a>
          <div class="">
            <?php foreach($row->menu_1 as $value):?>
              <?php if(count($value->menu_2) > 0):?>
                <div class="">
                  <ul>
                    <li><a href="<?php echo base_url($value->slug).'/'?>" class="title"><?php echo $value->name?></a></li>
                      <?php foreach($value->menu_2 as $value2):?>
                    <li><a href="<?php echo base_url($value2->slug).'/'?>"><?php echo $value2->name?></a></li>
                      <?php endforeach;?>
                  </ul>
                </div>
              <?php else:?>
              <?php endif;?>
            <?php endforeach;?>
        </li>
          <?php endif;?>
        <?php endforeach;?>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 footer-block fb">
      <h4> fanpage facebook </h4>
      <div class="fb-like-box small--hide" style="width:100%; !important" data-height="200" data-width="240">

      <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Joyless.Phan&amp;width=262&amp;height=220&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" style="border:none; overflow:hidden; width:262px; height:220px;" allowtransparency="true" frameborder="0">
      </iframe>
      </div>
    </div>
  </div>
</div>