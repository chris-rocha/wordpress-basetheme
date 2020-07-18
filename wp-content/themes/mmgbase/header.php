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
        <div class="weather desktop-only">{{ weather_summary }}</div>
        <div id="mobile-toggle" class="mobile-only">
          <button type="button" class="unstyle" aria-label="Main Menu" aria-controls="main-menu" aria-expanded="false"><span class="material-icons">menu</span></button>
        </div>
      </div>
    </div>
  </div>
  <div id="main-menu" tabindex="-1">
    <div class="header-max-width mobilize">
      <div class="container">
        <div class="weather mobile-only">{{ weather_summary }}</div>
        {{ main_menu }}
      </div>
    </div>
  </div>
</header>
