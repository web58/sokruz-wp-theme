<?php get_header();?>
<?php
  global $wp_query;
  query_posts(
    array_merge(
      $wp_query->query,
      array('post_type'=>'product', 'posts_per_page' => -1),
      )
    );
    $count_results = $wp_query->post_count;
?>

<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1">Поиск</h1>
      </div>
    </div>
    <div class="search-content">
      <div class="container">
        <div class="search-content__searchbar">
          <?php get_search_form(); ?>
        </div>
        <?php if ( have_posts() ) : ?>
          <p class="indent-reset search-content__result-text">По Вашему запросу <?php echo decline_word($count_results, array('найден', 'найдено', 'найдено')); ?> <?php echo $count_results .' '.decline_word($count_results, array('товар', 'товара', 'товаров')); ?></p>
          <ul class="list-reset search-content__found-list">
            <?php while ( have_posts() ) : the_post(); ?>
            <li>
                <?php $current_product = wc_get_product( $post->ID ) ?>
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
            <?php  wp_reset_query(); ?>
          </ul>
        <?php	else : ?>
          <p class="indent-reset search-content__result-text">По вашему запросу ничего не найдено.</p>
        <?php endif; ?>
        <div class="search-content__callback">
          <div class="decor-block">
            <img class="decor-block__img" src="<?=THEME_PATH?>/img/decor-img.jpg" alt="" aria-hidden="true">
            <div class="decor-block__content">
              <h2 class="indent-reset hd hd--h1 decor-block__title">Не нашли, что искали?</h2>
              <div class="decor-block__text">
                <p>Задайте нам вопрос по товару, который вас интересует. Пришлем ответ в течение 5 рабочих дней на электронную почту.</p>
              </div>
              <button class="btn-reset btn decor-block__link" type="button" data-hystmodal="#ask-question-modal">Задать вопрос</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
