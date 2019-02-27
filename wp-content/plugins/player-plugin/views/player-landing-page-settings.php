<?php

/**
 * Provide a settings area view for the plugin
 */

require (__DIR__.'/../models/Settings.php');
$settings = new Settings();

if( 'POST' == $_SERVER['REQUEST_METHOD']) {

    if(!empty($_POST['settings'])){
        $settings->save($_POST['settings']);
        $settings->export();
        $settings->refresh();
    }
}

?>

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="Event_Creation" action="">


        <!-- Section 01 -->
        <fieldset>
            <h3>Header</h3>
            <div class="accordion">

	            <?php for($i=1; $i<= 4; $i++): ?>
                <h5>Slide <?=$i?></h5>
                <div>
                    <h4 class="step-property">Image Desktop</h4>
                    <input name="settings[slide<?=$i?>_image]" value="<?=$settings->get('slide'.$i.'_image')?>" />
                     <h4 class="step-property">Image Mobile</h4>
                    <input name="settings[slide<?=$i?>_image_mobile]" value="<?=$settings->get('slide'.$i.'_image_mobile')?>" />
                    <h4 class="step-property">Title</h4>
                    <input name="settings[slide<?=$i?>_title]" value="<?=$settings->get('slide'.$i.'_title')?>" />
                    <h4 class="step-property">Subtitle</h4>
                    <input name="settings[slide<?=$i?>_subtitle]" value="<?=$settings->get('slide'.$i.'_subtitle')?>" />
                </div>
                <?php endfor; ?>

            </div>

        </fieldset>

        <fieldset>

            <h3 class="step-title">Form Section</h3>

            <div>
                <h4 class="step-property">Section 1</h4>
                <textarea name="settings[section1]"><?=$settings->get('section1')?></textarea>

                <h4 class="step-property">Section 2</h4>
                <textarea name="settings[section2]"><?=$settings->get('section2')?></textarea>

                <h4 class="step-property">Form Title</h4>
                <input name="settings[form_title]" value="<?=$settings->get('form_title')?>" />

                <h4 class="step-property">Min Age</h4>
                <input type="number" name="settings[min_age]" value="<?=$settings->get('min_age')?>" />

                <h4 class="step-property">Max Age</h4>
                <input type="number" name="settings[max_age]" value="<?=$settings->get('max_age')?>" />

                <?php for($i=1; $i<=5; $i++):?>
                <h4 class="step-property">I'm a option #<?=$i?></h4>
                <input name="settings[i_am_a_option_<?=$i?>]" value="<?=$settings->get('i_am_a_option_'.$i)?>" />
                <?php endfor; ?>

                <h4 class="step-property">Disclaimer</h4>
                <textarea name="settings[disclaimer]"><?=$settings->get('disclaimer')?></textarea>

                <h4 class="step-property">Rules Text</h4>
                <textarea name="settings[rules]"><?=$settings->get('rules')?></textarea>

                <h4 class="step-property">Form Success Text</h4>
                <textarea name="settings[form_success_text]"><?=$settings->get('form_success_text')?></textarea>
            </div>

        </fieldset>

        <fieldset>

            <h3 class="step-title">Middle Section</h3>

                <h4 class="step-property">Title</h4>
                <input name="settings[middle_section_title]" value="<?=$settings->get('middle_section_title')?>" />

                <h4 class="step-property">Copy</h4>
                <textarea name="settings[middle_section_copy]"><?=$settings->get('middle_section_copy')?></textarea>

                <div class="accordion">
                    <?php for($i=1; $i<= 3; $i++):?>
                    <h5>Card <?=$i?></h5>
                    <div>
                        <h4 class="step-property">Image <?=$i?> url</h4>
                        <input name="settings[image_<?=$i?>_url]" value="<?=$settings->get('image_'.$i.'_url')?>" />

                        <h4 class="step-property">Image <?=$i?> caption</h4>
                        <textarea name="settings[image_<?=$i?>_caption]"><?=$settings->get('image_'.$i.'_caption')?></textarea>
                    </div>
                    <?php endfor;?>
                </div>

                <h4 class="step-property">Button Text</h4>
                <input name="settings[middle_section_button_text]" value="<?=$settings->get('middle_section_button_text')?>" />

                <h4 class="step-property">Button URL</h4>
                <input name="settings[middle_section_button_url]" value="<?=$settings->get('middle_section_button_url')?>" />

        </fieldset>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

        <a href="<?=plugin_dir_url(__DIR__.'/../../').'export.json'?>">Export Settings</a>

    </form>

</div>
