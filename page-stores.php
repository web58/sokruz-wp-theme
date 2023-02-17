<?php /* Template Name: Магазины */ ?>
<?php get_header(); ?>
<main>
  <section>
      <div class="site-title">
        <div class="container">
          <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
        </div>
      </div>
      <div class="store">
        <div class="container">
        <?php
          $pages = get_pages( [
            'sort_order'   => 'ASC',
            'sort_column'  => 'post_title',
            'child_of'     => get_the_ID(),
            'post_type'    => 'page',
            'post_status'  => 'publish',
          ] );
        ?>
          <div class="store__list">
            <?php foreach( $pages as $post ): ?>
              <?php
                setup_postdata( $post );
                $image_id = get_post_meta( $post->ID, '_thumbnail_id', 1 );
                $image_url = wp_get_attachment_image_url( $image_id, 'full' );
              ?>
              <div class="store-item">
                <img class="store-item__image" src="<?=get_image_url_fallback($image_url);?>" alt="">
                <p class="indent-reset hd hd--h3 store-item__title"><a class="store-item__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              </div>
            <?php  endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <div class="store-item">
              <img class="store-item__image" src="<?=THEME_PATH?>/img/online-store.jpg" alt="">
              <p class="indent-reset hd hd--h3 store-item__title"><a class="store-item__link" href="<?=ONLINE_STORE_LINK;?>" target="_blank" rel="nofollow noreferer noopener">Интернет-магазин</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
<?php get_footer(); ?>
