<div class="Teams">
  <div class="u-container">
    <p class="Teams-title Teams-stats" data-aos="fade-in">
        <?php the_field('squad_club_tagline'); ?>
    </p>
    <?php if( have_rows('squad_club_logo_repeater') ): ?>
      <?php $counter = 1 ?>
      <ul class="Teams-list" id="js-team-carousel" data-aos="fade-in" data-aos-delay="350">
        <?php while( have_rows('squad_club_logo_repeater') ): the_row(); 
          // vars
          $image = get_sub_field('club_logo'); ?>
          <?php if( !empty($image) ): ?>
            <li class="Teams-item">
              <img 
                class="Teams-image" 
                src="<?php echo $image['url']; ?>" 
                alt="<?php echo $image['alt'] ?>" 
              />
            </li>
          <?php endif; ?>
        <?php $counter++; endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>
<style>
  .Teams-list {
    cursor: move;
  }
  .Teams-list .slick-slide img {
    display: initial;
  }
</style>
<script>
  $(document).ready(function(){
    $('#js-team-carousel').slick({
      infinite:true,
      slidesToShow: 3,
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
          slidesToShow: 3,
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
