<?php
  $link = get_field('link');
  if ($color = get_field('image')) {
    $fill = 'dark-blue bg-image';
    $button = '';
    $shadow = 'text-shadow';
  } else {
    $fill = 'calico-coral';
    $button = 'outlined';
    $shadow = '';
  }
?>
<div class="component single-promo landing-max-width fill <?php echo $fill; ?>" style="background-image:url(<?php the_field('image'); ?>);background-size:cover;">
  <div class="container">
    <a class="flex center col pa-2 ca full-width cta-link unstyle" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
      <h3 class="color white <?php echo $shadow; ?>"><?php the_field('heading'); ?></h3>
      <div class="button-wrapper show-on-mobile">
        <span class="button my-2 <?php echo $button; ?>"><?php echo $link['title']; ?></span>
      </div>
    </a>
  </div>
</div>
