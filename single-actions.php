<?php /* Template Name: Акция */ ?>
<?php /*  Template Post Type: actions */ ?>
<?php get_header(); ?>

<main>
  <article>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="action-content">
      <div class="container">
      <?php if ( get_the_post_thumbnail_url() ) : ?><img class="action-content__poster" src="<?=get_the_post_thumbnail_url();?>" alt=""><?php endif; ?>
        <div class="action-content__content">
          <?php the_content(); ?>
        </div>
        <?php $action_products = get_field('action_products'); ?>
        <?php if ($action_products) : ?>
          <div class="action-content__products">
            <h2 class="indent-reset hd hd--h3 action-content__products-title">Товары, участвующие в акции</h2>
            <ul class="list-reset action-content__products-list">
              <?php foreach($action_products as $item) : ?>
                <li>
                  <?php $current_id = $item['ID']; ?>
                  <?php $current_product = wc_get_product( $current_id ); ?>
                  <div class="action-product">
                    <img class="action-product__img" src="<?=get_image_url_fallback(get_the_post_thumbnail_url($current_id));?>" alt="<?=$current_product->get_name();?>">
                    <a class="hd hd--h4 action-product__link" href="<?=$current_product->get_permalink();?>"><?=$current_product->get_name();?></a>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <div class="action-content__nav post-nav">
          <?php
            previous_post_link('%link');
            next_post_link('%link');
          ?>
        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>
