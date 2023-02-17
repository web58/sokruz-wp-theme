<?php get_header(); ?>

<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="site-page">
      <div class="container">
        <div class="site-page__content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
