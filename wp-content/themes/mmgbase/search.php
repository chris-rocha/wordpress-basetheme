<?php get_header(); ?>
<main id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="component"><div class="body-max-width"><div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(['node', 'search-result']); ?>>
	<header class="entry-header">
		<?php
		the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
		?>
	</header><!-- .entry-header -->
	<?php //twentynineteen_post_thumbnail(); ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
</div></div></div>
  <?php endwhile; endif; ?>
</main><!-- #site-content -->
<?php get_footer(); ?>
