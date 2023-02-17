<?php get_header(); ?>

<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="help-content">
      <div class="container">
        <ol class="list-reset help-content__list">
          <li class="help-content__list-item help-item">
            <?php get_template_part('/template-parts/help-contents/help','waranty'); ?>
          </li>
          <li class="help-content__list-item help-item">
            <?php get_template_part('/template-parts/help-contents/help','how'); ?>
          </li>
          <li class="help-content__list-item help-item">
            <?php get_template_part('/template-parts/help-contents/help','care'); ?>
          </li>
          <li class="help-content__list-item help-item">
            <?php get_template_part('/template-parts/help-contents/help','downloads'); ?>
          </li>
        </ol>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
