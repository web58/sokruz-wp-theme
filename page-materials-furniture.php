<?php get_header(); ?>

<main>
  <section>
    <?php if( isset( $_GET['filter_flooring'] ) ) : ?>
      <?php
        $args = array(
          'post_type' => 'product',
          'tax_query' => array(
            array(
              'taxonomy' => 'pa_flooring',
              'field'    => 'slug',
              'terms'    => $_GET['filter_flooring']
            )
          )
        );
        $query = new WP_Query($args);
      ?>
      <div class="site-title">
        <div class="container">
          <h1 class="indent-reset hd hd--h1">Модели с видом настила <?=get_term_by( 'slug', $_GET['filter_flooring'], 'pa_flooring')->name;?></h1>
        </div>
      </div>

      <div class="catalog-products">
        <div class="container">
          <?php if ($query->have_posts()) : ?>
            <ul class="list-reset catalog-products__list">
            <?php while ( $query->have_posts() ) : $query->the_post()?>
              <li>
                <?php $current_id = $post->ID; ?>
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
                    <?php else: ?>
                      <span class="hd hd--h4 product-card__price">Цена не указана</span>
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
            <?php endwhile; ?>
            <?php  wp_reset_postdata(); ?>
            </ul>
          <?php else : ?>
            <p>Модели с этим видом не добавлены</p>
          <?php endif; ?>
        </div>
      </div>

    <?php else : ?>
      <div class="site-title">
        <div class="container">
          <h1 class="indent-reset hd hd--h1"><?php the_title() ?></h1>
        </div>
      </div>

      <div class="materials-content">
        <div class="container">
          <?php if (get_the_content()): ?><div class="materials-content__descr"><?php the_content() ?></div><?php endif; ?>
          <?php $flooring_types = get_field('flooring_types'); ?>
          <?php if ($flooring_types) : ?>
            <ul class="list-reset materials-content__list">
              <?php foreach ($flooring_types as $type) : ?>
                <li class="materials-item">
                  <p class="indent-reset hd hd--h3 materials-item__title"><?=$type['tax']->name?></p>
                  <div class="materials-item__image">
                    <img
                      src="<?=get_image_url_fallback( $type['image']['sizes']['medium'] );?>"
                      width="<?=$type['image']['sizes']['medium-width'];?>"
                      height="<?=$type['image']['sizes']['medium-height'];?>"
                      alt="<?=$type['image']['alt'];?>">
                  </div>
                  <div class="materials-item__descr">
                    <?=$type['text'];?>
                    <a class="materials-item__link" href="?filter_flooring=<?=$type['tax']->slug?>">Смотреть модели диванов</a>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p>Настилы не добавлены</p>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

  </section>
</main>

<?php get_footer(); ?>
