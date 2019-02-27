<?php

/**
 * Template Name: Event Creation
 */

require(__DIR__ . '/../models/Settings.php');
$settings = new Settings();

?>

<?php get_header(); ?>

  <div class="main-content playr-landing-page-main" style="top: 50px;">

    <section class="hero-slider-section">
      <div class="playr-slider dark-slick-navi">
        <div class="hero-slider hero-slider-desktop">
          <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php if (!empty($settings->get('slide' . $i . '_image'))): ?>
              <div class="slide" style="background-image: url(<?php echo $settings->get('slide' . $i . '_image'); ?>)">
                <div class="fixed-container">
                  <div class="slide-text-container">
                    <h2 class="slide-title"><?php echo $settings->get('slide' . $i . '_title'); ?></h2>
                    <h3 class="slide-subtitle"><?php echo $settings->get('slide' . $i . '_subtitle') ?></h3>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
        <div class="hero-slider hero-slider-mobile">
          <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php if (!empty($settings->get('slide' . $i . '_image_mobile'))): ?>
              <div class="slide" style="background-image: url(<?php echo $settings->get('slide' . $i . '_image_mobile'); ?>)">
                <div class="fixed-container">
                  <div class="slide-text-container">
                    <h2 class="slide-title"><?php echo $settings->get('slide' . $i . '_title'); ?></h2>
                    <h3 class="slide-subtitle"><?php echo $settings->get('slide' . $i . '_subtitle') ?></h3>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <section class="introduction-section">
      <div class="fixed-container">
        <div class="rich-text-container">
          <?php echo $settings->get('section1'); ?>
        </div>
      </div>
    </section>


    <section class="win-banner-section" style="background-image: url(<?php echo plugin_dir_url(__FILE__) . '../public/images/win-banner.jpg'; ?>);">
      <div class="fixed-container">
        <div class="rich-text-container">
          <?php echo $settings->get('section2'); ?>
        </div>
      </div>
    </section>

    <section class="sweepstakes-form-section">
      <div class="fixed-container">
        <?php if (!empty($settings->get('form_title'))): ?>
        <h2 class="sweepstakes-form-section-title"><?php echo $settings->get('form_title'); ?></h2>
        <?php endif; ?>
        <form id="sweepstakes-form">
          <div class="form-fields-container">
            <div class="form-field" data-field="full_name">
              <label for="sweepstakes-form-full-name">Full name<span class="required">*</span></label>
              <input type="text" name="full_name" id="sweepstakes-form-full-name"/>
            </div>
            <div class="form-field" data-field="person_type">
              <label for="sweepstakes-form-person-type">I am a...<span class="required">*</span></label>
              <select name="person_type" id="sweepstakes-form-person-type">
                <?php for($i=1; $i<=5; $i++): ?>
                  <?php if (!empty($settings->get('i_am_a_option_'.$i))): ?>
                  <option value="i_am_a_option_<?=$i?>"><?php echo $settings->get('i_am_a_option_'.$i) ?></option>
                  <?php endif; ?>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-field" data-field="email">
              <label for="sweepstakes-form-email">Email address<span class="required">*</span></label>
              <input type="email" name="email" id="sweepstakes-form-email"/>
            </div>
            <div class="form-field" data-field="phone">
              <label for="sweepstakes-form-phone">Mobile number<span class="required">*</span></label>
              <input type="text" name="phone" id="sweepstakes-form-phone"/>
            </div>
            <div class="form-field" data-field="club_name">
              <label for="sweepstakes-form-club-name">Club name<span class="required">*</span></label>
              <input type="text" name="club_name" id="sweepstakes-form-club-name" />
            </div>
            <div class="form-field" data-field="state">
              <label for="sweepstakes-form-state">State<span class="required">*</span></label>
              <input type="text" name="state" id="sweepstakes-form-state" />
            </div>
            <div class="form-field" data-field="age">
              <label for="sweepstakes-form-age">Age<span class="required">*</span></label>
              <input type="number" name="age" id="sweepstakes-form-age" min="<?php echo $settings->get('min_age'); ?>" max="<?php echo $settings->get('max_age'); ?>"/>
            </div>
            <div class="form-field" data-field="gender">
              <label for="sweepstakes-form-gender">Gender<span class="required">*</span></label>
              <select name="gender" id="sweepstakes-form-gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div class="form-bottom-container">
            <p class="required-text"><span class="required">*</span>Mandatory fields</p>
            <input class="sweepstakes-form-submit-button btn btn--dark-blue" type="submit" value="Submit" />
          </div>
        </form>
        <div class="disclaimer">
          <div class="rich-text-container">
            <?php echo $settings->get('disclaimer'); ?>
          </div>
          <a href="#" class="see-rules">SEE COMPLETE RULES﻿</a>
        </div>
        <div class="playr-modal form-success-modal">
          <div class="modal-content">
            <a href="#" class="close-playr-modal">&times;</a>
            <div class="form-success-message">
              <img class="form-success-icon" src="<?php echo plugin_dir_url(__FILE__) . '../public/images/success-icon.png'; ?>" alt="">
              <?php echo $settings->get('form_success_text'); ?>
            </div>
          </div>
        </div>
        <div class="playr-modal rules-modal">
          <div class="modal-content">
            <a href="#" class="close-playr-modal">&times;</a>
            <div class="rules">
              <?php echo $settings->get('rules'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="middle-section">
      <div class="fixed-container">
        <h2 class="middle-section-title"><?php echo $settings->get('middle_section_title'); ?></h2>
        <div class="middle-section-copy rich-text-container"><?php echo $settings->get('middle_section_copy'); ?></div>
        <div class="cards-container">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="card">
              <img class="card-image" src="<?php echo $settings->get('image_' . $i . '_url'); ?>" alt="">
              <div class="rich-text-container card-caption">
                <?php echo $settings->get('image_' . $i . '_caption'); ?>
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <div class="cards-bottom-container">
          <a class="middle-section-button shop-now-btn" href="<?php echo $settings->get('middle_section_button_url'); ?>"><?php echo $settings->get('middle_section_button_text'); ?></a>
        </div>
      </div>
    </section>
  </div>

<?php get_footer(); ?>
