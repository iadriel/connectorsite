<?php
/* Template Name: Main Home */
?>
<?php get_template_part('templates/head'); ?>
<body id="barba-wrapper">
  <main class="barba-container page-content" aria-label="Content" data-namespace="homepage">
    <section class="magenta-theme">
      <div class="overlay"></div>
      <div class="wrapper">
        <div class="container-fluid home">
          <div class="home-video">
            <video autoplay muted loop>
              <source src="<?php the_field('home_video', 'options'); ?>" type="video/webm">
              <source src="<?php echo get_sub_field('home_video_mp4'); ?>" type="video/mp4">
            </video>
          </div>
          <div class="row">
            <div class="col-md-4 home-section visit-studio">
              <div class="bg"></div>
              <div class="content" data-aos="fade-right">
                <h1><?php the_field('studio_title', 'options'); ?></h1>
                <p><?php the_field('studio_text', 'options'); ?></p>
                <a href="<?php echo home_url('studio'); ?>" class="btn-slide magenta">
                  <div class="icon">
                    <span><i class="icon-arrow-right"></i></span>
                  </div>
                  <span class="text"><?php _e('Visit Studio', 'connector'); ?></span>
                </a>
              </div>
            </div>
          <div class="col-md-4 home-section innovation">
            <div class="bg"></div>
            <div class="content" data-aos="fade-up">
              <h1><?php the_field('innovation_title', 'options'); ?></h1>
              <p><?php the_field('innovation_text', 'options'); ?></p>
              <a href="<?php echo home_url('innovation'); ?>" class="btn-slide yellow">
                <div class="icon">
                  <span><i class="icon-arrow-right"></i></span>
                </div>

                <span class="text"><?php _e('Visit Innovation', 'connector'); ?></span>
              </a>
            </div>
          </div>
          <div class="col-md-4 home-section teams">
            <div class="bg"></div>
            <div class="content" data-aos="fade-left">
              <h1><?php the_field('teams_title', 'options'); ?></h1>
              <p><?php the_field('teams_text', 'options'); ?></p>
              <a href="<?php echo home_url('teams'); ?>" class="btn-slide green">
                <div class="icon">
                  <span><i class="icon-arrow-right"></i></span>
                </div>
                <span class="text"><?php _e('Visit Teams', 'connector'); ?></span>
              </a>
            </div>
          </div>
        </div>
        <footer class="row home-footer">
          <div class="col-12"><?php get_template_part('templates/social', 'icons'); ?></div>
          <div class="col-12 contact">
            <a href="mailto:<?php echo get_field('email', 'option'); ?>">
              <span class="icon-icon-envelope"></span>
              <?php echo get_field('email', 'option'); ?></a>
            <a href="tel:+<?php echo get_field('Phone', 'option'); ?>">
              <span class="icon-mobile"></span>
              +<?php echo get_field('Phone', 'option'); ?></a>
            <address>
              <span class="icon-icon-gps"></span>
              <a href="https://goo.gl/maps/4qUQSU9FY8k" target="_blank"><?php echo get_field('address', 'option'); ?></a></address>
          </div>
          <div class="col-12">
            <?php $menu = wp_get_nav_menu_items('Bottom Menu'); ?>
            <?php
            if ( !empty($menu) ) {
              echo('<p>');
              foreach( $menu as $item ) {
                echo('<a href="'.$item->url.'" target="_blank">'.$item->title.'</a>&nbsp;');
              }
              echo('</p>');
            }
            ?>
            <p><?php echo get_field('copyright', 'option'); ?></p>
          </div>
        </footer>
        </div>
      </div>
    </section>
  </main>
  <?php wp_footer(); ?>
</html>
