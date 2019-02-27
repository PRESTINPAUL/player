<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php if (defined('GA_TAG_MANAGER_ID')): ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo GA_TAG_MANAGER_ID; ?>');</script>
    <!-- End Google Tag Manager -->
    <?php endif; ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name='viewport' content='width=device-width,height=device-height,initial-scale=1.0'/>
    <meta name="trustpilot-one-time-domain-verification-id" content="dekXSa7YIRgm5JcPcgDFtggpiWujnDACcCWD2RfS"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/apercu-regular-pro-desktop-web-app/apercu-regular-pro.woff" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/apercu-medium-pro-desktop-web-app/apercu-medium-pro.woff" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/apercu-bold-pro-desktop-web-app/apercu-bold-pro.woff" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
        <script type="text/javascript">
                var basepath = "<?php echo get_template_directory_uri(); ?>";
        </script>
    <?php wp_head(); ?>
    <?php
    if ( get_field( 'google_analytics_code', 'options' ) ):
        the_field( 'google_analytics_code', 'options' );
    endif;
    //adding hreflang for EAA countries
    $home_eu_url = get_eu_repalced_url();
    ?>
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-at" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-be" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-bg" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-hr" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-cy" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-cz" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-dk" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-ee" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-fi" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-fr" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-de" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-gr" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-nl" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-hu" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-is" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-ie" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-it" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-lv" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-li" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-lt" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-lu" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-mt" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-no" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-pl" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-pt" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-ro" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-sk" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-si" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-es" />
    <link rel="alternate" href="<?php echo $home_eu_url; ?>" hreflang="en-ch" />
    <style>
        @media(min-width: 768px){
            .common-popup.newsletter-popup .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('home_page_news_letter_popup_image', 'options' ); ?>);
            }
            .common-popup.subscribe-popup .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('blog_page_news_letter_popup_image', 'options' ); ?>);
            }
            .common-popup.notify-on-shipping .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('notify_shipping_popup_image', 'options' ); ?>);
            }
        }
        @media(max-width: 767px){
            .common-popup.newsletter-popup .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('home_page_news_letter_popup_image_mobile', 'options' ); ?>);
            }
            .common-popup.subscribe-popup .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('blog_page_news_letter_popup_image_mobile', 'options' ); ?>);
            }
            .common-popup.notify-on-shipping .popup-inner-wrapper .left-pannel figure {
              background-image: url(<?php echo get_field('notify_shipping_popup_image_mobile', 'options' ); ?>);
            }
        }
    </style>
</head>
<?php
$bodyclass = "";
if ( is_post_type_archive( 'blog' ) ) {
 $bodyclass = 'blog_archive';
}
?>
<body class="<?php echo $bodyclass; ?> <?php echo pll_current_language(); ?>-store hasJS">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GA_TAG_MANAGER_ID; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="Header">
        <div class="HeaderBar">
            <?php get_template_part('template-parts/banner-element', 'null'); ?>
            <div class="HeaderBar-inner">
                <a class="HeaderHamburger">
                    <div class='HeaderHamburger-open'>
                        <span class="HeaderHamburger-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M0 6L21 6" stroke="currentColor" stroke-width="2"></path>
                                <path d="M0 12L21 12" stroke="currentColor" stroke-width="2"></path>
                                <path d="M0 18L21 18" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                        </span>
                        <span class="HeaderHamburger-text">Menu</span>
                    </div>
                    <div class='HeaderHamburger-close'>
                        <span class="HeaderHamburger-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                        <span class="HeaderHamburger-text">Close</span>
                    </div>
                </a>
                <div class="HeaderBar-center">
                    <a class="HeaderBar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                        $playr_logo = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $playr_logo , 'full' );
                        echo '<img src="'. esc_url( $logo[0] ) .'" alt="Playr Logo">';
                        ?>
                    </a>
                </div>
                <div class="HeaderBar-actions">
                    <a href="<?php echo get_button_url('shop_buy_button_url',pll_current_language()) ?>" class="Header-buy buy-link btn"><?php echo get_field('shop_buy_button_title', pll_current_language()); ?></a>
                    <a href="<?php echo get_button_url('shop_cart_url',pll_current_language()) ?>" class="Header-continue continue-link btn">Continue to checkout (<span class="item-count">0</span>)</a>
                </div>
            </div>
        </div>
        <nav class="HeaderOverlay">
            <div class="HeaderOverlay-scrollable">
                <div class="HeaderOverlay-inner">
                    <div class="HeaderOverlay-section">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'v2-primary',
                        'menu_class' => 'HeaderOverlay-menu',
                        'depth' => 1
                    ));
                    ?>
                    <div class="HeaderOverlay-trustpilot">
                        <img class="HeaderOverlay-trustpilotLogo" src="<?php echo get_template_directory_uri(); ?>/assets/images/trustpilot-logo.png" alt="Trustpilot" />
                        <a class="HeaderOverlay-trustpilotLink" href="https://uk.trustpilot.com/review/www.playrsmartcoach.com" target="_blank" rel="noopener">Write a review</a>
                    </div>
                    </div>
                    <div class='HeaderOverlay-section u-desktopOnly'></div>
                    <div class='HeaderOverlay-section u-desktopOnly'>
                        <div class='newsletter'>
                            <div class="newsletter-title">Newsletter</div>
                            <div class="newsletter-subtitle">Stay in the loop</div>
                            <?php echo do_shortcode( '[contact-form-7 id="239" title="Newsletter Form" submit="Sign up"]' ); ?>
                        </div>
                        <div class="HeaderOverlay-social">
                            <div class="HeaderOverlay-socialTitle">Follow us</div>
                            <ul>
                            <?php
                            if(get_field('instagram_url', 'options')) {?>
                                <li><a class="HeaderOverlay-socialLink" href="<?php echo get_field('instagram_url', 'options') ?>">Instagram</a></li>
                            <?php }
                            if(get_field('facebook_url', 'options')) {?>
                                <li><a class="HeaderOverlay-socialLink" href="<?php echo get_field('facebook_url', 'options') ?>">Facebook</a></li>
                            <?php }
                            if(get_field('twitter_url', 'options')) {?>
                                <li><a class="HeaderOverlay-socialLink" href="<?php echo get_field('twitter_url', 'options') ?>">Twitter</a></li>
                            <?php }
                            if(get_field('youtube_url', 'options')) {?>
                                <li><a class="HeaderOverlay-socialLink" href="<?php echo get_field('youtube_url', 'options') ?>">Youtube</a></li>
                            <?php } ?>
                            </ul>
                        </div>
                        <div class="CountryPicker">
                            <?php pll_the_languages(array('dropdown' => 1, 'show_names'=> true, 'class'=>'custom')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="main-content">
