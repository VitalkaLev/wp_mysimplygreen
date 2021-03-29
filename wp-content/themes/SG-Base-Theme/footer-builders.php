</main>
<?php $dir = "/wp-content/themes/SG-Base-Theme" ?>
<footer>
  <div class="inner-box">
    <div class="footer-logo-social"> 
      <div class="footer-logo"> 
<img src="<?php echo get_theme_mod( 'your_theme_footer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >      </div> 
      <?php if(get_theme_mod('base_color') == "sg"){ ?>
        <div class="footer-social sg"> 
          <a href="https://www.facebook.com/mysimplygreen/" target="_blank"> <img src="<?php echo $dir;?>/images/social-facebook.png" alt=""> </a> 
          <a href="https://www.instagram.com/mysimplygreen/?hl=en" target="_blank"> <img src="<?php echo $dir;?>/images/social-instagram.png" alt=""> </a> 
          <a href="https://twitter.com/mysimplygreen" target="_blank"> <img src="<?php echo $dir;?>/images/social-twitter.png" alt=""> </a> 
          <a href="https://www.linkedin.com/company/simply-green-home-services-inc-/" target="_blank"> <img src="<?php echo $dir;?>/images/social-linkedin.png" alt=""> </a> 
        </div> 
      <?php }elseif(get_theme_mod('base_color') == "sp"){ ?>
        <div class="footer-social sp"> 
        </div> 
  <?php };?>

    </div>
    <div class="nav-side">
  <?php 
   $args_foot_top_builders = array(
    'container' => 'nav',
    'container_class' => 'nav-top',
    'theme_location' => 'builder-secondary-menu',
        'depth'       => 0,
    'sort_column' => 'menu_order, post_title',
    'menu_class'  => 'top-nav',
    'include'     => '',
    'exclude'     => '2',
    'echo'        => true,
    'show_home'   => false,
    'link_before' => '',
    'link_after'  => '' 
   );
  ?>
  <?php 
   $args_foot_bottom_builders = array(
    'container' => 'nav',
    'container_class' => 'nav-bottom',
    'theme_location' => 'builder-tertiary-menu',
        'depth'       => 0,
    'sort_column' => 'menu_order, post_title',
    'menu_class'  => 'bottom-nav',
    'include'     => '',
    'exclude'     => '2',
    'echo'        => true,
    'show_home'   => false,
    'link_before' => '',
    'link_after'  => '' 
   );
  ?>
  <?php wp_nav_menu( $args_foot_top_builders ); ?>
  <?php wp_nav_menu( $args_foot_bottom_builders ); ?></div>
</footer>
        <script type="text/javascript" src="<?php echo $dir; ?>/js/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo $dir.'/js/main.js?v='.time(); ?>"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158830936-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-158830936-1');
        </script>        
        <?php wp_footer(); ?>
    </body>
</html>