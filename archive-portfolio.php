<?php get_header(); ?>
<section>
  <div class="hero hero-slide studio-portfolio aspect-16-9 full remove-bg">
    <?php if ( get_field('carousel_portfolio', 'options') ): while( has_sub_field('carousel_portfolio', 'options') ): ?>
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
  <div class="portfolio">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="menu-category" data-aos="fade-up">
            <?php foreach(get_terms(['taxonomy' => 'portfolio_category']) as $term) {
              echo('<button class="btn-invisible" data-filter="'.$term->slug.'">'.$term->name.'</button>');
            } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row spamROWar squares">
        <div class="col-sm col-centered">
          <div class="grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="grid-item centeringSpanPort grid-item--width2<?php foreach(get_the_terms( $post->ID, 'portfolio_category') as $term) { echo($term->slug.' '); } ?>">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
                <div class="h2PortTitle"><h2><?php  $title = get_the_title(); echo $title; ?></h2></div>
              </a>
            </div>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
