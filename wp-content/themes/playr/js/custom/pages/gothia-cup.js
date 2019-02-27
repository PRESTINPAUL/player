$(document).ready(function(){
	$('.gothia-playr-slider').slick({
        dots: true,
        arrows: false,
        autoplay:true,
        autoplaySpeed:3000,
        pauseOnHover:false,
        slidesToShow:1,
        slidesToScroll:1,
        swipe: false,
      });

	 // Sliders for mobile screens
        $('.mobile-slider').slick({
          arrows: true,
          dots: true,
          autoplay:true,
          autoplaySpeed:3000,
          pauseOnHover:false,
          slidesToShow:1,
          slidesToScroll:1
        });


      $('.gothia-playr-slider').closest('section').find('.fill-load').addClass('filler');
      $('.gothia-playr-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('.gothia-playr-slider').closest('section').find('.fill-load').removeClass('filler');
      });
      $('.gothia-playr-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
        $('.gothia-playr-slider').closest('section').find('.fill-load').addClass('filler');
      });

      $('.icon_arrow_loader_gothia.prev').on('click',function(){
          $(this).closest('section').find('.gothia-playr-slider').slick('slickPrev');
      });
      $('.icon_arrow_loader_gothia.next').on('click',function(){
          $(this).closest('section').find('.gothia-playr-slider').slick('slickNext');
      });

      $('.gothia-playr-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
            setTimeout(function(){ $('.gothia-playr-slider .g-slide').blur();}, 500);
       });

     //$('.thankyou-popup-loyout').show();
     //$('.thankyou-popup').show();
     var sb = [];
     if($('.gothia-cup-page').length) {
	      $("select.custom").each(function(i) {
	          sb[i] = new SelectBox({
	          selectbox: $(this),
	          customScrollbar: true,
	        });
	      });
      }

      $('#anchor-to-form').on("click",function(){
      	$("body, html").animate({
    			scrollTop: $(".contact-form").position().top
			});
      });

     // Add eevent listener for opening Thankyou popup
document.addEventListener( 'wpcf7mailsent', function( event ) {
  //if ( ('2137' == event.detail.contactFormId) || ('2263' == event.detail.contactFormId) ) {  
    $('.thankyou-popup-loyout').show();
    $('.thankyou-popup').show();
    sb[0].jumpToIndex(0);
   	sb[1].jumpToIndex(0);
    setTimeout(function(){ 
    	$('.thankyou-popup-loyout').hide();
    	$('.thankyou-popup').hide();
    }, 5000);
  //}
}, false );

});