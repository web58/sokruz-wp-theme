
<?php $countries = get_field('countries' ); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title() ?></h1>
      </div>
    </div>
    <div class="store-cat">
      <div class="container">
        <?php if ($countries) : ?>
          <ul class="list-reset">
            <?php foreach($countries as $country): ?>
              <?php $type = $country['acf_fc_layout']; ?>
              <?php $title = $country['title']; ?>
              <?php $regions = $country['region']; ?>
              <?php $cols = $country['cities_cols']; ?>
              <li class="store-cat__country<?php if (!$cols) :?> store-cat__country--no-coll<?php endif; ?>">
                <h2 class="indent-reset hd hd--h2 store-cat__country-name"><?=$title?></h2>
                <?php if ($regions) :?>
                  <?php foreach($regions as $region): ?>
                    <?php $title = $region['title']; ?>
                    <?php $cities = $region['cities']; ?>
                    <?php if ($title) :?><h3 class="indent-reset hd hd--h4 store-cat__region"><?=$title;?></h3><?php endif; ?>
                    <?php if ($cities) :?>
                      <ul class="list-reset store-cat__cities">
                        <?php foreach($cities as $city): ?>
                          <li><a href="<?= get_the_permalink( $city['obj_post']->ID )?>"><?=$city['title']?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Города не добавлены</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
