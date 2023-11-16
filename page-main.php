<?php /* Template Name: Главная страница */ ?>
<?php get_header(); ?>

<main>
  <section class="hero-slider slider">
    <h1 class="visually-hidden"><?php bloginfo( 'name' ); ?></h1>
    <?php $hero_slider = get_field('hero_slider'); ?>
    <?php if ($hero_slider) : ?>
      <?php if(count($hero_slider) > 1) : ?>
        <div class="swiper-wrapper slider__wrapper">
          <?php foreach($hero_slider as $slide): ?>
            <div class="swiper-slide hero-slide">
            <img
              class="hero-slide__img"
              src="<?php if( $slide['img'] ): ?><?=$slide['img'];?><?php else: ?><?=THEME_PATH?>/img/hero-slide.jpg<?php endif; ?>"
              alt=""
              aria-hidden="true">
              <div class="hero-slide__description">
                <div class="container">
                  <p class="indent-reset hero-slide__slogan">
                    <?php if( $slide['title_small'] ): ?><span class="hd hd--h2"><?=$slide['title_small'];?></span><?php endif; ?>
                    <?php if( $slide['title_big'] ): ?><span class="hd hero-slide__slogan-lead"><?=$slide['title_big'];?></span><?php endif; ?>
                  </p>
                  <?php if( $slide['descr'] ): ?><p class="indent-reset hero-slide__text"><?=$slide['descr'];?></p><?php endif; ?>
                  <?php if( $slide['link'] ): ?><a class="btn" href="<?=$slide['link']['url'];?>" <?php if( $slide['link']['target'] ) : ?>target="_blank" rel="nofollow noreferer noopener"<?php endif; ?>><?=$slide['link']['title'];?></a><?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="container hero-slider__control slider__control">
          <button class="btn-reset hero-slider__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
            <svg width="21" height="13" aria-hidden="true">
              <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
            </svg>
          </button>
          <button class="btn-reset hero-slider__next slider__nav-btn" type="button" aria-label="Следующий слайд">
            <svg width="21" height="13" aria-hidden="true">
              <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
            </svg>
          </button>
        </div>
        <div class="container hero-slider__pagination slider__pagination"></div>
      <?php else: ?>
        <?php $slide = $hero_slider[0] ?>
        <div class="hero-slide">
          <img
            class="hero-slide__img"
            src="<?php if( $slide['img'] ): ?><?=$slide['img'];?><?php else: ?><?=THEME_PATH?>/img/hero-slide.jpg<?php endif; ?>"
            alt=""
            aria-hidden="true">
          <div class="hero-slide__description">
            <div class="container">
              <p class="indent-reset hero-slide__slogan">
                <?php if( $slide['title_small'] ): ?><span class="hd hd--h2"><?=$slide['title_small'];?></span><?php endif; ?>
                <?php if( $slide['title_big'] ): ?><span class="hd hero-slide__slogan-lead"><?=$slide['title_big'];?></span><?php endif; ?>
              </p>
              <?php if( $slide['descr'] ): ?><p class="indent-reset hero-slide__text"><?=$slide['descr'];?></p><?php endif; ?>
              <?php if( $slide['link'] ): ?><a class="btn" href="<?=$slide['link']['url'];?>" <?php if( $slide['link']['target'] ) : ?>target="_blank" rel="nofollow noreferer noopener"<?php endif; ?>><?=$slide['link']['title'];?></a><?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="hero-slide">
        <img class="hero-slide__img" src="<?=THEME_PATH?>/img/hero-slide.jpg" alt="" aria-hidden="true">
        <div class="hero-slide__description">
          <div class="container">
            <p class="indent-reset hero-slide__slogan">
              <span class="hd hero-slide__slogan-lead"><?php bloginfo( 'name' ); ?></span>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </section>

  <?php $action_products = get_field('action_products'); ?>
  <?php if($action_products): ?>
    <section class="action-products">
      <header class="action-products__top slider">
        <div class="action-products__top-wrapper container">
          <h2 class="indent-reset hd hd--h1 action-products__title">Товары по акции</h2>
            <div class="action-products__control slider__control">
              <button class="btn-reset action-products__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
                <svg width="21" height="13" aria-hidden="true">
                  <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
                </svg>
              </button>
              <button class="btn-reset action-products__next slider__nav-btn" type="button" aria-label="Следующий слайд">
                <svg width="21" height="13" aria-hidden="true">
                  <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
                </svg>
              </button>
            </div>
          </div>
        </header>

        <div class="container">
          <div class="action-products__slider slider">
            <ul class="list-reset swiper-wrapper slider__wrapper">
              <?php foreach($action_products as $item): ?>
                <li class="swiper-slide">
                  <?php $current_id = $item['product_ID']; ?>
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
              <?php endforeach; ?>
            </ul>
          <div class="action-products__pagination slider__pagination"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="m-catalog">
    <header class="m-catalog__top">
      <div class="container">
        <h2 class="indent-reset hd hd--h1 m-catalog__title">Каталог продукции</h2>
      </div>
    </header>
    <div class="container">
      <?php get_template_part('/template-parts/catalog-base-categories'); ?>
    </div>
  </section>

  <?php $about_slider = get_field('about_slider') ?>
  <?php if($about_slider): ?>
    <section class="m-about">
      <div class="m-about__slider slider m-about__container">
        <div class="swiper-wrapper slider__wrapper">
          <?php foreach($about_slider as $slide): ?>
            <div class="swiper-slide m-about__slide">
              <img class="m-about__slide-img" src="<?=$slide['url']?>" alt="<?=$slide['alt']?>" aria-hidden="true">
            </div>
          <?php endforeach; ?>
        </div>
        <div class="m-about__slider-nav m-about__container">
          <div class="small m-about__slider-pagination"></div>
          <div class="m-about__slider-controls">
            <button class="btn-reset m-about__prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
              <svg width="21" height="13" aria-hidden="true">
                <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
              </svg>
            </button>
            <button class="btn-reset m-about__next slider__nav-btn" type="button" aria-label="Следующий слайд">
              <svg width="21" height="13" aria-hidden="true">
                <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="m-about__info about-info">
        <div class="about-info__top">
          <h2 class="indent-reset hd hd--h1 about-info__title m-about__container">О фабрике</h2>
        </div>
        <div class="about-info__descr m-about__container">
          <?php the_field('about_text'); ?>
          <p class="hd hd--h3 about-info__tagline">Уверены, каждый найдет здесь ту самую мебель, о которой мечтал</p>
          <a class="btn btn--light" href="/about">Узнать больше</a>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php  ?>
  <section class="customers">
    <div class="container">
      <div class="decor-block">
        <img class="decor-block__img" src="<?=THEME_PATH?>/img/decor-img.jpg" alt="" aria-hidden="true">
        <div class="decor-block__content">
          <h2 class="indent-reset hd hd--h1 decor-block__title">Вы розничный покупатель?</h2>
          <div class="decor-block__text">
            <p>Переходите в интернет-магазин Сокруз-Онлайн – там вы ознакомитесь с модельным рядом и сможете подобрать подходящую модель в свой интерьер.</p>
          </div>
          <a class="btn decor-block__link" href="<?=ONLINE_STORE_LINK;?>" target="_blank" rel="nofollow noreferer noopener">Перейти в магазин</a>
        </div>
      </div>
    </div>
  </section>

  <?php $popular_products = get_field('popular_products'); ?>
  <?php $novelties_products = get_field('novelties_products'); ?>

  <?php if ($popular_products || $novelties_products) : ?>
    <section class="tabs-products">
      <h2 class="visually-hidden">Рекомендуемые товары</h2>
      <div class="slider" data-tabs="product-tabs">

        <header class="tabs-products__top">
          <div class="tabs-products__top-wrapper container">

            <ul class="list-reset tabs-products__titles" data-tabs="nav">
              <?php if ($popular_products) : ?><li><button class="btn-reset hd hd--h1 tabs-products__title" type="button" data-tabs="btn">Популярные товары</button></li><?php endif; ?>
              <?php if ($novelties_products) : ?><li><button class="btn-reset hd hd--h1 tabs-products__title" type="button" data-tabs="btn">Новинки</button></li><?php endif; ?>
            </ul>

            <div class="slider__control">
              <?php if ($popular_products) : ?>
                <div class="tabs-products__slider-control">
                  <button class="btn-reset tabs-products__popular-prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
                    <svg width="21" height="13" aria-hidden="true">
                      <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
                    </svg>
                  </button>
                  <button class="btn-reset tabs-products__popular-next slider__nav-btn" type="button" aria-label="Следующий слайд">
                    <svg width="21" height="13" aria-hidden="true">
                      <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
                    </svg>
                  </button>
                </div>
              <?php endif; ?>
              <?php if ($novelties_products) : ?>
                <div class="tabs-products__slider-control">
                  <button class="btn-reset tabs-products__novelties-prev slider__nav-btn" type="button" aria-label="Предыдущий слайд">
                    <svg width="21" height="13" aria-hidden="true">
                      <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
                    </svg>
                  </button>
                  <button class="btn-reset tabs-products__novelties-next slider__nav-btn" type="button" aria-label="Следующий слайд">
                    <svg width="21" height="13" aria-hidden="true">
                      <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
                    </svg>
                  </button>
                </div>
              <?php endif; ?>
            </div>

          </div>
        </header>

        <div class="container">
          <?php if ($popular_products) : ?>
            <div data-tabs="panel">
              <div class="tabs-products__slider tabs-products__popular slider">
                <ul class="list-reset swiper-wrapper slider__wrapper">
                <?php foreach($popular_products as $item): ?>
                  <li class="swiper-slide">
                    <?php $current_id = $item['product_ID']; ?>
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
                <?php endforeach; ?>
                </ul>
                <div class="tabs-products__pagination tabs-products__popular-bullets slider__pagination"></div>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($novelties_products) : ?>
            <div data-tabs="panel">
              <div class="tabs-products__slider tabs-products__novelties slider">
                <ul class="list-reset swiper-wrapper slider__wrapper">
                  <?php foreach($novelties_products as $item): ?>
                    <li class="swiper-slide">
                      <?php $current_id = $item['product_ID']; ?>
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
                  <?php endforeach; ?>
                </ul>
                <div class="tabs-products__pagination tabs-products__novelties-bullets slider__pagination"></div>
              </div>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

  <section class="m-news">
    <header class="m-news__top">
      <div class="m-news__top-wrapper container">
        <h2 class="indent-reset hd hd--h1 m-news__title">Новости</h2>
        <a class="m-news__link" href="/about/news">Все новости</a>
      </div>
    </header>
    <?php
      $news_post = get_posts( array(
        'numberposts' => 4,
        'post_type' => 'news',
        'order' => 'DESC',
        'orderby' => 'date',
      ) );
    ?>
    <div class="container">
      <?php if ($news_post) : ?>
      <?php global $post; ?>
        <ul class="list-reset m-news__grid">
          <?php foreach ($news_post as $post) : ?>
          <?php setup_postdata( $post ); ?>
            <li>
              <article class="news-card">
                <img class="news-card__poster" src="<?=get_image_url_fallback( get_the_post_thumbnail_url() );?>" alt="">
                <div class="news-card__meta">
                  <time class="news-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('d.m.Y'); ?></time>
                  <h3 class="indent-reset hd hd--h4 news-card__title"><?php the_title(); ?></h3>
                  <div class="news-card__excerpt">
                    <?php if (get_the_excerpt()) : ?>
                      <?php the_excerpt(); ?>
                      <?php else: ?>
                        <p>Нет отписания</p>
                      <?php endif; ?>
                  </div>
                  <a class="news-card__link" href="<?php the_permalink(); ?>">Подробнее</a>
                </div>
              </article>
            </li>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p>Нет новостей</p>
      <?php endif; ?>
    </div>
  </section>

  <section class="partnership">
    <div class="container">
      <div class="decor-block decor-block--second">
        <img class="decor-block__img" src="<?=THEME_PATH?>/img/decor-img-2.jpg" alt="" aria-hidden="true">
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

  <section class="m-help">
    <header class="m-help__top">
      <div class="m-help__top-wrapper container">
        <h2 class="indent-reset hd hd--h1">Полезная информация</h2>
      </div>
    </header>
    <div class="container">
      <ol class="list-reset m-help__grid">
        <li class="m-help__grid-item help-item">
          <?php get_template_part('/template-parts/help-contents/help','waranty'); ?>
        </li>
        <li class="m-help__grid-item help-item">
          <?php get_template_part('/template-parts/help-contents/help','how'); ?>
        </li>
        <li class="m-help__grid-item help-item">
          <?php get_template_part('/template-parts/help-contents/help','care'); ?>
        </li>
        <?php if(COMPANY_CATALOGS):?>
        <li class="m-help__grid-item help-item">
          <?php get_template_part('/template-parts/help-contents/help','downloads'); ?>
        </li>
        <?php endif; ?>
      </ol>
    </div>
  </section>

  <section class="m-contacts">
    <div class="m-contacts__map" id="company-map"></div>
    <div class="container">
      <div class="m-contacts__wrapper">
        <h2 class="indent-reset hd hd--h1 m-contacts__title">Контакты</h2>
        <ul class="list-reset m-contacts__list">
          <li class="contacts-item">
            <span class="small contacts-item__title">Бесплатная горячая линия</span>
            <p class="indent-reset contacts-item__phone contacts-item__phone--big"><?=get_phone(get_field('main_phone', 'options'));?></p>
          </li>
          <li class="contacts-item">
            <span class="small contacts-item__title">Адрес</span>
            <?=get_adress( get_field('main_adress', 'options'), 'indent-reset contacts-item__adress' );?>
            <p class="indent-reset contacts-item__shedule">
              <span class="small contacts-item__shedule-days"><?=get_field('shedule_days', 'options');?></span>
              <span><?=get_field('shedule_time', 'options');?></span>
            </p>
          </li>
          <li class="contacts-item">
            <span class="small contacts-item__title">E-mail</span>
            <p class="indent-reset contacts-item__email"><?=get_email(get_field('main_email', 'options'));?></p>
          </li>
          <li class="contacts-item">
            <?php get_template_part('/template-parts/messengers'); ?>
          </li>
          <li class="contacts-item">
            <button class="btn-reset btn" type="button" data-hystmodal="#callback-modal">Заказать звонок</button>
          </li>
        </ul>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
