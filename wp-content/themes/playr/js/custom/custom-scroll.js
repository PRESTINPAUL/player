// Blog element scroll
var flag;
$(document).ready(function(){

    if($('.blog-element .post-list').length && (getWidth()< 768)) {
         intializePostSlider();
         flag = 0;
    }
    else {
        flag = 1;
    }
});

$(window).resize(function(){

    if(getWidth()> 767 && flag == 0 && $('.scrollable-post-list').length) {
       $('.scrollable-post-list').slick('unslick');
        flag = 1;
    }
    else if (getWidth() < 768 && flag == 1 && $('.scrollable-post-list').length){
        intializePostSlider();
        flag= 0;
    }

});

function intializePostSlider() {
    $('.scrollable-post-list').slick({
          arrows: true,
          dots: true,
          variableWidth: true,
          infinite: true,
    });
}
