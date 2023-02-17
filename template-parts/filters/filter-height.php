<?php $product_height = get_terms( array( 'taxonomy' => 'pa_height','hide_empty' => false ) ) ?>
<?php if ($product_height && !isset($product_height->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Высота</span>
      <select class="form__input" name="filter_height">
        <option disabled selected>Высота</option>
        <?php foreach ($product_height as $item) :?>
          <option <?php if( isset( $_GET['filter_height'] ) && $item->slug == $_GET['filter_height'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
