<form
  class="form site-search"
  action="<?= home_url( '/' ); ?>"
  method="get"
  role="search"
  id="site-search"
  autocomplete="off">
  <label class="visually-hidden" for="search-field">Поиск по сайту</label>
  <input
    class="form__input site-search__input"
    type="search"
    name="s"
    id="search-field"
    placeholder="Поиск"
    value="<?= get_search_query(); ?>">
</form>
