<footer>
    <div class="footer-wrap">
        <div class="main-footer">
         <div class="left-panel">
            <div class="panel site-map">
                <dl>
                    <dt><label>Sitemap</label></dt>
                    <dd>
                        <ul>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer1',
                                'menu_id' => 'footer-menu-1'
                            ));
                            ?>
                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="panel others">
                <ul>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer2',
                        'menu_id' => 'footer-menu-2',
                        'menu_class' => 'custom',
                    ));
                    ?>
                </ul>
            </div>
            <div class="panel follow">
                <dl>
                    <dt><label>Follow us</label></dt>
                    <dd>
                        <ul>
                            <?php
                            if(get_field('instagram_url', 'options')) {?>
                            <li><a href="<?php echo get_field('instagram_url', 'options') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/social_insta.svg" alt="Instagram Icon"/>Instagram</a></li>
                            <?php }
                            if(get_field('facebook_url', 'options')) {?>
                            <li><a href="<?php echo get_field('facebook_url', 'options') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/social_fb.svg" alt="Facebook Icon"/>Facebook</a></li>
                            <?php }
                            if(get_field('twitter_url', 'options')) {?>
                            <li><a href="<?php echo get_field('twitter_url', 'options') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/social_twt.svg" alt="Twitter Icon"/>Twitter</a></li>
                            <?php }
                            if(get_field('youtube_url', 'options')) {?>
                            <li><a href="<?php echo get_field('youtube_url', 'options') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/social_ytbe.svg" alt="Youtube Icon"/>Youtube</a></li>
                            <?php } ?>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="logo-panel right-panel">
            <img src="<?php echo get_field('footer_logo', 'options') ?>" alt="Playr Logo"/>
            <p class="copyright-text">&copy; PLAYR IS A <a href="https://www.catapultsports.com/" target="_blank" id="catapult-link">CATAPULT GROUP</a> BRAND</p>
        </div>
    </div>
</div>
</footer>
</main>
<?php
wp_footer();
?>
</body>
</html>
