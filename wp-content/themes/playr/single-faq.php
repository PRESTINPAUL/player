<?php
/**
 * Template Name: faq single page
 * Template Post Type: faq
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Player
 */
get_header();
global $post;
?>
<section class="support faq-detail-page">
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
  <section class="questions-wrap">
    <ul class="navigation">
      <li><a href="<?php echo get_post_type_archive_link( 'faq' ); ?>">FAQs</a></li>
      <li><a href="#"><?php the_title(); ?></a></li>
    </ul>
    <div class="search-wrap">
      <form class="faq-search-form" action="<?php echo get_post_type_archive_link( 'faq' ); ?>" method="GET">
        <div class="form-wrapper">
          <input type="text" value="" placeholder="Search" class="search-field" name="search" />
          <button type="submit" class="faq-button-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/Search.svg" alt="search faq" />
          </button>
        </div>
      </form>
    </div>
    <p class="search-border"></p>
    <div class="results-wrap">
      <ul class="results-que">
        <li>
          <p class="head"><?php the_title(); ?></p>
          <?php the_content();?>
        </li>
      </ul>

    </div>
    <?php
    $post_id = get_the_ID();
    $tag_ids = array();
    $post_tags = get_the_tags( $post_id );
    if ( $post_tags && !is_wp_error( $post_tags ) ) {
      foreach ( $post_tags as $post_tag ) {
        array_push( $tag_ids, $post_tag->term_id );
      }
    }
    if ( $tag_ids ) { ?>
    <?php
    $args = [
      'posts_per_page' => 5,
      'tag__in'        => $tag_ids,
      'post_type'      => 'faq',
      'post__not_in'   => array($post_id),
    ];
    $wp_query = new WP_Query( $args );
    if ( have_posts() ) : ?>
    <div class="related-articles">
      <h4>Related Articles</h4>
      <ul>
        <?php
        while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php
  endif;
  ?>
  <?php } ?>
</section>

</section>
<section>
  <div class="page-links one">
    <a class="link" href="<?php echo get_field('faq_page_bottom_banner_text_url', pll_current_language()); ?>">
      <div class="featured-image" style="background:url('<?php echo get_field('faq_page_bottom_banner_image', 'options'); ?>')">
        <div class="content">
          <p><?php the_field('faq_page_bottom_banner_text', 'options') ?></p>
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>
<?php get_footer(); ?>
