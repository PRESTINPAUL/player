<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Player
 */

get_header(); ?>
<section class="error-404 not-found">
	<!-- <header class="page-header"> -->
		<!-- <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'playertek' ); ?></h1> -->
		<!-- </header>.page-header -->
		<?php get_template_part('template-parts/error','page'); ?>
	</section><!-- .error-404 -->
</div>
</main><!-- #main -->
