(function() {
  var SESSION = 30 * 60 * 1000;
  // after the user subscribed, don't show newsletter popup for this long
  var SHOW_NEWSLETTER_AFTER_SUBMITTED = 14 * 60 * 60 * 1000;
  // wait for this amount of time in session before popping the newsletter signup
  var SHOW_NEWSLETTER_AFTER_TIME_IN_SESSION = 2 * 60 * 1000;
  // wait for this ammout of time in session before popping blackfriday popup
  var SHOW_BLACKFRIDAY_AFTER_TIME_IN_SESSION = 1 * 45 * 1000;

  // let's start new session timer if needed
  var sessionStartTime = getSessionItem("session-start");
  sessionStartTime = sessionStartTime ? Number(sessionStartTime) : null;
  if (!sessionStartTime || Date.now() - sessionStartTime > SESSION) {
    sessionStartTime = Date.now();
    setSessionItem("session-start", sessionStartTime);
  }

  $(document).ready(function() {
    // newsletter sign up popup pops on exit
    onExit(openNewsLetterPopupIfNotShown);
    onExit(openBlackFridayPopup);
    // newsletter sign up popup also pops after some time in session passed
    setTimeout(
      openNewsLetterPopupIfNotShown,
      Math.max(
        0,
        SHOW_NEWSLETTER_AFTER_TIME_IN_SESSION - (Date.now() - sessionStartTime)
      )
    );

    function openNewsLetterPopupIfNotShown() {
      var now = Date.now();

      // if already shown within this session, don't show again
      var shownAt = Number(getSessionItem("newsletter-shown"));
      if (shownAt && now - shownAt < SESSION) {
        return;
      }

      var subscribedAt = Number(getSessionItem("newsletter-subscribed"));
      if (
        subscribedAt &&
        now - subscribedAt < SHOW_NEWSLETTER_AFTER_SUBMITTED
      ) {
        return;
      }

      openNewsLetterPopup();
    }

    setTimeout(
      openBlackFridayPopupIfNotShown,
      Math.max(
        0,
        SHOW_BLACKFRIDAY_AFTER_TIME_IN_SESSION - (Date.now() - sessionStartTime)
      )
    );

    function openBlackFridayPopupIfNotShown() {
      var now = Date.now();

      // if shown don't show again
      var shownAt = Number(getSessionItem("blackfriday-shown"));
      if (shownAt && now - shownAt < SESSION) {
        return;
      }

      openBlackFridayPopup();
    }

    //subscribe button click. It will open the subsribe newsletter popup in blog
    if ($(".subscribe-btn").length > 0) {
      $(".subscribe-btn")
        .off()
        .on("click", function() {
          $(".form-section form")[0].reset();
          $(".subscribe-popup").show();
          $(".subscribe-popup-loyout").show();
        });
    }

    //notify me button on android button click
    if ($(".notify_btn").length) {
      $(".notify_btn")
        .off()
        .on("click", function(e) {
          e.preventDefault();
          $(".form-section form")[0].reset();
          $(".form-section form input[type=email]").val("");
          if ($(".wpcf7-not-valid-tip").length) {
            $(".wpcf7-not-valid-tip").remove();
          }
          openNotifyEmailPopup();
        });
    }

    //notify button on shipping click
    $(".rw-store .buy-link").on("click", function(e) {
      e.preventDefault();
      $(".form-section form")[0].reset();
      $(".form-section form input[type=email]").val("");
      if ($(".wpcf7-not-valid-tip").length) {
        $(".wpcf7-not-valid-tip").remove();
      }
      openNotifyOnShippingPopup();
    });

    if ($(".common-popup").length > 0) {
      // Close newsletter popup, thank you popup, black friday popup, subscribe popup
      $(
        ".common-popup .close-popup-btn, .common-popup .cancel-btn, .common-popup-loyout"
      )
        .off()
        .on("click", function() {
          var closestParent = $(this).closest(".common-popup");
          var popupClass = "common-popup";
          if (closestParent.hasClass("subscribe-popup")) {
            popupClass = "subscribe-popup";
          } else if (closestParent.hasClass("thankyou-popup")) {
            popupClass = "thankyou-popup";
          } else if (closestParent.hasClass("newsletter-popup")) {
            popupClass = "newsletter-popup";
          }
          commonPopupClose(popupClass);
        });
    }

    // openNotifyOnShippingPopup has a country select box
    if ($("select.custom-country-select").length > 0) {
      $("select.custom-country-select").selectric({
        arrowButtonMarkup:
          '<a class="selectric-button" href="javascript:void(0);"><img src="' +
          basepath +
          '/assets/images/icons/select_down_arrow.svg" alt="select icon" /></a>'
      });
    }
  });

  // Add event listener for opening Thank you popup
  document.addEventListener(
    "wpcf7mailsent",
    function(event) {
      if ("824" == event.detail.contactFormId) {
        //824 is form id generated from cf7
        setSessionItem("newsletter-subscribed", Date.now());
        $(".newsletter-popup").fadeOut();
        openThankYouPopup(null);
      } else if ("1603" == event.detail.contactFormId) {
        $(".notify-on-shipping").fadeOut();
        openThankYouPopup(null);
      } else if ("1611" == event.detail.contactFormId) {
        $(".notify-email-popup").fadeOut();
        openThankYouPopup(null);
      }
    },
    false
  );

  document.addEventListener(
    "wpcf7mailfailed",
    function(event) {
      if ("1603" == event.detail.contactFormId) {
        if (!$(".notify-on-shipping").hasClass("error-while-send")) {
          $(".notify-on-shipping").addClass("error-while-send");
        }
      }
    },
    false
  );

  //open Thankyou popup in blog (after subscribing newsletter)
  function openThankYouPopup(formtype) {
    if ($(".common-popup").is(":visible")) {
      $(".common-popup").hide();
      $(".common-popup-loyout").hide();
    }
    setTimeout(function() {
      $(".thankyou-popup").show();
      if (formtype == "subscribe") {
        $(".subscribe-popup-loyout").show();
      } else {
        $(".thankyou-popup-loyout").show();
      }
      //Thankyou popup auto close after 2 seconds
      setTimeout(function() {
        if ($(".common-popup").is(":visible")) {
          $(".common-popup").fadeOut();
          $(".common-popup-loyout").fadeOut();
        }
      }, 2000);
    }, 1);
  }

  //open blackfriday popup
  function openBlackFridayPopup() {
    setSessionItem("blackfriday-shown", Date.now());
    if ($(".black-friday-popup-layout").length > 0) {
      $(".black-friday-popup").show();
      $(".common-popup-loyout").show();
    }
  }

  //open newsletter popup
  function openNewsLetterPopup() {
    setSessionItem("newsletter-shown", Date.now());
    if ($(".newsletter-popup").length > 0) {
      $(".newsletter-popup-loyout").fadeIn();
      $(".newsletter-popup").fadeIn();
    }
  }

  //open notify me popup in overview page
  function openNotifyEmailPopup() {
    $(".notify-email-popup-loyout").fadeIn();
    $(".notify-email-popup").fadeIn();
  }

  //open notify me on shipping popup in overview page
  function openNotifyOnShippingPopup() {
    $(".notify-on-shipping-popup-loyout").fadeIn();
    $(".notify-on-shipping").fadeIn();
  }

  //Close the common popup like newsletter, subscribe, thankyou
  function commonPopupClose(popupClass) {
    if (popupClass == "newsletter-popup") {
      if ($(".newsletter-popup").is(":visible")) {
        $(".newsletter-popup").fadeOut();
        $(".newsletter-popup-loyout").fadeOut();
      }
    } else {
      if ($(".common-popup").is(":visible")) {
        $(".common-popup").hide();
        $(".common-popup-loyout").hide();
      }
    }

    //Hide the validation error field while closing popup
    if ($(".wpcf7-validation-errors").length > 0) {
      $(".wpcf7-validation-errors").hide();
    }
    if ($(".common-popup").hasClass("error-while-send")) {
      $(".common-popup").removeClass("error-while-send");
    }
    if ($(".wpcf7-mail-sent-ng").length > 0) {
      $(".wpcf7-mail-sent-ng")
        .html("")
        .removeClass("wpcf7-mail-sent-ng")
        .hide();
    }
  }

  function setSessionItem(key, val) {
    try {
      sessionStorage.setItem(key, Date.now());
    } catch (err) {}
  }

  function getSessionItem(key) {
    try {
      return sessionStorage.getItem(key, Date.now());
    } catch (err) {}
  }
})();
