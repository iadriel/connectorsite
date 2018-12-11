<?php get_header(); ?>
<section>
  <div class="hero studio-careers">
    <div class="content">
      <h3>CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
      <h1><?php _e('careers', 'connector'); ?></h1>
      <p><?php _e('Join our crew!', 'connector'); ?></p>
    </div>
  </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="careers-container full">
          <a href="<?php echo(home_url('careers')); ?>" class="controll-close">
            <span class="icon-sidemenu-close"></span>
          </a>
          <h1><?php the_title(); ?></h1>
          <span><?php _e('published on','connector'); ?> <?php the_time('d/m/Y'); ?></span>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
