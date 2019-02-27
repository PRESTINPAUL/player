<section class="smartcoach-page">
    <div class="intro-banner-wrap">
      <div class="intro-banner-inner-wrap">
        <div class="banner">
            <div class="banner-heading">
              <h1 class="banner-caption fade-up-hero">
                  <?php echo get_field('smartcoach_header_main_text'); ?>
              </h1>
            </div>
            <div class="banner-description">
                <p class="fade-up-hero-desc">
                    <?php echo get_field('smartcoach_header_text_description'); ?>
                </p>
            </div>
            <div class="intro-section-store-icons fade-up-hero-desc">
                <a href="<?php echo get_button_url('app_store_download_link','options') ?>" class="app-store-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/app-store-white.svg" alt="App Store Image"/></a>
                <a href="<?php echo get_button_url('google_play_store_download_link','options') ?>" class="play-store-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/play-store-white.svg" alt="Play Store Image"/></a>
            </div>
        </div>
        <div class="waves">
        </div>
        <div class="vertical-bars" style="background:url('<?php echo get_template_directory_uri(); ?>/assets/images/LINES.png')">
        </div>
        <!-- <div class="hand-img hand-img--hero">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/SMARTCOACH-HAND.png') ?>"/>
        </div> -->
        <div class="iphone-img hand-img hand-img--hero"></div>
      </div>
    </div>
        <div class="section-bg-wrp fade-bg">
            <section class="section-1-1">
                <div class="right-sect">
                    <div class="slider-wrap slide-down">
                        <div class="mobile-slider dark-slick-navi">
                            <?php
                            $section_two = get_field('slider_section_two');
                            if( $section_two ): ?>
                            <?php foreach( $section_two as $section_two_image ):
                             ?>
                            <div>
                              <div class="g-slide" style="background: url('<?php echo $section_two_image['section_two_images']['url']; ?>')"></div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $slider_two_featured_image = get_field('slider_section_two_background_image');
                    ?>
                    <div class="featured-image fade-in-rtl" style="background:url('<?php echo $slider_two_featured_image['url']; ?>')"></div>
                </div>
                <div class="left-sect">
                    <div class="content fade-up">
                        <h3 class="section-title-small color-onyx">
                            <?php echo get_field('slider_two_left_content_heading'); ?>
                        </h3>
                        <p class="section-desc">
                            <?php echo get_field('slider_two_left_content_text_1'); ?>
                        </p>
                        <p class="section-desc">
                            <?php echo get_field('slider_two_left_content_text_2'); ?>
                        </p>
                        <p></p>
                    </div>
                </div>
            </section>
            <section class="section-1-2">
                <div class="left-sect">
                    <?php
                    $slider_three_featured_image = get_field('slider_section_three_background_image');
                    ?>
                    <div class="featured-image fade-in-ltr" style="background:url('<?php echo $slider_three_featured_image['url']; ?>')"></div>
                    <div class="slider-wrap slide-down">
                        <div class="mobile-slider dark-slick-navi">
                                <?php
                                $section_three = get_field('slider_section_three');
                                if( $section_three ): ?>
                                <?php foreach( $section_three as $section_three_image ):
                                ?>
                                <div>
                                    <div class="g-slide" style="background: url('<?php echo $section_three_image['section_three_images']['url']; ?>')"></div>
                               </div>
                               <?php endforeach; ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="right-sect">
                    <div class="content fade-up">
                        <h3 class="section-title-small color-onyx">
                            <?php echo get_field('slider_three_right_content_heading'); ?>
                        </h3>
                        <p class="section-desc">
                            <?php echo get_field('slider_three_right_content_text_1'); ?>
                        </p>
                        <p class="section-desc">
                            <?php echo get_field('slider_three_right_content_text_2'); ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    <section class="section-2">
        <div class="wrap fade-up">
            <p class="title-sub"><?php echo get_field('smartcoach_below_top_banner_text_1'); ?></p>
            <h2 class="section-title"><?php echo get_field('smartcoach_below_top_banner_text_2'); ?></h2>
            <p class="desc"><?php echo get_field('smartcoach_below_top_banner_description'); ?></p>
        </div>
        <div class="radial-gradient"></div>
    </section>
    <section class="section-3" id="smartcoach-peoples">
    <div class="linear-gradient"></div>
      <ul class="scroll-paginate">
        <li><a class="scroll-page-link active" id="scroll-page-1"></a></li>
        <li><a class="scroll-page-link" id="scroll-page-2"></a></li>
        <li><a class="scroll-page-link" id="scroll-page-3"></a></li>
    </ul>
    <div class="owner-strip">
        <div class="owner-radial-gradient"></div>
        <ul class="owner-strip-list">
         <?php
         $smartcoach_owners = get_field('smartcoach_page_coach_portfolio');
         $i = 1;
         if( $smartcoach_owners ): ?>
         <?php foreach( $smartcoach_owners as $owner_details ):
         ?>
         <li <?php if($i==1){ ?> class="active" <?php } ?> id="owner-<?php echo $i; ?>">
            <a>
                <img src="<?php echo $owner_details['coach_portfolio_member_image']; ?>" alt="coach_image"/>
            </a>
        </li>
        <?php $i++; endforeach; ?>
    <?php endif; ?>
