<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preload" href="<?=THEME_PATH?>/fonts/raleway-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?=THEME_PATH?>/fonts/raleway-medium.woff2" as="font" type="font/woff2" crossorigin>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
  <?php the_field('head_code', 'options'); ?>
</head>

<body class="indent-reset lnum">
  <div aria-hidden="true" id="site-top"></div>
  <div class="site-container">
    <header class="site-header">
      <div class="header-top">
        <div class="container header-top__container">
          <div class="header-top__contacts">
            <?=get_adress(get_field('main_adress', 'options'));?>
            <?=get_email(get_field('main_email', 'options'));?>
          </div>
          <div class="header-top__messengers">
            <?php get_template_part('/template-parts/messengers'); ?>
          </div>
        </div>
      </div>

      <div class="header-main">
        <div class="container header-main__container">
          <button class="btn-reset header-main__burger just-burger" type="button" aria-label="Меню" id="just-burger">
            <span class="just-burger__line just-burger__line--top"></span>
            <span class="just-burger__line just-burger__line--middle"></span>
            <span class="just-burger__line just-burger__line--bottom"></span>
          </button>

          <?= (!is_home() && !is_front_page() ) ? '<a class="header-main__logo" href="/">' : '<span class="header-main__logo">' ;?>
            <img src="<?=THEME_PATH?>/img/logo.svg" width="90" height="33" alt="Сокруз">
          <?= (!is_home() && !is_front_page() ) ? '</a>' : '</span>' ;?>

          <div class="header-main__search">
            <?php get_search_form(); ?>
          </div>

          <div class="header-main__cb">
            <?=get_phone(get_field('main_phone', 'options'));?>
            <button class="btn-reset small header-main__cb-btn" type="button" data-hystmodal="#callback-modal">Заказать звонок</button>
          </div>

          <p class="indent-reset header-main__shedule">
            <span><?=get_field('shedule_time', 'options');?></span>
            <span class="small header-main__shedule-days"><?=get_field('shedule_days', 'options');?></span>
          </p>
        </div>
      </div>

      <nav class="header-menu site-menu">
        <div class="container">
          <?php get_template_part('/template-parts/menu/menu', 'header-main'); ?>
        </div>
      </nav>

      <div class="mobile-menu" aria-hidden="true">
        <div class="mobile-menu__content anim-fade-in">
          <div class="container">
            <nav class="mobile-menu__nav site-menu">
              <?php get_template_part('/template-parts/menu/menu', 'header-main'); ?>
            </nav>
            <div class="mobile-menu__search">
              <?php get_search_form(); ?>
            </div>
            <div class="mobile-menu__cb">
              <?=get_phone(get_field('main_phone', 'options'));?>
              <button class="btn-reset small mobile-menu__cb-btn" type="button" data-hystmodal="#callback-modal">Заказать звонок</button>
            </div>
            <p class="indent-reset mobile-menu__shedule">
              <span><?=get_field('shedule_time', 'options');?></span>
              <span class="small mobile-menu__shedule-days"><?=get_field('shedule_days', 'options');?></span>
            </p>
            <div class="mobile-menu__contacts">
              <?=get_adress(get_field('main_adress', 'options'));?>
              <?=get_email(get_field('main_email', 'options'));?>
            </div>
            <?php get_template_part('/template-parts/messengers'); ?>
          </div>
        </div>
      </div>

    </header>

    <header class="site-header-fixed anim-drop-down">
      <div class="header-main">
        <div class="container header-main__container">
          <?= (!is_home() && !is_front_page() ) ? '<a class="header-main__logo" href="/">' : '<span class="header-main__logo">' ;?>
            <img src="<?=THEME_PATH?>/img/logo.svg" width="90" height="33" alt="Сокруз">
          <?= (!is_home() && !is_front_page() ) ? '</a>' : '</span>' ;?>

          <div class="header-main__search">
            <?php get_search_form(); ?>
          </div>

          <div class="header-main__cb">
            <?=get_phone(get_field('main_phone', 'options'));?>
            <button class="btn-reset small header-main__cb-btn" type="button" data-hystmodal="#callback-modal">Заказать звонок</button>
          </div>

          <p class="indent-reset header-main__shedule">
            <span><?=get_field('shedule_time', 'options');?></span>
            <span class="small header-main__shedule-days"><?=get_field('shedule_days', 'options');?></span>
          </p>
        </div>
      </div>
    </header>

    <div class="site-content">

    <?php get_template_part('/template-parts/breadcrumbs'); ?>
