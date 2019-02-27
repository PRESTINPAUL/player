var slides_to_show,slideWidth;
$(function() {
  if($('.user-guide').length > 0) {

    //Initialize small sliders (ie,slider-nav-thumbnails) and its corresponding content sliders (ie,slider-contents-wrapper) in userguide
    $('.slider-nav-thumbnails').each(function(j) {
      var thumbs = $(this);
      slideWidth = thumbs.find('.thumbnail-wrapper').innerWidth();
      slides_to_show = Math.round((thumbs.innerWidth())/260);
      thumbs.slick({
        slidesToShow: slides_to_show,
        dots: false,
        arrows: true,
        draggable: true,
        prevArrow:"<button class='slick-prev slick-arrow' aria-label='Previous' type='button'><img src='"+basepath+"/assets/images/icons/arrow_prev_blue.svg' alt='Previous'></button>",
        nextArrow:"<button class='slick-next slick-arrow' aria-label='Next' type='button'><img src='"+basepath+"/assets/images/icons/arrow_next_blue.svg' alt='Next'></button>",
        focusOnSelect: false,
        centerMode: false,
        touchThreshold: 100,
        infinite: false,
        variableWidth: true,
        touchMove:true,
        responsive: [

        ]
      });
      if(thumbs.next('.slider-contents-wrapper').length > 0){
        thumbs.next('.slider-contents-wrapper').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          draggable: false,
          arrows: false,
          fade: true,
          speed: 700,
          cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
          infinite: false
        });
      }

      // Remove active class from all thumbnail slides
      thumbs.find('.thumbnail-wrapper').removeClass('slick-active');

      // Set active class to first thumbnail slides
      thumbs.find('.thumbnail-wrapper').eq(0).addClass('slick-active');

      //Click event on the thumb slides and the corresponding content sliders (ie,slider-contents-wrapper) will be open.
      //The content slider will be slide to the index of the clicked item
      thumbs.find('.thumbnail-wrapper').on('click', function (event) {
        var slef =  $(this);
        var selectedIndux = slef.data("slick-index");
        if(thumbs.find('.slick-slide').hasClass('current-item')) {
          thumbs.find('.slick-slide').removeClass('current-item');
        }
        if(!(slef.hasClass('current-item'))) {
          slef.addClass('current-item');
        }
        if(thumbs.find('.slick-slide').hasClass('current-item')) {
          if(thumbs.next('.slider-contents-wrapper').find('.right-box').height() == 0) {
            thumbs.next('.slider-contents-wrapper').find('.right-box').css('width','0');
            thumbs.next('.slider-contents-wrapper').find('.left-box').css('width','100%');
          }
          thumbs.next('.slider-contents-wrapper').fadeIn(500);
          thumbs.next('.slider-contents-wrapper').slick('setPosition');
          thumbs.next('.slider-contents-wrapper').slick('slickGoTo',selectedIndux, true);
        } else {
          thumbs.next('.slider-contents-wrapper').fadeOut(500);
        }
      });
      if(thumbs.find('.slick-slide').hasClass('current-item')) {
        thumbs.next('.slider-contents-wrapper').fadeIn(1000);
      } else {
        thumbs.next('.slider-contents-wrapper').fadeOut(1000);
      }

      // On before slide change match active thumbnail to current slide
      thumbs.next('.slider-contents-wrapper').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var mySlideNumber = nextSlide;
        thumbs.find('.slick-slide').removeClass('slick-active');
        thumbs.find('.slick-slide').eq(mySlideNumber).addClass('slick-active');
      });
      var total_slides = thumbs.find('.thumbnail-wrapper').length || 0;
      addSliderBtnLayout(thumbs, slides_to_show, total_slides);
      thumbs.on('afterChange', function(event, slick, currentSlide, nextSlide){
        addSliderBtnLayout(thumbs, slides_to_show, total_slides);
      });
      thumbs.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        addSliderBtnLayout(thumbs, slides_to_show, total_slides);
      });
      $('.slick-prev,.slick-next').on('click', function() {
        addSliderBtnLayout(thumbs, slides_to_show, total_slides);
      });
      thumbs.on('swipe', function(event, slick, direction){
        addSliderBtnLayout(thumbs, slides_to_show, total_slides);
      });
    });
  }
});

