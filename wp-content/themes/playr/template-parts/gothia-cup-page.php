<section class="gothia-cup-page">
	<div class="top-section">
		<div class="pitch-line"></div>
		<div class="gothia-page-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo-white.png" class="playr-logo"/></a>
			<span class="gradient-line"></span>
			<a><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/Gothia-cup-logo.svg" class="gothia-cup-logo"/></a>
		</div>
		<div class="content">
			<h1 class="main-title"><?php the_field("gothia_page_head_title"); ?></h1>
			<div class="flex-row">
				<div class="left-sect"> 
	             <?php the_field("gothia_page_head_description"); ?>
	              <a class="btn btn--purple animate-btn" id="anchor-to-form"><?php echo get_field('gothia_page_head_anchor_tag')['title']; ?></a>
				</div>
				<div class="right-sect"> 
                  <div class="slider-wrap">
	                <div class="playr-slider light-slick-navi">
	                  <div class="custom-direction-nav">
	                      <a href="javascript:void(0)" class="direction-prev">
	                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="146" height="173" viewBox="0 0 146 173" class="svg-slider-arrow" id="svgObject-1">
	                          <defs>
	                            <style>
	                                    body.isIE .filler-right {
	                                      display: none;
	                                    }
	                                    .filler-right {
	                                      stroke-dasharray:240;
	                                      stroke-dashoffset: 0;
	                                      transition: all 0.5s ease;
	                                      -webkit-animation: dash-empty linear forwards;
	                                      animation: dash-empty linear forwards;
	                                      animation-iteration-count: infinite;
	                                      animation-duration: 2.4s;
	                                    }
	                                    @-webkit-keyframes dash-empty {
	                                      from {
	                                        stroke-dashoffset: 240;
	                                      }
	                                      to {
	                                        stroke-dashoffset: 240;
	                                      }
	                                    }

	                              #icon_arrow_gallery_loader_web-r {
	                              cursor:pointer;
	                              }
	                              body.system .hover-fill-item:hover + .filler-right {
	                              transition: all 0.5s ease;
	                                      -webkit-animation: dash-fill linear forwards;
	                                      animation: dash-fill linear forwards;
	                                      animation-iteration-count: 1;
	                                      animation-duration: 1s;
	                              }
	                              @-webkit-keyframes dash-fill {
	                                      from {
	                                        stroke-dashoffset: 240;
	                                      }
	                                      to {
	                                        stroke-dashoffset: 0;
	                                      }
	                                    }

	                            </style>

	                              <filter id="icon_arrow_gallery_loader_web-a" width="271.4%" height="185.7%" x="-85.7%" y="-42.9%" filterUnits="objectBoundingBox">
	                                <feOffset in="SourceAlpha" result="shadowOffsetOuter1"/>
	                                <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"/>
	                                <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
	                                <feMerge>
	                                  <feMergeNode in="shadowMatrixOuter1"/>
	                                  <feMergeNode in="SourceGraphic"/>
	                                </feMerge>
	                              </filter>
	                              <polygon id="icon_arrow_gallery_loader_web-b" points="0 0 7 0 7 14 0 14"/>
	                              <rect id="icon_arrow_gallery_loader_web-ep" class="icon_arrow_loader_gothia prev" width="70" height="70" x="5" y="5" rx="35"/>
	                              <filter id="icon_arrow_gallery_loader_web-d" width="378.6%" height="378.6%" x="-137.9%" y="-117.9%" filterUnits="objectBoundingBox">
	                                <feOffset dx="1" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"/>
	                                <feMorphology in="SourceAlpha" radius="1.5" result="shadowInner"/>
	                                <feOffset dx="1" dy="15" in="shadowInner" result="shadowInner"/>
	                                <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1"/>
	                                <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="30"/>
	                                <feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
	                              </filter>
	                          </defs>
	                            <g fill="none" fill-rule="evenodd" transform="rotate(-90 81.5 61.5)">
	                            <g filter="url(#icon_arrow_gallery_loader_web-a)" transform="rotate(-90 38 5)">
	                              <mask id="icon_arrow_gallery_loader_web-c" fill="#fff">
	                                <use xlink:href="#icon_arrow_gallery_loader_web-b"/>
	                              </mask>
	                              <path fill="#FFF" d="M1.42458261,13 L0,11.555896 L4.98603915,6.50051064 L0,1.4451253 L1.42458261,0 L6.41062176,5.05640663 C7.19645941,5.85199152 7.19645941,7.14902977 6.41062176,7.94461466 L1.42458261,13 Z" mask="url(#icon_arrow_gallery_loader_web-c)"/>
	                            </g>
	                            <g transform="rotate(-83 40 40)">
	                              <use fill="#000" filter="url(#icon_arrow_gallery_loader_web-d)" xlink:href="#icon_arrow_gallery_loader_web-ep" class="hover-fill-item prev icon_arrow_loader_gothia"/>
	                              <rect class="filler-right" width="68.5" height="68.5" x="5.75" y="5.75" stroke="#FFF" stroke-width="1.5" rx="34.25"/>
	                            </g>
	                            </g>
	                          </svg>
	                      </a>
	                      <a href="javascript:void(0)" class="direction-next">
	                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="146" height="173" viewBox="0 0 146 173" class="svg-slider-arrow" id="svgObject-2">
	                          <defs>
	                            <style>
	                            body.isIE .filler-next {
	                              display: none;
	                            }
	                            .filler-next {
	                                      stroke-dasharray:240;
	                                      stroke-dashoffset: 0;
	                                      transition: all 0.5s ease;
	                                      -webkit-animation: dash-empty linear forwards;
	                                      animation: dash-empty linear forwards;
	                                      animation-iteration-count: infinite;
	                                      animation-duration: 2.4s;
	                                    }
	                                    @-webkit-keyframes dash-empty {
	                                      from {
	                                        stroke-dashoffset: 240;
	                                      }
	                                      to {
	                                        stroke-dashoffset: 240;
	                                      }
	                                    }

	                              #icon_arrow_gallery_loader_web-r {
	                              cursor:pointer;
	                              }
	                              body.system .hover-fill-item:hover + .filler-next {
	                                      transition: all 0.5s ease;
	                                      -webkit-animation: dash-fill linear forwards;
	                                      animation: dash-fill linear forwards;
	                                      animation-iteration-count: 1;
	                                      animation-duration: 1s;
	                              }
	                              @-webkit-keyframes dash-fill {
	                                      from {
	                                        stroke-dashoffset: 240;
	                                      }
	                                      to {
	                                        stroke-dashoffset: 0;
	                                      }
	                                    }
	                              .filler-next.filler {
	                                  transition: all 0.5s ease;
	                                      -webkit-animation: dash-fill linear forwards;
	                                      animation: dash-fill linear forwards;
	                                      animation-iteration-count: 1;
	                                      animation-duration: 3.2s;
	                              }
	                            </style>
	                            <filter id="icon_arrow_gallery_loader_web-a" width="271.4%" height="185.7%" x="-85.7%" y="-42.9%" filterUnits="objectBoundingBox">
	                              <feOffset in="SourceAlpha" result="shadowOffsetOuter1"/>
	                              <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"/>
	                              <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
	                              <feMerge>
	                                <feMergeNode in="shadowMatrixOuter1"/>
	                                <feMergeNode in="SourceGraphic"/>
	                              </feMerge>
	                            </filter>
	                            <polygon id="icon_arrow_gallery_loader_web-b" points="0 0 7 0 7 14 0 14"/>
	                            <rect id="icon_arrow_gallery_loader_web-rp" class="icon_arrow_loader_gothia next" width="70" height="70" x="5" y="5" rx="35"/>
	                            <filter id="icon_arrow_gallery_loader_web-d" width="378.6%" height="378.6%" x="-137.9%" y="-117.9%" filterUnits="objectBoundingBox">
	                              <feOffset dx="1" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"/>
	                              <feMorphology in="SourceAlpha" radius="1.5" result="shadowInner"/>
	                              <feOffset dx="1" dy="15" in="shadowInner" result="shadowInner"/>
	                              <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1"/>
	                              <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="30"/>
	                              <feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0"/>
	                            </filter>
	                            </defs>
	                            <g fill="none" fill-rule="evenodd" transform="rotate(-90 81.5 61.5)">
	                            <g filter="url(#icon_arrow_gallery_loader_web-a)" transform="rotate(90 5 41)">
	                              <mask id="icon_arrow_gallery_loader_web-c" fill="#fff">
	                                <use xlink:href="#icon_arrow_gallery_loader_web-b"/>
	                              </mask>
	                              <path fill="#FFF" d="M1.42458261,13 L0,11.555896 L4.98603915,6.50051064 L0,1.4451253 L1.42458261,0 L6.41062176,5.05640663 C7.19645941,5.85199152 7.19645941,7.14902977 6.41062176,7.94461466 L1.42458261,13 Z" mask="url(#icon_arrow_gallery_loader_web-c)"/>
	                            </g>
	                            <g transform="rotate(-83 40 40)">
	                              <use class="hover-fill-item next icon_arrow_loader_gothia" fill="#000" filter="url(#icon_arrow_gallery_loader_web-d)" xlink:href="#icon_arrow_gallery_loader_web-rp"/>
	                              <rect class="fill-load filler-next" width="68.5" height="68.5" x="5.75" y="5.75" stroke="#FFF" stroke-width="1.5" rx="34.25"/>
	                            </g>
	                            </g>
	                        </svg>
	                      </a>
	                  </div>
	                  <div class="gothia-playr-slider">
	                  	<?php  while ( have_rows('gothia_page_head_slider') ) : the_row(); ?>
	                        <div>
	                             <div class="g-slide" style="background: url('<?php the_sub_field('gothia_page_slider_image'); ?>')"></div>
	                        </div>
	                         <?php endwhile; ?>
	                    </div>
	                </div>
            	  </div>
				</div> 
			</div>
			<div class="bottom-text">
				<p class="desc"><?php the_field('gothia_page_middle_section_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="bottom-section">
		<div class="contact-form">
			<h3><?php the_field('gothia_page_registration_form_title'); ?></h3>
			 <?php echo do_shortcode( '[contact-form-7 id="2132" title="Gothia cup form"]' ); ?>
			 <div class="row contact">
			 	<span><?php the_field('gothia_page_contact_bottom_enquiry_text'); ?></span><br>
			 	<a><?php the_field('gothia_page_contact_bottom_enquiry_email'); ?></a>
			 </div>
		</div>
			<div class="flex-row">
			<div class="right-sect">
				<div class="featured-image" style="background:url('<?php the_field('gothia_page_bottom_section_slider_background'); ?>');"></div>
				<div class="slider-wrap">
					<div class="mobile-slider dark-slick-navi">
						<?php  while ( have_rows('gothia_page_bottom_section_slider') ) : the_row(); ?>
						<div>
							<div class="g-slide" style="background:url('<?php the_sub_field('gothia_page_bottom_section_slider_images'); ?>');"></div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<div class="left-sect">
				<div class="content">
					<h3 class="section-title-small color-onyx">
	                    <?php the_field('gothia_page_bottom_right_content_title'); ?>
	                </h3>
	                <p class="section-desc">
	                	<?php the_field('gothia_page_bottom_right_content_description'); ?>
	                </p>
	                <div class="btn-sect">
	                	<a href="<?php echo get_field('gothia_page_bottom_learn_more_button')['url']; ?>" class="btn btn--dark-blue animate-btn"><?php echo get_field('gothia_page_bottom_learn_more_button')['title']; ?></a>
	                </div>
                </div>
			</div>
		</div>
	</div>
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
          <p class="thankyou-desc"><?php the_field('gothia_page_thankyou_popup_message' ); ?>       	
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thankyou-popup-loyout common-popup-loyout bg-black"></div>
</section>