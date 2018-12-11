<?php get_header(); ?>
<section>
  <div class="hero minimal">
    <div class="content">
      <h3>CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
      <h1><?php _e('stories', 'connector'); ?></h1>
    </div>
  </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="stories-open">
    <?php //the_post_thumbnail_url('full'); ?>
    <div class="cover-story" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')"></div>
    <div class="container text-story">
      <div class="row">
        <div class="col-md-12">
          <div class="full-card-container full">
            <div class="container">
              <div class="row">
                <a href="<?php echo(home_url('stories')); ?>" class="controll-close">
                  <span class="icon-sidemenu-close"></span>
                </a>
                <div class="col-sm-12 title">
                  <h2><?php the_title(); ?></h2>
                  <strong><?php the_excerpt(); ?></strong>
                  <span>by <?php the_author(); ?> <?php _e('on', 'connector'); ?> <?php the_time('d/m/Y'); ?></span>
                </div>
                <div class="col-md-12 description">
                  <div class="description-text long-text">
                    <?php the_content(); ?>
                  </div>
                  <?php get_template_part('templates/social', 'share'); ?>
                  <a href="<?php the_permalink( get_adjacent_post()->ID ); ?>" class="controll-next p-bottom">
                    <?php _e('Next story', 'connector'); ?>
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-right-purple.png" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
