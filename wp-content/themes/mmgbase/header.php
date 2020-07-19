<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header">
  <div class="header-max-width top-bar">
    <div class="container">
      <div class="secondary">
        <div><?php get_search_form(); ?></div>
        <div class="logo mobile-only center-text"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/obed-logo-rev2.svg" alt="The Greater Naples Chamber of Commerce" /></a></div>
        <div class="weather desktop-only"><span class="pe-7w-rain-sun icon"></span><span class="temp">78°&nbsp;F</span></div>
        <div id="mobile-toggle" class="mobile-only">
          <button type="button" class="unstyle" aria-label="Main Menu" aria-controls="main-menu" aria-expanded="false"><span class="material-icons">menu</span></button>
        </div>
      </div>
    </div>
  </div>
  <div id="main-menu" tabindex="-1">
    <div class="header-max-width mobilize">
      <div class="container">
        <div class="weather mobile-only"><span class="pe-7w-rain-sun icon"></span><span class="temp">78°&nbsp;F</span></div>
        <?php
          wp_nav_menu(array(
            'menu_class' => 'menu main',
            'container' => false,
            'theme_location' => 'header-menu',
            'link_before' => '<span class="link-pop">',
            'link_after' => '</span>',
            'walker' => new Mega_Walker_MegaMenu(),
            'before' => '<div class="link-menu-wrapper">', // no after because of ordering, see walker
          ));
        ?>
      </div>
    </div>
  </div>
</header>
