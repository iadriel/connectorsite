<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="studio">
  <div class="hero studio-about">
    <?php if ( !empty( get_field('page_video') ) ) { ?>
    <video width="100%" autoplay muted loop>
      <source src="<?php the_field('page_video') ?>" type="video/mp4">
    </video>
    <?php } ?>
    <div class="content">
      <h3 data-aos="fade-up"  data-aos-duration="200">CONNECTOR <?php echo get_field('division', 'option'); ?></h3>
      <h1 data-aos="fade-up"  data-aos-duration="400"><?php the_title(); ?></h1>
      <p  data-aos="fade-up" data-aos-duration="600"><?php echo get_field('division_one-liner', 'option'); ?></p>
    </div>
  </div>
  <div class="studio-how-we-work">
    <?php if( get_field('subtitle' ) ): ?>
    <div class="page-header" data-aos="fade-right">
      <h2><?php the_field('subtitle'); ?></h2>
    </div>
    <?php endif; ?>

    <div class="container" data-aos="fade-up">
      <div class="row how-we-work-cards">
        <div class="col-md-4 half-circles top">
          <div class="circle"></div>
          <?php the_content(); ?>
          <?php /*
          <h1>CONNECT</h1>
          <p>
            Working closely with clients, we draw from many innovation methodologies - design thinking, trend forecasts,
            strategic planning and future studies - to uncover insights and generate ideas which delight people and
            deliver on business goals.
          </p>
        </div>
        <div class="col-md-4 half-circles bottom">
          <div class="circle"></div>
          <h1>CREATE</h1>
          <p>
            Like a startup, we bring ideas to life from the very start by researching, designing, prototyping, validating
            and iterating to ensure success.
          </p>
        </div>
        <div class="col-md-4 half-circles top">
          <div class="circle"></div>
          <h1>COLLABORATE</h1>
          <p>Using our Connector Network of partners, innovators, influencers and creators, we are able to unleash ideas
            which exceed expectations. </p>
        </div> */ ?>
      </div>
    </div>
  </div>
  <?php /*
    <div class="culture-deck">
      <div class="bg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7" data-aos="fade-right">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/book.png" alt="">
            </div>
            <div class="col-md-3 content" data-aos="fade-left">
              <p>
                  Connector culture deck
                  Connector explores the future for clients by conceiving, prototyping and developing ideas that build brand, grow market […]
              </p>
              <div class="button-culture-deck">
                <a href="/" class="btn btn-gradient">Download now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> */ ?>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
