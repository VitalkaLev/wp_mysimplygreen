<!DOCTYPE html>
<html class="no-js" lang="">
<?php $dir = get_stylesheet_directory_uri(); ?>
<head>
<meta name="facebook-domain-verification" content="jtppswciuvnxu8xv2xw26wa5j9x4vj" />

  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KGC4TV5');
  </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGC4TV5" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
    <!-- End Google Tag Manager (noscript) -->

	<script>
    // Function declarations affect the global namespace, so self-invoking an anonymous function.
    (function(){
      function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
      }
      function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
      };

      var d = new Date(); d.setTime(d.getTime() + 604800000);
      // GCLID
      if (typeof(getCookie("gclid") == "undefined") && getUrlParameter('gclid') != "") {
        document.cookie = "gclid=" + getUrlParameter('gclid') +";expires=" + d.toUTCString() + ";domain=.mysimplygreen.com;path=/;secure;SameSite=Strict";
      }
    })();
  </script>

  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/slick-theme.css"/>
  <script type="text/javascript" src="<?php echo $dir.'/js/vendor/jquery-3.4.1.min.js?v='.time(); ?>"></script>
  <script type="text/javascript" src="<?php echo $dir; ?>/js/slick.min.js"></script>
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="<?php echo $dir.'/style.css?v='.time(); ?>">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  <?php if(get_theme_mod('base_color') == "sg"){ ?>
    <link rel="stylesheet" href="<?php echo $dir.'/css/green.css?v='.time(); ?>">
  <?php }elseif(get_theme_mod('base_color') == "sp"){ ?>
    <link rel="stylesheet" href="<?php echo $dir.'/css/blue.css?v='.time(); ?>">
  <?php };?>
  <link rel="stylesheet" href="<?php echo $dir.get_theme_mod( 'base_color' ).'?v='.time(); ?>">
  <meta name="theme-color" content="#fafafa">
 <script src="https://kit.fontawesome.com/284bb0eadb.js" crossorigin="anonymous"></script>   
    <!--=== WP_HEAD() ===-->
    <?php wp_head(); ?>
</head>
    <body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
<!-- CUSTOMIZABLE MENU SETUP -->
  <?php 
   $args = array(
    'container' => 'nav',
    'container_class' => 'main-nav',
    'theme_location' => 'primary-menu',
        'depth'       => 0,
    'sort_column' => 'menu_order, post_title',
    'menu_class'  => 'nav',
    'include'     => '',
    'exclude'     => '2',
    'echo'        => true,
    'show_home'   => false,
    'link_before' => '',
    'link_after'  => '' 
   );
  ?>
<header id="site-header">
  <?php
// check to see if the logo exists and add it to the page
if ( get_theme_mod( 'your_theme_logo' ) ) : ?>
 
<a href="/" id="top-logo"><img src="<?php echo get_theme_mod( 'your_theme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" ></a>
 
<?php // add a fallback if the logo doesn't exist
else : ?>
 
<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
 
<?php endif; ?><nav id="top-nav"><?php wp_nav_menu( $args ); ?>
<a href="tel:<?php echo get_theme_mod( 'phone_number' ); ?>" class="button phone"><?php echo get_theme_mod( 'phone_number' ); ?></a></nav>
  <!-- PUT YOUR MENU CODE HERE -->
  <script>
    $(function(){
        $('.main-nav').on('click', function(){
    $(this).toggleClass('open');
    console.log("menu fired");
  });

    });
  </script>
</header>
<main>
