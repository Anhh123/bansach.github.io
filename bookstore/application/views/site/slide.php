<?php if(count($list_slide) > 0):?>

  <div id="owl-index" class="owl-carousel owl-theme">
    <?php foreach($list_slide as $row):?>
      <div class="item">
        <a href="<?php echo $row->link?>">
        <img src="<?php echo $row->image_link?>" alt="<?php echo $row->name?>" />
        </a>
      </div>
    <?php endforeach;?>
  </div>
<?php else:?>

<?php endif;?>