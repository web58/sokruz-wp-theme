<?php
  if( !( is_current_term( 'Корпусная мебель', 'product_cat' ) || is_parent_query_taxonomy( 'Корпусная мебель', 'product_cat' ) ) ) {
    get_sidebar( 'filters' );
  }
?>

<div class="catalog-products">
  <div class="container">
  <?php if ( woocommerce_product_loop() ) : ?>
    <?php woocommerce_product_loop_start(); ?>

    <?php
        if ( wc_get_loop_prop( 'total' ) ) :
          while ( have_posts() ) :
            the_post();
            wc_get_template_part( 'content', 'product' );
          endwhile;
        endif;
    ?>

    <?php woocommerce_product_loop_end(); ?>
    <?php else: wc_no_products_found(); ?>
  <?php endif; ?>
  </div>
</div>



