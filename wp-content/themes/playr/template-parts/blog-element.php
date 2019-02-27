<section class="blog-element">
      <div class="blog-element-head">
            <h2 class="title"><?php echo get_field('footer_blog_section_heading', 'options') ?></h2>
            <a href="<?php echo get_field('footer_blog_section_url_link', 'options') ?>" class="view-all-post btn btn--purple animate-btn"><?php echo get_field('footer_blog_section_url_text', 'options') ?></a>
      </div>
      <div class="post-section">
            <?php
            $the_query = new WP_Query( array(
            'posts_per_page' => 4,
            'post_type' => 'blog',
             ));
            $counter = 1;
            if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
             $get_cat_assigned = get_the_category_custompost(get_the_ID(),'category');
             $cat_mapped_slider = get_category_names_custompost($get_cat_assigned);
             ?>
            <?php if($counter == 1){ ?>
            <article class="latest-post fade-up">
                  <div class="left-sect">
                        <div class="time-cat-wrap">
                        <time class="post-time"><?php echo get_the_date('j M Y');?></time>
                        <span class="blog-cat"><ul><li><a><?php echo $cat_mapped_slider; ?></a></li></ul></span>
                        </div>
                        <a href="<?php the_permalink() ?>" class="post-title-link"><h3 class="section-title-small post-title">
                        <?php the_title(); ?>
                        </h3></a>
                        <p class="post-desc">
                        <?php if (strlen(get_the_excerpt()) > 110)  {
                                    echo mb_substr(get_the_excerpt($before = '', $after = '', FALSE), 0, 110) . '...';
                                  } else {
                                        echo get_the_excerpt();
                                  } ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="read-more">Read more  <span class="animated-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg" alt="Arrow image"></span></a>
                  </div>
                  <div class="right-sect featured-image" <?php if(!empty($image[0])){?> style="background:url('<?php echo $image[0] ?>')" <?php } ?> >
                  </div>
            </article>
            <?php }
            $counter ++;
            endwhile; ?>
            <?php else : ?>
            <p><?php __('No Blogs Available'); ?></p>
            <?php endif; ?>
            <?php $the_query->rewind_posts(); ?>
            <div class="post-list scrollable-post-list animate-cards light-slick-navi">
            <!-- looping the same query again to show the latest blog as slider in mobile device, hiding first entry for desktop and last entry for mobile -->
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                  $get_blog_cat = get_the_category_custompost(get_the_ID(),'category');
                  $blog_mapped_cat = get_category_names_custompost($get_blog_cat);
            ?>
                  <article>
                        <figure style="background: url('<?php echo $image[0] ?>');">
                        </figure>
                        <div class="post-details">
                              <div class="time-cat-wrap">
                                    <time><?php echo strtoupper(get_the_date('j M Y'));?></time>
                                     <span class="blog-cat"><ul><li><a><?php echo $blog_mapped_cat;?></a></li></ul></span>
                              </div>
                              <a href="<?php the_permalink(); ?>"><h3 class="section-title-small post-title ">
                                    <?php the_title(); ?>
                              </h3></a>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read more  <span class="animated-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg" alt="Arrow image"></span></a>
                  </article>
            <?php
            endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <p><?php __('No Blogs Available'); ?></p>
            <?php endif; ?>
            </div>
            <ul class="post-paginate">
                  <li><a class="active"></a></li>
                  <li><a></a></li>
                  <li><a></a></li>
            </ul>
            <a href="<?php echo get_field('footer_blog_section_url_link', 'options') ?>" class="view-all-post btn btn--purple animate-btn mobile"><?php echo get_field('footer_blog_section_url_text', 'options') ?></a>
      </div>
</section>
