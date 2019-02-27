<section class="announcement-popup-wrapper common-popup-wrapper newsletter-popup-section">
    <div class="announcement-popup-wrapper-layout common-popup-loyout bg-black"></div>
        <div class="announcement-popup common-popup bg-white common-active-popup-inner-wrap">
        <div class="popup-inner-wrapper">
            <div class="left-pannel">
                <figure class="item-image" style="background-image: url(<?php the_field('announcement_popup_image', 'options'); ?>);"></figure>
            </div>
            <div class="right-pannel">
                <div class="close-button-wrapper">
                    <a href="javascript:void(0);" class="close-popup-btn">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close_blue.svg" alt="close popup"/>
                    </a>
                </div>
                <div class="content-wrapper">
                    <figure class="item-image mobile-only" style="background-image: url(<?php the_field('announcement_popup_image_mobile', 'options'); ?>);"></figure>
                    <label><?php the_field('announcement_popup_label', 'options'); ?></label>
                    <h2><?php the_field('announcement_popup_heading', 'options'); ?></h2>
                    <p class="desc"><?php the_field('announcement_popup_description', 'options'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>