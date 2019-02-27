<section class="system-page">
<div class="system-nav hasSubMenu">
  <span class="line-border"></span>
  <a class="system-menu-dropdown"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/down_small_blue.png" class="dropdown-arrow"/></a>
  <nav>
    <ul>
      <?php $system_sub_menu = get_field('system_submenu_items');
      if( $system_sub_menu ):
        foreach( $system_sub_menu as $system_sub_menu_items ):?>
        <li><a href="<?php echo $system_sub_menu_items['system_submenu_item_url']; ?>" id="<?php echo $system_sub_menu_items['system_submenu_item_name']; ?>"><?php echo $system_sub_menu_items['system_submenu_item_name']; ?></a></li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</nav>
</div>
<div class="intro-banner-wrap">
  <div class="gradient-overlay"></div>
  <div class="banner">
    <div class="banner-heading">
      <h1 class="banner-caption fade-up-hero">
        <?php echo get_field('system_header_main_text'); ?>
      </h1>
    </div>
    <div class="banner-description">
      <p class="fade-up-hero-desc">
        <?php echo get_field('system_header_text_description'); ?>
      </p>
    </div>
    <div class="intro-section-button-container fade-up-hero-desc">
      <a href="<?php echo get_button_url('shopify_button_url',pll_current_language()) ?>" class="btn btn--pink buy-link"><?php echo get_field('shopify_button_text', pll_current_language()); ?></a>
    </div>
  </div>
</div>

<section class="section-2 section-padding section-panel" id="smartpod">
  <div class="section-wrap full-page grey-bg ">
    <div class="pitch-lines">
      <object>
        <embed src="<?php echo get_template_directory_uri(); ?>/assets/images/Pitch.svg">
        </object>
      </div>
      <div class="pod-image" style="background:url('<?php echo get_field('system_smartpod_section_image'); ?>')">
      </div>
      <div class="scrolling-content" id="scroll-content-1">
        <div class="content fade-up">
          <h3 class="section-title-medium"><?php echo get_field('system_smartpod_section_heading'); ?></h3>
          <p class="sample-desc">
           <?php echo get_field('system_smartpod_section_description'); ?>
         </p>
         <p class="btn-container">
           <a href="<?php echo get_button_url('shopify_button_url',pll_current_language()) ?>" class="btn btn--pink buy-link"><?php echo get_field('shopify_button_text', pll_current_language()); ?></a>
         </p>
       </div>
     </div>
    </div>
  </section>
 <section class="section-3 section-panel section-padding">
  <div class="section-wrap full-page">
    <div class="pitch-lines">
      <object>
      <embed src="<?php echo get_template_directory_uri(); ?>/assets/images/Pitch.svg">
      </object>
    </div>
    <div class="pod-image" style="background:url('<?php echo get_field('system_smartpod_section_image'); ?>')">
    </div>
      <?php echo get_field('system_smartpod_specification_contents'); ?>
  </div>
</section>
<section class="section-4 section-panel section-padding">
  <div class="section-wrap full-page">
    <div class="pod-dock" style="background:url('<?php echo get_field('system_smartpod_section_main_image_2'); ?>')"></div>
   <?php echo get_field('system_smartpod_specification_sub_contents'); ?>
  </div>
</section>
<section class="section-5 section-padding">
  <div class="top-image-wrapper">
    <img class="fade-in-ltr" src="<?php echo get_template_directory_uri(); ?>/assets/images/pod-player-3-2x.jpg" alt=""/>
  </div>
  <div class="section-wrap full-page pod-light-bg-section-wrap">
    <div class="right-sect">
      <img class="second-image fade-in-rtl" src="<?php echo get_field('system_smartpod_right_section_image'); ?>"/>
    </div>
    <div class="left-sect">
      <img class="first-image pod-light-bg-left-sect fade-in-ltr" src="<?php echo get_field('system_smartpod_left_section_image'); ?>"/>
      <div class="content fade-up">
        <h3 class="section-title-medium"><?php echo get_field('system_smartpod_left_section_text_1'); ?></h3>
        <p>
          <?php echo get_field('system_smartpod_left_section_text_description'); ?>
        </p>
        <div class="link-bar">
          <a class="full-spec-link" href="javascript:void(0)"><?php echo get_field('system_smartpod_left_section_link_text'); ?> <span class="animated-arrow"><img class="arrow-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg"/></span></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-6 section-padding" id="smartvest">
  <div class="section-wrap full-page">
    <div class="vest-image" style="background:url('<?php echo get_field('system_smartvest_main_banner_image'); ?>')"></div>
    <div class="content fade-up">
      <h3 class="section-title-medium"><?php echo get_field('system_smartvest_section_heading'); ?></h3>
      <p class="sample-desc">
        <?php echo get_field('system_smartvest_section_description'); ?>
      </p>
      <p class="btn-container">
        <a href="<?php echo get_button_url('storewise_smart_vest_url',pll_current_language()) ?>" class="btn btn--pink buy-link"><?php echo get_field('shopify_button_text', pll_current_language()); ?></a>
      </p>
    </div>
  </div>
