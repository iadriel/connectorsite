<?php get_header(); ?>
<section>
  <div class="hero studio-home crew aspect-16-9 full remove-bg">
    <div class="content">
      <h3 data-aos="fade-up" data-aos-duration="200"><?php _e('CONNECTOR', 'connector'); ?></h3>
      <h1 data-aos="zoom-in" data-aos-duration="400"><?php echo get_field('division', 'option'); ?></h1>
      <p data-aos="fade-up" data-aos-duration="600"><?php echo get_field('division_one-liner', 'option'); ?></p>
    </div>
  </div>
  <div class="avatar-list container">
    <div class="row">
    <?php $i = 0; ?>
    <?php global $query_string; $posts = query_posts($query_string."&orderby=title&order=ASC"); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-md-4 avatar" data-aos="fade-up" data-aos-duration="<?php echo($i * 2 * 100); ?>">
        <a href="<?php the_permalink(); ?>">
          <div class="media">
            <?php the_post_thumbnail('medium'); ?>
          </div>
          <p class="name"><?php the_title(); ?> <small><?php the_field('title'); ?></small></p>
        </a>
      </div>
      <?php $i++; endwhile; endif; ?>
      <div class="col-md-4 avatar" data-aos="fade-up" data-aos-duration="400">
        <a href="<?php echo home_url('careers'); ?>">
          <div class="media">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/join-us.png" alt="">
          </div>
          <p class="name">Join our <br>crew</p>
        </a>
      </div>
    </div>
  </div>

</section>
<?php get_footer(); ?>
