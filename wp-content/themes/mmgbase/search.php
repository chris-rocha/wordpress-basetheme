<?php get_header(); ?>
<main id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="component"><div class="body-max-width"><div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(['node', 'search-result']); ?>>
  <div>
		<?php the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
    <!-- <p><strong>Info</strong></p> -->
		<?php the_excerpt(); ?>
		<a class="all-caps" href="<?php get_permalink(); ?>">Read More</a>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
</div></div></div>
  <?php endwhile; endif; ?>
</main><!-- #site-content -->
<?php get_footer(); ?>
