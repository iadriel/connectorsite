<?php get_header(); ?>

<section>
  <div class="hero minimal">
    <div class="content">
      <h3>CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
      <h1><?php _e('portfolio', 'connector'); ?></h1>
    </div>
  </div>
  <?php /*
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="menu-category">
          <button class="btn-invisible active">Infographics</button>
          <button class="btn-invisible">Events</button>
          <button class="btn-invisible">product launches</button>
          <button class="btn-invisible">Web design / UX</button>
          <button class="btn-invisible">Content</button>
        </div>
      </div>
    </div>
  </div> */ ?>
  <?php if ( have_posts() ) : ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full-card-container full">
          <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
              <a href="<?php echo home_url('/portfolio'); ?>" class="controll-close">
                <span class="icon-sidemenu-close"></span>
              </a>
              <a href="<?php the_permalink( get_adjacent_post()->ID ); ?>" class="controll-next">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-right-purple.png" alt="">
              </a>
              <div class="col-md-12 description">
                <div class="description-text">
                  <h3><?php the_title(); ?></h3>
                  <?php the_post_thumbnail('medium', ['class' => 'alignright', 'title' => 'Feature image']); ?>
                  <?php the_content(); ?>
                  </div>
                  <?php get_template_part('templates/social', 'share'); ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<?php get_footer(); ?>
