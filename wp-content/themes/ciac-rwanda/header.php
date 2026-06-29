<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo-og.png">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <!-- Header -->
  <header>
    <div class="container header-container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
        <?php 
        $header_logo = get_field('header_logo', 'option');
        $header_logo_url = $header_logo ? esc_url($header_logo) : get_template_directory_uri() . '/assets/images/logo-og.png';
        ?>
        <img src="<?php echo $header_logo_url; ?>" alt="<?php bloginfo( 'name' ); ?> Logo" />
        <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
      </a>
      <nav class="nav-wrapper">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
              'menu_class'     => 'nav-links',
              'container'      => false,
              'fallback_cb'    => false,
            )
          );
        ?>
        <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="btn btn-primary nav-cta">Get Involved</a>
      </nav>
      <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </div>
  </header>
