<?php if( have_rows('press_carousel_repeater', 'options') ): ?>
  <div class="Press">
    <div class="u-container">
      <p class="Press-title">
        As seen and featured on
      </p>
      <ul class="Press-list" id="js-press-carousel" data-aos="fade-in" data-aos-delay="350">
    <?php while( have_rows('press_carousel_repeater', 'options') ): the_row(); 
      // vars
      $image = get_sub_field('press_logo'); ?>
      <?php if( !empty($image) ): ?>
        <li class="Press-item"> 
          <img 
            class="Press-image" 
            src="<?php echo $image['url']; ?>" 
            alt="<?php echo $image['alt'] ?>" 
          />
        </li>
      <?php endif; ?>
    <?php endwhile; ?>
    </ul>
    </div>
  </div>
<?php else: ?>
  <div class="Press">
    <div class="u-container">
      <p class="Press-title">
        As seen and featured on
      </p>
      <ul class="Press-list">
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-1.png" />
        </li>
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-2.png" />
        </li>
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-3.png" />
        </li>
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-4.png" />
        </li>
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-6.png" />
        </li>
        <li class="Press-item">
          <img class="Press-image" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/press-7.png" />
        </li>
      </ul>
    </div>
  </div>
<?php endif; ?>

<style>
  .Press-list {
    cursor: move;
  }
  .Press-list .slick-slide img {
    display: initial;
  }
</style>
<script>
  $(document).ready(function(){
    $('#js-press-carousel').slick({
      infinite:true,
      slidesToShow: 6,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      speed: 500,
      cssEase: 'linear',
      useTransform:false,
      autoplay: true,
      pauseOnHover: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
      ]
    });
  });
</script>
