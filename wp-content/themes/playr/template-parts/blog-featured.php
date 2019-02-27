<section class="top-section section-padding">
  <div class="section-wrap">
    <div class="blog-slider dark-slick-navi">
      <?php
      $the_query = new WP_Query( array(
        'posts_per_page' => 4,
        'post_type' => 'blog',
        'meta_query' => array(
          array(
                              'key' => 'show_in_featured_blog_slider', // name of custom field
                              'value' => 'mark_featured', // matches exactly "mark_featured"
                              'compare' => 'LIKE'
                            )
        )
      ));
      if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          <div class="slide">
              <a href="<?php the_permalink() ?>" class="slider-img-link"><div class="post-img" <?php if(!empty($image[0])){?> style="background:url('<?php echo $image[0] ?>')" <?php } ?>></div></a>
              <div class="post-details">
                <div class="posted-on">
                  <span class="date"><?php echo get_the_date('j M Y');?></span>
                  <span class="category-small">FEATURED</span>
                </div>
                <h2 class="post-caption"><a href="<?php the_permalink() ?>" class="slider-title-link"><?php the_title(); ?></a></h2>
                <p class="post-desc"> <?php if (strlen(get_the_excerpt()) > 150)  {
                  echo mb_substr(get_the_excerpt($before = '', $after = '', FALSE), 0, 150) . '...';
                } else {
                  echo get_the_excerpt();
                } ?>
              </p>
              <a class="read-more" href="<?php the_permalink() ?>">Read more <span class="animated-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg" alt="Arrow image"></span></a>
            </div>
          </div>
        <?php
      endwhile;
      endif; ?>
    </div>
  </div>
</section>
