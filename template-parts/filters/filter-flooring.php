<?php $product_flooring = get_terms( array( 'taxonomy' => 'pa_flooring','hide_empty' => false ) ) ?>
<?php if ($product_flooring && !isset($product_flooring->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Настил</span>
      <select class="form__input" name="filter_flooring">
        <option disabled selected>Настил</option>
        <?php foreach ($product_flooring as $group) :?>
          <option <?php if( isset( $_GET['filter_flooring'] ) && $group->slug == $_GET['filter_flooring'] ) : ?> selected <?php endif; ?> value="<?= $group->slug ?>"><?= $group->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
