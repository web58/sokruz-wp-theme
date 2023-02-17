<?php $product_transform = get_terms( array( 'taxonomy' => 'pa_transform','hide_empty' => false ) ) ?>
<?php if ($product_transform && !isset($product_transform->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Виды механизмов</span>
      <select class="form__input" name="filter_transform">
        <option disabled selected>Виды механизмов</option>
        <?php foreach ($product_transform as $item) :?>
          <option <?php if( isset( $_GET['filter_transform'] ) && $item->slug == $_GET['filter_transform'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
