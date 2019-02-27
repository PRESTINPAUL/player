var controller = new ScrollMagic.Controller(); // Controller for first section - Desktop
var controllerSecond = new ScrollMagic.Controller(); // Controller for second section - Desktop
var controllerMobile = new ScrollMagic.Controller(); // Controller to pin owner list in mobile
var controllerOwnerHighlight = new ScrollMagic.Controller(); // Controller to highlight owner in mobile
var resizeFlag = true;
var sceneOne, sceneTwo;

$(document).ready(function() {

  if($('.smartcoach-page').length) {
      $('.mobile-slider').slick({
      arrows: true,
      dots: true,
      autoplay:true,
      autoplaySpeed:3000,
      pauseOnHover:false,
      slidesToShow:1,
      slidesToScroll:1
    });
  }

    if($('.smartcoach-page').length) {

      if(getWidth()> 767) {
        // initialze scroll magic
          initializeScrollMagicSceneOne();
          initializeScrollMagicSceneTwo();
          resizeFlag = true;
      }
      else{
          // initialze scroll magic mobile
         // initialzeScrollMagicSceneOneMobile();
          resizeFlag = false;
      }
       scrollToSmartcoachPeople();
    } 

});

$(window).on('load',function(){
  if(getWidth()<768) {
    initialzeScrollMagicSceneOneMobile();
  }
});

$(window).resize(function(){
  if(getWidth() <= 767 && resizeFlag == true) {
    // work once in mobile -> Desktop to Mobile
    DestroySceneDesktopToMobile();
    if(!checkMobile()){
      initialzeScrollMagicSceneOneMobile();
    }
     resizeFlag = false;
  }
  else if(getWidth() >= 768 && resizeFlag == false){
    // work once in desktop -> Mobile to Desktop
    DestroySceneMobileToDesktop();
    DestroySceneDesktopToMobile();
    initializeScrollMagicSceneOne();
    initializeScrollMagicSceneTwo();
    resizeFlag = true;
  }
});

function initializeScrollMagicSceneOne() {
    var appAnimation = null;
    controller = null;
    var windowHeight 
    if($(window).height()>900 && $(window).width()>1000) {
      windowHeight = $(window).height() + 100;
    }
    else if($(window).height()>600 && $(window).width()>1000) {
       windowHeight = 1000; 
    }
    else {
      windowHeight = 1050;
    }
    controller = new ScrollMagic.Controller();
    appAnimation = new TimelineMax()
    .to("#scroll-content-1", 4.2, {y:-windowHeight, autoAlpha: 1,},"+=0.1")
    .to("#best-team-image-2", 0.2, {autoAlpha: 1,
      onStart:function() {
        $('.scroll-page-link').removeClass('active');$('#scroll-page-2').addClass('active');
        $('.owner-strip-list li').removeClass('active');$('#owner-2').addClass('active');
      },
      onReverseComplete:function() {
        $('.scroll-page-link').removeClass('active');$('#scroll-page-1').addClass('active');
        $('.owner-strip-list li').removeClass('active');$('#owner-1').addClass('active');
      },

    },"-=2.3")
    .fromTo("#scroll-content-2", 8.5,  {y:windowHeight,autoAlpha:1},{y:-windowHeight,autoAlpha:1,display:'block'},"-=3.9")
    .fromTo("#scroll-content-3", 6,  {y:windowHeight,autoAlpha:1}, {y:"-2%",autoAlpha:1,display:'block',},"-=6.3")
    .to("#best-team-image-3", 0.2, {autoAlpha: 1,
      onStart:function() {
        $('.scroll-page-link').removeClass('active');$('#scroll-page-3').addClass('active');
        $('.owner-strip-list li').removeClass('active');$('#owner-3').addClass('active');
      },
      onReverseComplete:function() {
        $('.scroll-page-link').removeClass('active');$('#scroll-page-2').addClass('active');
        $('.owner-strip-list li').removeClass('active');$('#owner-2').addClass('active');
      },

    }, "-=3.8")

      sceneOne = new ScrollMagic.Scene({
        triggerElement: ".section-3",
        triggerHook: 0,
        duration: "300%"
      })
      .setPin('.section-3')
      .setClassToggle('.section-3','reached-top')
      .setTween(appAnimation)
      .addTo(controller);

}

function initialzeScrollMagicSceneOneMobile() {
  controllerOwnerHighlight = null;
  controllerMobile = null;
  controllerOwnerHighlight = new ScrollMagic.Controller();
  controllerMobile = new ScrollMagic.Controller();
  sceneOneMobile = new ScrollMagic.Scene({
    triggerElement: ".section-3",
    triggerHook: 0,
    duration: $('.scroll-content').height() + 50,
  })
  .setPin('.owner-strip')
  .setClassToggle('.owner-strip',"stuck")
  .addTo(controllerMobile);

  var i;
  for(i=1; i<4;i++) {
    new ScrollMagic.Scene({
      triggerElement: "#scroll-content-"+i,
      offset: '0px',
      duration: $('#scroll-content-'+i).height(),
    })
    .setClassToggle('#owner-'+i,"active")
    .addTo(controllerOwnerHighlight);
  }
}

function DestroySceneDesktopToMobile() {
  controller.destroy(true);
  controllerSecond.destroy(true);
   $('.scrollable-content,.scrolling-text').removeAttr("style");
}

function DestroySceneMobileToDesktop() {
  controllerMobile.destroy(true);
  controllerOwnerHighlight.destroy(true);
}

function initializeScrollMagicSceneTwo() {
  var windowHeight = $(window).height();
  controllerSecond = null;
  controllerSecond = new ScrollMagic.Controller();
  var appAnimationSecond = new TimelineMax()
  .fromTo("#insight-text-1", 3.5, {y:"-20%"},{y:-windowHeight,},"+=0.1")
  .fromTo("#iphone-screen-1", 2, {y:"0"},{y:"-100%"}, "-=3.4")
  .fromTo("#iphone-screen-2", 2, {y:'100%'},{y:'0%'},"-=3.4")
  .fromTo("#featured-image-2",0.2,{autoAlpha: 0},{autoAlpha:1,
    onStart: function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-2').addClass('active');},
    onReverseComplete:function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-1').addClass('active');},
    },"-=2")
  .fromTo("#insight-text-2", 9,  {y:windowHeight}, {y:-windowHeight,display:'block',},"-=4.5")
  .fromTo("#insight-text-3", 6,  {y:windowHeight}, {y:"-40%",display:'block',},"-=7.4")
  .fromTo("#featured-image-3",0.2,{autoAlpha:0},{autoAlpha:1,
    onStart: function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-3').addClass('active');},
    onReverseComplete:function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-2').addClass('active');},
    },"-=4")
  .to("#iphone-screen-2", 2, {y:'-100%'},"-=5")
  .fromTo("#iphone-screen-3", 2, {y:"100%"},{y:"0%"}, "-=5")

  sceneTwo = new ScrollMagic.Scene({
    triggerElement: ".section-6 ",
    triggerHook: 0,
    duration: "250%"
  })
  .setPin('.section-6')
  .setTween(appAnimationSecond)
  .addTo(controllerSecond);
}

function scrollToSmartcoachPeople() {
  if(location.hash == '#smartcoach-people') {
    $('html, body').animate({
        scrollTop: $(".section-2").offset().top
    }, 100);
  }
}