<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
     Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php bloginfo('name'); ?> <?php wp_title('&ndash;', true, 'left'); ?></title>
  
  <meta name="description" content="">
  <meta name="author" content="">
  
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/normalize.css") ?>
  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/main.css") ?>
  
  <!-- Wordpress Templates require a style.css in theme root directory -->
  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>
  
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/vendor/modernizr-2.6.1.min.js") ?>

  <!-- Wordpress Head Items -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_head(); ?>

  <!-- Elect theme stylesheets -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" />
  
  <!-- Blank favicon -->
  <link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon" />

</head>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->

<div id="container" <?php
  $options = get_option('elect_theme_options');
  if ($options['palette'] == 1) {
    echo 'class="terracotta ';
  }
  elseif ($options['palette'] == 2) {
    echo 'class="greenleaf ';
  }
  elseif ($options['palette'] == 3) {
    echo 'class="victory1 ';
  }
  elseif ($options['palette'] == 4) {
    echo 'class="victory2 ';
  }
  elseif ($options['palette'] == 5) {
    echo 'class="fiesta ';
     }
  elseif ($options['palette'] == 6) {
    echo 'class="eggplant ';
    }
  else { }

  if ($options['side'] == 'right') {
    echo 'sideright"';
  }
  else {
    echo 'sideleft"';
  }
?>>
  <header id="header" role="banner">
    <h1><a href="<?php echo get_option('home'); ?>/">
    <?php
      if ($options['logourl']) {
        $bloginfo_name = get_bloginfo('name');
        echo '<img src="' . $options['logourl'] . '" alt="' . $bloginfo_name . '" />';
      }
      else { bloginfo('name'); }
    ?>
    </a></h1>
    <?php if (bloginfo('description')) {
      echo '<p class="description">'; bloginfo('description'); echo '</p>';
      }
      else { }
    ?>

    <nav id="social-navigation">
      <?php wp_nav_menu(
        array(
          'theme_location' => 'social-navigation',
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'before' => '',
          'after' => '',
          'fallback_cb' => false
        )
      ); ?>
    </nav>
  </header>

  <nav id="primary-navigation">
    <?php wp_nav_menu(
      array(
        'theme_location' => 'primary-navigation',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'before' => '',
        'after' => '',
        'depth' => 1
      )
    ); ?>
  </nav>
