$(document).ready(function(){

  blogInitSlider();
  $('.blog .list-wrapper #blog-search').off().on('click',function(e) {
    $('.blog .search-layout').fadeIn(500);
    $('.blog .search-form-wrapper').fadeIn(500);
  });
  if($('.blog-search-form .clear-text').length > 0) {
    $('.clear-text').off().on('click', function(e) {
      $('.search-flied').val('');
    });
  }
  $('.close-popup').off().on('click', function() {
    $('.blog-search-form input').blur();
    $('.blog .search-layout').hide(10);
    $('.blog .search-form-wrapper').hide(10);
    $('.blog-search-form')[0].reset();
  });

 $('.twitter-fb-share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });
if($('.blog.blog-details .content-wrapper .contents p').length > 0) {
  $('.blog.blog-details .content-wrapper .contents p:empty').remove();
}

});
function blogInitSlider() {
  //if(getWidth() < 768) {
    $('.blog-slider').slick({
      arrows: true,
      dots: true,
      centerMode: false,
      slidesToShow: 1,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '24px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '24px',
            slidesToShow: 1
          }
        }
      ]
    });
}
