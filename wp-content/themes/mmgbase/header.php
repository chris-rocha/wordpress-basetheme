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
          // wp_nav_menu(array(
          //   'menu_class' => 'menu main',
          //   'container' => false,
          //   'theme_location' => 'header-menu',
          //   'link_before' => '<span class="link-pop">',
          //   'link_after' => '</span>',
          //   'walker' => new my_Walker_MegaMenu(),
          //   'before' => '<div class="link-menu-wrapper">', // no after because of ordering, see walker
          // ));
        ?>
<ul class="menu main">
<li class="menu-item menu-item--expanded">
<div class="link-menu-wrapper">
<a href="/why-collier-county" data-drupal-link-system-path="node/21"><span class="link-pop">Why Collier County</span></a>
<span class="fill coastal-aqua-20 material-icons show-submenu trigger mobile-only" tabindex="0">keyboard_arrow_right</span>
<div class="child" data-menu-index="1">
<div class="head fill coastal-aqua-20 mobile-only body-max-width">
<div class="container">
<ul>
<li><a href="#" class="trigger hide-submenu"><span class="material-icons">keyboard_arrow_left</span> Back</a></li>
<li><a href="/why-collier-county">Why Collier County</a></li>
</ul>
</div>
</div>
<div class="body-max-width">
<div class="container">
<ul class="links">
<li>
<a href="/living-here" data-drupal-link-system-path="node/116">Living Here</a>
</li>
<li>
<a href="/industries" data-drupal-link-system-path="node/306">Industries</a>
</li>
<li>
<a href="/demographics" data-drupal-link-system-path="node/371">Demographics</a>
</li>
<li>
<a href="/education" data-drupal-link-system-path="node/121">Education</a>
</li>
<li>
<a href="/economy" data-drupal-link-system-path="node/126">Economy</a>
</li>
<li>
<a href="/infrastructure" data-drupal-link-system-path="node/131">Infrastructure</a>
</li>
<li>
<a href="/talent" data-drupal-link-system-path="node/136">Talent</a>
</li>
<li>
<a href="/success-stories" data-drupal-link-system-path="node/221">Success Stories</a>
</li>
</ul>
<div class="mega-content">
</div>

</div>
</div>
</div>

</div>
</li>
    <li class="menu-item menu-item--expanded">
<div class="link-menu-wrapper">
<a href="/doing-business-collier-county" data-drupal-link-system-path="node/71"><span class="link-pop">Doing Business</span></a>
<span class="fill coastal-aqua-20 material-icons show-submenu trigger mobile-only" tabindex="0">keyboard_arrow_right</span>
<div class="child" data-menu-index="2">
<div class="head fill coastal-aqua-20 mobile-only body-max-width">
<div class="container">
<ul>
<li><a href="#" class="trigger hide-submenu"><span class="material-icons">keyboard_arrow_left</span> Back</a></li>
<li><a href="/doing-business-collier-county">Doing Business</a></li>
</ul>
</div>
</div>
<div class="body-max-width">
<div class="container">
<ul class="links">
<li>
<a href="/relocate" data-drupal-link-system-path="node/141">Relocate</a>
</li>
<li>
<a href="/expand" data-drupal-link-system-path="node/146">Expand</a>
</li>
<li>
<a href="/startup" data-drupal-link-system-path="node/151">Start Up</a>
</li>
<li>
<a href="/available-properties" data-drupal-link-system-path="node/76">Property Search</a>
</li>
<li>
<a href="/form/submit-property" data-drupal-link-system-path="node/96">Submit a Property</a>
</li>
<li>
<a href="/site-selection-tools" data-drupal-link-system-path="node/156">Site Selection Tools</a>
</li>
<li>
<a href="/tools-resources" data-drupal-link-system-path="node/101">Tools &amp; Resources</a>
</li>
</ul>
<div class="mega-content">
</div>

</div>
</div>
</div>

</div>
</li>
<li id="inline-logo" class="desktop-only">
<a href="/">
<img src="<?php echo get_template_directory_uri(); ?>/images/obed-logo-rev2.svg" alt="The Greater Naples Chamber of Commerce">
</a>
</li>
    <li class="menu-item menu-item--expanded">
<div class="link-menu-wrapper">
<a href="/incentives-programs" data-drupal-link-system-path="node/316"><span class="link-pop">Incentives &amp; Programs</span></a>
<span class="fill coastal-aqua-20 material-icons show-submenu trigger mobile-only" tabindex="0">keyboard_arrow_right</span>
<div class="child" data-menu-index="4">
<div class="head fill coastal-aqua-20 mobile-only body-max-width">
<div class="container">
<ul>
<li><a href="#" class="trigger hide-submenu"><span class="material-icons">keyboard_arrow_left</span> Back</a></li>
<li><a href="/incentives-programs">Incentives &amp; Programs</a></li>
</ul>
</div>
</div>
<div class="body-max-width">
<div class="container">
<ul class="links">
<li>
<a href="/incentives" data-drupal-link-system-path="node/321">Incentives</a>
</li>
<li>
<a href="/accelerator-programs" data-drupal-link-system-path="node/241">Accelerator Programs</a>
</li>
<li>
<a href="/certified-site-program" data-drupal-link-system-path="node/256">Certified Site Program</a>
</li>
<li>
<a href="/fast-track-program" data-drupal-link-system-path="node/236">Fast Track Program</a>
</li>
<li>
<a href="/innovation-zones" data-drupal-link-system-path="node/226">Innovation Zones</a>
</li>
<li>
<a href="/opportunity-zones" data-drupal-link-system-path="node/231">Opportunity Zones</a>
</li>
<li>
<a href="/redevelopment-areas" data-drupal-link-system-path="node/261">Redevelopment Areas</a>
</li>
</ul>
<div class="mega-content">
</div>

</div>
</div>
</div>

</div>
</li>
    <li class="menu-item menu-item--expanded">
<div class="link-menu-wrapper">
<a href="/about-us" data-drupal-link-system-path="node/81"><span class="link-pop">About Us</span></a>
<span class="fill coastal-aqua-20 material-icons show-submenu trigger mobile-only" tabindex="0">keyboard_arrow_right</span>
<div class="child" data-menu-index="5">
<div class="head fill coastal-aqua-20 mobile-only body-max-width">
<div class="container">
<ul>
<li><a href="#" class="trigger hide-submenu"><span class="material-icons">keyboard_arrow_left</span> Back</a></li>
<li><a href="/about-us">About Us</a></li>
</ul>
</div>
</div>
<div class="body-max-width">
<div class="container">
<ul class="links">
<li>
<a href="/our-services" data-drupal-link-system-path="node/196">Our Services</a>
</li>
<li>
<a href="/partners-connections-referrals" data-drupal-link-system-path="node/166">Our Partners</a>
</li>
<li>
<a href="/our-staff" data-drupal-link-system-path="node/201">Our Staff</a>
</li>
<li>
<a href="/form/contact-us" data-drupal-link-system-path="node/46">Contact Us</a>
</li>
</ul>
<div class="mega-content">
</div>

</div>
</div>
</div>

</div>
</li>
</ul>

      </div>
    </div>
  </div>
</header>
