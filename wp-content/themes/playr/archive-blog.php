<?php
/*
 * Template Name: Blog Page
 *
 */
get_header();
$category = '';
$search_query = '';
$taxonomy = 'Category';
$args = array ('exclude'=>1,'orderby'  => 'id',
  'order'    => 'DESC');
$terms = get_terms($taxonomy, $args);
$blog_link = site_url().'/blog';
$default = 0;
if(!empty($_GET['cat'])) {
  $category = $_GET['cat'];
  $default = 1;
}
$searchclass = "open_search_from";
if(!empty($_GET['search'])){
  $search_query = $_GET['search'];
  $searchclass.=" active";
  $default = 1;
}
?>
<section class="blog blog-list-page">
  <section class="blog-categories-wrapper hasSubMenu">
    <div class="blog-categories">
      <a href="javascript:void(0)" class="category-dropdown"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/down_small_blue.svg"/></a>
      <div class="list-wrapper">
        <ul>
          <li><a href="<?php echo $blog_link; ?>" <?php if($default == 0) { echo "class=\"active\""; } ?>>All posts</a></li>
          <?php if ( $terms && !is_wp_error($terms)) : ?>
            <?php foreach ( $terms as $term ) {
              $category_url = $blog_link."?cat=".$term->slug;
              ?>
              <li><a href="<?php echo esc_url($category_url); ?>" <?php if(isset($_GET['cat']) && htmlspecialchars($_GET['cat']) == $term->slug) { echo "class=\"active\""; } ?>><?php echo $term->name; ?></a></li>
              <?php } ?>
            <?php endif; ?>
            <li><a href="javascript:void(0);" class="<?php echo $searchclass;?>" id="blog-search"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/serach_menu.svg" alt="Search" /></a></li>
          </ul>
          <a class="subscribe-btn" href="javascript:void(0);">Subscribe</a>
        </div>
      </div>
    </section>
    <?php if(empty($search_query)){?>
    <?php get_template_part('template-parts/blog-featured','page'); ?>
    <?php } ?>
     <?php if($search_query){?>
       <section class="middle-section results-section">
      <?php } else {?>
        <section class="middle-section">
      <?php }?>
      <div class="section-wrap">
        <?php
        $text_to_display = 'All posts';
        if(isset($_GET['cat'])){
         $catObj = get_term_by('slug', $_GET['cat'], 'Category');
         $text_to_display = $catObj->name;
       } ?>
       <?php if($search_query){?>
        <div class="nav-content">
            <a href="<?php echo esc_url($blog_link); ?>" id="back"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/left_arrow.svg" alt="Back to blog" />Back to blog</a>
        </div>
       <label class="search-result-title">SEARCH RESULTS</label>
       <h2 class="search-item-title"><?php echo $search_query; ?></h2>
       <?php } else {?>
       <h2 class="current-category"><?php echo $text_to_display; ?></h2>
       <?php } ?>
       <div class="post-list">
         <div class="load-more-sect">
          <?php
          echo do_shortcode('[ajax_load_more post_type="blog" offset="0" repeater="default" category="'.$category.'" posts_per_page="3" scroll="false" button_label="Load more" search="'.$search_query.'" category__not_in="1" button_loading_label = "loading blogs" images_loaded="false" preloaded="true" preloaded_amount="8" transition_container="false"]');
          ?>
        </div>
      </div>
  </div>
</section>
<?php if(empty($search_query)){?>
<?php get_template_part('template-parts/blog-top-picks','page'); ?>
<?php } ?>
<section class="signup-wrap">
  <div class="section-wrap">
    <?php get_template_part('template-parts/newsletter-element','null'); ?>
  </div>
</section>
<section class="search-blogs">
        <?php get_template_part('template-parts/blog-search-element','null'); ?>
      </section>
<?php
if ( get_field( 'enable_blog_page_news_letter_popup', 'options' ) ): ?>
      <section class="subscribe-popup-section">
        <div class="subscribe-popup-loyout common-popup-loyout bg-subscribe"></div>
        <?php get_template_part('template-parts/subscribe-popup','null'); ?>
        <?php get_template_part('template-parts/thank-you-popup','null'); ?>
      </section>
<?php endif; ?>
<section class="section-11">
            <div class="page-links one">
                <a class="link" href="<?php echo get_field('blog_page_bottom_banner_text_url', 'options') ?>">
                    <div class="featured-image" style="background:url('<?php echo get_field('blog_page_bottom_banner_image', 'options') ?>')">
                        <div class="content">
                            <p><?php echo get_field('blog_page_bottom_banner_text', 'options') ?></p>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
</section>
<?php get_footer(); ?>
