<?php get_header(); ?>

<main>
  <article>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="news-content">
      <div class="container">
        <?php if ( get_the_post_thumbnail_url() ) : ?><img src="<?=get_the_post_thumbnail_url();?>" alt=""><?php endif; ?>
        <?php the_content(); ?>
        <div class="news-content__nav post-nav">
          <?php
            previous_post_link('%link');
            next_post_link('%link');
          ?>
        </div>
      </div>
    </div>
  </article>

</main>

<?php get_footer(); ?>
