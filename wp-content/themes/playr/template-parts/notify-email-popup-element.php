<section class="notify-email-popup-section">
  <div class="notify-email-popup-loyout common-popup-loyout bg-black"></div>
  <div class="notify-email-popup common-popup">
    <div class="popup-inner-wrapper">
      <div class="left-pannel">
        <figure class="item-image" style="background-image: url(<?php echo get_field('notify_popup_image', 'options' ); ?>);"></figure>
      </div>
      <div class="right-pannel">
        <div class="close-button-wrapper">
          <a href="javascript:void(0);" class="close-popup-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close_blue.svg" alt="close popup"/>
          </a>
        </div>
        <div class="content-wrapper">
          <label>NOTIFY ME</label>
          <h2><?php the_field('notify_text', 'options' ); ?></h2>
        </div>
        <div class="form-section">
          <label>SIGN UP</label>
          <?php echo do_shortcode( '[contact-form-7 id="1611" title="Notify Popup Form"]' ); ?>
          <button type="button" class="cancel-btn">No thanks</button>
        </div>
      </div>
    </div>
  </div>
</section>

