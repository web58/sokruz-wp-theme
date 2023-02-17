<?php /* Template Name: Новости */ ?>
<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="news-page">
    <?php
      $news_post = get_posts( array(
        'posts_per_page' => -1,
        'post_type' => 'news',
        'order' => 'DESC',
        'orderby' => 'date',
      ) );
    ?>
      <div class="container">
        <?php if ($news_post) : ?>
        <?php global $post; ?>
        <ul class="list-reset news-page__list">
          <?php foreach ($news_post as $post) : ?>
          <?php setup_postdata( $post ); ?>
            <li>
              <article class="news-card">
                <img class="news-card__poster" src="<?=get_image_url_fallback( get_the_post_thumbnail_url() );?>" alt="">
                <div class="news-card__meta">
                  <time class="news-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('d.m.Y'); ?></time>
                  <h3 class="indent-reset hd hd--h4 news-card__title"><?php the_title(); ?></h3>
                  <div class="news-card__excerpt">
                    <?php if (get_the_excerpt()) : ?>
                      <?php the_excerpt(); ?>
                      <?php else: ?>
                        <p>Нет отписания</p>
                      <?php endif; ?>
                  </div>
                  <a class="news-card__link" href="<?php the_permalink(); ?>">Подробнее</a>
                </div>
              </article>
            </li>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p>Нет новостей</p>
      <?php endif; ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
