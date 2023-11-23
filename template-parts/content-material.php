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
        <?php $material_mattress = get_field('material_mattress'); ?>
        <?php if ($material_mattress) : ?>
          <ul class="list-reset materials-content__list">
            <?php foreach ($material_mattress as $material) : ?>
              <li class="materials-item">
                <p class="indent-reset hd hd--h3 materials-item__title"><?=$material['title']?></p>
                <div class="materials-item__image">
                  <img
                    src="<?=get_image_url_fallback( $material['image']['sizes']['medium'] );?>"
                    width="<?=$material['image']['sizes']['medium-width'];?>"
                    height="<?=$material['image']['sizes']['medium-height'];?>"
                    alt="<?=$material['image']['alt'];?>">
                </div>
                <div class="materials-item__descr">
                  <?=$material['text'];?>
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
