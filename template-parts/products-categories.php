<div class="catalog">
  <div class="container">
    <ul class="list-reset catalog-cat-grid">
      <?php foreach(get_term_children( get_queried_object()->term_id, 'product_cat' ) as $id ):?>
        <li class="catalog-cat-grid__card">
          <?php $subcat = get_term_by( 'id', $id, 'product_cat' ); ?>
          <a class="catalog-cat-grid__link" href="<?=get_term_link( $subcat );?>"><span class="visually-hidden">Подробнее</span></a>
          <div class="catalog-cat-grid__meta">
            <div class="catalog-cat-grid__meta-wrapper">
              <p class="indent-reset hd hd--h3 catalog-cat-grid__category"><?=$subcat->name;?></p>
              <div class="catalog-cat-grid__descr">
                <p><?=$subcat->description;?></p>
              </div>
            </div>
          </div>
          <?php
            $image_id = get_term_meta( $subcat->term_taxonomy_id, 'thumbnail_id', 1 );
            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
          ?>
          <img
            class="catalog-cat-grid__image"
            src="<?=get_image_url_fallback($image_url);?>"
            alt="">
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
