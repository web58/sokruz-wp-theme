<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li>
  <div class="product-card">
    <img class="product-card__img" src="<?=get_image_url_fallback(get_the_post_thumbnail_url());?>" alt="<?=$product->get_name();?>">
    <div class="product-card__descr">
      <div class="product-card__head">
        <h3 class="indent-reset hd hd--h4 product-card__title"><?=$product->get_name();?></h3>
        <a class="product-card__link" href="<?=$product->get_permalink();?>">
          <svg class="product-card__link-icon" width="12" height="7" aria-hidden="true">
            <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-right"></use>
          </svg>
          <span class="visually-hidden">Подробнее</span>
        </a>
      </div>

      <?php $product_attr = get_field('product_attr'); ?>
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

      <?php $price_from = get_field('price_from'); ?>
      <?php if ($product->get_price()) : ?>
        <span class="hd hd--h3 product-card__price"><?php if ($price_from):?>от <?php endif; ?><?= $product->get_price() ?> &#8381;</span>
      <?php endif; ?>
    </div>
    <?php if ( has_term('', 'product_tag') ) : ?>
      <div class="product-card__badges">
        <?php get_template_part('/template-parts/badges');?>
      </div>
    <?php endif; ?>
  </div>
</li>
