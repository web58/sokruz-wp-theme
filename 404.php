<?php get_header(); ?>
<main>
  <section>
    <div class="container">
      <h1 class="visually-hidden">Страница не найдена</h1>

      <div class="not-found">
        <div class="not-found__cover"></div>
        <div>
          <p class="indent-reset not-found__text">
            <span class="not-found__decor-title" aria-hidden="true">404</span>
            <span class="hd hd--h2">Извините,<br>такой страницы у нас нет.</span>
            <span class="hd hd--h1 not-found__tagline">Но у нас есть много отличной мебели!</span>
          </p>
          <div class="not-found__search">
            <?php get_search_form(); ?>
            <p class="indent-reset not-found__search-descr">Вы можете поискать в каталоге то, что нужно вам</p>
          </div>
          <a class="btn btn--outlined not-found__link-back" href="/" id="link">Вернуться назад</a>
          <script>
            document.querySelector( '#link' ).addEventListener( 'click', ( evt ) => {
              evt.preventDefault();
              history.go( -1 );
            } )
          </script>
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