</section>
<section class="section-7 section-padding">
  <div class="section-wrap full-page">
    <?php
    $featured_images_content = get_field('system_smartvest_subsection_banner_contents');
    if( $featured_images_content ):  $l = 1; ?>
    <?php foreach( $featured_images_content as $show_images ):?>
      <div class="featured-image" id="feature-image-<?php echo $l; ?>" style="background:url('<?php echo $show_images['system_smartvest_subsection_image']; ?>')"></div>
      <?php $l++; endforeach; ?>
    <?php endif; ?>
      <?php
      if( $featured_images_content ): ?>
      <?php foreach( $featured_images_content as $show_contents ):?>
        <?php echo $show_contents['system_smartvest_subsection_content']; ?>
        <?php endforeach; ?>
      <?php endif; ?>
  </div>
</section>
<section class="section-8 section-padding">
  <!-- <div class="top-image-wrapper">
    <img class="fade-in-ltr" src="<?php //echo get_template_directory_uri(); ?>/assets/images/Smartvest-player-3-2x-1.jpg" alt=""/>
  </div> -->
  <div class="section-wrap full-page">
    <div class="right-sect">
      <img class="second-image fade-in-rtl" src="<?php echo get_field('system_smartvest_right_section_image'); ?>"/>
    </div>
    <div class="left-sect">
      <img class="first-image fade-in-ltr" src="<?php echo get_field('system_smartvest_left_section_image'); ?>"/>
      <div class="content fade-up">
        <h3 class="section-title-medium"><?php echo get_field('system_smartvest_left_section_text_1'); ?></h3>
        <p>
          <?php echo get_field('system_smartvest_left_section_text_description'); ?>
        </p>
        <div class="link-bar">
          <a class="full-spec-link" href="javascript:void(0)"><?php echo get_field('system_smartvest_left_section_link_text'); ?> <span class="animated-arrow"><img class="arrow-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg"/></span></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-9 section-padding" id="smartapp">
  <div class="section-wrap full-page">
    <div class="content fade-up">
      <h3 class="section-title-medium"><?php echo get_field('system_smartapp_section_heading'); ?></h3>
      <p class="sample-desc"><?php echo get_field('system_smartapp_section_description'); ?></p>
      <div class="links">
        <a href="<?php echo get_button_url('app_store_download_link','options') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/app-store-white.svg"/></a>
        <a href="<?php echo get_button_url('google_play_store_download_link','options') ?>" class="<?php echo get_playstore_class(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/play-store-white.svg"/></a>
      </div>
      <?php if(get_field('play_store_button_deactive', pll_current_language()) == true) { ?>
      <span class="app-store_notify_me">
        <span class="notify_text"> Coming soon to Android </span>
        <a href="javascript:void(0);" class="notify_btn"> Notify me </a>
      </span>
      <?php } ?>
    </div>
    <div class="wave"></div>
  <div class="vertical-bars"></div>
  <div class="iphone-img hand-image hand-img--section"></div>
  <!-- <div class="hand-image">
    <img src="<?php echo get_field('system_smartapp_section_banner_image')['url']; ?>" alt="<?php echo get_field('system_smartapp_section_banner_image')['alt']; ?>"/>
  </div> -->
