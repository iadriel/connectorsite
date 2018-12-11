</div>
<footer class="footer-page">
  <div class="container">
    <div class="row menu-contacts">
      <div class="col-sm-6 col-6 col-md-3"  data-aos="fade-up" data-aos-duration="200">
        <a href="mailto:<?php echo get_field('email', 'option'); ?>" class="btn-border" target="_blank">
          <span class="icon-icon-envelope"></span>
          <?php _e('email', 'connector'); ?>
        </a>
      </div>
      <div class="col-sm-6 col-6 col-md-3"  data-aos="fade-up" data-aos-duration="400">
        <a href="tel:+<?php echo get_field('Phone', 'option'); ?>" class="btn-border" target="_blank">
          <span class="icon-mobile"></span>
          <?php _e('call', 'connector'); ?>
        </a>
      </div>
      <div class="col-sm-6 col-6 col-md-3"  data-aos="fade-up" data-aos-duration="600">
        <a href="<?php echo get_field('location', 'option'); ?>" class="btn-border" target="_blank">
          <span class="icon-icon-gps"></span>
          <?php _e('meet', 'connector'); ?>
        </a>
      </div>
      <div class="col-sm-6 col-6 col-md-3"  data-aos="fade-up" data-aos-duration="800">
        <a href="<?php echo get_field('chat_now', 'option'); ?>" class="btn-border" target="_blank">
          <span class="icon-chat"></span>
          <?php _e('chat now', 'connector'); ?>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6" id="row-footer-one-span">
        <ul class="menu-footer">
          <?php $menu = wp_get_nav_menu_items('Footer Menu'); ?>
          <?php
          if ( !empty($menu) ) {
            foreach( $menu as $item ) {
              echo('<li data-aos="fade-up" data-aos-duration="200"><a href="'.$item->url.'">'.$item->title.'</a></li>');
            }
          }
          ?>
        </ul>
      </div>
      <div data-aos="fade-up" data-aos-duration="600" class="col-sm-6 col-12">
        <?php get_template_part('templates/social', 'icons'); ?>
      </div>
    </div>
    <div class="row" data-aos="fade-up">
      <div class="col-sm-12">
        <span class="logo">
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-connector.svg" width="64px">
        </span>
        <p>
          <?php $menu = wp_get_nav_menu_items('Bottom Menu'); ?>
          <?php
          if ( !empty($menu) ) {
            foreach( $menu as $item ) {
              echo('<a href="'.$item->url.'" target="_blank">'.$item->title.'</a>&nbsp;');
            }
            echo('<br>');
          }
          ?>
          <?php echo get_field('copyright', 'option'); ?>
        </p>
      </div>
    </div>
  </div>
</footer>
</section>
</main>
<?php wp_footer(); ?>
</body>
</html>
