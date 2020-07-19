<?php get_header(); ?>
<main id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (!has_blocks()): ?>
    <div class="component"><div class="body-max-width"><div class="container">
    <?php the_title( '<h1 class="center-text">', '</h1>' ); ?>
    </div></div></div>
    <?php endif; ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php  the_content(); ?>
    </article>
  <?php endwhile; endif; ?>
</main><!-- #site-content -->
<?php get_footer(); ?>
