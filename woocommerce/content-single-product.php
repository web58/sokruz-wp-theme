<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>
<main>
  <article class="product-content">
    <div class="container">
      <header class="product-content__top">

        <div class="product-images">
          <?php if ($product->get_gallery_image_ids()) : ?>
            <div class="product-images__slider slider">
              <div class="swiper-wrapper slider__wrapper">
                <?php foreach ($product->get_gallery_image_ids() as $id) : ?>
                  <div class="product-images__slide swiper-slide">
                    <a href="<?=wp_get_attachment_image_url( $id, 'full' )?>" data-fslightbox="product-gallery">
                      <img class="swiper-lazy product-images__photo" src="<?=wp_get_attachment_image_url( $id, 'full' )?>" alt="">
                    </a>
                </div>
                <?php endforeach; ?>
              </div>

              <div class="product-images__pagination slider__pagination"></div>
              <div class="product-images__control slider__control">
                <button class="btn-reset product-images__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
                  <svg width="21" height="13" aria-hidden="true">
                    <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-left"></use>
                  </svg>
                </button>
                <button class="btn-reset product-images__next slider__nav-btn" type="button" aria-label="Следующий слайд">
                  <svg width="21" height="13" aria-hidden="true">
                    <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-right"></use>
                  </svg>
                </button>
              </div>
            </div>

            <div class="product-images__thumbs slider" thumbsSlider>
              <div class="swiper-wrapper slider__wrapper">
                <?php foreach ($product->get_gallery_image_ids() as $id) : ?>
                  <div class="swiper-slide product-images__thumb-slide">
                    <img class="swiper-lazy product-images__thumb" src="<?=wp_get_attachment_image_url( $id, 'thumbnail' )?>" alt="">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php else : ?>
            <div class="product-images__slide">
              <img class="swiper-lazy product-images__photo" src="<?=get_image_url_fallback(get_the_post_thumbnail_url());?>" alt="Jgbcfybt">
            </div>
          <?php endif; ?>

          <?php if ( has_term('', 'product_tag') ) : ?>
            <div class="product-images__badges">
              <?php get_template_part('/template-parts/badges');?>
            </div>
          <?php endif; ?>
        </div>

        <div class="product-top-descr">

          <div>
            <h1 class="indent-reset hd hd--h1 product-top-descr__title"><?=$product->get_title() ?></h1>

            <?php if ( product_in_cat($product, 'Матрасы') ) : ?>
              <?php $last_id = array_pop($product->get_category_ids()) ?>
              <p class="indent-reset product-top-descr__category"><?=get_the_category_by_ID( $last_id ); ?></p>
            <?php endif; ?>

            <?php $product_attr = get_field('product_attr'); ?>
            <?php if ($product_attr) : ?>
              <ul class="list-reset product-top-descr__props">
                <?php for ($i=0; $i <= 3; $i++) :?>
                  <?php if ($product_attr[$i]['title'] && $product_attr[$i]['value']): ?>
                    <li><?= $product_attr[$i]['title']; ?>: <span><?= $product_attr[$i]['value']; ?></span></li>
                  <?php endif; ?>
                <?php endfor; ?>
              </ul>
            <?php else: ?>
              <p class="indent-reset product-top-descr__props">Нет описания</p>
            <?php endif; ?>
          </div>

          <p class="indent-reset product-top-descr__price-wrapper">
            <?php if ($product->get_price()) : ?>
              <?php $price_note = get_field('product_price_note'); ?>
              <?php $price_from = get_field('price_from'); ?>
              <span class="hd hd--h1 product-top-descr__price<?php if ($price_note):?> product-top-descr__price-note<?php endif; ?>"><?php if ($price_from):?>от <?php endif; ?><?= $product->get_price() ?> &#8381;</span>
              <?php if ($price_note):?>
                <span><?=$price_note; ?></span>
              <?php endif; ?>
            <?php else: ?>
              <span class="hd hd--h2 product-top-descr__price">Цена не указана</span>
            <?php endif; ?>
          </p>

          <?php if ( product_in_cat($product, 'Матрасы') ) : ?>
            <div class="product-top-descr__link-wrapper">
              <a class="product-top-descr__icon-link" href="/help/calculator/">
                <svg width="44" height="40" aria-hidden="true">
                  <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-mattress"></use>
                </svg>
                <span>Подобрать идеальный матрас</span>
              </a>
            </div>
          <?php else: ?>
            <?php if (get_field('3d_file')): ?>
              <div class="product-top-descr__link-wrapper">
                <a class="product-top-descr__icon-link" href="<?=get_field('3d_file')['url'];?>" download>
                  <svg width="44" height="40" aria-hidden="true">
                    <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-3dmodel"></use>
                  </svg>
                  <span>Скачать 3D-модель</span>
                </a>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </header>

      <div class="product-content__row">
        <div class="product-descr">
          <h2 class="indent-reset hd hd--h3 product-descr__title">Описание</h2>

          <?php if ( get_the_content() ): ?>
            <div class="product-descr__content">
              <?php the_content(); ?>
            </div>
          <?php endif; ?>
          <?php if ($product_attr) : ?>
            <table class="product-descr__table">
              <?php foreach($product_attr as $attr): ?>
              <tr>
                <td><?=$attr['title']?></td>
                <td><?=$attr['value']?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          <?php endif; ?>
          <?php if ( !get_the_content() && !$product_attr ): ?>
            <p>Нет описания</p>
          <?php endif; ?>

          <?php $addition_content = get_field('product_add_content'); ?>
          <?php if ( $addition_content): ?>
            <h3 class="indent-reset hd hd--h4 product-descr__subtitle">Дополнительная информация</h3>
            <div>
              <?=$addition_content; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <?php $flex_content = get_field('product_flex_content'); ?>
      <?php if($flex_content) : ?>
        <div class="product-content__row">
          <?php foreach($flex_content as $flex_block): ?>
            <?php switch ($flex_block['acf_fc_layout']) {
              case 'Слои': ?>
                <?php
                  $title = $flex_block['acf_fc_layout'];
                  $img = $flex_block['layers_img'];
                  $layers = $flex_block['layers_list'];
                ?>
                <div class="product-layers">
                  <h2 class="indent-reset hd hd--h3 product-layers__title"><?=$title;?></h2>
                  <div class="product-layers__content">
                    <?php if($img): ?><img class="product-layers__img" src="<?=$img['url'];?>" width="<?=$img['width'];?>" height="<?=$img['height'];?>" alt="<?=$img['alt'];?>"><?php endif; ?>
                    <?php if ($layers): ?>
                      <ul class="list-reset product-layers__list accordion">
                        <?php foreach($layers as $layer): ?>
                          <li class="accordion__item layer-item">
                            <button class="accordion__control layer-item__title"><?=$layer['layers-term']->name?></button>
                            <div class="accordion__content layer-item__content">
                              <p class="indent-reset">
                                <?=$layer['layers-term']->description?>
                              </p>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </div>
                <? break;

              case 'Габариты': ?>
                <?php
                  $title = $flex_block['acf_fc_layout'];
                  $img = $flex_block['sizes_img'];
                ?>
                <div class="product-descr-item">
                  <h2 class="indent-reset hd hd--h3 product-descr-item__title"><?=$title;?></h2>
                  <div class="product-descr-item__content">
                    <?php if($img): ?><img src="<?=$img['url'];?>" width="<?=$img['width'];?>" height="<?=$img['height'];?>" alt="<?=$img['alt'];?>"><?php endif; ?>
                  </div>
                </div>
                <? break;

              case 'Механизм трансформации': ?>
                <?php
                  $title = $flex_block['acf_fc_layout'];
                  $img = $flex_block['gif_img'];
                ?>
                <div class="product-descr-item">
                  <h2 class="indent-reset hd hd--h3 product-descr-item__title"><?=$title;?></h2>
                  <div class="product-descr-item__content">
                    <?php if($img): ?><img src="<?=$img['url'];?>" width="<?=$img['width'];?>" height="<?=$img['height'];?>" alt="<?=$img['alt'];?>"><?php endif; ?>
                  </div>
                </div>
                <? break;

              case 'Галерея': ?>
                <?php
                  $title = $flex_block['gallery_title'];
                  $gallery = $flex_block['gallery_images'];
                ?>
                <div class="product-descr-item">
                  <?php if($title): ?><h2 class="indent-reset hd hd--h3 product-descr-item__title"><?=$title;?></h2><?php endif; ?>
                  <div class="product-descr-item__content">
                    <?php if($gallery): ?>
                      <ul class="list-reset product-descr-item__gallery" data-gallery>
                        <?php foreach($gallery as $img): ?>
                          <li>
                            <a href="<?=$img['url'];?>" data-fslightbox="gallery-id">
                              <figure class="indent-reset">
                                <img
                                  class="product-descr-item__gallery-img"
                                  src="<?=$img['sizes']['thumbnail'];?>"
                                  width="<?=$img['sizes']['thumbnail-width'];?>"
                                  height="<?=$img['sizes']['thumbnail-height'];?>"
                                  alt="<?=$img['alt'];?>">
                                <figcaption class="small"><?=$img['caption'];?></figcaption>
                              </figure>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </div>
                <? break;
            } ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <footer class="product-content__bottom">
        <div class="product-callback">
          <div>
            <h2 class="indent-reset hd hd--h2 product-callback__title">Есть вопрос?</h2>
            <p class="indent-reset product-callback__descr">Задайте нам вопрос по товару, который вас интересует. Наш менеджер свяжется с вами для консультации.</p>
          </div>
          <button class="btn-reset btn product-callback__btn" data-hystmodal="#ask-question-modal">Задать вопрос</button>
        </div>
      </footer>

    </div>
  </article>

  <?php if ($product->get_upsell_ids()): ?>
    <section class="recomended">

      <header class="recomended__top slider">
        <div class="recomended__top-wrapper container">
          <h2 class="indent-reset hd hd--h1 recomended__title">Рекомендованные товары</h2>
          <div class="recomended__control slider__control">
            <button class="btn-reset recomended__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
              <svg width="21" height="13" aria-hidden="true">
                <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-left"></use>
              </svg>
            </button>
            <button class="btn-reset recomended__next slider__nav-btn" type="button" aria-label="Следующий слайд">
              <svg width="21" height="13" aria-hidden="true">
                <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-right"></use>
              </svg>
            </button>
          </div>
        </div>
      </header>

      <div class="container">
        <div class="recomended__slider slider">
          <ul class="list-reset swiper-wrapper slider__wrapper">
            <?php foreach ($product->get_upsell_ids() as $product_ID) : ?>
              <?php $current_id = $product_ID; ?>
              <?php $current_product = wc_get_product( $current_id ); ?>
              <li class="swiper-slide">
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
            <?php endforeach; ?>
          </ul>
          <div class="recomended__pagination slider__pagination"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>
