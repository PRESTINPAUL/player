var controllerSecond;
var resizeFlag = true;
var controller,controllerVest;
var sceneGlobal;
var scrollDirection = 'Down';
var checkIE = false;
$(document).ready(function(){

    controller = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave',
      }
    });

    if(getWidth()>767 && !checkMobile() && !checkIsIE()) {
      var slides = document.querySelectorAll(".section-panel");
      var tween = TweenMax.to("#scroll-content-1", 5, {y:"-800%"});
      new ScrollMagic.Scene({
        offset: '-50px',
        triggerElement: '.section-2',
        duration: '475%',
      })
      .setPin('.section-2',{pushFollowers: false})
      .setTween(tween)
      .addTo(controller);

      var controllerRemoveGreyBg = new ScrollMagic.Controller();
      new ScrollMagic.Scene({
        triggerElement: '.section-5',
        triggerHook: 1,
         duration: '250%',
      })
      .setClassToggle('.section-2','hide-grey-bg')
      .addTo(controllerRemoveGreyBg);

      initializeScrollMagicVestScene();
    }

    controllerSecond = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave',
        duration: '100%'
      }
    });

  var controllerFade = new ScrollMagic.Controller();
  var currentEle;
  if(!checkMobile()) {
    $('.fade-up-element').each(function(){
        currentEle = this;
        new ScrollMagic.Scene({
          triggerElement : currentEle,
          triggerHook : 0.8,
          reverse: false,
      })
      .setClassToggle(currentEle,'active')
      .addTo(controllerFade)
    });
  }

  if(getWidth()>767) {
    initializeScrollMagicSceneThree();
    resizeFlag = true;
  }
  else {
    resizeFlag = false;
      controllerSecond.destroy(true);
  }

    $('.full-spec-list .list-item').click(function(){
        $(this).find('.details').slideToggle();
        $(this).find('.plus-icon').toggleClass('active');
    });

    $('.partial-slick-slide').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 3,
      centerMode: true,
      autoplay: false,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false,
      pauseOnHover:false,
      pauseOnFocus: false,
      responsive: [
        {
            breakpoint:1200,
            settings: {
              slidesToShow: 1
            }
        },
        {
            breakpoint:768,
            settings: {
              slidesToShow: 1
            }
        },
        {
          breakpoint: 767,
          settings: {
            arrows: true
          }
        }
      ]
    });

    $('.icon_arrow_loader_slick.prev').on('click',function(){
      $('.partial-slick-slide').slick('slickPrev');
    });

    $('.icon_arrow_loader_slick.next').on('click',function(){
      $('.partial-slick-slide').slick('slickNext');
    });

      var controllerScroll = new ScrollMagic.Controller({});
      var heightAdjust = 50; //Height of subnav
      controllerScroll.scrollTo(function(newpos) {

        if(scrollDirection == 'Down') {
          heightAdjust = 50;
        }
        else {
          heightAdjust = 130;
        }

        TweenMax.to(window,2,{scrollTo:{y:newpos - heightAdjust}});
      });

      var sectionIdList = ["#smartpod","#smartvest","#smartapp","#productspec","#systemgallery"];
      var sectionList = ["#Pod","#Vest","#App","#Specs","#Gallery"];
      var i;

      for(i=0;i<sectionList.length;i++) {
          new ScrollMagic.Scene({
            triggerElement: sectionIdList[i],
            duration: $(sectionIdList[i]).innerHeight(),
          })
          .setClassToggle(sectionList[i],'active')
          .addTo(controllerScroll);
      }

      var countPrev = 0;
      var countCurrent = 0;
    $('.system-nav ul li a').click(function(e){
      e.preventDefault();

      //To Check if Scrolled Up or Down on Sub nav click
      if($('.system-nav ul li a').hasClass('active')) {
        count = $('.system-nav ul li a.active').parent().index();
        countCurrent = $(this).parent().index();
        if(count > countCurrent) {
          scrollDirection = 'Up';
        }
        else {
          scrollDirection = 'Down';
        }
      }

      $('.system-nav ul li a').removeClass('active');
      $(this).addClass('active');
      var sectionId = $(this).attr('href');
      if(checkMobile()) {
        if(scrollDirection == 'Down') {
          heightAdjust = 50;
        }
        else {
          heightAdjust = 130;
        }
        $('html, body').animate({
          scrollTop: $(sectionId).offset().top - heightAdjust
        }, 1500);
      }
      else {
        controllerScroll.scrollTo(sectionId);
      }
    });

    $('.system-page .full-spec-link').click(function(){
       $('html, body').animate({
          scrollTop: $("#productspec").offset().top - heightAdjust
        }, 1500);
    });

    $('.system-menu-dropdown').click(function(){
      $(this).toggleClass('open');
      $('.system-nav nav').slideToggle();
    });

});

