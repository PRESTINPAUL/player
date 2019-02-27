/**
 * This module contains the dynamic behaviour of the various
 * reusable components used in the site.
 */

// FeaturePlus
$(function () {
  // the little circles with tooltips showing
  // off features of the product
  var featurePlusTimer
  $('.FeaturePlus-circle')
    .on('mouseover', function () {
      $(this).parents('.Features').find('.FeaturePlus').removeClass('is-active');
      $(this).parents('.FeaturePlus').addClass('is-active');
    }).on('mouseout', function () {
      $(this).parents('.FeaturePlus').removeClass('is-active');

      var self = this;
      clearTimeout(featurePlusTimer)
      featurePlusTimer = setTimeout(reshow, 400);
      function reshow () {
        if ($(self).parents('.Features').find('.FeaturePlus.is-active').length === 0) {
          $(self).parents('.Features').find('.FeaturePlus').first().addClass('is-active');
        } else {
          clearTimeout(featurePlusTimer)
          featurePlusTimer = setTimeout(reshow, 400);
        }
      }
    });
});

// Accordion
$(function () {
  $('.Accordion-title').on('click', function () {
    var shouldOpen = !$(this).hasClass('is-active');

    $(this).parents('.Accordion').find('.Accordion-title, .Accordion-content').removeClass('is-active');
    $(this).parents('.Accordion').find('.Accordion-title').each(function () {
      $($(this).data('features')).removeClass('is-active');
      $(this).parents('.Section').removeClass($(this).data('section-class'));
    });

    if (shouldOpen) {
      $(this).addClass('is-active');
      $(this).next().addClass('is-active');
      $($(this).data('features')).addClass('is-active');
      $(this).parents('.Section').addClass($(this).data('section-class'));
    } else {
      $(this).siblings('.Accordion-title').addClass('is-active');
      $(this).siblings('.Accordion-title').next().addClass('is-active');
      $($(this).siblings('.Accordion-title').data('features')).addClass('is-active');
      $(this).parents('.Section').addClass($(this).siblings('.Accordion-title').data('section-class'));
    }
  })

  // FullScreenModal
  $('a[data-full-screen-modal]').on('click', function () {
    const modalSelector = $(this).data('full-screen-modal');
    $(modalSelector).addClass('FullScreenModal--show');
    const modalVideo = $(this).data('full-screen-video');
    if (modalVideo) {
      $(modalSelector).find('.FullScreenModal-content').append(
        '<iframe class="FullScreenModal-video" src="' +
        modalVideo +
        '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
      );
    }
  });
  $('.FullScreenModal-close').on('click', function () {
    $('.FullScreenModal').removeClass('FullScreenModal--show');
    $('.FullScreenModal-content iframe').remove();
  });
});
