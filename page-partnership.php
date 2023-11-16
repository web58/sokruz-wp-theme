<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="partnership-top">
      <div class="container">
        <?php if ( get_the_post_thumbnail_url() ) : ?><img class="partnership-top__img" src="<?=get_the_post_thumbnail_url();?>" alt=""><?php endif; ?>
        <div class="partnership-top__descr">
          <p class="indent-reset hd hd--h3 partnership-top__tagline">Фабрика мягкой мебели «СОКРУЗ» рада предложить Вам мягкую мебель оптом по сниженным ценам!</p>
          <div class="partnership-top__text">
            <p>Для постоянных клиентов предусмотрена гибкая система скидок.</p>
            <p>Своим партнерам фабрика мягкой мебели «СОКРУЗ» предоставляет: необходимую информацию по производству продукции, коллекцию образцов обивочного материала, образцы декора, рекламную продукцию.</p>
          </div>
        </div>
        <div class="decor-block decor-block--second">
          <img class="decor-block__img" src="<?=THEME_PATH?>/img/decor-img-2.jpg" alt="" aria-hidden="true">
          <div class="decor-block__content decor-block__content--second">
            <p class="indent-reset hd hd--h4 decor-block__title">На все вопросы, связанные с приобретением мебели оптом, Вам ответит менеджер отдела оптовых продаж по телефону:</p>
            <?=get_phone(get_field('main_phone', 'options'), 'hd hd--h1 decor-block__phone')?>
          </div>
        </div>
        <p class="indent-reset partnership-top__resume-text">В этом разделе Вы можете самостоятельно получить оптовый прайс-лист на нашу продукцию, пройдя регистрацию для партнеров.</p>
      </div>
    </div>
  </section>

  <section class="partnership-steps">
    <header class="partnership-steps__top">
      <div class="container">
        <h2 class="indent-reset hs hd--h2 partnership-steps__title">Как стать партнером?</h2>
      </div>
    </header>
    <div class="partnership-steps__content">
      <div class="container">
        <ol class="list-reset partnership-steps__list">
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Заполните форму клиента</p>
            <p class="indent-reset">Укажите данные своей организации, а также ОГРН или Устав</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Дождитесь обратного звонка</p>
            <p class="indent-reset">После проверки документов с вами свяжется ответственный менеджер. В сотрудничестве может быть отказано, если на данном адресе уже присутствует торговая точка с нашим оптовиком</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Заключение договора</p>
            <p class="indent-reset">Мы вышлем вам на почту договор, коммерческое предложение и прайс-лист</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Оформление заказа</p>
            <p class="indent-reset">После обсуждения всех деталей (обивка, настил и пр.) оформляем заказ на фирменном бланке.</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Предоплата</p>
            <p class="indent-reset">После расчета стоимости заказа вы вносите предоплату, которая оговаривается заранее.</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Изготовление</p>
            <p class="indent-reset">В среднем выполнение заказа занимает 30 рабочих дней. Мы ручаемся за качество наших изделий и внимательно подходим к каждой детали.</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Доплата</p>
            <p class="indent-reset">По факту готовности заказа вы вносите оставшуюся сумму для оплаты</p>
          </li>
          <li class="partnership-step-item">
            <p class="indent-reset hd hd--h2 partnership-step-item__title">Отгрузка</p>
            <p class="indent-reset">После полного расчета мы отправляем ваш заказ. Можем оказать содействие в вопросе логистики</p>
          </li>
        </ol>
        <div class="partnership-steps__modal-btn">
          <button class="btn-reset btn" type="button" data-hystmodal="#make-partnership-modal">Стать партнером</button>
        </div>
      </div>
    </div>
  </section>

  <section class="partnership-info">
    <h2 class="visually-hidden">Полезная информация</h2>
    <div class="container">
      <ul class="list-reset partnership-info__list">
        <li class="partnership-info__item">
          <img class="partnership-info__img" src="<?=THEME_PATH?>/img/partnership/catalog-cab.jpg" alt="" aria-hidden="true">
          <a class="hd hd--h3 partnership-info__link partnership-info__link--arrow" href="<?=CATALOG_FURNITURE_CAB_LINK ? CATALOG_FURNITURE_CAB_LINK : '#'; ?>" download>Каталог корпусной мебели</a>
        </li>
        <li class="partnership-info__item">
          <img class="partnership-info__img" src="<?=THEME_PATH?>/img/partnership/catalog-mattress.jpg" alt="" aria-hidden="true">
          <a class="hd hd--h3 partnership-info__link partnership-info__link--arrow" href="<?=CATALOG_MATTRESS_LINK ? CATALOG_MATTRESS_LINK : '#'; ?>" download>Каталог матрасов</a>
        </li>
        <li class="partnership-info__item">
          <img class="partnership-info__img" src="<?=THEME_PATH?>/img/partnership/catalog-furniture.jpg" alt="" aria-hidden="true">
          <a class="hd hd--h3 partnership-info__link partnership-info__link--arrow" href="<?=CATALOG_FURNITURE_LINK ? CATALOG_FURNITURE_LINK : '#'; ?>" download>Каталог мягкой мебели</a>
        </li>
        <li class="partnership-info__item">
          <img class="partnership-info__img" src="<?=THEME_PATH?>/img/partnership/call-price.jpg" alt="" aria-hidden="true">
          <button class="btn-reset hd hd--h3 partnership-info__link" type="button" data-hystmodal="#make-partnership-modal">Запросить прайс-лист</button>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>
