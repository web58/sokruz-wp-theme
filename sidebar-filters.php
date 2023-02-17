<div class="accordion filters">
  <div class="filters__top">
    <div class="container">
      <button class="btn-reset hd hd--h4 accordion__control filters__title">Фильтры</button>
    </div>
  </div>
  <div class="accordion__content">
    <div class="container">
      <form class="form filters-content">
        <div>
          <?php
            if( is_parent_query_taxonomy ( 'Матрасы', 'product_cat' ) || is_current_term('Матрасы', 'product_cat')) :
              get_template_part('/template-parts/filters', 'mattress');
            else :
              get_template_part('/template-parts/filters', 'other');
            endif;
          ?>
        </div>
        <div class="filters-content__btns">
          <button class="btn-reset btn filters-content__btn" type="submit">Показать</button>
          <?php  if(isset($_GET) && !empty($_GET)):?>
            <a class="btn btn--outlined filters-content__btn" href="<?=get_category_link( get_queried_object()->term_id );?>">Сбросить</a>
          <?php else : ?>
            <button class="btn-reset btn btn--outlined filters-content__btn" type="reset">Сбросить</button>
          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</div>