</div>
</section>
<section class="section-10 section-padding">
  <div class="section-wrap full-page">
    <ul class="scroll-paginate scroll-paginate-2">
      <li><a class="scroll-highlight active" id="scroll-highlight-1"></a></li>
      <li><a class="scroll-highlight" id="scroll-highlight-2"></a></li>
      <li><a class="scroll-highlight" id="scroll-highlight-3"></a></li>
    </ul>
    <div class="left-sect">
      <div class="content">
        <?php
        $scrolling_items = get_field('system_smartapp_section_scrolling_items');
        if( $scrolling_items ): $i=1; ?>
        <?php foreach( $scrolling_items as $scrolling_items_details ): ?>
          <div id="system-record-<?php echo $i; ?>" class="scrolling-text">
            <div class="record-image-mobile">
              <div class="featured-image">
                <img src="<?php echo $scrolling_items_details['system_smartapp_scrolling_background_image']['url'];?>" alt="<?php echo $scrolling_items_details['system_smartapp_scrolling_background_image']['alt'];?>"/>
              </div>
              <div class="mobile-img">
                <img src="<?php echo $scrolling_items_details['system_smartapp_scrolling_overlay_image']['url'];?>" alt="<?php echo $scrolling_items_details['system_smartapp_scrolling_overlay_image']['alt'];?>"/>
              </div>
            </div>
            <div class="desc">
              <h3 class="record-title"><?php echo $scrolling_items_details['system_smartapp_scrolling_heading'];?></h3>
              <p><?php echo $scrolling_items_details['system_smartapp_scrolling_description'];?></p>
            </div>
          </div>
          <?php $i++; endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="right-sect">
      <?php if( $scrolling_items ): $j=1; ?>
        <?php foreach( $scrolling_items as $scrolling_items_backimage ): ?>
          <div class="featured-bg" id="featured-image-<?php echo $j;?>" style="background: url('<?php echo $scrolling_items_backimage['system_smartapp_scrolling_background_image']['url'];?>')"></div>
          <?php $j++; endforeach; ?>
        <?php endif; ?>
        <div class="iphone">
          <div class="iphone-container">
            <img src="<?php echo get_field('system_scrolling_item_phone_background_image'); ?>"/>
            <div class="iphone-screens">
              <?php if( $scrolling_items ): $k=1; ?>
                <?php foreach( $scrolling_items as $scrolling_items_overlay ): ?>
                  <img src="<?php echo $scrolling_items_overlay['system_smartapp_scrolling_overlay_image']['url'];?>" id="iphone-screen-<?php echo $k; ?>" class="iphone-screen" alt="<?php echo $scrolling_items_overlay['system_smartapp_scrolling_overlay_image']['alt'];?>">
                  <?php $k++; endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-11 section-padding">
      <div class="section-wrap">
        <div class="right-sect">
          <img class="second-image fade-in-ltr" src="<?php echo get_field('system_smartapp_right_section_image')['url']; ?>" alt="<?php echo pll_e(get_field('system_smartapp_right_section_image')['alt']) ?>"/>
        </div>
        <div class="left-sect">
          <img class="first-image fade-in-rtl" src="<?php echo get_field('system_smartapp_left_section_image')['url']; ?>" alt="<?php echo pll_e(get_field('system_smartapp_left_section_image')['alt']) ?>"/>
          <div class="content">
            <h3 class="section-title-medium"><?php echo get_field('system_smartapp_left_section_text_1'); ?></h3>
            <p>
              <?php echo get_field('system_smartapp_left_section_text_description'); ?>
            </p>
            <div class="link-bar">
              <a class="learn-more-link btn btn--dark-blue animate-btn" href="<?php echo get_field('system_smartapp_left_section_learn_more')['url']; ?>"><?php echo get_field('system_smartapp_left_section_learn_more')['title']; ?></a>
              <a class="full-spec-link" href="javascript:void(0)"> <?php echo get_field('system_smartapp_left_section_link_text'); ?> <span class="animated-arrow"><img class="arrow-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg"/></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-12" id="productspec">
      <div class="section-wrap">
        <h3 class="section-title"><?php echo get_field('system_smartapp_product_sepcification_title'); ?></h3>
        <ul class="full-spec-list">
          <?php
          $product_Specification = get_field('system_smartapp_product_details_section');
          if( $product_Specification ): ?>
          <?php foreach( $product_Specification as $product_Specification_details ): ?>
            <li class="list-item">
              <a class="item" href="javascript:void(0)"><?php echo $product_Specification_details['system_smartapp_product_details_title']; ?></a>
              <span class="plus-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/more.svg"/>
              </span>
              <ul class="details">
                <?php
                foreach ($product_Specification_details['system_smartapp_product_items'] as $prod_individual_items){ ?>
                <li><?php echo $prod_individual_items['system_smartapp_product_item_names']; ?></li>
                <?php } ?>
              </ul>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <section class="section-13" id="systemgallery">
    <div class="custom-direction-nav">
      <a href="javascript:void(0)" class="direction-prev">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="146" height="173" viewBox="0 0 146 173" class="svg-slider-arrow" id="svgObject-1">
          <defs>
            <style>
            body.isIE .filler-prev {
              display: none;
            }
            .filler-prev {
              stroke-dasharray:240;
              stroke-dashoffset: 0;
              transition: all 0.5s ease;
              opacity: 0;
              animation: dash-fill linear forwards;
              animation-iteration-count: 1;
              animation-duration: 1s;
            }
            @-webkit-keyframes dash-empty {
              from {
                stroke-dashoffset: 240;
              }
              to {
                stroke-dashoffset: 0;
              }
            }

            #icon_arrow_gallery_loader_web-r {
              cursor:pointer;
            }
            body.system .hover-fill-item:hover + .filler-prev {
              opacity: 1;
              transition: all 0.5s ease;
              -webkit-animation: dash-empty linear forwards;
              animation: dash-empty linear forwards;
              animation-iteration-count: 1;
              animation-duration: 1s;
            }
            @-webkit-keyframes dash-fill {
              from {
                stroke-dashoffset: 240;
              }
              to {
                stroke-dashoffset: 0;
              }
            }
          </style>
          <filter id="icon_arrow_gallery_loader_web-a" width="271.4%" height="185.7%" x="-85.7%" y="-42.9%" filterUnits="objectBoundingBox">
            <feOffset in="SourceAlpha" result="shadowOffsetOuter1"/>
            <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"/>
            <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
            <feMerge>
              <feMergeNode in="shadowMatrixOuter1"/>
              <feMergeNode in="SourceGraphic"/>
            </feMerge>
          </filter>
          <polygon id="icon_arrow_gallery_loader_web-b" points="0 0 7 0 7 14 0 14"/>
          <rect id="icon_arrow_gallery_loader_web-e" class="prev icon_arrow_loader_slick" width="70" height="70" x="5" y="5" rx="35"/>
          <filter id="icon_arrow_gallery_loader_web-d" width="378.6%" height="378.6%" x="-137.9%" y="-117.9%" filterUnits="objectBoundingBox">
            <feOffset dx="1" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"/>
            <feMorphology in="SourceAlpha" radius="1.5" result="shadowInner"/>
            <feOffset dx="1" dy="15" in="shadowInner" result="shadowInner"/>
            <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1"/>
            <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="30"/>
            <feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
          </filter>
        </defs>
        <g fill="none" fill-rule="evenodd" transform="rotate(-90 81.5 61.5)">
          <g filter="url(#icon_arrow_gallery_loader_web-a)" transform="rotate(-90 38 5)">
            <mask id="icon_arrow_gallery_loader_web-c" fill="#fff">
              <use xlink:href="#icon_arrow_gallery_loader_web-b"/>
            </mask>
            <path fill="#FFF" d="M1.42458261,13 L0,11.555896 L4.98603915,6.50051064 L0,1.4451253 L1.42458261,0 L6.41062176,5.05640663 C7.19645941,5.85199152 7.19645941,7.14902977 6.41062176,7.94461466 L1.42458261,13 Z" mask="url(#icon_arrow_gallery_loader_web-c)"/>
          </g>
          <g transform="rotate(-83 40 40)">
            <use fill="#000" filter="url(#icon_arrow_gallery_loader_web-d)" xlink:href="#icon_arrow_gallery_loader_web-e" class="hover-fill-item prev icon_arrow_loader_slick"/>
            <rect class="filler-prev" width="68.5" height="68.5" x="5.75" y="5.75" stroke="#FFF" stroke-width="1.5" rx="34.25"/>
          </g>
        </g>
      </svg>
    </a>
    <a href="javascript:void(0)" class="direction-next">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="146" height="173" viewBox="0 0 146 173" class="svg-slider-arrow" id="svgObject-2">
        <defs>
          <style>
          body.isIE .filler-next {
            display: none;
          }
          .filler-next {
            stroke-dasharray:240;
            stroke-dashoffset: 0;
            transition: all 0.5s ease;
            -webkit-animation: dash-fill linear forwards;
            animation: dash-fill linear forwards;
            animation-iteration-count: 1;
            animation-duration: 0.5s;
            opacity: 0;
          }
          @-webkit-keyframes dash-empty {
              from {
                stroke-dashoffset: 240;
              }
              to {
                stroke-dashoffset: 0;
              }
            }
          .hover-fill-item-right:hover + .filler-next {
              transition: all 0.5s ease;
              -webkit-animation: dash-empty linear forwards;
              animation: dash-empty linear forwards;
              animation-iteration-count: 1;
              animation-duration: 1s;
              opacity: 1;
            }
            @-webkit-keyframes dash-fill {
              from {
                stroke-dashoffset: 0;
              }
              to {
                stroke-dashoffset: 240;
              }
            }

        </style>
        <filter id="icon_arrow_gallery_loader_web-a" width="271.4%" height="185.7%" x="-85.7%" y="-42.9%" filterUnits="objectBoundingBox">
          <feOffset in="SourceAlpha" result="shadowOffsetOuter1"/>
          <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"/>
          <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
          <feMerge>
            <feMergeNode in="shadowMatrixOuter1"/>
            <feMergeNode in="SourceGraphic"/>
          </feMerge>
        </filter>
        <polygon id="icon_arrow_gallery_loader_web-b" points="0 0 7 0 7 14 0 14"/>
        <rect id="icon_arrow_gallery_loader_web-r" class="next icon_arrow_loader_slick" width="70" height="70" x="5" y="5" rx="35"/>
        <filter id="icon_arrow_gallery_loader_web-d" width="378.6%" height="378.6%" x="-137.9%" y="-117.9%" filterUnits="objectBoundingBox">
          <feOffset dx="1" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"/>
          <feMorphology in="SourceAlpha" radius="1.5" result="shadowInner"/>
          <feOffset dx="1" dy="15" in="shadowInner" result="shadowInner"/>
          <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1"/>
          <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="30"/>
          <feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
        </filter>
      </defs>
      <g fill="none" fill-rule="evenodd" transform="rotate(-90 81.5 61.5)">
        <g filter="url(#icon_arrow_gallery_loader_web-a)" transform="rotate(90 5 41)">
          <mask id="icon_arrow_gallery_loader_web-c" fill="#fff">
            <use xlink:href="#icon_arrow_gallery_loader_web-b"/>
          </mask>
          <path fill="#FFF" d="M1.42458261,13 L0,11.555896 L4.98603915,6.50051064 L0,1.4451253 L1.42458261,0 L6.41062176,5.05640663 C7.19645941,5.85199152 7.19645941,7.14902977 6.41062176,7.94461466 L1.42458261,13 Z" mask="url(#icon_arrow_gallery_loader_web-c)"/>
        </g>
        <g transform="rotate(-83 40 40)">
          <use class="hover-fill-item-right next icon_arrow_loader_slick" fill="#000" filter="url(#icon_arrow_gallery_loader_web-d)" xlink:href="#icon_arrow_gallery_loader_web-r"/>
          <rect class="fill-load filler-next" width="68.5" height="68.5" x="5.75" y="5.75" stroke="#FFF" stroke-width="1.5" rx="34.25"/>
        </g>
      </g>
    </svg>
  </a>
