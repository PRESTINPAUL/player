(function ($) {
    'use strict';

    $(document).ready(function() {
        $('.hero-slider').slick({
          arrows: false,
          dots: true,
          autoplay: true,
          adaptiveHeight: false,
        });

        function validateAge() {
          var age = $('#sweepstakes-form').find('#sweepstakes-form-age').val();
          return age > 12;
        }

        $('.sweepstakes-form-submit-button').on('click', function(e) {
          e.preventDefault();
          var ageIsValid = validateAge();
          if (ageIsValid) {
            var submitButton = $(this);
            submitButton.attr('disabled', true);
            $('.form-message').remove();
            $('.form-field').find('.has-error').removeClass('.has-error');
            $.ajax({
              method: 'POST',
              url: 'http://68.183.24.84/new-submission',
              data: $('#sweepstakes-form').serialize(),
              dataType: 'json',
              statusCode: {
                200: function(response) {
                  $('.form-success-modal').addClass('is-active');
                  $('#sweepstakes-form').trigger("reset");
                },
                400: function(response) {
                  var errors = response.responseJSON.errors;
                  for(var error in errors) {
                    var errorMessage = $('<p>', {
                      'class': 'form-message message-error',
                      'text': errors[error],
                    });
                    $('.form-field[data-field="'+error+'"]')
                        .addClass('has-error')
                        .append(errorMessage);
                  }
                  var message = $('<p>', {
                    'class': 'form-message message-error',
                    'text': 'Whoops! There are errors with your submission. Please review the form fields.',
                  });
                  $('.form-bottom-container').append(message);
                }
              },
              complete: function(response) {
                submitButton.attr('disabled', false);
              }
            });
          } else {
            var errorMessage = $('<p>', {
              'class': 'form-message message-error',
              'text': 'You should be at least 13 years old',
            });
            $('.form-field[data-field="age"]')
                .addClass('has-error')
                .append(errorMessage);
            errorMessage = $('<p>', {
              'class': 'form-message message-error',
              'text': 'Whoops! There are errors with your submission. Please review the form fields.',
            });
            $('.form-bottom-container').append(message);
          }
        });

        $('.see-rules').on('click', function(e) {
          e.preventDefault();
          $('.rules-modal').addClass('is-active');
        });

        $('.playr-modal').on('click', function(e) {
          if ($(e.target).is('.playr-modal')) {
            $('.playr-modal').removeClass('is-active');
          }
        });

        $('.close-playr-modal').on('click', function(e) {
          e.preventDefault();
          $('.playr-modal').removeClass('is-active');
        });
    });

})(jQuery);