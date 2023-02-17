<?php $product_firmness = get_terms( array( 'taxonomy' => 'pa_firmness','hide_empty' => false ) ) ?>
<?php if ($product_firmness && !isset($product_firmness->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Жесткость</span>
      <select class="form__input" name="filter_firmness">
        <option disabled selected>Жесткость</option>
        <?php foreach ($product_firmness as $item) :?>
          <option <?php if( isset( $_GET['filter_firmness'] ) && $item->slug == $_GET['filter_firmness'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
