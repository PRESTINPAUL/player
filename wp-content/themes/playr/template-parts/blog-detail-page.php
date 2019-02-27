  <section class="blog blog-details">
    <section class="blog-categories-wrapper hasSubMenu">
      <div class="blog-categories">
        <a href="javascript:void(0)" class="category-dropdown"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/down_small_blue.svg"/></a>
        <div class="list-wrapper">
          <?php
          $taxonomy = 'category';
          $args = array ('exclude'=>1,'orderby'  => 'id', 'order'    => 'DESC');
          $terms = get_terms($taxonomy, $args);
          $blog_link = site_url().'/blog';
          ?>
          <ul>
            <li><a href="<?php echo $blog_link; ?>" id="blog-all-posts" class="active">All posts</a></li>
            <?php if ( $terms && !is_wp_error($terms)) : ?>
              <?php foreach ( $terms as $term ) {
                $category_url = $blog_link."?cat=".$term->slug;  ?>
                <li><a href="<?php echo $category_url; ?>"><?php echo $term->name; ?></a></li>
                <?php } ?>
              <?php endif; ?>
              <li><a href="javascript:void(0);" id="blog-search"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/serach_menu.svg" alt="Search" /></a></li>
            </ul>
          </div>
        </div>
      </section>
      <?php while ( have_posts() ) : the_post(); ?>
        <section class="blog-content-area">
          <section class="blog-info-wrapper">
            <small>
              <time><?php echo get_the_date('j M Y');?>
              </time><span class="line-seperator">|</span><span class="author-info-wrapper">
                 Written By
                <span class="author"><?php echo get_the_author();?></span>
              </span>
            </small>
            <?php
            $get_cat_assigned = get_the_category_custompost(get_the_ID(),'category');
            $cat_mapped_slider = get_category_names_custompost($get_cat_assigned);
            $current_category = $get_cat_assigned[0]->slug;
            $sel_category_name = $get_cat_assigned[0]->name;
            $cat_post_count = $get_cat_assigned[0]->count;
            ?>
            <a><?php echo $cat_mapped_slider; ?></a>
          </section>
          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="main-content-wrapper">
            <div class="social-media-wrapper">
              <div class="social-media-container">
                <span>Share</span>
                <a class="twitter-fb-share" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink() ?>" id="twitter_icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/Twitter_blue.svg" alt="Twitter" /></a>
                <a class="twitter-fb-share" href="https://www.facebook.com/sharer/sharer.php?p[url]=<?php the_permalink() ?>" id="fb_icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook_blue.svg" alt="Facebook" /></a>
            </div>
            </div>
            <section class="content-wrapper">
              <?php
              if(has_post_thumbnail()) {
                $featured_img_url = get_the_post_thumbnail_url($post->ID,'featured_post');
              }
              if(!empty($featured_img_url)){?>
              <figure class="banner-image">
                <div class="image-wrapper">
                  <img src="<?php echo esc_url($featured_img_url) ?>" alt="Arrow image">
                </div>
                <figcaption><?php echo get_field('featured_image_picture_description'); ?></figcaption>
              </figure>
              <?php } ?>
              <div class="contents">
                  <?php the_content();?>
              </div>
            </section>
          </div>
          <section class="blog-navigation-wrapper">
            <div class="nav-content">
              <a href="<?php echo $blog_link; ?>" id="back"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/left_arrow.svg" alt="Back to blog" /> Back to blog</a>
              <?php
              $prev_post_id = get_previous_post();
              if($prev_post_id):
                $next_post_url = get_permalink( $prev_post_id->ID );
                ?>
                <a href="<?php echo $next_post_url; ?>" id="next">Next Article <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/small_arrow.svg" alt="Next Article" /></a>
              <?php endif; ?>
            </div>
          </section>
        </section>
      <?php endwhile; // End of the loop.?>
      <?php if(!empty($current_category) && ($cat_post_count > 1)){ ?>
      <section class="middle-section blog-latest-news">
        <div class="section-wrap">
          <h2 class="current-category"><?php echo $sel_category_name; ?></h2>
          <div class="post-list">
            <div class="load-more-sect">
              <?php
              echo do_shortcode('[ajax_load_more post_type="blog" offset="0" repeater="default" category="'.$current_category.'" post__not_in="'.$post->ID.'" posts_per_page="3" scroll="false" button_label="Load more" category__not_in="1" button_loading_label = "loading blogs" images_loaded="false" preloaded="true" preloaded_amount="3" transition_container="false"]');
              ?>
            </div>
          </div>
        </div>
      </section>
      <?php } ?>
      <section class="signup-wrapper">
        <?php get_template_part('template-parts/newsletter-element','null'); ?>
      </section>
      <section class="search-blogs">
        <?php get_template_part('template-parts/blog-search-element','null'); ?>
      </section>
    </section>
    <section>
      <div class="page-links one">
        <a class="link" href="<?php echo get_field('blog_detail_page_bottom_banner_text_url', 'options'); ?>">
          <div class="featured-image" style="background:url('<?php echo get_field('blog_detail_page_bottom_banner_image', 'options'); ?>')">
            <div class="content">
              <p><?php echo get_field('blog_detail_page_bottom_banner_text', 'options'); ?></p>
              <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
              </div>
            </div>
          </div>
        </a>
      </div>
    </section>
