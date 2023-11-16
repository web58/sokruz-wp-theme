<div class="catalog-products">
  <?php $sale_products = get_field('sale_products', get_page_by_path('sale', '', 'page')->ID); ?>
  <?php if ($sale_products) : ?>
    <ul class="list-reset catalog-products__list">
      <?php foreach($sale_products as $item) : ?>
        <li>
          <?php $current_id = $item['ID']; ?>
          <?php $current_product = wc_get_product( $current_id ); ?>
            <div class="product-card">
              <img class="product-card__img" src="<?=get_image_url_fallback(get_the_post_thumbnail_url($current_id));?>" alt="<?=$current_product->get_name();?>">
              <div class="product-card__descr">
                <div class="product-card__head">
                  <h3 class="indent-reset hd hd--h4 product-card__title"><?=$current_product->get_name();?></h3>
                  <a class="product-card__link" href="<?=$current_product->get_permalink();?>">
                    <svg class="product-card__link-icon" width="12" height="7" aria-hidden="true">
                      <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-right"></use>
                    </svg>
                    <span class="visually-hidden">Подробнее</span>
                  </a>
                </div>
                <?php $product_attr = get_field('product_attr', $current_id); ?>
                <?php if ($product_attr) : ?>
                  <ul class="list-reset small product-card__attr">
                    <?php for ($i=0; $i <= 2; $i++) :?>
                      <?php if ($product_attr[$i]['title'] && $product_attr[$i]['value']): ?>
                        <li><?= $product_attr[$i]['title']; ?>: <?= $product_attr[$i]['value']; ?></li>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </ul>
                <?php else: ?>
                  <span class="small product-card__attr">Нет описания</span>
                <?php endif; ?>

                <?php $price_from = get_field('price_from', $current_id); ?>
                <?php if ($current_product->get_price()) : ?>
                  <span class="hd hd--h3 product-card__price"><?php if ($price_from):?>от <?php endif; ?><?= $current_product->get_price() ?> &#8381;</span>
                <?php endif; ?>
              </div>
              <div class="product-card__badges">
                <?php if ( has_term('new', 'product_tag', $current_id) ) : ?><div class="badge badge--new"><span class="visually-hidden">Новинка</span></div> <?php endif; ?>
                <?php if ( has_term('sale', 'product_tag', $current_id) ) : ?><div class="badge badge--sale"><span class="visually-hidden">Распродажа</span></div><?php endif; ?>
                <?php if ( has_term('hit', 'product_tag', $current_id) ) : ?><div class="badge badge--hit"><span class="visually-hidden">Хит Продаж</span></div><?php endif; ?>
                <?php if ( has_term('double-side', 'product_tag', $current_id) ) : ?><div class="badge badge--double-side"><span class="visually-hidden">Двусторонний матрас</span></div><?php endif; ?>
                <?php if ( has_term('win-sum', 'product_tag', $current_id) ) : ?><div class="badge badge--win-sum"><span class="visually-hidden">Зима-Лето</span></div><?php endif; ?>
                <?php if ( has_term('complect', 'product_tag', $current_id) ) : ?><div class="badge badge--complect"><span class="visually-hidden">Комплект с креслом</span></div><?php endif; ?>
              </div>
            </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else : ?>
    <p>Нет товаров, участвующих в распродаже</p>
  <?php endif; ?>
</div>
