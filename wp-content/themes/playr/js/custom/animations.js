//global animations
$(document).ready(function(){

  var animationController = new ScrollMagic.Controller();

  //general fade-up animation
  $('.fade-up').each(function(){
    var fadeUpCopyTween = TweenMax.from($(this), .5, {
      autoAlpha: '0',
      y: '+=50',
      ease: Linear.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(fadeUpCopyTween)
    .addTo(animationController);
  });


  //general fade-up with delay animation
  $('.fade-up-delayed').each(function(){
    var fadeUpCopyTween = TweenMax.from($(this), .3, {
      y: '+=50',
      delay: 0.3,
      ease: Linear.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(fadeUpCopyTween)
    .addTo(animationController);
  });


  //general scale-up animations
  $('.scale-up').each(function(){
    var scaleUpElementTween = TweenMax.from($(this), .6, {
      autoAlpha: '0',
      y: '+=30',
      scale: '0.5',
      ease: Linear.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(scaleUpElementTween)
    .addTo(animationController);
  });


  //general move to left animations
  $('.move-left-delayed').each(function(){
    var moveLeftElementTween = TweenMax.from($(this), .5, {
      autoAlpha: '0',
      x: '+=300',
      delay: 0.6,
      ease: Power4.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(moveLeftElementTween)
    .addTo(animationController);
  });


  //general move to right animations
  $('.move-right-delayed').each(function(){
    var moveRightElementTween = TweenMax.from($(this), .5, {
      autoAlpha: '0',
      x: '-=300',
      delay: 0.6,
      ease: Power4.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(moveRightElementTween)
    .addTo(animationController);
  });



  //fade in from left to right animations
  $('.fade-in-rtl').each(function(){
      var scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 1
      })
      .setClassToggle(this, 'active-rtl')
      .addTo(animationController);
  });


  //fade in from left to right animations
  $('.fade-in-ltr').each(function(){
     var scene = new ScrollMagic.Scene({
       triggerElement: this,
       triggerHook: 1
     })
     .setClassToggle(this, 'active-ltr')
     .addTo(animationController);
  });


  //general move right hero carousel - not running for mobile
  if(!checkMobile()){
    $('.move-right-hero').each(function(){
      var moveRightElementTween = TweenMax.from($(this), .5, {
        autoAlpha: '0',
        x: '-=300',
        ease: Power4.easeNone
      });

      var scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: .5,
        reverse: false,
      })
      .setTween(moveRightElementTween)
      .addTo(animationController);
    });
  }



  //general buttons animations
  $('.animate-btn').each(function(){
    var moveRightElementTween = TweenMax.from($(this), .3, {
      autoAlpha: '0',
      scale: 1.07,
      backgroundColor: '#e81e75',
      ease: Linear.easeNone
    });

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 1
    })
    .setTween(moveRightElementTween)
    .addTo(animationController);
  });


  //animate blog cards
  $('.animate-cards').each(function(){
    var card = $(this).find("article")
    var scene = new ScrollMagic.Scene({
      triggerElement: this, triggerHook: 1 })
        .setTween(TweenMax.staggerFromTo(card, 0.2,
            { opacity: 0,
               ease: Linear.easeNone, y: 100 },
            { opacity: 1, y: 0 },0.1)
       )
       .addTo(animationController);
  });

  //tiles  animation
  $('.animate-tiles').each(function(){
    var card = $(this).find(".tile")
    var scene = new ScrollMagic.Scene({
      triggerElement: this, triggerHook: 1 })
        .setTween(TweenMax.staggerFromTo(card, .3,
            { opacity: 0,
               ease: Linear.easeNone, y: 200 },
            { opacity: 1, y: 0 },0.3)
       )
       .addTo(animationController);
  });

  //teams logo animation
  $('.animate-logos').each(function(){
    var logo = $(this).find("li")
    var scene = new ScrollMagic.Scene({
      triggerElement: this, triggerHook: .9 })
       .setTween(TweenMax.staggerFromTo(logo, 0.2,
            { opacity: 0, ease: Linear.easeNone, y: 100 },
            { opacity: 1, y: 0 },0.1)
       )
       .addTo(animationController);
  });

  // build tween for hand img
  var handImgTween2 = TweenMax.staggerFromTo(".hand-img--section img, .iphone-img", .2, {x: 100, opacity: 1}, {x: 0, ease: Power1.easeOut}, .15);

  // build scene
  var sceneHand2 = new ScrollMagic.Scene({
    triggerElement: ".hand-img--section",
    triggerHook: 1,
    duration: 3000
  })
  .setTween(handImgTween2)
  .addTo(animationController);


  // build tween for hand img
  var handImgTween3 = TweenMax.staggerFromTo(".hand-img--hero img", .2, {x: -100, opacity: 1}, {x: -200, ease: Power1.easeOut}, .15);

  // build scene
  var sceneHand3 = new ScrollMagic.Scene({
    triggerElement: ".hand-img---hero",
    triggerHook: .1,
    duration: 3000
  })
  .setTween(handImgTween3)
  .addTo(animationController);


  //general slide left animation
  $('.slide-left').each(function(){
    var slideLeftTween = TweenMax.staggerTo($(this), .5, {x: "-=165", ease: Power1.easeOut}, .15);
    // build scene
    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: .7,
      duration: 6000
    })
    .setTween(slideLeftTween)
    .addTo(animationController);
  });


  //general slide right animation
  $('.slide-right').each(function(){
    var slideRightTween = TweenMax.staggerTo($(this), .5, {x: "+=165", ease: Power1.easeOut}, .15);
    // build scene
    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: .7,
      duration: 6000
    })
    .setTween(slideRightTween)
    .addTo(animationController);
  });

  //general slide down animation
  $('.slide-down').each(function(){
    var slideDownTween = new TimelineMax()
      .add(TweenMax.staggerFromTo($(this), 0.2,
         {ease: Linear.easeNone, y: 0 },{ y: -20 },0.2))
      .add(TweenMax.to($(this), 1, {
       y: '+=100',
       ease: Linear.easeNone
     }));

    var scene = new ScrollMagic.Scene({
          triggerElement: this,
          triggerHook: .9,
          duration: 3000
      })
      .setTween(slideDownTween)
      .addTo(animationController);
  });


  if(!checkMobile()){
    $('.slide-down-fast').each(function(){
      var slideDownTween = TweenMax.staggerTo($(this), 2, {y: 300, ease: Power1.easeOut}, .15);
      // build scene
      var scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: .8,
        duration: 4000
      })
      .setTween(slideDownTween)
      .addTo(animationController);
    });
  }
});
