<?php /* Template Name: Распродажа */ ?>
<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="container">
      <?php get_template_part('/template-parts/sale-products'); ?>
    </div>
  </section>

</main>
<?php get_footer(); ?>
