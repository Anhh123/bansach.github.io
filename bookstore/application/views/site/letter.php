<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-8 newsletter">
      <div class="newsletter-info pull-left">
        <h4>
          Đăng ký theo dõi
        </h4>
        <span>Để nhận thông tin khuyến mãi mới nhất!</span>
      </div>
      <form accept-charset='UTF-8' action='#' class='contact-form' method='post'>
        <input name='form_type' type='hidden' value='customer'>
        <input name='utf8' type='hidden' value='✓'>
        <p class="footer_form">
          <input type="hidden" id="contact_tags" name="contact[tags]" value="khách hàng tiềm năng, bản tin" />
          <input name="contact[email]" type="email" placeholder="Đăng ký email" required="required" />
          <button class="le-button">Đăng ký</button>
        </p>
      </form>
    </div>
    <div class="col-xs-12 col-md-4 socials">
      <ul>
        <?php foreach ($social_list as $row): ?>
        <li>
          <a href="<?php echo $row->link ?>" title="<?php echo $row->name?>"> <?php echo $row->image_social ?> </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>