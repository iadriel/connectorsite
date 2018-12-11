<?php
/* Template Name: Contact */
?>
<?php get_header(); ?>
<section>
  <div class="hero hero-contact aspect-16-9 full remove-bg">
    <div class="content">
      <h3 data-aos="fade-up"  data-aos-duration="200">CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
      <h1 data-aos="fade-up"  data-aos-duration="400"><?php _e('contact', 'connector'); ?></h1>
    </div>
  </div>
    <div class="studio-contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-right">

            <div class="card-black">
              <div class="card-header">
                <iframe width="100%" height="200" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.900573862038!2d-6.26689884836658!3d53.345035982411886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e9cd589a075%3A0x6fc03141bbcfb7cd!2s18+Eustace+St%2C+Temple+Bar%2C+Dublin+2%2C+D02+WR53%2C+Ireland!5e0!3m2!1sen!2sbr!4v1542066938691" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              </div>
              <div class="card-body">
                <div class="title-icon">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-find-purple.svg" alt="">
                  <?php _e('Address', 'connector'); ?>
                </div>
                <div class="info-address">
                  <?php echo get_field('address', 'option'); ?>
                </div>
              </div>
            </div>

            <div class="card-black" data-aos="fade-right">
              <div class="card-body">
                <div class="title-icon">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-call-purple.svg" alt="">
                  <?php _e('Call us', 'connector'); ?>
                </div>
                <div class="info-address">
                  +<?php echo get_field('Phone', 'option'); ?>
                </div>
              </div>
            </div>

            <div class="card-black"  data-aos="fade-right">
              <div class="card-body">
                <div class="title-icon">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-email-purple.svg" alt="">
                  <?php _e('Mail us', 'connector'); ?>
                </div>
                <div class="info-address">
                  <?php echo get_field('email', 'option'); ?>
                </div>
              </div>
            </div>

            <div class="card-black"  data-aos="fade-right">
              <div class="card-body">
                <div class="social">
                  <span><?php _e('Follow us', 'connector'); ?></span>
                  <div class="social-icons">
                    <a href="<?php echo get_field('social-facebook', 'option'); ?>">
                      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/social-icons/icon-facebook-purple.png" alt="Facebook">
                    </a>
                    <a href="<?php echo get_field('social-twitter', 'option'); ?>">
                      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/social-icons/icon-twitter-purple.png" alt="twitter">
                    </a>
                    <a href="<?php echo get_field('social-instagram', 'option'); ?>">
                      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/social-icons/icon-instagram-purple.png" alt="instagram">
                    </a>
                    <a href="<?php echo get_field('social-linkedin', 'option'); ?>">
                      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/social-icons/icon-linkedin-purple.png" alt="linkedin">
                    </a>
                    <a href="<?php echo get_field('social-youtube', 'option'); ?>">
                      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/social-icons/icon-youtube-purple.png" alt="youtube">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="col-md-6"  data-aos="fade-up">
            <div class="card-black">
              <div class="card-body">
                <div class="title-icon">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-chat-purple.svg" alt="">
                  <?php _e('Message us', 'connector'); ?>
                </div>
                <div class="form-card">
                  <p>Drop us a word.</p>
                  <p>&nbsp;</p>
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; endif; ?>

        </div>
      </div>
    </div>

</section>
<?php get_footer(); ?>
