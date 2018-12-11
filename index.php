<?php get_header(); ?>
<section class="studio">
  <div class="hero studio-home aspect-16-9 full">
    <video width="100%" autoplay muted loop>
      <?php if ( !empty( get_field('home_video', 'options') ) ) {
        $video_url = get_field('home_video', 'options');
      } else {
        $video_url = get_field('background_video', 'options');
      } ?>
      <source src="<?php echo $video_url; ?>" type="video/webm">
    </video>
    <div class="content">
      <h3 data-aos="fade-up" data-aos-duration="200"><?php _e('CONNECTOR', 'connector'); ?></h3>
      <h1 data-aos="zoom-in" data-aos-duration="400"><?php echo get_field('division', 'option'); ?></h1>
      <p data-aos="fade-up" data-aos-duration="600"><?php echo get_field('division_one-liner', 'option'); ?></p>
    </div>
  </div>
  <?php if( have_rows('clients', 'option') ): ?>
  <div class="studio-clients">
    <div class="page-header">
      <h2>
        <?php _e('Clients', 'connector'); ?>
        <hr id="firstLine" data-aos="fade-left" data-aos-id="firstLine" data-aos-duration="1000">
        <hr class="secondLine" data-aos="center-right" data-aos-id="secondLine" data-aos-duration="1000" data-aos-anchor-placement="top-center">
      </h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="client-slide"  data-aos="fade-right">
           <?php while ( have_rows('clients', 'option') ) : the_row(); ?>
            <div class="logos">
              <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>">
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if( have_rows('solutions', 'option') ): ?>
  <div class="studio-problems">
    <div class="page-header"  data-aos="fade-right">
      <h2>
        <?php _e('problems we solve', 'connector'); ?>
        <hr id="firstLine" data-aos="fade-left" data-aos-id="firstLine" data-aos-duration="1000">
        <hr class="secondLine" data-aos="center-right" data-aos-id="secondLine" data-aos-duration="1000" data-aos-anchor-placement="top-center">
      </h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="slide-problems"  data-aos="fade-right">
            <?php while ( have_rows('solutions', 'option') ) : the_row(); ?>
            <div>
              <h1><?php the_sub_field('solution'); ?></h1>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if( have_rows('services', 'option') ): ?>
  <div class="studio-services">
    <div class="page-header"  data-aos="fade-left">
      <h2>
        <?php _e('services', 'connector'); ?>
        <hr id="firstLine" data-aos="fade-left" data-aos-id="firstLine" data-aos-duration="1000">
        <hr class="secondLine" data-aos="center-right" data-aos-id="secondLine" data-aos-duration="1000" data-aos-anchor-placement="top-center">
      </h2>
    </div>
    <div class="container">
      <div class="row">
      <?php $timer = 200; ?>
      <?php while ( have_rows('services', 'option') ) : the_row(); ?>
        <div class="col-md-5th-1 col-sm-2 content"  data-aos="fade-up" data-aos-duration="<?php echo $timer; ?>">
          <p><img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>"></p>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('content'); ?></p>
        </div>
      <?php $timer = $timer + 200; ?>
      <?php endwhile; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php $case = get_field('case_study', 'option'); ?>
  <?php if ( $case ): ?>
  <div class="studio-case">
    <div class="page-header" data-aos="fade-up">
      <h2><?php _e('Case Study', 'connector'); ?></h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title" data-aos="fade-up">
            <h3><?php echo $case['title']; ?> <small><?php echo $case['subtitle']; ?></small></h3>
          </div>
          <p data-aos="fade-up"><?php echo $case['content']; ?></p>
          <div data-aos="fade-up" class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $case['video_link']; ?>" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php $args = array(
  	'post_type'      => array( 'crew' ),
  	'posts_per_page' => '-1',
    'orderby'        => 'title',
    'order'          => 'ASC'
  );
  $query = new WP_Query( $args );
  if ( $query->have_posts() ): ?>
  <div class="studio-team">
    <div class="page-header" data-aos="fade-right">
      <h2><?php _e('meet our team', 'connector'); ?></h2>
    </div>
    <div class="container" data-aos="fade-up" data-aos-id="slide-team">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="slide-team">
            <?php while ( $query->have_posts() ): $query->the_post(); ?>
            <div>
              <a href="<?php the_permalink(); ?>">
                <div class="media">
                  <?php the_post_thumbnail('medium'); ?>
                </div>
                <p class="name"><?php the_title(); ?> <small><?php the_field('title'); ?></small></p>
              </a>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>