$(window).resize(function(){
  if(getWidth() <= 767 && resizeFlag == true) {
    // work once in mobile -> Desktop to Mobile
    controllerSecond.destroy(true);
    if(!checkIsIE()) { 
    controllerVest.destroy(true);
    controller.destroy(true);
    }
    $('.scrolling-text').removeAttr('style');
     resizeFlag = false;
  }
  else if(getWidth() >= 768 && resizeFlag == false){
    // work once in desktop -> Mobile to Desktop
      initializeScrollMagicSceneThree();
      if(!checkIsIE()) {
       initializeScrollMagicPodScene();
       initializeScrollMagicVestScene();
      } 
      resizeFlag = true;
  }

});

function initializeScrollMagicSceneThree() {
  var windowHeight = $(window).height();
  controllerSecond = null;
  controllerSecond = new ScrollMagic.Controller();

  var appAnimationthird = new TimelineMax({
    smoothChildTiming: true,
  })
  .fromTo("#system-record-1", 3, {y:"40%"},{y:-windowHeight,rotation: 0.001},"+=0.1")
   .to("#iphone-screen-1", 1, {y:"-100%"}, "-=2.8")
   .to("#iphone-screen-2", 1, {y:'0%'},"-=2.8")
   .fromTo("#featured-image-2",0.2,{autoAlpha: 0},{autoAlpha:1,
    onStart: function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-2').addClass('active');},
    onReverseComplete: function() {$('.scroll-highlight').removeClass('active');$('#scroll-highlight-1').addClass('active');},
   },"-=2")
    .fromTo("#system-record-2", 9,  {y:windowHeight}, {y:-windowHeight,display:'block',rotation: 0.001 },"-=4")
    .fromTo("#system-record-3", 6,  {y:windowHeight}, {y:"0%",display:'block',rotation: 0.001 },"-=7.4")
    .fromTo("#featured-image-3",0.2,{autoAlpha:0},{autoAlpha:1,
      onStart: function(){$('.scroll-highlight').removeClass('active');$('#scroll-highlight-3').addClass('active');},
      onReverseComplete: function() {$('.scroll-highlight').removeClass('active');$('#scroll-highlight-2').addClass('active');},
    },"-=4.2")
    .to("#iphone-screen-2", 1.5, {y:'-100%'},"-=5.5")
    .fromTo("#iphone-screen-3", 1.5, {y:"100%"},{y:"0%"}, "-=5.5")


  new ScrollMagic.Scene({
    offset: '-50px',
    triggerHook: 0,
    triggerElement: '.section-10',
    duration: '200%',
    smoothChildTiming: true
  })
  .setPin('.section-10')
  .setTween(appAnimationthird)
  .addTo(controllerSecond);
}

function initializeScrollMagicPodScene() {
     controller = null;
     controller = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave',
      }
    });
     var slides = document.querySelectorAll(".section-panel");
      var tween = TweenMax.to("#scroll-content-1", 5, {y:"-800%"});
      sceneGlobal = new ScrollMagic.Scene({
        offset: '-50px',
        triggerElement: '.section-2',
        duration: '475%',
      })
      .setPin('.section-2',{pushFollowers: false})
      .setTween(tween)
      .addTo(controller);

}

function initializeScrollMagicVestScene() {
  var specAnimaiton = new TimelineMax()
  .fromTo(".vest-spec",2,{y:"110%"},{y:"-5%"},"-=0.5");
  controllerVest = null;
   controllerVest = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave',
      }
    });


    new ScrollMagic.Scene({
    offset: '-50px',
    triggerHook: 0,
    triggerElement: '.section-7',
    duration: '100%',
    })
    .setPin('.section-7')
    .setTween(specAnimaiton)
    .addTo(controllerVest);
}

function checkIsIE() {
  if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1))
  {
    return true;
  }
  else {
      return false;
  }
}