<div class="social-share">
  <span><?php _e('Share this project', 'connector'); ?></span>
  <div class="social-icons">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
      <span class="icon-facebook"></span>
    </a>
    <a href="https://twitter.com/home?status=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank">
      <span class="icon-twitter-icon"></span>
    </a>
    <?php /*
    <a href="/">
      <span class="icon-instagram-icon"></span>
    </a> */ ?>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" target="_blank">
      <span class="icon-linkedin-icon"></span>
    </a>
    <?php /*
    <a href="/">
      <span class="icon-youtube-icon"></span>
    </a> */ ?>
  </div>
</div>