//Window resize
$(window).resize(function(){
  if($('.user-guide').length > 0) {
    var selectedItemIndex = 0;
    var thumbElem = null;
    var thumbWidth = 260;
    //navigate the clicked slider to the clicked element, add/remove layout below next/prev buttons
    $('.slider-nav-thumbnails').each(function(k) {
      thumbElem = $(this);
      if(thumbElem.find('.current-item').length > 0) {
        selectedItemIndex = thumbElem.find('.current-item').data("slick-index");
      } if(thumbElem.find('.slick-current').length > 0) {
        selectedItemIndex = thumbElem.find('.slick-current').data("slick-index");
      }else {
        selectedItemIndex = thumbElem.slick('slickCurrentSlide');
      }
      slides_to_show = Math.round((thumbElem.innerWidth())/thumbWidth);
      thumbElem.slick("slickSetOption", "slidesToShow", slides_to_show, true);
      thumbElem.slick('resize');
      thumbElem.slick('setPosition');
      thumbElem.slick("slickGoTo",selectedItemIndex, true);
      var total_slides = thumbElem.find('.thumbnail-wrapper').length || 0;
      addSliderBtnLayout(thumbElem, slides_to_show, total_slides);
      thumbElem.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        addSliderBtnLayout(thumbElem, slides_to_show, total_slides);
      });
      thumbElem.on('afterChange', function(event, slick, currentSlide, nextSlide){
        addSliderBtnLayout(thumbElem,slides_to_show, total_slides);
      });
      $('.slick-prev,.slick-next').on('click', function() {
        addSliderBtnLayout(thumbElem, slides_to_show, total_slides);
      });
      thumbElem.on('swipe', function(event, slick, direction){
        addSliderBtnLayout(thumbElem, slides_to_show, total_slides);
      });
    });
  }
})

//Add/remove a layout bahinde the prev/next icons in the userguide sliders
function addSliderBtnLayout (thumb, slides_to_show, total_slides) {
  if(total_slides >= slides_to_show ){
    if(getWidth() > 767) {
      if(thumb.find('.slick-prev').length > 0 ){
        if(thumb.find('.slider-btn-layout.prev-layout').length == 0) {
          thumb.prepend('<div class="slider-btn-layout prev-layout"></div>');
        }
        if(thumb.find('.slick-prev').hasClass('slick-disabled')) {
          if(!(thumb.find('.slider-btn-layout.prev-layout').hasClass('loyout-hidden'))){
            thumb.find('.slider-btn-layout.prev-layout').addClass('loyout-hidden');
          }
        } else {
          if(thumb.find('.slider-btn-layout').hasClass('loyout-hidden')){
            thumb.find('.slider-btn-layout').removeClass('loyout-hidden');
          }
        }
      } else {
        if((thumb.find('.slider-btn-layout.prev-layout').length) > 0) {
          thumb.find('.slider-btn-layout.prev-layout').remove();
        }
      }
      if(thumb.find('.slick-next').length > 0 ){
        if(thumb.find('.slider-btn-layout.next-layout').length == 0) {
          thumb.append('<div class="slider-btn-layout next-layout"></div>');
        }

        if(thumb.find('.slick-next').hasClass('slick-disabled')) {
          if(!(thumb.find('.slider-btn-layout.next-layout').hasClass('loyout-hidden'))){
            thumb.find('.slider-btn-layout.next-layout').addClass('loyout-hidden');
          }
        } else {
          if(thumb.find('.slider-btn-layout.next-layout').hasClass('loyout-hidden')){
            thumb.find('.slider-btn-layout.next-layout').removeClass('loyout-hidden');
          }
        }
      } else {
        if((thumb.find('.slider-btn-layout.prev-layout').length) > 0) {
          thumb.find('.slider-btn-layout.next-layout').remove();
        }
      }
    } else {
      if(thumb.find('.slider-btn-layout.prev-layout').length > 0) {
        thumb.find('.slider-btn-layout.prev-layout').remove();
      }
      if(thumb.find('.slider-btn-layout.next-layout').length > 0) {
        thumb.find('.slider-btn-layout.next-layout').remove();
      }
    }
  } else {
    if((thumb.find('.slick-prev').length < 1) && (thumb.find('.slider-btn-layout.prev-layout').length > 0)) {
      thumb.find('.slider-btn-layout.prev-layout').remove();
    }
    if((thumb.find('.slick-next').length < 1 ) && (thumb.find('.slider-btn-layout.next-layout').length > 0)) {
      thumb.find('.slider-btn-layout.next-layout').remove();
    }
  }
}
