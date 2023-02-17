<?php /* Template Name: Рекомендации по уходу */ ?>
<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title() ?></h1>
      </div>
    </div>
    <div class="materials-content">
      <div class="container">
        <?php if (get_the_content()): ?><div class="materials-content__descr"><?php the_content() ?></div><?php endif; ?>
        <?php $material_types = get_field('material_types'); ?>
        <?php if ($material_types) : ?>
          <ul class="list-reset materials-content__list">
            <?php foreach ($material_types as $type) : ?>
              <li class="materials-item">
                <p class="indent-reset hd hd--h3 materials-item__title"><?=$type['title']?></p>
                <div class="materials-item__image">
                  <img
                    src="<?=get_image_url_fallback( $type['image']['url'] );?>"
                    width="<?=$type['image']['width'];?>"
                    height="<?=$type['image']['height'];?>"
                    alt="<?=$type['image']['alt'];?>">
                </div>
                <div class="materials-item__descr">
                  <?=$type['text'];?>
                </div>
                <div class="materials-item__accordion materials-accordion accordion" data-accordion>
                  <div class="materials-accordion__item accordion__item">
                    <button class="btn-reset hd hd--h3 materials-accordion__btn accordion__control">Уход за тканью</button>
                    <div class="materials-accordion__content accordion__content">
                      <div class="materials-accordion__content-wrapper">
                        <?=$type['care'];?>
                      </div>
                    </div>
                  </div>
                  <div class="materials-accordion__item accordion__item">
                    <button class="btn-reset hd hd--h3 materials-accordion__btn accordion__control">Устранение пятен</button>
                    <div class="materials-accordion__content accordion__content">
                      <div class="materials-accordion__content-wrapper">
                        <?=$type['clean'];?>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
