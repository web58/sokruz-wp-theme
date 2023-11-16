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
        <?php $transform_types = get_field('transform_types'); ?>
        <?php if ($transform_types) : ?>
          <ul class="list-reset materials-content__list">
            <?php foreach ($transform_types as $type) : ?>
              <li class="materials-item">
                <p class="indent-reset hd hd--h3 materials-item__title"><?=$type['title']?></p>
                <div class="materials-item__image<?php if ($type['image'] && $type['image_gif']) : ?> materials-item__transform<?php endif; ?>">
                  <?php if ($type['image'] && $type['image_gif']) : ?>
                    <img
                      src="<?=$type['image']['url'];?>"
                      alt="<?=$type['image']['alt'];?>">
                    <img
                      src="<?=$type['image_gif']['url'];?>"
                      alt="<?=$type['image']['alt'];?>">
                    <?php else: ?>
                      <img
                        src="<?=get_image_url_fallback( $type['image']['url'] );?>"
                        alt="<?=$type['image']['alt'];?>">
                  <?php endif; ?>
                </div>
                <div class="materials-item__descr">
                  <?=$type['text'];?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Материалы не добавлены</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
