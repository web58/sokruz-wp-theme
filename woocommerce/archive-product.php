<?php
  defined( 'ABSPATH' ) || exit;
  get_header();
?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1">Каталог</h1>
      </div>
    </div>
    <div class="catalog">
      <div class="container">
        <?php get_template_part('/template-parts/catalog-base-categories'); ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
