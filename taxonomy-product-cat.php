<?php get_header(); ?>

<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php single_term_title(); ?></h1>
      </div>
    </div>

    <?php
      $subcategory_ids = get_term_children( get_queried_object()->term_id, 'product_cat' );
      if( $subcategory_ids ) :
        get_template_part('/template-parts/products', 'categories');
      else :
        get_template_part('/template-parts/products', 'list');
      endif;
    ?>

  </section>

</main>

<?php get_footer(); ?>
