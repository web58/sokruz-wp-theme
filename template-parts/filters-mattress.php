<ul class="list-reset filters-content__select-list">
  <?php
    get_template_part('/template-parts/filters/filter', 'height');
    get_template_part('/template-parts/filters/filter', 'firmness');
    get_template_part('/template-parts/filters/filter', 'spring-block');
    get_template_part('/template-parts/filters/filter', 'pricing');
    get_template_part('/template-parts/filters/filter', 'weight');
  ?>
</ul>
<?php $product_checkboxes_mat = get_terms( array( 'taxonomy' => 'pa_checkboxes-mat','hide_empty' => false ) ) ?>
<?php if ( $product_checkboxes_mat && !isset($product_checkboxes_mat->errors) ) : ?>
  <ul class="list-reset filters-content__checkbox-list">
    <?php foreach ($product_checkboxes_mat as $item) :?>
      <li>
        <input
          class="visually-hidden form__checkbox"
          type="checkbox"
          name="filter_checkboxes-mat"
          id="<?=$item->slug?>"
          value="<?=$item->slug?>"
          <?php check_status_checkbox('filter_checkboxes-mat', $item)?>
          >
        <label for="<?=$item->slug?>"><?=$item->name?></label>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
