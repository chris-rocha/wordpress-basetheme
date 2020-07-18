<?php
  global $post;
  $post_title = $post->post_title;
  if ($title = get_field('title')) {
    $post_title = $title;
  }
  $image = get_field('image');
?>
<section class="hero landing has-media has-video">
  <div class="video-wrapper">
    <video autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline" width="1920" height="1080">
      <source src="<?php the_field('video'); ?>" type="video/mp4">
    </video>
  </div>
  <div class="cell center-text">
    <div class="landing-max-width">
      <div class="container">
        <?php if (get_field('subhead')): ?>
        <div class="heading6 eyebrow all-caps add-bottom"><?php the_field('subhead'); ?></div>
        <?php endif; ?>
        <h1><?php print $post_title; ?></h1>
      </div>
    </div>
  </div>
</section>