</ul>
</div>
<div class="left-sect">
    <div class="best-teams-image">
        <?php if( $smartcoach_owners ):  $j = 1; ?>
            <?php foreach( $smartcoach_owners as $owner_details ):
            ?>
            <img id="best-team-image-<?php echo $j; ?>" class="training-image" src="<?php echo $owner_details['coach_portfolio_left_image']['url']; ?>" alt="<?php echo pll_e($owner_details['coach_portfolio_left_image']['alt']) ?>"/>
            <?php $j++; endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="right-sect">
    <div class="content-wrp">
    <div class="scroll-content">
        <?php if( $smartcoach_owners ): $k = 1; ?>
            <?php foreach( $smartcoach_owners as $owner_details ):?>
                <div id="scroll-content-<?php echo $k; ?>" class="scrollable-content">
                    <div class="mobile-only-training-image">
                      <img  class="training-image" src="<?php echo $owner_details['coach_portfolio_left_image']['url']; ?>" alt="<?php echo pll_e($owner_details['coach_portfolio_left_image']['alt']) ?>"/>
                  </div>
                  <div class="content">
                    <p class="title-sub"><?php echo $owner_details['coach_portfolio_title']; ?></p>
                    <h2 class="section-title"><?php echo $owner_details['coach_portfolio_coach_name']; ?></h2>
                    <p class="desc">
                        <?php echo $owner_details['coach_portfolio_coach_description']; ?>
                    </p>
                </div>
                <div class="quotes">
                    <p>
                        <?php echo $owner_details['coach_portfolio_coach_testimony']; ?>
                    </p>
                </div>
            </div>
            <?php $k++; endforeach; ?>
        <?php endif; ?>
    </div>
    </div>