</div>
<div class="partial-slick-slide dark-slick-navi">
  <?php
  $section_main_slider = get_field('system_page_bottom_slider');
  if( $section_main_slider ): ?>
  <?php foreach( $section_main_slider as $section_main_slider_items ):
  ?>
  <div>
    <div class="s-slide-wrap">
      <div class="s-slide">
        <div class="s-slide-img" style="background:url('<?php echo $section_main_slider_items['system_page_bottom_slider_image']; ?>')"></div>
      </div>
      <div class="s-caption">
        <p><?php echo $section_main_slider_items['system_page_bottom_slider_text']; ?></p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</section>
<section>
  <div class="page-links two">
    <a class="link" href="<?php echo get_field('system_footer_left_banner_navigation_link'); ?>">
      <div class="featured-image" style="background:url('<?php echo get_field('system_footer_section_left_image'); ?>')">
        <div class="content scale-up">
          <p><?php echo get_field('system_footer_section_left_banner_text'); ?></p>
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg" class="rotate-180"/>
          </div>
        </div>
      </div>
    </a>
    <a class="link" href="<?php echo get_field('system_footer_right_banner_navigation_link'); ?>">
      <div class="featured-image" style="background:url('<?php echo get_field('system_footer_section_right_image'); ?>')">
        <div class="content scale-up">
          <p><?php echo get_field('system_footer_section_right_banner_text'); ?></p>
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>
</section>
