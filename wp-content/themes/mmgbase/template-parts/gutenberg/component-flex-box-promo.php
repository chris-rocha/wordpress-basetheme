<div class="component flexbox-promo">
  <div class="container">
<?php
if( have_rows('field_flex_box_promo_repeater') ):
  while( have_rows('field_flex_box_promo_repeater') ) : the_row();
      // $title = get_sub_field('field_flex_box_promo_title');
      $icon = get_sub_field('field_flex_box_promo_icon');
      $link = get_sub_field('field_flex_box_promo_link');
      $svg = get_stylesheet_directory_uri() . '/images/icons/' . $icon . '.svg';

  ?>
<a class="fill dark-blue custom-promo bg-repeat waves" href="" target="">
  <?php echo file_get_contents($svg); ?>
  <div class="text-wrapper">
    <h3 class="color white"><?php the_sub_field('field_flex_box_promo_title'); ?></h3>
    <div class="button-wrapper">
      <span class="button outlined"><?php echo $link['title']; ?></span>
    </div>
  </div>
</a>
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>
