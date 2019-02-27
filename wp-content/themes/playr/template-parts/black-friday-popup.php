<?php 
if ( get_field( 'enable_black_friday_popup', pll_current_language('slug') ) ): ?>
<?php
$time_zone_choosen = get_field( 'black_friday_popup_timezone', pll_current_language('slug') );
$popup_start_date = get_field( 'black_friday_popup_start_date', pll_current_language('slug') );
$popup_end_date = get_field( 'black_friday_popup_end_date', pll_current_language('slug') );
date_default_timezone_set($time_zone_choosen);
$get_today_date = date('Y-m-d H:i:s');
if($get_today_date > $popup_start_date && $get_today_date < $popup_end_date) { ?>
<section class="black-friday-popup-wrapper common-popup-wrapper newsletter-popup-section">
  <div class="black-friday-popup-layout common-popup-loyout bg-white"></div>
  <div class="black-friday-popup common-popup bg-white common-active-popup-inner-wrap">
    <div class="popup-inner-wrapper">
      <div class="left-pannel">
        <figure class="item-image" style="background-image: url(<?php echo get_field('black_friday_popup_image', pll_current_language('slug') ); ?>);"></figure>
      </div>
      <div class="right-pannel">
        <div class="close-button-wrapper">
          <a href="javascript:void(0);" class="close-popup-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close_blue.svg" alt="close popup"/>
          </a>
        </div>
        <div class="content-wrapper">
        <div class="item-mobile" style="background-image: url(<?php echo get_field('black_friday_popup_image', pll_current_language('slug') ); ?>);"></div>
          <span class="percent-off">
            <?php the_field('black_friday_popup_label', pll_current_language('slug') ); ?>
          </span>
          <h2 class="title-heading">
            <?php the_field('black_friday_popup_heading', pll_current_language('slug') ); ?>
          </h2>
          <?php if( get_field('black_friday_popup_description', pll_current_language('slug')) ) { ?>
            <p class="desc">
              <?php the_field('black_friday_popup_description', pll_current_language('slug') ); ?>
            </p>
          <?php } ?>
          <div class="price-detail">
            <del>
              <span class="old-price">
                <?php the_field('black_friday_popup_old_price', pll_current_language('slug') ); ?>
              </span>
            </del>
            <span class="new-price">
              <?php the_field('black_friday_popup_new_price', pll_current_language('slug') ); ?>
            </span>
          </div>
        </div>
        <div class="btn-section">
          <a class="btn btn--pink" href="<?php echo sprintf('https://%s.playrsmartcoach.com/products/buy-playr-system', pll_current_language('slug')) ?>">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
 <?php } 
 date_default_timezone_set('UTC');?>
<?php endif; ?>
