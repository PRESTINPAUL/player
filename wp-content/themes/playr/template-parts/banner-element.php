<?php if ( get_field( 'enable_header_banner', pll_current_language('slug') ) ): ?>
<?php
$time_zone_choosen = get_field( 'header_banner_timezone', pll_current_language('slug') );
$popup_start_date = get_field( 'header_banner_start_date', pll_current_language('slug') );
$popup_end_date = get_field( 'header_banner_end_date', pll_current_language('slug') );
date_default_timezone_set($time_zone_choosen);
$get_today_date = date('Y-m-d H:i:s');
if($get_today_date > $popup_start_date && $get_today_date < $popup_end_date) { ?>
	<style type="text/css">
    	.header__banner {
			width: 100%;
			justify-content: center;
			padding: 1rem;
			display: flex;
			position: relative;
			transition: transform 0.4s, box-shadow 0.4s;
		}
		.header__banner--text {
			text-decoration: none;
			color: #fff;
			font-size: inherit;
			font-family: inherit;
			transition: all 0.4s ease-in;
		}

		.header__banner--text:hover {
			padding-right: 0.75rem;
		}

		.header__banner--close {
			position: relative;
			right: 0px;
		}

		.Header::before {
			height: 130px;
		}

		@media only screen and (min-width: 720px) {
			.nav-is-stuck .header__banner {
				transform: translatey(20px)
			}
			.Header::before {
				height: 150px;
			} 
		}

		.header__banner--close {
			margin-left: 0.5rem;
			position: relative;
			top: 1px
		}

		.header__banner--close::after {
			content: url(/wp-content/themes/playr/assets/images/icons/white_arrow_right.svg);
		}
    </style>
    <div id="js-header__banner" class="header__banner" style="background-color: <?php the_field('header_banner_colour', pll_current_language('slug')); ?>">
        <a href="<?php the_field('header_banner_link', pll_current_language('slug')); ?>" class="header__banner--text">
            <?php the_field('header_banner_text', pll_current_language('slug')); ?>
        </a>
        <span class="header__banner--close"></span>
    </div>
	<?php } date_default_timezone_set('UTC');?>
<?php endif; ?>