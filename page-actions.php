<?php /* Template Name: Акции */ ?>
<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title() ?></h1>
      </div>
    </div>
    <div class="actions-tabs" data-tabs="action-tabs">
      <div class="actions-tabs__top">
        <div class="container">
          <ul class="list-reset actions-tabs__nav" data-tabs="nav">
            <li><button class="btn-reset hd hd--h4 actions-tabs__nav-btn" type="button" data-tabs="btn">Мебель по акции</button></li>
            <li><button class="btn-reset hd hd--h4 actions-tabs__nav-btn" type="button" data-tabs="btn">Матрасы по акции</button></li>
            <li><button class="btn-reset hd hd--h4 actions-tabs__nav-btn" type="button" data-tabs="btn">Временные</button></li>
            <li><button class="btn-reset hd hd--h4 actions-tabs__nav-btn" type="button" data-tabs="btn">Коллекция тканей</button></li>
          </ul>
        </div>
      </div>
      <div class="container">
        <div data-tabs="panel">
          <?php get_template_part('/template-parts/action-furniture'); ?>
        </div>
        <div data-tabs="panel">
          <?php get_template_part('/template-parts/action-mattress'); ?>
        </div>
        <div data-tabs="panel">
          <?php
            $actions_post = get_posts( array(
              'posts_per_page' => -1,
              'post_type' => 'actions',
              'order' => 'DESC',
              'orderby' => 'date',
            ) );
          ?>
          <?php if ($actions_post) : ?>
          <?php global $post; ?>
            <div class="actions-tabs__grid">
              <?php foreach ($actions_post as $post) : ?>
              <?php setup_postdata( $post ); ?>
                <article class="action-card">
                  <img class="action-card__poster" src="<?=get_image_url_fallback( get_the_post_thumbnail_url() );?>" alt="">
                  <div class="action-card__meta">
                    <?php $start = get_field('start_action'); ?>
                    <?php $end = get_field('end_action'); ?>
                    <?php if ($start && $end) : ?>
                      <div class="action-card__period">
                        <time class="action-card__date" datetime="<?=get_format_date($start);?>"><?=$start;?></time> &ndash; <time class="action-card__date" datetime="<?=get_format_date($end);?>"><?=$end;?></time>
                      </div>
                    <?php endif; ?>
                    <h3 class="indent-reset hd hd--h4 action-card__title"><?php the_title(); ?></h3>
                    <div class="action-card__excerpt">
                      <?php if (get_the_excerpt()) : ?>
                        <?php the_excerpt(); ?>
                        <?php else: ?>
                          <p>Нет отписания</p>
                        <?php endif; ?>
                    </div>
                    <a class="action-card__link" href="<?php the_permalink(); ?>">Подробнее</a>
                  </div>
                </article>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          <?php else: ?>
            <p>Действующих акций нет</p>
          <?php endif; ?>
        </div>
        <div data-tabs="panel">
          <div class="actions-collections">
            <?php $material_collections = get_field('material_collections') ?>
            <?php if ($material_collections) : ?>
              <h2 class="visually-hidden">Коллекция тканей</h2>
              <ul class="list-reset actions-collections__list">
                <?php foreach($material_collections as $collection): ?>
                  <li class="collections-item">
                    <?php
                      $title = $collection['title'];
                      $gallery = $collection['images'];
                    ?>
                    <?php if($title): ?><h3 class="indent-reset hd hd--h3 collections-item__title"><?=$title;?></h3><?php endif; ?>
                    <?php if($gallery): ?>
                      <ul class="list-reset collections-item__list" data-gallery>
                        <?php foreach($gallery as $img): ?>
                          <li class="collections-material">
                            <a href="<?=$img['url'];?>" data-fslightbox="collection-id">
                              <figure class="indent-reset">
                                <img
                                  class="collections-material__img"
                                  src="<?=$img['sizes']['thumbnail'];?>"
                                  width="<?=$img['sizes']['thumbnail-width'];?>"
                                  height="<?=$img['sizes']['thumbnail-height'];?>"
                                  alt="<?=$img['alt'];?>">
                                <figcaption class="collections-material__title"><?=$img['caption'];?></figcaption>
                              </figure>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p>Коллекции материалов не добавлены</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