</div>
</section>
<section class="section-4">
    <div class="section-wrap">
        <div class="bg-image" style="background:url('<?php echo get_field('smartcoach_page_middle_banner_image'); ?>')"></div>
        <div class="testimony fade-up">
            <p class="quote">
            <?php echo get_field('smartcoach_page_middle_banner_testimony'); ?>
            </p>
            <div class="author">
                <div class="dp-image" style="background:url('<?php echo get_field('smartcoach_page_middle_banner_testimony_image'); ?>')no-repeat;"></div>
                <div class="author-details">
                    <h5 class="desg"><?php echo get_field('smartcoach_page_middle_banner_testimony_designation'); ?></h5>
                    <h5 class="desg"><?php echo get_field('smartcoach_page_middle_banner_testimony_organisation'); ?></h5>
                    <p class="name"><?php echo get_field('smartcoach_page_middle_banner_testimony_name'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-5">
    <div class="section-wrap">
        <div class="left-sect">
            <div class="featured-image fade-in-ltr" style="background:url('<?php echo get_field('smartcoach_page_middle_slider_background_image'); ?>')"></div>
            <div class="slider-wrap">
                <div class="mobile-slider light-slick-navi slide-down">
                        <?php
                        $coach_slider = get_field('smartcoach_page_slider_section');
                        if( $coach_slider ): ?>
                        <?php foreach( $coach_slider as $slider_image ):
                        ?>
                        <div class="slides">
                            <div class="g-slide" style="background: url('<?php echo $slider_image['smartcoach_page_slider_images']; ?>')"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
</div>
<div class="right-sect">
    <div class="content fade-up">
        <p class="title-sub"><?php echo get_field('smartcoach_page_slider_right_section_text_1'); ?></p>
        <h3 class="sect-title"><?php echo get_field('smartcoach_page_slider_right_section_text_2'); ?></h3>
        <p class="desc"><?php echo get_field('smartcoach_page_slider_right_section_description'); ?></p>
        <div class="store-links">
            <a href="<?php echo get_button_url('app_store_download_link','options') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/app-store-white.svg" class="app-store"/></a>
            <a href="<?php echo get_button_url('google_play_store_download_link','options') ?>" class="<?php echo get_playstore_class(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/play-store-white.svg" class="play-store"/></a>
        </div>
        <?php if(get_field('play_store_button_deactive', pll_current_language()) == true) { ?>
        <span class="app-store_notify_me">
          <span class="notify_text"> Coming soon to Android </span>
          <a href="javascript:void(0);" class="notify_btn"> Notify me </a>
        </span>
        <?php } ?>
    </div>
</div>
</div>
</section>
<section class="section-6">
    <div class="section-wrap">
        <ul class="scroll-paginate scroll-paginate-2">
            <li><a class="active scroll-highlight" id="scroll-highlight-1"></a></li>
            <li><a class="scroll-highlight" id="scroll-highlight-2"></a></li>
            <li><a class="scroll-highlight" id="scroll-highlight-3"></a></li>
        </ul>
        <div class="left-sect">
            <div class="content">

                <?php
                $performance_insight = get_field('smartcoach_page_performance_insight_section');
                if( $performance_insight ):  $l = 1; ?>
                <?php foreach( $performance_insight as $performance_data ):
                ?>
                <div id="insight-text-<?php echo $l; ?>" class="scrolling-text">
                    <div class="performance-image-mobile">
                        <div class="featured-image">
                          <img src="<?php echo $performance_data['performance_insight_section_background_image']['url']; ?>" alt="<?php echo pll_e($performance_data['performance_insight_section_background_image']['alt']) ?>"/>
                      </div>
                      <div class="mobile-img">
                          <img src="<?php echo $performance_data['performance_insight_section_overlay_image']['url']; ?>" alt="<?php echo $performance_data['performance_insight_section_overlay_image']['alt']; ?>"/>
                      </div>
                  </div>
                <h3 class="insight-title"><?php echo $performance_data['performance_insight_section_title']; ?></h3>
                <p><?php echo $performance_data['performance_insight_section_description']; ?></p>
            </div>
            <?php $l++; endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="right-sect">
    <?php if( $performance_insight ):  $m = 1; ?>
        <?php foreach( $performance_insight as $perf_back_image ):
        ?>
        <div class="featured-bg" id="featured-image-<?php echo $m;?>" style="background: url('<?php echo $perf_back_image['performance_insight_section_background_image']['url']; ?>')"></div>
        <?php $m++; endforeach; ?>
    <?php endif; ?>
    <div class="iphone">
        <div class="iphone-container">
            <img src="<?php echo get_field('smartcoach_page_insight_phone_background_image'); ?>" id="iphone-screen-container"/>
            <div class="iphone-screens">
              <?php if( $performance_insight ):  $n = 1; ?>
                <?php foreach( $performance_insight as $perf_overlay_image ):
                ?>
                <img src="<?php echo $perf_overlay_image['performance_insight_section_overlay_image']['url']; ?>" alt="<?php echo $perf_overlay_image['performance_insight_section_overlay_image']['alt']; ?>" id="iphone-screen-<?php echo $n;?>" class="iphone-screen"/>
                <?php $n++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>
</section>
<section class="section-7">
    <?php get_template_part('template-parts/blog-element','null'); ?>
    <?php get_template_part('template-parts/newsletter-element','null'); ?>
</section>
<section>
    <div class="page-links two">
        <a class="link" href="<?php echo get_field('smartcoach_footer_left_banner_navigation_link'); ?>">
            <div class="featured-image" style="background:url('<?php echo get_field('smartcoach_footer_section_left_image'); ?>')">
                <div class="content scale-up">
                    <p><?php echo get_field('smartcoach_footer_section_left_banner_text'); ?></p>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg" class="rotate-180"/>
                    </div>
                </div>
            </div>
        </a>
        <a class="link" href="<?php echo get_field('smartcoach_footer_right_banner_navigation_link'); ?>">
            <div class="featured-image" style="background:url('<?php echo get_field('smartcoach_footer_section_right_image'); ?>')">
                <div class="content scale-up">
                    <p><?php echo get_field('smartcoach_footer_section_right_banner_text'); ?></p>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
</section>
