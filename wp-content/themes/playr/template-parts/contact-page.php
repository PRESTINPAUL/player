<section class="support contact-page">
    <?php /*
    <section class="support-categories-wrapper hasSubMenu">
        <div class="support-categories">
            <a href="javascript:void(0)" class="category-dropdown"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/down_small_blue.svg"/></a>
            <div class="list-wrapper">
            <?php
                wp_nav_menu(
                    array(
                    'theme_location'    => 'primary',
                    'container_class'   => 'primary-child-navigation',
                    'sub_menu'       => true
                )
                );
                ?>
            </div>
        </div>
    </section>
    */ ?>
    <section class="contactus-wrap">
        <div class="contact-wrap">
            <p class="top-title"><?php echo get_field('contact_page_top_title'); ?></p>
            <h1 class="main-title"><?php echo get_field('contact_page_main_heading'); ?></h1>
            <p class="contact-des"><?php echo get_field('contact_page_top_text_1'); ?></p>
            <p class="contact-des"><?php echo get_field('contact_page_top_text_2'); ?></p>
        </div>
        <p class="contact-border"></p>
        <div class="enquiry-wrap">
            <h4 class="customer-enq"><?php echo get_field('contact_page_middle_heading'); ?></h4>
            <a class="contact-btn btn btn--dark-blue" href="<?php echo get_field('contact_page_middle_button_link'); ?>"><?php echo get_field('contact_page_middle_button_text'); ?></a>
            <div class="enq middle-block">
                <p class="email-title"><?php echo get_field('contact_page_bottom_right_email_text'); ?></p>
                <a class="mail-id" href="mailto:<?php echo get_field('support_email_id'); ?>"><?php echo get_field('support_email_id'); ?></a>
            </div>
            <div class="enq">
            <div class="left">
                    <h4 class="media-enq"><?php echo get_field('contact_page_bottom_left_heading'); ?></h4>
                    <p class="email-title"><?php echo get_field('contact_page_bottom_left_email_text'); ?></p>
                    <a class="mail-id" href="mailto:<?php echo get_field('contact_page_bottom_left_email_id'); ?>"><?php echo get_field('contact_page_bottom_left_email_id'); ?></a>
                </div>
                <div class="right">
                    <h4 class="marketing-enq"><?php echo get_field('contact_page_bottom_right_heading'); ?></h4>
                    <p class="email-title"><?php echo get_field('contact_page_bottom_right_email_text'); ?></p>
                    <a class="mail-id" href="mailto:<?php echo get_field('contact_page_bottom_right_email_id'); ?>"><?php echo get_field('contact_page_bottom_right_email_id'); ?></a>
                </div>
            </div>

        </div>
    </section>
    <section>
            <div class="page-links one">
                <a class="link" href="<?php the_field('contact_page_footer_banner_text_url'); ?>">
                <div class="featured-image" style="background:url('<?php echo get_field('contact_page_footer_banner_image'); ?>')">
                    <div class="content">
                    <p><?php the_field('contact_page_footer_banner_text'); ?></p>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
                    </div>
                    </div>
                </div>
                </a>
            </div>
    </section>
</section>
