<?php
$noImageClass='';
if(has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
        } else {
          $featured_img_url = '';
          $noImageClass ='no-image';
        }
$post_cat = get_the_category_custompost(get_the_ID(),'category');
$cats_mapped = get_category_names_custompost($post_cat);
?>
<article class="post-item">
  <a href="<?php the_permalink() ?>" class="blog-img-link <?php echo $noImageClass; ?>"><figure style="background:url('<?php echo esc_url($featured_img_url); ?>')">
  </figure></a>
  <div class="post-det">
    <div class="date-cat">
      <span class="posted-on"><?php echo get_the_date('j M Y');?></span>
      <span class="category"><?php echo $cats_mapped; ?></span>
    </div>
    <h3><a href="<?php the_permalink() ?>" class="blog-title-link"><?php the_title(); ?></a></h3>
    <a class="read-more" href="<?php the_permalink() ?>">Read more <span class="animated-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/long_arrow_01.svg" alt="Arrow image"></span></a>
  </div>
</article>
