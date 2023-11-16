    </div> <!-- end site-content -->

    <footer>
      <div class="footer-top">
        <div class="container footer-top__grid">
          <?= (!is_home() && !is_front_page() ) ? '<a class="footer-top__logo" href="/">' : '<span class="footer-top__logo">' ;?>
            <img src="<?=THEME_PATH?>/img/logo.svg" width="160" height="57" alt="Сокруз">
          <?= (!is_home() && !is_front_page() ) ? '</a>' : '</span>' ;?>

          <ul class="list-reset footer-top__contacts">
            <li>
              <span class="small footer-top__contacts-title">Бесплатная горячая линия</span>
              <p class="indent-reset footer-top__phone"><?=get_phone(get_field('main_phone', 'options'));?></p>
            </li>
            <li>
              <span class="small footer-top__contacts-title">E-mail</span>
              <p class="indent-reset footer-top__email"><?=get_email(get_field('main_email', 'options'));?></p>
            </li>
            <li>
              <a class="footer-top__title-link is-hidden" href="<?=ONLINE_STORE_LINK;?>" target="_blank" rel="nofollow noreferer noopener">Интернет-магазин</a>
              <div class="footer-top__messangers">
                <?php get_template_part('/template-parts/messengers'); ?>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <nav class="footer-nav">
        <div class="container footer-nav__grid">
          <?php get_template_part('/template-parts/menu/menu-footer', 'catalog'); ?>
          <?php get_template_part('/template-parts/menu/menu-footer', 'about'); ?>
          <?php get_template_part('/template-parts/menu/menu-footer', 'help'); ?>
          <ul class="list-reset footer-nav__menu">
            <li>
              <span>Запросить каталоги</span>
              <ul>
                <li><a href="<?=CATALOG_MATTRESS_LINK ? CATALOG_MATTRESS_LINK : '#'; ?>" download>Мягкая мебель</a></li>
                <li><a href="<?=CATALOG_FURNITURE_LINK ? CATALOG_MATTRESS_LINK : '#'; ?>" download>Кровати и матрасы</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div class="footer-bottom">
        <div class="container">
          <div class="small footer-bottom__wrapper">
            <span>&copy; 2000–<?=date('Y') ?> <?php bloginfo( 'name' ); ?></span>
            <a class="footer-bottom__link" href="/agreement" target="_blank" rel="nofollow noreferer noopener">Согласие на обработку персональных данных</a>
            <a class="footer-bottom__link" href="/privacy-policy" target="_blank" rel="nofollow noreferer noopener">Политика конфиденциальности</a>
          </div>
        </div>
      </div>
    </footer>

    <?php get_template_part('/template-parts/scroll-top'); ?>
    <?php get_template_part('/template-parts/modal'); ?>

  </div> <!-- end site-container -->

  <?php if ( is_page( 'main' ) || is_page( 'contacts' ) || get_post_type() === 'store' ) : ?><script src="https://api-maps.yandex.ru/2.1/?apikey=&lang=ru_RU"></script><?php endif; ?>

  <?php wp_footer(); ?>
  <?php the_field('counter_code', 'options'); ?>
  <?php the_field('footer_code', 'options'); ?>
</body>

</html>
