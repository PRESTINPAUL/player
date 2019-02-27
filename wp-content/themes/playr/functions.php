<?php

if ( ! function_exists( 'playerweb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function playerweb_setup() {
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

// if( function_exists('acf_add_options_page') ) {
//     acf_add_options_page();
// }
/**
 * ACF Options Page
 */


if ( function_exists( 'acf_add_options_page' ) ) {


  // Main Theme Settings Page
  $parent = acf_add_options_page( array(
    'page_title' => 'Theme General Settings',
    'menu_title' => 'General Settings',
    'redirect'   => 'Theme Settings',
  ) );

  //
  // Global Options
  // Same options on all languages. e.g., social profiles links
  //

  acf_add_options_sub_page( array(
    'page_title' => 'Global Options',
    'menu_title' => __('Global Options', 'text-domain'),
    'menu_slug'  => "acf-options",
    'parent'     => $parent['menu_slug']
  ) );

  //
  // Language Specific Options
  // Translatable options specific languages. e.g., social profiles links
  //

  $languages = pll_languages_list();

  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Options (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Options (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "options-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
    ) );
  }

}
register_nav_menus( array(
        'primary' => esc_html__( 'primary', 'player' ),
        'footer1' => esc_html__( 'footer1', 'player' ),
        'footer2' => esc_html__( 'footer2', 'player' ),
        'v2-primary' => esc_html__( 'V2 Primary Location', 'player' ),
        'v2-footer' => esc_html__( 'V2 Footer Location', 'player' ),
        'v2-sub-footer' => esc_html__( 'V2 Sub-Footer Location', 'player' ),
        'v2-stores' => esc_html__( 'V2 Stores', 'player' ),
    ) );
}
add_theme_support( 'custom-logo', array(
        'width' => 150,
        'height' => 21,
        'flex-width' => true,
        'flex-height' => true,
        ));
endif;
add_action( 'after_setup_theme', 'playerweb_setup' );
// Register Custom Post Types
add_action('init', 'register_custom_posts_init');
function register_custom_posts_init() {
    // Register blog
    $blog_labels = array(
        'name'               => 'Blog',
        'singular_name'      => 'Blog',
        'menu_name'          => 'Blog'
    );
    register_taxonomy('Category', 'blog', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
    //  register_taxonomy('Tag', 'blog', array('hierarchical' => true, 'label' => 'Tags', 'query_var' => true, 'rewrite' => true));
    $blog_args = array(
        'labels'             => $blog_labels,
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'taxonomies'  => array( 'Category','post_tag' ),
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'Category' )
    );
    register_post_type('blog', $blog_args);
           register_taxonomy( 'faqcategory', 'faq', array( 'hierarchical' => true, 'label' => 'Faq Category', 'query_var' => true, 'rewrite' => true, 'orderby' => 'name' ) );
   register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => __( 'Faq' ),
                'singular_name' => __( 'Faq' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Faq' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Faq' ),
                'new_item' => __( 'New Faq' ),
                'view' => __( 'View Faq' ),
                'view_item' => __( 'View Faq' ),
                'search_items' => __( 'Search Faq' ),
                'not_found' => __( 'No Faq found' ),
                'not_found_in_trash' => __( 'No Faq found in Trash' ),
                'parent' => __( 'Parent Faq' ),
            ),
            'has_archive'   => true,
            'public' => true,
            'capability_type'    => 'post',
            'menu_icon' => 'dashicons-book',
            'show_ui' => true,
            'supports' => array( 'title', 'editor' ),
            'taxonomies' => array('faqcategory', 'post_tag'),
            'rewrite' => array( 'with_front' => false, 'slug' => 'faq')
        )
    );
    register_post_type( 'campaign',
        array(
            'labels' => array(
                'name' => __( 'Campaign' ),
                'singular_name' => __( 'Campaign' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Campaign' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Campaign' ),
                'new_item' => __( 'New Campaign' ),
                'view' => __( 'View Campaign' ),
                'view_item' => __( 'View Campaign' ),
                'search_items' => __( 'Search Campaign' ),
                'not_found' => __( 'No Campaign found' ),
                'not_found_in_trash' => __( 'No Campaign found in Trash' ),
                'parent' => __( 'Parent Campaign' ),
            ),
            'has_archive'   => true,
            'public' => true,
            'capability_type'    => 'post',
            'show_ui' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'with_front' => false, 'slug' => 'campaign')
        )
    );
}

