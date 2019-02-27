<?php
/**
 * Template Name: Blog page
 * Template Post Type: Blog
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Player
 */
 get_header(); 
 global $post;
 ?>
<?php get_template_part('template-parts/blog-detail','page'); ?>
<?php get_footer(); ?>