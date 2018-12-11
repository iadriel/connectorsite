<?php get_header(); ?>
<section>
  <div class="hero hero-resources">
    <div>
      <div class="content">
        <h3><?php _e('CONNECTOR', 'connector'); echo get_field('division', 'option'); ?></h3>
        <h1><?php _e('resources', 'connector'); ?></h1>
      </div>
    </div>
  </div>
  <div class="studio-resources">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header menu-category">
            <?php foreach(get_terms(['taxonomy' => 'resources_category']) as $term) {
              echo('<button class="btn-invisible" data-filter="'.$term->slug.'">'.$term->name.'</button>');
            } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 grid">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="card grid-item half influencers">
            <a href="<?php the_field('download_link'); ?>" class="no-barba modal-open">
              <div class="card-header" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')"></div>
              <div class="card-body">
                <h5><?php the_title(); ?></h5>
                <div class="card-footer">
                  <?php the_content(); ?>
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-download.png" alt="<?php the_title(); ?>">
                </div>
              </div>
            </a>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal micromodal-slide" id="modal" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
              <button class="btn-invisible close-icon" data-micromodal-close>
                      <span class="icon-sidemenu-close"></span>
              </button>
              <div class="modal__content" id="modal-1-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                  <form id="mc-embedded-subscribe-form" class="validate" action="" method="post" name="mc-embedded-subscribe-form"
                      novalidate="" target="_blank" _lpchecked="1">
                      <div class="mc-field-group">
                              <label for="mce-FNAME">First Name <span class="asterisk">*</span><br></label><br>
                              <input placeholder="name" id="mce-FNAME" class="required" name="FNAME" type="text" value="">
                          </div>
                      <div class="mc-field-group">
                          <label for="mce-EMAIL">Email Address <span class="asterisk">*</span><br></label><br>
                          <input placeholder="email" id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="">
                      </div>
                      <div id="mce-responses" class="clear"></div>
                      <div class="clear"><input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit"
                              value="Subscribe"></div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
<?php get_footer(); ?>
