<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>
<main id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="component"><div class="body-max-width"><div class="container">
    <?php the_title( '<h1 class="center-text">', '</h1>' ); ?>
    </div></div></div>
    <?php  the_content(); ?>
    </article>
  <?php endwhile; endif; ?>
</main><!-- #site-content -->
<?php get_footer(); ?>
