<?php $product_pricing = get_terms( array( 'taxonomy' => 'pa_pricing','hide_empty' => false ) ) ?>
<?php if ($product_pricing && !isset($product_pricing->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Цена</span>
      <select class="form__input" name="filter_pricing">
        <option disabled selected>Цена</option>
        <?php foreach ($product_pricing as $item) :?>
          <option <?php if( isset( $_GET['filter_pricing'] ) && $item->slug == $_GET['filter_pricing'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
