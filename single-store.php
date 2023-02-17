<?php /* Template Name: Магазин */ ?>
<?php /*  Template Post Type: store */ ?>
<?php get_header(); ?>

<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="store-content">
      <div class="container">
        <?php $store_points = get_field('store_points'); ?>
        <?php if($store_points) : ?>
        <div class="store-content__map store-content__map--loading" id="stores-map" data-store="<?php the_field('coord_store')?>"<?php if(get_field('zoom_map')): ?> data-zoom="<?php the_field('zoom_map'); ?>"><?php endif; ?></div>
          <ol class="list-reset store-content__stores">
            <?php foreach ($store_points as $store) : ?>
              <?php
                $title = $store['title'];
                $point = $store['point'];
                $shedule = $store['shedule'];
                $adress = $store['adress'];
              ?>
              <li class="store-point"<?php if ( ( $title || $adress || $shedule ) && $point ): ?> data-point="<?=$point;?>"<?php endif; ?>>
                <?php if ($title): ?><p class="indent-reset hd hd--h3 store-point__title"><?=$title;?></p><?php endif; ?>
                <?php if ($adress): ?><p class="indent-reset store-point__adress"><?=$adress;?></p><?php endif; ?>
                <?php if ($shedule): ?><p class="indent-reset store-point__shedule"><?=$shedule;?></p><?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>
        <?php else: ?>
          <p>В этом городе пока нет торговых точек</p>
        <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
