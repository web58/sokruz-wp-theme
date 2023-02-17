<?php $product_weight = get_terms( array( 'taxonomy' => 'pa_weight','hide_empty' => false ) ) ?>
<?php if ($product_weight && !isset($product_weight->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Вес на место</span>
      <select class="form__input" name="filter_weight">
        <option disabled selected>Вес на место</option>
        <?php foreach ($product_weight as $item) :?>
          <option <?php if( isset( $_GET['filter_weight'] ) && $item->slug == $_GET['filter_weight'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
