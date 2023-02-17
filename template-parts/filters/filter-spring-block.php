<?php $product_spring_block = get_terms( array( 'taxonomy' => 'pa_spring-block','hide_empty' => false ) ) ?>
<?php if ($product_spring_block && !isset($product_spring_block->errors)) : ?>
  <li>
    <label class="form__select-wrapper filters-content__select">
      <span class="visually-hidden">Пружинный блок</span>
      <select class="form__input" name="filter_spring-block">
        <option disabled selected>Пружинный блок</option>
        <?php foreach ($product_spring_block as $item) :?>
          <option <?php if( isset( $_GET['filter_spring-block'] ) && $item->slug == $_GET['filter_spring-block'] ) : ?> selected <?php endif; ?> value="<?= $item->slug ?>"><?= $item->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </li>
<?php endif; ?>
