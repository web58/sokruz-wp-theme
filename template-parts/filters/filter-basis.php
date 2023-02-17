<?php $product_basis = get_terms( array( 'taxonomy' => 'pa_basis','hide_empty' => false ) ) ?>
<?php if ($product_basis && !isset($product_basis->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Основание</span>
      <select class="form__input" name="filter_basis">
        <option disabled selected>Основание</option>
        <?php foreach ($product_basis as $item) :?>
          <option <?php if( isset( $_GET['filter_basis'] ) && $item->slug == $_GET['filter_basis'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
