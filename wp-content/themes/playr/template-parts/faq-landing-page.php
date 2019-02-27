<section class="support faq-landing-page">
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
  <div class="faq-outer-wrap">
    <section class="faq-wrap">
        <div class="search-wrap">
                <p class="top-title"><?php the_field('faq_page_title', 'options') ?></p>
                <h1 class="main-title"><?php the_field('faq_page_main_heading', 'options') ?></h1>
                <p class="faq-des"><?php the_field('faq_page_header_description', 'options') ?></p>
                <form class="faq-search-form" action="" method="GET">
                    <div class="form-wrapper">
                        <input type="text" value="" placeholder="Search" class="search-field" name="search" />
                        <button type="submit" class="faq-button-wrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/Search.svg" alt="search faq" />
                        </button>
                    </div>
                </form>
        </div>
        <p class="search-border"></p>

        <div class="questions-wrap">
            <div class="general-questions">
                <?php
                $args1=array('posts_per_page'=>-1, 'post_type' => 'faq',  'tax_query' => array(
                    array(
                      'taxonomy' => 'faqcategory',
                      'field' => 'slug',
                      'terms' => 'top-general-questions-asked',
                      'include_children' => false
                  )
                ) );
                $wp_query = new WP_Query( $args1 );
                if ( have_posts() ) :
                $term = get_term_by('slug', 'top-general-questions-asked', 'faqcategory');
                $faq_category_name_1 = $term->name;
                ?>
                <h4 class="general-que"><?php echo $faq_category_name_1; ?></h4>
                <ul class="list-que">
                    <?php while (have_posts()) : the_post();?>
                    <li><a href="<?php the_permalink() ?>"><?php  the_title(); ?></a></li>
                     <?php   endwhile; ?>
                </ul>
              <?php
               endif;
               wp_reset_postdata(); ?>
               <p class="que-border"></p>
            </div>
            <div class="product-questions">
                 <?php
                $args1=array('posts_per_page'=>-1, 'post_type' => 'faq',  'tax_query' => array(
                    array(
                      'taxonomy' => 'faqcategory',
                      'field' => 'slug',
                      'terms' => 'top-product-questions-asked',
                      'include_children' => false
                  )
                ) );
                $wp_query = new WP_Query( $args1 );
                if ( have_posts() ) :
                $term = get_term_by('slug', 'top-product-questions-asked', 'faqcategory');
                $faq_category_name_2 = $term->name;
                ?>
                <h4 class="prod-que"><?php echo $faq_category_name_2; ?></h4>
                <ul class="list-que">
                 <?php while (have_posts()) : the_post();?>
                    <li><a href="<?php the_permalink() ?>"><?php  the_title(); ?></a></li>
                     <?php   endwhile; ?>
                </ul>
                <?php
               endif;
               wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
  </div>
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
