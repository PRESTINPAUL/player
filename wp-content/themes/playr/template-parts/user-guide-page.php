<section class="support user-guide user-guide-wrapper">
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
  <section class="main-content-wrapper">
    <section class="page-header">
      <div class="section-wrap page-heading-section">
        <div class="page-heading-wrapper">
          <label><?php echo get_field("user_guide_header_label_text"); ?></label>
          <h1><?php echo get_field("user_guide_header_main_heading"); ?></h1>
          <p class="brief-desc"><?php echo get_field("user_guide_header_text_description"); ?></p>
        </div>
      </div>
    </section>
    <?php if( have_rows('football_solutions_hero_section_hero_images') ): ?>
				  <ul class="slides">
				  <?php  while ( have_rows('football_solutions_hero_section_hero_images') ) : the_row(); ?>
				     <li>
				    	<div class="g-slide" style="background-image: url('<?php the_sub_field('hero_image'); ?>') ;">
						<div class="overlay"></div>
						</div>
				    </li>
					<?php endwhile; ?>
				  </ul>
				  <?php else :
				  endif;	?>
    <?php if( have_rows('user_guide_middle_content_section') ): ?>
    <section class="top-section section-padding">
      <div class="section-wrap step-section-wrap animate-tiles">
        <?php  while ( have_rows('user_guide_middle_content_section') ) : the_row(); ?>
        <div class="step-wrapper">
          <div class="step-items">
            <div class="post-img tile" style="background:url('<?php the_sub_field('guide_middle_section_image'); ?>')"></div>
            <div class="post-details tile">
              <div class="inner-content-wrapper">
                <label class="step-label"><?php the_sub_field('guide_middle_section_step_number'); ?></label>
                <h2 class="step-caption"><?php the_sub_field('guide_middle_section_title'); ?></h2>
                <p class="step-desc"><?php the_sub_field('guide_middle_section_description'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </section>
    <?php else :
				  endif;	?>
    </section>
    <section class="carousel-section">
      <div class="carousel-wraper">
        <figure class="carousel-topic" style="background-image:url('<?php echo get_field("user_guide_middle_section_slider_1_main_image"); ?>')">
          <h2>
          <?php echo get_field("user_guide_middle_section_slider_1_main_title"); ?>
          </h2>

        </figure>
        <?php if( have_rows('user_guide_middle_section_slider_1') ): ?>
        <div class="slider-wrapper">
          <div class="slider-nav-thumbnails thumbnails-1">
          <?php  while ( have_rows('user_guide_middle_section_slider_1') ) : the_row(); ?>
          <div class="thumbnail-wrapper">
                <label><?php the_sub_field('guide_slider_1_thumbnail_label'); ?></label>
                <h3><?php the_sub_field('guide_slider_1_thumbnail__heading_text'); ?></h3>
            </div>
          <?php endwhile; ?>
          </div>

          <div class="slider-contents-wrapper slider slider-1">
            <?php  while ( have_rows('user_guide_middle_section_slider_1') ) : the_row(); ?>
            <div class="slider-contents">
              <div class="content">
                <div class="inner-wrapper">
                  <h2><?php the_sub_field('guide_slider_1_main_content_title'); ?></h2>
                  <div class="desc-wrapper">
                    <div class="left-box">
                      <?php the_sub_field('guide_slider_1_main_content_left_description'); ?>
                    </div>
                    <div class="right-box">
                      <?php the_sub_field('guide_slider_1_main_content_right_description'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
    			</div>

        </div>
        <?php else :
				  endif;	?>
      </div>

      <div class="carousel-wraper">
        <figure class="carousel-topic" style="background-image:url('<?php echo get_field("user_guide_middle_section_slider_2_main_image"); ?>')">
          <h2>
          <?php echo get_field("user_guide_middle_section_slider_2_main_title"); ?>
          </h2>
        </figure>
        <?php if( have_rows('user_guide_middle_section_slider_2') ): ?>
        <div class="slider-wrapper">
          <div class="slider-nav-thumbnails thumbnails-2">
            <?php  while ( have_rows('user_guide_middle_section_slider_2') ) : the_row(); ?>
            <div class="thumbnail-wrapper">
                <label><?php the_sub_field('guide_slider_2_thumbnail_label'); ?></label>
                <h3><?php the_sub_field('guide_slider_2_thumbnail__heading_text'); ?></h3>
            </div>
            <?php endwhile; ?>
          </div>

          <div class="slider-contents-wrapper slider slider-2">
          <?php  while ( have_rows('user_guide_middle_section_slider_2') ) : the_row(); ?>
            <div class="slider-contents">
              <div class="content">
                <div class="inner-wrapper">
                  <h2><?php the_sub_field('guide_slider_2_main_content_title'); ?></h2>
                  <div class="desc-wrapper">
                    <div class="left-box">
                      <?php the_sub_field('guide_slider_2_main_content_left_description'); ?>
                    </div>
                    <div class="right-box">
                      <?php the_sub_field('guide_slider_2_main_content_right_description'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>

        </div>
        <?php else :
				  endif;	?>
      </div>

      <div class="carousel-wraper">
        <figure class="carousel-topic" style="background-image:url('<?php echo get_field("user_guide_middle_section_slider_3_main_image"); ?>')">
          <h2>
          <?php echo get_field("user_guide_middle_section_slider_3_main_title"); ?>
          </h2>
        </figure>
        <?php if( have_rows('user_guide_middle_section_slider_3') ): ?>
        <div class="slider-wrapper">
          <div class="slider-nav-thumbnails thumbnails-3">
            <?php  while ( have_rows('user_guide_middle_section_slider_3') ) : the_row(); ?>
            <div class="thumbnail-wrapper">
              <label><?php the_sub_field('guide_slider_3_thumbnail_label'); ?></label>
              <h3><?php the_sub_field('guide_slider_3_thumbnail__heading_text'); ?></h3>
            </div>
            <?php endwhile; ?>
          </div>

          <div class="slider-contents-wrapper slider slider-3">
            <?php  while ( have_rows('user_guide_middle_section_slider_3') ) : the_row(); ?>
            <div class="slider-contents">
              <div class="content">
                <div class="inner-wrapper">
                  <h2><?php the_sub_field('guide_slider_3_main_content_title'); ?></h2>
                  <div class="desc-wrapper">
                    <div class="left-box">
                      <?php the_sub_field('guide_slider_3_main_content_left_description'); ?>
                    </div>
                    <div class="right-box">
                      <?php the_sub_field('guide_slider_3_main_content_right_description'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>

          </div>

        </div>
        <?php else :
				  endif;	?>

      </div>

    </section>
</section>
<section>
  <div class="page-links two">
    <a class="link" href="<?php echo get_field('footer_left_link')['url']; ?>">
      <div class="featured-image" style="background:url('<?php echo get_field('footer_left_background_image_left'); ?>')">
        <div class="content">
          <p><?php echo get_field('footer_left_link')['title']; ?></p>
          <div>
            <img class="backward-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
          </div>
        </div>
      </div>
    </a>
    <a class="link" href="<?php echo get_field('footer_right_link')['url']; ?>">
      <div class="featured-image" style="background:url('<?php echo get_field('footer_left_background_image_right'); ?>')">
        <div class="content">
          <p><?php echo get_field('footer_right_link')['title']; ?></p>
          <div>
            <img class="forward-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>
