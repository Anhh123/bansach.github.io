<div class="col-xs-12 col-sm-3 ">
  <?php if(count($list_ads) > 0):?>
    <?php foreach($list_ads as $row):?>
      <div class="banner-top">
        <div class="overlay">
          <a href="<?php echo $row->href?>"><i class="fa fa-plus"></i></a>
        </div>
        <a href="<?php echo $row->href?>">
          <img src="<?php echo $row->image_link?>" alt="<?php echo $row->name?>">
        </a>
      </div>
    <?php endforeach;?>

  <!-- Trường hợp xấu -->
  <?php else:?>
  <?php endif;?>
</div>