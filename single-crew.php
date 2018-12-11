<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
  <div class="crew-member">
    <?php if ( get_field('cinemagram') ) {
      echo('<video width="100%" autoplay muted loop>');
      echo('<source src="'.get_field('cinemagram').'" type="video/webm">');
      echo('<source src="'.get_field('cinemagram_mp4').'" type="video/mp4">');
      echo('</video>');
    } else {
      the_post_thumbnail('full');
    } ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="crew-bio"  data-aos="fade-up">
            <a href="<?php echo home_url('crew'); ?>" class="close btn-invisible">
                <span class="icon-sidemenu-close"></span>
            </a>
            <h1><?php the_title(); ?></h1>
            <h4><?php the_field('title'); ?></h4>
            <?php the_content(); ?>
            <footer>
              <p><small>Contact <?php the_title(); ?></small></p>
              <div class="social-icons">
                <?php if( get_field('crew-facebook') ) { ?>
                <a href="<?php the_field('crew-facebook'); ?>">
                  <span class="icon-facebook"></span>
                </a>
                <?php } ?>
                <?php if( get_field('crew-twitter') ) { ?>
                <a href="<?php the_field('crew-twitter'); ?>">
                  <span class="icon-twitter-icon"></span>
                </a>
                <?php } ?>
                <?php if( get_field('crew-instagram') ) { ?>
                <a href="<?php the_field('crew-instagram'); ?>">
                  <span class="icon-instagram-icon"></span>
                </a>
                <?php } ?>
                <?php if( get_field('crew-linkedin') ) { ?>
                <a href="<?php the_field('crew-linkedin'); ?>">
                  <span class="icon-linkedin-icon"></span>
                </a>
                <?php } ?>
                <?php if( get_field('crew-youtube') ) { ?>
                <a href="<?php the_field('crew-youtube'); ?>">
                  <span class="icon-youtube-icon"></span>
                </a>
                <?php } ?>
              </div>
            </footer>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