function playr_scripts() {
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', get_template_directory_uri().'/js/lib/jquery/jquery-3.3.1.min.js', array(), '3.3.1', false );
    wp_register_script( 'slickSlide', get_template_directory_uri().'/js/lib/slickSlider/slick.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'TweenMax-min', get_template_directory_uri().'/js/lib/scrollmagic/plugins/TweenMax.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'ScrollTo', get_template_directory_uri().'/js/lib/scrollmagic/plugins/ScrollToPlugin.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'scrollmagic', get_template_directory_uri().'/js/lib/scrollmagic/ScrollMagic.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'animation-gsap', get_template_directory_uri().'/js/lib/scrollmagic/plugins/animation.gsap.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'selectBox', get_template_directory_uri().'/js/lib/customSelectBox/SelectBox.js', array('jquery'), '1.0', false );
    wp_register_script( 'scrollPane', get_template_directory_uri().'/js/lib/customSelectBox/jScrollPane.js', array('jquery'), '1.0', false );
    wp_register_script( 'selectric-select', get_template_directory_uri().'/js/lib/selectric/jquery.selectric.min.js', array('jquery'), '1.0', false );
    wp_register_script( 'onExit', get_template_directory_uri().'/js/lib/onExit/onExit.js', array(), '1.0', true );
    wp_register_script( 'aos', get_template_directory_uri().'/js/lib/aos/aos.js', array(), '1.0', false );

    wp_register_script( 'commonsitescripts', get_template_directory_uri().'/js/custom/common.js', array('jquery'), '1.0', true );
    wp_register_script( 'animations', get_template_directory_uri().'/js/custom/animations.js', array('jquery'), '1.0', true );
    wp_register_script( 'popups', get_template_directory_uri().'/js/custom/popups.js', array('jquery'), '1.0', false );
    wp_register_script( 'components', get_template_directory_uri().'/js/custom/components.js', array('jquery'), '1.0', false );
    wp_register_script( 'slider', get_template_directory_uri().'/js/custom/slider.js', array('jquery'), '1.0', false );
    wp_register_script( 'smartcoach', get_template_directory_uri().'/js/custom/pages/smartcoach.js', array('jquery'), '1.0', false );
    wp_register_script( 'systempage', get_template_directory_uri().'/js/custom/pages/system.js', array('jquery'), '1.0', false );
    wp_register_script( 'blogpage', get_template_directory_uri().'/js/custom/pages/blog.js', array('jquery'), '1.0', false );
    wp_register_script( 'gothia-cup', get_template_directory_uri().'/js/custom/pages/gothia-cup.js', array('jquery'), '1.0', false );

    wp_register_style( 'slick-style', get_stylesheet_directory_uri() . '/css/lib/slickSlider/slick.css', array(), '', 'all' );
    wp_register_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/css/lib/slickSlider/slick-theme.css', array(), '', 'all' );
    wp_register_style( 'custom-select-box-style', get_stylesheet_directory_uri() . '/css/lib/customSelectBox/customSelectBox.css', array(), '', 'all' );
    wp_register_style( 'jscrollpane-style', get_stylesheet_directory_uri() . '/css/lib/customSelectBox/jquery.jscrollpane.css', array(), '', 'all' );
    wp_register_style( 'selectric-style', get_stylesheet_directory_uri() . '/css/lib/selectric.css', array(), '', 'all' );
    wp_register_style( 'aos-style', get_stylesheet_directory_uri() . '/js/lib/aos/aos.css', array(), '', 'all' );
    wp_register_style( 'site-style', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );

    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme-style' );
    wp_enqueue_style( 'custom-select-box-style' );
    wp_enqueue_style( 'jscrollpane-style' );
    wp_enqueue_style( 'selectric-style' );
    wp_enqueue_style( 'aos-style' );
    wp_enqueue_style( 'site-style' );

    // Enqueue scripts and styles
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slickSlide' );
    wp_enqueue_script( 'ScrollTo' );

    if (!is_page_template( 'template-home-page.php' ) && !is_page_template( 'template-explore-page.php' ) && !is_page_template( 'template-heritage-page.php' )) {
        wp_enqueue_script( 'TweenMax-min' );
        wp_enqueue_script( 'scrollmagic' );
        wp_enqueue_script( 'animation-gsap' );
    }

    wp_enqueue_script( 'selectBox' );
    wp_enqueue_script( 'scrollPane' );
    wp_enqueue_script( 'selectric-select' );
    wp_enqueue_script( 'onExit' );
    wp_enqueue_script( 'aos' );

    if (!is_page_template( 'template-home-page.php' ) && !is_page_template( 'template-explore-page.php' ) && !is_page_template( 'template-heritage-page.php' )) {
        wp_enqueue_script( 'animations' );
    }
    wp_enqueue_script( 'commonsitescripts' );
    wp_enqueue_script( 'popups' );
    wp_enqueue_script( 'components' );
    wp_enqueue_script( 'slider' );
    if ( is_page_template( 'template-smartcoach-page.php' )) {
    wp_enqueue_script( 'smartcoach' );
    }
    if ( is_page_template( 'template-system-page.php' )) {
    wp_enqueue_script( 'systempage' );
    }
    wp_enqueue_script( 'blogpage' );
    if ( is_singular( array( 'campaign' ) )){
    wp_enqueue_script( 'gothia-cup' );
    }
    }
    add_action('wp_enqueue_scripts', 'playr_scripts' );

/* code to highlight selected menu */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
function get_the_category_custompost( $id = false, $tcat = 'category' ) {
    $categories = get_the_terms( $id, $tcat );
    if ( ! $categories )
        $categories = array();
    $categories = array_values( $categories );
    foreach ( array_keys( $categories ) as $key ) {
        _make_cat_compat( $categories[$key] );
    }
    return apply_filters( 'the_category', $categories );
}
function get_category_names_custompost($cat) {
    $i = 0;
    $sep = ', ';
    $cats = '';
    foreach ( $cat as $category_single ) {
        if (0 < $i)
            $cats .= $sep;
        $cats .= $category_single->name;
        $i++;
    }
    return $cats;
}

function post_remove ()      //creating functions post_remove for removing menu item
{
 remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove');   //adding action for triggering function call
//remove_filter( 'the_content', 'wpautop' );

add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    foreach ( $sorted_menu_items as $key => $menu_item ) {
      if ( $menu_item->current ) {
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }else if($menu_item->type =="post_type_archive" && $menu_item->object == get_post_type()) {
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;

            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          }
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {

      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {

        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {

        unset( $sorted_menu_items[$key] );
      }
    }

    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}

function add_current_nav_class($classes, $item) {

    // Getting the current post details
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){

        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));

        // Getting the rewrite slug containing the post type's ancestors
        $ancestor_slug = $current_post_type->rewrite['slug'];

        // Split the slug into an array of ancestors and then slice off the direct parent.
        $ancestors = explode('/',$ancestor_slug);
        $parent = array_pop($ancestors);

        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));

        // If the menu item URL contains the post type's parent
        if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
            $classes[] = 'current-menu-item active';
        }

        // If the menu item URL contains any of the post type's ancestors
        foreach ( $ancestors as $ancestor ) {
            if (strpos($menu_slug,$ancestor) !== false) {
                $classes[] = 'current-page-ancestor active';
            }
        }
    }
    // Return the corrected set of classes to be added to the menu item
    return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '824' == event.detail.contactFormId ) {  //824 is form id generated from cf7
        $('.common-popup').fadeOut();
        openThankYouPopup("subscribe");
    }
}, false );
</script>
<?php
}
//removing emoji related javascript loading//
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
//removing wp-embed.min.js scripts //
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
function checkpromostatus(){
    $checkstatus = false;
    if ( get_field( 'enable_sale_promotion_banner', pll_current_language('slug') ) ):
        $selected_time_zone = get_field( 'sale_promotion_time_zone', pll_current_language('slug') );
        $start_date = get_field( 'sale_promotion_start_date', pll_current_language('slug') );
        $end_date = get_field( 'sale_promotion_end_date', pll_current_language('slug') );
        date_default_timezone_set($selected_time_zone);
        $current_date = date('Y-m-d H:i:s');
        if($current_date > $start_date && $current_date < $end_date && !isset($_COOKIE['promo-declined-cookie'])
) {
            $checkstatus = true;
        }
    endif;
    return $checkstatus;
}
pll_register_string( 'alttexts', 'playr football tracker - ground');
pll_register_string( 'alttexts', 'playr football tracker - adidas');
pll_register_string( 'alttexts', 'playr smartcoach - football gps tracker');
pll_register_string( 'alttexts', 'playr smartcoach - football gps player tracker');

