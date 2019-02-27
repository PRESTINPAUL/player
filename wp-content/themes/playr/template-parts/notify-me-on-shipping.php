<section class="notify-email-popup-section">
  <div class="notify-on-shipping-popup-loyout common-popup-loyout bg-black"></div>
  <div class="notify-on-shipping common-popup common-active-popup show-image-mob">
      <div class="common-active-popup-inner-wrap">
    <div class="popup-inner-wrapper">
      <div class="left-pannel">
        <figure class="item-image"></figure>
      </div>
      <div class="right-pannel">
        <div class="close-button-wrapper">
          <a href="javascript:void(0);" class="close-popup-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close_blue.svg" alt="close popup"/>
          </a>
        </div>
        <div class="content-wrapper">
          <!-- <label>NOTIFY ME</label> -->
          <h2><?php the_field('notify_shipping_text', 'options' ); ?></h2>
        </div>
        <div class="form-section">
          <!-- <label>SIGN UP</label> -->
          <?php echo do_shortcode( '[contact-form-7 id="1603" title="Notify On Shipping Form"]' ); ?>
          <!-- <button type="button" class="cancel-btn">No thanks</button> -->
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
