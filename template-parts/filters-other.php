<ul class="list-reset filters-content__select-list">
  <?php
    get_template_part('/template-parts/filters/filter', 'basis');
    get_template_part('/template-parts/filters/filter', 'flooring');
    get_template_part('/template-parts/filters/filter', 'transform');
    get_template_part('/template-parts/filters/filter', 'pricing');
  ?>
</ul>
<?php $product_checkboxes_oth = get_terms( array( 'taxonomy' => 'pa_checkboxes-oth','hide_empty' => false ) ) ?>
<?php if ( $product_checkboxes_oth && !isset($product_checkboxes_oth->errors) ) : ?>
  <ul class="list-reset filters-content__checkbox-list">
    <?php foreach ($product_checkboxes_oth as $item) :?>
      <li>
        <input
          class="visually-hidden form__checkbox"
          type="checkbox"
          name="filter_checkboxes-oth"
          id="<?=$item->slug?>"
          value="<?=$item->slug?>"
          <?php check_status_checkbox('filter_checkboxes-oth', $item)?>
          >
        <label for="<?=$item->slug?>"><?=$item->name?></label>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
