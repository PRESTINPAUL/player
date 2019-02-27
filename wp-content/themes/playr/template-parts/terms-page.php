<section class="terms-page">
    <div class="terms-wrap">
        <div class="terms-head">
        <p class="top-title"><?php echo get_field('terms_page_top_text'); ?></p>
        <h1 class="main-title"><?php echo get_field('terms_page_main_title'); ?></h1>
        </div>
       <div class="terms-content">
        <?php /* Start the Loop */ ?>
        <?php while(have_posts()) : the_post(); ?>
        <?php the_content();?>
        <?php endwhile; ?>
       </div>
    </div>
</section>
<section class="section-11">
            <div class="page-links one">
                <a class="link" href="<?php echo get_field('terms_page_bottom_banner_text_url'); ?>">
                    <div class="featured-image" style="background:url('<?php echo get_field('terms_page_bottom_banner_image'); ?>')">
                        <div class="content">
                            <p><?php echo get_field('terms_page_bottom_banner_text'); ?></p>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon_arrow_circle_next.svg"/>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>