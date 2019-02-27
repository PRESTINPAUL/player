<!-- Remember to add padding to the top of the webpage -->
<section class="squad-page">
    <!--  Top part of page -->

    <div class="Section HeritageHero">
        <div class="Section-background HeritageHero-background" data-aos="fade-left">
            <?php $hero_image = get_field('header_image'); ?>
            <div class="SquadHero-image" style="background-image: url(<?php echo $hero_image['url']; ?>);" data-aos="fade-in"></div>
            <div class="HeritageHero-shape"></div>
        </div>
        <div class="Section-inner u-container">
            <div class="Section-content">
                <div class="Section-left" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="ExploreSection-pretitle u-uppercase">EXPLORE SQUAD</h1>
                    <h1 class="Section-title">
                    <?php the_field('heading_title'); ?>
                    </h1>
                    <p class="Section-subtitle">
                      <?php
                        if (have_posts()):
                          while (have_posts()) : the_post();
                            echo get_the_content();
                          endwhile;
                        endif;
                      ?>
                    </p>
                    <a class="Section-link btn" id="smooth-scroll">
                      Read More
                    </a>
                </div>
                <div class="Section-right"></div>
            </div>
        </div>
    </div>

  <!-- Team stats & slider -->

  <div class="Teams--stats">
    <?php get_template_part('template-parts/team-3','null'); ?>
  </div>

  <!-- Phone + KPIs -->

    <div class="ExploreSection" id="smartapp">
    <div class="ExploreSection-background ExploreApp-background"></div>
    <div class="u-container">
     <div class="ExploreSection-center" data-aos="fade-up">
        <h2 class="ExploreSection-title">
          <?php the_field('squad_app_title'); ?>
        </h2>
        <p class="ExploreSection-subtitle">
          <?php the_field('squad_app_description'); ?>
        </p>
      </div>
      
      <div class="ExploreSection-tab">
        <div class="ContentSlider-controls slick-controls">
          <ul class="slick-dots tablist" role="tablist">
            <li class="tablinks slick-active taby" role="presentation" onclick="openTab(event, 'Coach')">
              <button type="button" role="tab" id="slick-slide-control00" aria-selected="true">1</button>
            </li>
            <li class="taby" role="presentation" onclick="openTab(event, 'Parents')">
              <button type="button" role="tab" id="slick-slide-control01">2</button>
            </li>
            <li class="taby" role="presentation" onclick="openTab(event, 'Family')">
              <button type="button" role="tab" id="slick-slide-control02">3</button>
            </li>
          </ul>
        </div>
      </div>

      <!-- Coach Tab -->
      <div id="Coach" class="tabcontent">
      <div class="ExploreSection-inner">
        <div class="ExploreSection-row">
          <div class="ExploreSection-right"></div>
        </div>
        <?php if( have_rows('coach_usps') ): ?>
        <?php $counter = 1 ?>
          <div class="ExploreSection-row">
            <?php while( have_rows('coach_usps') ): the_row(); ?>
            <?php if($counter === 1 || $counter === 4) { ?>
              <div class="ExploreSection-narrow"> 
            <?php } ?>
            <div class="ExploreFeature" data-aos="fade-up">
              <div class="ExploreFeature-pretitle">0<?php echo $counter; ?></div>
              <div class="ExploreFeature-title"><?php the_sub_field('coach_usps_title'); ?></div>
              <div class="ExploreFeature-description"><?php the_sub_field('coach_usps_description'); ?></div>
            </div>
            <?php if ($counter === 3) : ?>
            </div>
            <?php if( have_rows('coach_usps_images') ): ?>
            <div class="ExploreSection-stretch"data-aos-delay="400">
              <div class="ExploreApp-screenshotsContainer">
                <div class="ExploreApp-screenshots dark-slick-navi">
                  <?php while( have_rows('coach_usps_images') ): the_row(); 
                    $image = get_sub_field('image'); ?>
                  <div class="ExploreApp-slide u-hidden">
                    <div class="ExploreApp-screenshot">
                      <img 
                        src="<?php echo $image['url']; ?>" 
                        alt="<?php echo $image['alt'] ?>"  
                      />
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if($counter === 6) { ?>
              </div> 
            <?php } ?>
            <?php $counter++; endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <!-- Parent Tab -->

  <div id="Parents" class="tabcontent" style="display: none" style="display: none">
  <div class="ExploreSection-inner">
        <div class="ExploreSection-row">
          <div class="ExploreSection-right"></div>
        </div>
        <?php if( have_rows('parents_usps') ): ?>
        <?php $counter = 1 ?>
          <div class="ExploreSection-row">
            <?php while( have_rows('parents_usps') ): the_row(); ?>
            <?php if($counter === 1 || $counter === 4) { ?>
              <div class="ExploreSection-narrow"> 
            <?php } ?>
            <div class="ExploreFeature" data-aos="fade-up">
              <div class="ExploreFeature-pretitle">0<?php echo $counter; ?></div>
              <div class="ExploreFeature-title"><?php the_sub_field('parents_usps_title'); ?></div>
              <div class="ExploreFeature-description"><?php the_sub_field('parents_usps_description'); ?></div>
            </div>
            <?php if ($counter === 3) : ?>
            </div>
            <?php if( have_rows('parents_usps_images') ): ?>
            <div class="ExploreSection-stretch"data-aos-delay="400">
              <div class="ExploreApp-screenshotsContainer">
                <div class="ExploreApp-screenshots dark-slick-navi">
                  <?php while( have_rows('parents_usps_images') ): the_row(); 
                    $image = get_sub_field('image'); ?>
                  <div class="ExploreApp-slide u-hidden">
                    <div class="ExploreApp-screenshot">
                      <img 
                        src="<?php echo $image['url']; ?>" 
                        alt="<?php echo $image['alt'] ?>"  
                      />
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if($counter === 6) { ?>
              </div> 
            <?php } ?>
            <?php $counter++; endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <!-- Family Tab -->
  <div id="Family" class="tabcontent" style="display: none">
  <div class="ExploreSection-inner">
        <div class="ExploreSection-row">
          <div class="ExploreSection-right"></div>
        </div>
        <?php if( have_rows('family_and_friends_usps') ): ?>
        <?php $counter = 1 ?>
          <div class="ExploreSection-row">
            <?php while( have_rows('family_and_friends_usps') ): the_row(); ?>
            <?php if($counter === 1 || $counter === 4) { ?>
              <div class="ExploreSection-narrow"> 
            <?php } ?>
            <div class="ExploreFeature" data-aos="fade-up">
              <div class="ExploreFeature-pretitle">0<?php echo $counter; ?></div>
              <div class="ExploreFeature-title"><?php the_sub_field('family_and_friends_usps_title'); ?></div>
              <div class="ExploreFeature-description"><?php the_sub_field('family_and_friends_usps_description'); ?></div>
            </div>
            <?php if ($counter === 3) : ?>
            </div>
            <?php if( have_rows('family_and_friends_usps_images') ): ?>
            <div class="ExploreSection-stretch"data-aos-delay="400">
              <div class="ExploreApp-screenshotsContainer">
                <div class="ExploreApp-screenshots dark-slick-navi">
                  <?php while( have_rows('family_and_friends_usps_images') ): the_row(); 
                    $image = get_sub_field('image'); ?>
                  <div class="ExploreApp-slide u-hidden">
                    <div class="ExploreApp-screenshot">
                      <img 
                        src="<?php echo $image['url']; ?>" 
                        alt="<?php echo $image['alt'] ?>"  
                      />
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if($counter === 6) { ?>
              </div> 
            <?php } ?>
            <?php $counter++; endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Subscription Box -->

    <div class="Band-newsletterForm">
      <div class="Newsletter-half">
        <h1 class="ExploreSection-pretitle u-uppercase">
          <?php echo get_field('newsletter_cta'); ?>
        </h1>
        <p class="Newsletter-callToAction">
        <?php echo get_field('newsletter_title'); ?>
        </p>
      </div>
      <div class="Newsletter-half">
      <p class="Newsletter-subtitle">
        <?php echo get_field('newsletter_description'); ?>
      </p>
      <div class="newsletter__header--container"> 
      <form action="https://catapultsports.us14.list-manage.com/subscribe/post-json?u=a58f1e571bcf81408db6dda8f&id=0c795ea02d" method="GET" id="newsletter__form" class="newsletter__header--container">
          <input type="hidden" name="COUNTRY" id="COUNTRY" value="QA">
          <input type="email" placeholder="Email Address" name="EMAIL" id="EMAIL" class="newsletter__header--email">
          <input type="submit" class="btn" form="newsletter__form" value="Sign Up" />
      </form>
      </div>
      <div id="newsletter__result"></div>
      </div>
    </div>

    </div>
  </div>
  <!-- Quote -->

  <div class="ExploreQuote">
      <div class="u-container">
        <div class="ExploreQuote-inner" data-aos="fade-up">
            <div class="ExploreQuote-left">
              <div class="ExploreQuote-quote ExploreQuote-quoteSymbol">“</div>
              <div class="ExploreQuote-quote"><?php the_field('quote_title'); ?></div>
              <div class="ExploreQuote-text">
                <?php the_field('quote_description'); ?>
              </div>
            </div>
            <div class="ExploreQuote-right">
              <?php $quote_image = get_field('quote_image'); ?>
              <img src="<?php echo $quote_image['url']; ?>" alt="Football" />
            </div>
        </div>
      </div>
  </div>

