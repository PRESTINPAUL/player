</div><!-- Main content close -->

<footer class="Footer">
  <div class="Footer-background"></div>
  <div class="u-container">
    <div class="Footer-main">
      <div class="Footer-left">
        <section class="Footer-newsletter">
          <div class="Footer-largeTitle">Stay in the loop</div>
          <div class="Footer-newsletterForm"> 
            <?php echo do_shortcode( '[contact-form-7 id="239" title="Newsletter Form"]' ); ?>
          </div>
        </section>
        <?php if ( get_field( 'enable_announcement_popup', 'options' ) ): ?>
          <section class="Footer-announcement">
            <div class="Footer-largeTitle"><?php the_field('announcement_popup_title', 'options') ?></div>
            <div class="Footer-announcement--holder">
              <a href="javascript:void(0);" id="js-openAnnouncementPopup">Sign up</a>
              to learn more.
            </div>
            <?php get_template_part('template-parts/announcement-popup','null'); ?>
          </section>
        <?php endif; ?>
        <section class="Footer-stores u-desktopOnly">
          <div class="Footer-largeTitle">Also available on</div>
          <div>
            <?php
              wp_nav_menu(array(
                'theme_location' => 'v2-stores',
                'menu_id' => 'footer-stores-1'
              ));
            ?>
          </div>
        </section>
      </div>
      <div class="Footer-right">
          <img class="Footer-logo u-desktopOnly" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo get_field('footer_logo', 'options') ?>" alt="Playr Logo"/>
          <div class="Footer-nav">
            <div class="panel site-map Footer-support">
              <div class="Footer-title">Support</div>
              <ul>
                <?php
                  wp_nav_menu(array(
                    'theme_location' => 'v2-footer',
                    'menu_id' => 'footer-menu-1'
                  ));
                ?>
              </ul>
            </div>
            <div class="panel follow Footer-social">
              <div class="Footer-title">Follow us</div>
              <ul>
                <?php
                if(get_field('instagram_url', 'options')) {?>
                    <li><a href="<?php echo get_field('instagram_url', 'options') ?>" target="_blank">Instagram</a></li>
                <?php }
                if(get_field('facebook_url', 'options')) {?>
                    <li><a href="<?php echo get_field('facebook_url', 'options') ?>" target="_blank">Facebook</a></li>
                    <?php }
                if(get_field('twitter_url', 'options')) {?>
                    <li><a href="<?php echo get_field('twitter_url', 'options') ?>" target="_blank">Twitter</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="CountryPicker CountryPicker--dark">
            <?php pll_the_languages(array('dropdown' => 2, 'show_names'=> true, 'class'=>'custom')); ?>
          </div>
        </div>
      </div>
    </div>
</footer>
<div class="SubFooter u-container">
  <div class="SubFooter-inner">
    <p class="SubFooter-copyright">&copy; PLAYR IS A <a href="https://www.catapultsports.com/" target="_blank" id="catapult-link">CATAPULT GROUP</a> BRAND</p>
    <div class="panel others">
      <ul>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'v2-sub-footer',
          'menu_id' => 'footer-menu-2',
          'menu_class' => 'SubFooter-menu',
        ));
        ?>
      </ul>
    </div>
  </div>
</div>
</main>

<div class="BottomBar">
  <div class="BottomBar-inner">
      <a href="<?php echo get_button_url('shop_buy_button_url',pll_current_language()) ?>" class="BottomBar-buy buy-link btn"><?php echo get_field('shop_buy_button_title', pll_current_language()); ?></a>
      <a href="<?php echo get_button_url('shop_cart_url',pll_current_language()) ?>" class="BottomBar-continue continue-link btn">Continue to checkout (<span class="item-count">0</span>)</a>
      <a href="javascript:void(0);" id="chatButton">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/chat_offline.svg" alt="chat icon" />
      </a>
    </div>
</div>

<?php
wp_footer();
?>

<script>
function initImages() {
  var imgDefer = document.getElementsByTagName('img');
  for (var i=0; i<imgDefer.length; i++) {
    if(imgDefer[i].getAttribute('data-src')) {
      imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
    }
  }
}
$(window).on('load', function () {
  initImages();
})

if (!checkMobile()) {
  var sources = document.querySelectorAll('video source');
  var videos = document.querySelectorAll('video');
  for (var i = 0; i < sources.length; i++) {
    sources[i].setAttribute('src', sources[i].getAttribute('data-src'));
    videos[i].load();
  }
}

// announcement popup logic
if ($("#js-openAnnouncementPopup").length > 0) {
  $("#js-openAnnouncementPopup")
    .on("click", function() {
      openAnnouncementPopup();
    });
}

//open announcement popup 
function openAnnouncementPopup() {
  if ($(".announcement-popup").length > 0) {
    $(".announcement-popup-wrapper-layout").fadeIn();
    $(".announcement-popup").fadeIn();
  }
}
</script>

<script type="text/jscript">
  $(window).on('load', function () {
    window.zEmbed || function(e, t) {
      var n, o, d, i, s, a = [],
        r = document.createElement("iframe");
      window.zEmbed = function() {
        a.push(arguments)
      }, window.zE = window.zE || window.zEmbed, r.src = "javascript:false", r.title = "", r.role = "presentation", (r.frameElement || r).style.cssText = "display: none", d = document.getElementsByTagName("script"), d = d[d.length - 1], d.parentNode.insertBefore(r, d), i = r.contentWindow, s = i.document;
      try {
        o = s
      } catch (e) {
        n = document.domain, r.src = 'javascript:var d=document.open();d.domain="' + n + '";void(0);', o = s
      }
      o.open()._l = function() {
        var e = this.createElement("script");
        n && (this.domain = n), e.id = "js-iframe-async", e.src = "https://assets.zendesk.com/embeddable_framework/main.js", this.t = +new Date, this.zendeskHost = "playr.zendesk.com", this.zEQueue = a, this.body.appendChild(e)
      }, o.write('<body onload="document._l();">'), o.close()
    }();

    zE(function() {
      $zopim(function() {
        $zopim.livechat.setOnStatus(setStatusFunction);
        $zopim.livechat.setOnUnreadMsgs(setUnReadChatNumber);
      });
    });
    function setStatusFunction(status) {
      if(status == 'online'){
        $('#chatButton img').attr('src',basepath+'/assets/images/icons/chat_online.svg');
      } else {
        $('#chatButton img').attr('src',basepath+'/assets/images/icons/chat_offline.svg');
      }
      /**Zendesk custom icon click **/
      $('#chatButton').off().on('click', function(e) {
        e.preventDefault();
        $zopim.livechat.window.show();
      });
    }
    function setUnReadChatNumber(number) {}
  })
</script>

<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async defer></script>

<?php
  get_template_part('template-parts/news-letter-signup','null');
  get_template_part('template-parts/thank-you-popup','null');
  get_template_part('template-parts/black-friday-popup','null');
  if(pll_current_language()=="gb" || pll_current_language()=="eu" || pll_current_language()=="us" || pll_current_language()=="aus" ||  pll_current_language()=="se") {
    get_template_part('template-parts/notify-email-popup-element','null');
  }
  if(pll_current_language()=="rw") {
    get_template_part('template-parts/notify-me-on-shipping','null');
  }
?>

</body>
</html>