function get_playstore_class() {
    $play_store_class="";
    if(get_field('play_store_button_deactive', pll_current_language()) == true){
        $play_store_class = "link-disabled";
    }
    return $play_store_class;
}

function get_button_url($button_name, $options) {
    if(get_field($button_name, $options)){
        return get_field($button_name, $options);
    } else {
        return "javascript:void(0);";
    }
}

if (defined('FACEBOOK_PIXEL_ID')) {
    add_action('wp_footer', 'wpb_facebook_pixel');
}
function wpb_facebook_pixel() { ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo FACEBOOK_PIXEL_ID; ?>');
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=<?php echo FACEBOOK_PIXEL_ID; ?>&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
<?php }

function code_to_country( $code ){

    $code = strtoupper($code);

    $countryList = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas the',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island (Bouvetoya)',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
        'VG' => 'British Virgin Islands',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros the',
        'CD' => 'Congo',
        'CG' => 'Congo the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FO' => 'Faroe Islands',
        'FK' => 'Falkland Islands (Malvinas)',
        'FJ' => 'Fiji the Fiji Islands',
        'FI' => 'Finland',
        'FR' => 'France, French Republic',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia the',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyz Republic',
        'LA' => 'Lao',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'AN' => 'Netherlands Antilles',
        'NL' => 'Netherlands the',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn Islands',
        'PL' => 'Poland',
        'PT' => 'Portugal, Portuguese Republic',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia (Slovak Republic)',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia, Somali Republic',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard & Jan Mayen Islands',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland, Swiss Confederation',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States of America',
        'UM' => 'United States Minor Outlying Islands',
        'VI' => 'United States Virgin Islands',
        'UY' => 'Uruguay, Eastern Republic of',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'
    );

    if( !$countryList[$code] ) return $code;
    else return $countryList[$code];
    }

    function getHeaders($header_name = null)
	{
		$headervals="";
		$keys = array_keys($_SERVER);
		if (is_null($header_name)){
			$headers = preg_grep("/^HTTP_(.*)/si", $keys);
		} else {
			$header_name_safe = str_replace("-", "_", strtoupper(preg_quote($header_name)));
			$headers = preg_grep("/^HTTP_${header_name_safe}$/si", $keys);
		}
		foreach($headers as $header) {
			if (is_null($header_name)){
				$headervals[substr($header, 5) ] = $_SERVER[$header];
			} else {
				return $_SERVER[$header];
			}
		}
		return $headervals;
    }

    function wpcf7_modify_posted_data($posted_data) {
        $wpcf7 = WPCF7_ContactForm::get_current();
        if($wpcf7->id == '824' || $wpcf7->id == '239' || $wpcf7->id == '1611'){
            $CloudFront_Viewer_Country = getHeaders("CloudFront-Viewer-Country");
            if($CloudFront_Viewer_Country!=""){
                $posted_data['country'] = code_to_country($CloudFront_Viewer_Country);
            }else {
                $posted_data['country'] = "";
            }
        }
            return $posted_data;
    }

    add_filter("wpcf7_posted_data", "wpcf7_modify_posted_data", 1, 1);
    add_action('wp_footer', 'shop');

    function shop(){
    if(get_field('shopify_button_url', pll_current_language())!=""){ ?>
    <script>
    var loaderTimer = null;
    $(function() {
        $.ajax({
          dataType:'jsonp',
          url: '<?php echo get_button_url('shop_cart_url',pll_current_language()) ?>.json?callback=?',
          success: function(d){
           var current_currency = d['currency'];
           var cart_count = d['item_count'];
           if ($.isNumeric(cart_count) && cart_count >= 1) {
             $('body').addClass('cart-not-empty');
             $('.item-count').html(d['item_count']);
           }
        }
      });
    });
    </script>
    <?php
    }
}
function get_eu_repalced_url(){
    global $wp;
    $current_browser_url = home_url( $wp->request );
    $current_store_id = pll_current_language();
    $eu_replaced_url = str_replace("/".$current_store_id,"/eu",$current_browser_url);
    return $eu_replaced_url;
}
