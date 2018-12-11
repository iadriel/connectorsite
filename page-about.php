<?php
/* Template Name: About */
?>
<?php get_header(); ?>
<section class="studio">
  <div class="hero hero-slide studio-about aspect-16-9 full remove-bg">
    <?php if ( get_field('carousel_about', 'options') ): while( has_sub_field('carousel_about', 'options') ): ?>
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
    <?php endwhile; endif; ?>
  </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="studio-how-we-work">
    <div class="page-header" data-aos="fade-right">
      <h2>
        <?php _e('how we work', 'connector'); ?>
        <hr id="firstLine" data-aos="fade-left" data-aos-id="firstLine" data-aos-duration="1000">
        <hr class="secondLine" data-aos="center-right" data-aos-id="secondLine" data-aos-duration="1000" data-aos-anchor-placement="top-center">
      </h2>
    </div>
    <div class="container" data-aos="fade-up">
      <div class="row how-we-work-cards">
        <div class="col-md-4 half-circles top">
          <div class="circle"></div>
          <h1><?php the_field('block_title_1'); ?></h1>
          <p><?php the_field('block_text_1'); ?></p>
        </div>
        <div class="col-md-4 half-circles bottom">
          <div class="circle"></div>
          <h1><?php the_field('block_title_2'); ?></h1>
          <p><?php the_field('block_text_2'); ?></p>
        </div>
        <div class="col-md-4 half-circles top">
          <div class="circle"></div>
          <h1><?php the_field('block_title_3'); ?></h1>
          <p><?php the_field('block_text_3'); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="culture-deck">
    <div class="bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 bookSpanimage" data-aos="fade-right">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/book.png" alt="" class="dsplnsmvw">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/book-small-size.png" alt="" class="dsplngrvw">
          </div>
          <div class="col-md-3 content" data-aos="fade-left">
            <p><?php the_field('block_text_4'); ?></p>
            <div class="button-culture-deck">
              <a href="<?php the_field('file'); ?>" class="btn btn-gradient" download><?php _e('Download now', 'connector'); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ( have_rows('logos') ) : ?>
  <div class="awards">
    <div class="page-header">
      <h2>
        <?php _e('awards', 'connector'); ?>
        <hr id="firstLine" data-aos="fade-left" data-aos-id="firstLine" data-aos-duration="1000">
        <hr class="secondLine" data-aos="center-right" data-aos-id="secondLine" data-aos-duration="1000" data-aos-anchor-placement="top-center">
      </h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="client-slide"  data-aos="fade-right">
           <?php  while ( have_rows('logos' ) ) : the_row(); ?>
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
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
