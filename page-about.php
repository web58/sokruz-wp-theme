<?php /* Template Name: О компании */ ?>
<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="about-top">
      <div class="container about-top__wrapper<?php if (get_field('reverse_about_top')): ?> about-top__wrapper--reverse<?php endif; ?>">
        <?php $about_top_slider = get_field('about_top_slider'); ?>
        <?php if ($about_top_slider) : ?>
          <div class="about-top-slider slider">
            <div class="swiper-wrapper slider__wrapper">
              <?php foreach($about_top_slider as $slide): ?>
                <div class="swiper-slide">
                  <div class="about-top-slider__slide">
                    <img src="<?=$slide['url'];?>" alt="<?=$slide['alt'];?>">
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="about-top-slider__control slider__control">
              <button class="btn-reset about-top-slider__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
                <svg width="21" height="13" aria-hidden="true">
                  <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-left"></use>
                </svg>
              </button>
              <button class="btn-reset about-top-slider__next slider__nav-btn" type="button" aria-label="Следующий слайд">
                <svg width="21" height="13" aria-hidden="true">
                  <use xlink:href="<?=THEME_PATH;?>/img/sprite.svg#icon-arr-right"></use>
                </svg>
              </button>
            </div>
            <div class="about-top-slider__pagination slider__pagination"></div>
          </div>
        <?php endif; ?>

        <div class="about-descr">
          <?php
            $title_tagline = get_field('title_tagline');
            $descr_text = get_field('descr_text');
          ?>
          <?php if ($title_tagline): ?><p class="indent-reset hd hd--h3 about-descr__tagline"><?=$title_tagline;?></p><?php endif; ?>
          <?php if ($descr_text): ?><div class="about-descr__text"><?=$descr_text;?></div><?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="about-advantages">
    <h2 class="visually-hidden">Наши преимущества</h2>
    <div class="container">
    <?php $about_advantages = get_field('about_advantages'); ?>
      <?php if($about_advantages) : ?>
        <ul class="list-reset about-advantages__list">
          <?php foreach ($about_advantages as $item) : ?>
            <?php
            $icon = $item['icon']['sizes']['thumbnail'];
            $title = $item['title'];
            $text = $item['text'];
            ?>
            <li class="about-advantages-item">
              <?php if ($icon) :?><img class="about-advantages-item__icon" src="<?=$icon?>" width="60" height="60" alt="" aria-hidden="true"><?php endif; ?>
              <?php if ($title) :?><h3 class="indent-reset hd hd--h2 about-advantages-item__title"><?=$title?></h3><?php endif; ?>
              <?php if ($text) :?><div class="about-advantages-item__text"><?=$text?></div><?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <p class="indent-reset about-advantages__resume-text">В этом разделе Вы можете самостоятельно получить оптовый прайс-лист на нашу продукцию, пройдя регистрацию для партнеров.</p>
      <div class="decor-block decor-block--second">
        <img class="decor-block__img" src="<?=THEME_PATH;?>/img/decor-img-2.jpg" alt="" aria-hidden="true">
        <div class="decor-block__content decor-block__content--second">
          <h2 class="indent-reset hd hd--h1 decor-block__title">Приглашаем к сотрудничеству</h2>
          <div class="decor-block__text">
            <p>Вы – владелец оптового магазина или розничной точки? Приглашаем вас к сотрудничеству с фабрикой Сокруз! Предоставляем скидки постоянным партнерам, отправляем рекламные материалы для выставочного зала.</p>
          </div>
          <a class="btn decor-block__link" href="/partnership">Начать сотрудничество</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
