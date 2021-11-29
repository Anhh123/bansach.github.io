<div class="megamenu-title">
  <h3 class="title_font"><i class="fa fa-align-justify"></i> Danh mục sản phẩm</h3>
</div>
<ul>
  <li><a href="<?php echo base_url()?>">Trang chủ</a></li>

  <!-- 1 -->
  <?php foreach($catalog_0 as $row):?>
    <!-- Danh mục -->
    <?php if(count($row->menu_1) <= 0):?>
  <li><a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?></a></li>
    <?php else:?>
  <li>
    <a href="<?php echo base_url($row->slug).'/'?>"><?php echo $row->name?>
      <i class="fa fa-angle-right hidden-xs"></i>
    </a>
    <div class="mega-menu-sub hidden-xs">
      <?php foreach($row->menu_1 as $value):?>
        <?php if(count($value->menu_2) > 0):?>
          <div class="item-menu">
            <ul>
              <li><a href="<?php echo base_url($value->slug).'/'?>" class="title"><?php echo $value->name?></a></li>
                <?php foreach($value->menu_2 as $value2):?>
              <li><a href="<?php echo base_url($value2->slug).'/'?>"><?php echo $value2->name?></a></li>
                <?php endforeach;?>
            </ul>
          </div>
        <?php else:?>
          <div class="item-menu">
            <ul class="sub-menu">
              <li><a href="<?php echo base_url($value->slug).'/'?>" class="title"><?php echo $value->name?></a></li>
            </ul>
          </div>
        <?php endif;?>
      <?php endforeach;?>
    </div>
  </li>
    <?php endif;?>
  <?php endforeach;?>

  <li><a href="<?php echo base_url('tin-tuc').'/'?>">Blog</a></li><!-- Tin tức -->
  <li><a href="<?php echo base_url('gioi-thieu').'/'?>">Giới thiệu</a></li>
</ul>