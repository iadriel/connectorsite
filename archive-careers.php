<?php get_header(); ?>
<section>
  <div class="hero hero-slide studio-careers aspect-16-9 full remove-bg">
    <?php if ( get_field('carousel_careers', 'options') ): while( has_sub_field('carousel_careers', 'options') ): ?>
    <?php $post = get_sub_field('post'); ?>
    <?php $image = get_the_post_thumbnail_url(get_the_id(), 'full'); ?>
    <?php if ( !empty(get_sub_field('image')) ) {
      $image = get_sub_field('image');
    } ?>
    <div style="background-image:url('<?php echo $image; ?>');background-size:cover">
      <?php if ( get_sub_field('video') ): ?>
        <video width="100%" autoplay muted loop>
          <source src="<?php echo get_sub_field('video'); ?>" type="video/webm">
          <source src="<?php echo get_sub_field('video_mp4'); ?>" type="video/mp4">
        </video>
      <?php endif; ?>
      <div class="content">
        <h3 data-aos="fade-up"  data-aos-duration="200">CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
        <h1 data-aos="fade-up"  data-aos-duration="400"><?php echo $post->post_title; ?></h1>
        <p data-aos="fade-up"  data-aos-duration="600">
          <?php echo $post->post_excerpt; ?>
        </p>
        <a data-aos="fade-up"  data-aos-duration="800" href="<?php the_permalink(); ?>" class="btn-gradient"><?php _e('Learn more', 'connector'); ?></a>
      </div>
    </div>
    <?php endwhile; else : ?>
    <div>
      <div class="content">
        <h3 data-aos="fade-up" data-aos-duration="200"><?php _e('CONNECTOR', 'connector'); ?> <?php echo get_field('division', 'option'); ?></h3>
        <h1 data-aos="zoom-in" data-aos-duration="400"><?php _e('careers', 'connector'); ?></h1>
        <p><?php _e('Join our crew!'); ?></p>
      </div>
    </div>
    <div>
      <div class="content">
        <h3 data-aos="fade-up" data-aos-duration="200"><?php _e('CONNECTOR', 'connector'); ?> <?php echo get_field('division', 'option'); ?></h3>
        <h1 data-aos="zoom-in" data-aos-duration="400"><?php _e('careers', 'connector'); ?></h1>
        <p><?php _e('Join our crew!'); ?></p>
      </div>
    </div>
    <?php endif; ?>
  </div>


  <div class="container">
    <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-md-12">
        <a href="<?php the_permalink(); ?>">
          <div class="careers-container">
            <h1><?php the_title(); ?></h1>
            <span><?php _e('published on','connector'); ?> <?php the_time('d/m/Y'); ?></span>
          </div>
        </a>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<br>
<?php get_footer(); ?>
