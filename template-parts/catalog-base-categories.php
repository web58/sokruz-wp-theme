<?php
  $base_categories = get_categories( array(
    'orderby' => 'id',
    'hierarchical' => 1,
    'taxonomy' => 'product_cat',
    'hide_empty' => 0,
    'parent' => 0,
    'exclude' => 15, // Исключил misc
  ) );
 if( $base_categories ) :
?>
  <ul class="list-reset catalog-grid">
    <?php foreach( $base_categories as $cat ) : ?>
      <li class="catalog-grid__card">
        <a class="catalog-grid__link" href="<?=get_category_link( $cat->cat_ID );?>"><span class="visually-hidden">Подробнее</span></a>
        <p class="indent-reset hd hd--h1 catalog-grid__category"><span><?=$cat->name;?></span></p>
        <?php
          $image_id = get_term_meta( $cat->cat_ID, 'thumbnail_id', 1 );
          $image_url = wp_get_attachment_image_url( $image_id, 'full' );
        ?>
        <img
          class="catalog-grid__image"
          src="<?=get_image_url_fallback($image_url);?>"
          alt="">
      </li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <p>Нет категорий</p>
<?php endif; ?>
