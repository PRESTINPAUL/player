<?php
$search_text = $_GET['search'];
$args=array('s'=>$search_text,'order'=> 'DESC', 'posts_per_page'=>-1, 'post_type'=>'faq');
$wp_query = new WP_Query( $args );
?>
<section class="support faq-search-page">
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
    <section class="searching-wrap">
        <ul class="navigation">
            <li><a href="<?php echo get_post_type_archive_link( 'faq' ); ?>">FAQs</a></li>
            <li><a href="#">Search results</a></li>
        </ul>
        <div class="search-wrap">
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
        <div class="results-wrap">
            <p class="results-head">Search results for <strong>"<?php echo $search_text;?>"<strong></p>
            <ul class="results-que">
                <?php if ( have_posts() ) :
                    while (have_posts()) : the_post();?>
                    <a href="<?php the_permalink() ?>">
                    <li class="question-head"><?php  the_title(); ?>
                        <p><?php if (strlen(get_the_excerpt()) > 200)  {
                                        echo mb_substr(get_the_excerpt($before = '', $after = '', FALSE), 0, 200) . '...';
                                    } else {
                                            echo get_the_excerpt();
                                    }?></p>
                    </li></a>
                    <?php   endwhile;
                    else : ?>
                    <li><?php echo __('No Results Found.'); ?></li>
                    <?php endif; ?>
            </ul>

        </div>
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