</section>

<script>

$(document).ready(function(){
  ajaxMailChimpForm($("#newsletter__form"), $("#newsletter__result"));
  function ajaxMailChimpForm($form, $resultElement){
    // Hijack the submission. We'll submit the form manually.
    $form.submit(function(e) {
      e.preventDefault();
      if (!isValidEmail($form)) {
        var error =  "A valid email address must be provided.";
        $resultElement.html(error);
        $resultElement.css("color", "red");
      } else {
        $resultElement.css("color", "black");
        $resultElement.html("Subscribing...");
        submitSubscribeForm($form, $resultElement);
      }
    });
  }

  function isValidEmail($form) {
    var email = $form.find("input[type='email']").val();
    if (!email || !email.length) {
      return false;
    } else if (email.indexOf("@") == -1) {
      return false;
    }
    return true;
  }
  function submitSubscribeForm($form, $resultElement) {
    $.ajax({
      type: "GET",
      url: $form.attr("action"),
      data: $form.serialize(),
      cache: false,
      dataType: "jsonp",
      jsonp: "c", // trigger MailChimp to return a JSONP response
      contentType: "application/json; charset=utf-8",
      error: function(error){
        // not called for jsonp requests
      },
      success: function(data){
        if (data.result != "success") {
          var message = data.msg || "Sorry. Unable to subscribe. Please try again later.";
          $resultElement.css("color", "red");
          if (data.msg && data.msg.indexOf("already subscribed") >= 0) {
            message = "You're already subscribed. Thank you.";
            $resultElement.css("color", "black");
          }
          $resultElement.html(message);
        } else {
          $resultElement.css("color", "red");
          $resultElement.html("Thank you for subscribing!");
        }
      }
    });
  }
});

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("taby");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("slick-active");
    // tablinks[i].className = tablinks[i].className.replace( "slick-active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("slick-active");
  var selected = document.getElementById(tabName)
  selected.getElementsByClassName("ExploreApp-screenshots")[0].slick.refresh();
}

$(function () {
  $('.ExploreApp-screenshots').slick({
    infinite: true,
    slidesToShow: 1,
    centerMode: true,
    centerPadding: 0,
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: true,
    arrows: false,
    dots: true,
    fade: true
  })
});

$("#smooth-scroll").click(function() {
  $([document.documentElement, document.body]).animate({
      scrollTop: $("#smartapp").offset().top - 100
  }, 1200);
});
</script>