<div class="thankyou-popup common-popup">
  <div class="popup-inner-wrapper">
    <div class="right-pannel">
      <div class="close-button-wrapper">
        <a href="javascript:void(0);" class="close-popup-btn">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close_icon.svg" alt="close popup"/>
        </a>
      </div>
      <div class="content-wrapper">
        <div class="center-container">
          <svg xmlns="http://www.w3.org/2000/svg" width="142" height="142" viewBox="0 0 142 142" id="tick-icon-svg">
            <defs>
              <filter id="tick-a" width="126.3%" height="125.9%" x="-13.1%" y="-13.3%" filterUnits="objectBoundingBox">
                <feMorphology in="SourceAlpha" operator="dilate" radius=".75" result="shadowSpreadOuter1"/>
                <feOffset in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
                <feMorphology in="SourceAlpha" radius="1" result="shadowInner"/>
                <feOffset in="shadowInner" result="shadowInner"/>
                <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1"/>
                <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="5"/>
                <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 1 0"/>
                <feMerge>
                  <feMergeNode in="shadowMatrixOuter1"/>
                  <feMergeNode in="SourceGraphic"/>
                </feMerge>
              </filter>
            </defs>
            <g fill="none" fill-rule="evenodd" stroke-linecap="round" filter="url(#tick-a)" transform="rotate(-5 32.911 46.999)">
              <g stroke="#FFF" stroke-width="6" transform="rotate(95 62.96 68.458)">
                <path class="path circle-line" d="M68.3591227,120.359123 C81.1430767,120.359123 92.9610214,116.223145 102.547844,109.216302 C116.982545,98.6662287 126.359123,81.6076842 126.359123,62.3591227 C126.359123,30.3266072 100.391638,4.35912273 68.3591227,4.35912273 C55.9262829,4.35912273 44.4071178,8.27102925 34.9653367,14.931133 C24.9812226,21.9737911 17.319995,32.0894249 13.3576315,43.9020568 C11.4128552,49.6998406 10.3591227,55.9064254 10.3591227,62.3591227" transform="rotate(4 68.36 62.36)"/>
                <path class="path top-circleline" d="M23.0762416,80.579581 C23.0762416,64.8782077 16.8371254,50.634058 6.70283264,40.1910715" transform="scale(-1 1) rotate(21 0 -19.951)"/>
              </g>
              <path class="path tick" fill="#FFF" d="M17.3208178,42.7403444 C15.7172178,42.7403444 14.1212178,42.1520444 12.8938178,40.9717444 L0.270217832,28.8727444 L5.59781783,23.5965444 L17.3094178,34.8223444 L50.5936178,0.83784442 L56.0922178,5.94754442 L21.8922178,40.8644444 C20.6268178,42.1150444 18.9700178,42.7403444 17.3208178,42.7403444" transform="translate(42 53)"/>
            </g>
          </svg>
          <label><?php the_field('blog_page_news_letter_popup_thankyou_message', 'options' ); ?></label>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thankyou-popup-loyout common-popup-loyout bg-black"></div>
