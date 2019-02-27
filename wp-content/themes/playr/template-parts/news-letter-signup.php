<?php
if ( get_field( 'enable_home_page_news_letter_popup', 'options' ) ): ?>
<section class="newsletter-popup-section">
  <div class="newsletter-popup-loyout common-popup-loyout bg-black"></div>
  <div class="newsletter-popup common-popup newsletter-signup-popup common-active-popup show-image-mob">
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
          <!-- <label><?php //the_field('home_page_news_letter_popup_label', 'options' ); ?></label> -->
          <h2><?php the_field('home_page_news_letter_popup_heading', 'options' ); ?></h2>
          <p class="desc">
            <?php the_field('home_page_news_letter_popup_description', 'options' ); ?>
          </p>
        </div>
        <div class="form-section">
          <!-- <label>SIGN UP</label> -->
          <?php echo do_shortcode( '[contact-form-7 id="824" title="Newsletter Form"]' ); ?>
          <!-- <button type="button" class="cancel-btn">No thanks</button> -->
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- <div class="thankyou-popup common-popup">
    <div class="popup-inner-wrapper">
      <div class="right-pannel">
        <div class="close-button-wrapper">
          <a href="javascript:void(0);" class="close-popup-btn">
            <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/icons/close_blue.svg" alt="close popup"/>
          </a>
        </div>
        <div class="content-wrapper">
          <label>Thank you!</label>
        </div>
      </div>
    </div>
  </div> -->
</section>
<?php endif; ?>
