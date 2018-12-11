<?php get_template_part('templates/head'); ?>
<?php if ( get_field('background_video', 'options') ) { ?>
<video id="video_background" width="100%" autoplay muted loop>
  <source src="<?php the_field('background_video', 'options'); ?>" type="video/webm">
  <source src="<?php echo get_sub_field('background_video_mp4'); ?>" type="video/mp4">
</video>
<?php } ?>
<body id="barba-wrapper">
    <main class="barba-container page-content" aria-label="Content"  data-namespace="homepage">
      <section class="<?php echo get_field('color_scheme', 'option'); ?>-theme">
        <header>
          <nav class="top-menu">
            <button class="mobile-menu btn-invisible">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <a href="<?php echo home_url(); ?>" class="logo">
              <span class="icon-connector"></span>
            </a>
            <div class="menu-links">
              <?php $menu = wp_get_nav_menu_items('Main Menu');
              global $post;
              $post_slug = 'menu-' . $post->post_name;
              if ( !empty($menu) ) {
                foreach( $menu as $item ) {
                  $class = '';
                  if ($item->classes[0] === "menu-about" and is_page('about')  ) {
                    $class = 'current';
                  }
                  if ($item->classes[0] === "menu-stories" and is_post_type_archive('post')  ) {
                    $class = 'current';
                  }
                  if ($item->classes[0] === "menu-crew" and is_post_type_archive('crew')) {
                    $class = 'current';
                  }
                  if ($item->classes[0] === "menu-portfolio" and is_post_type_archive('portfolio')) {
                    $class = 'current';
                  }
                  if ($item->classes[0] === "menu-contact" and is_page('contact')  ) {
                    $class = 'current';
                  }
                  #echo('<h1><br />'.$post_slug.'</h1><h2><br />');
                  echo('<a href="'.$item->url.'" class="'.$class.'">'.$item->title.'</a>');
                }
              }
              ?>
              <?php /*
              $args = array(
                'menu'            => 'Main Menu',
                'theme_location'  => 'Main Menu',
                'items_wrap'      => '%3$s',
                'echo'            => false
              );
              echo strip_tags(wp_nav_menu( $args ), '<a>' ); */ ?>
            </div>
            <?php get_search_form(); ?>
          </nav>
        </header>

        <div class="overlay"></div>

        <aside class="side-menu mobile-menu <?php echo get_field('color_scheme', 'option'); ?>">
          <a href="#" class="close-menu">
              <span class="icon-sidemenu-close"></span>
          </a>

          <div class="top-logo">
            <a href="<?php echo home_url(); ?>"<span class="icon-logo"></span></a>
          </div>

          <nav>
            <?php foreach( $menu as $item ) {
              echo('<a href="'.$item->url.'">'.$item->title.'</a>');
            } ?>
          </nav>

          <address class="text-center">
            <?php echo get_field('address', 'option'); ?>
          </address>
          <?php get_template_part('templates/social', 'icons'); ?>
        </aside>
        <div class="wrapper">
