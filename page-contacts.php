<?php get_header(); ?>
<main>
  <section>
    <div class="site-title">
      <div class="container">
        <h1 class="indent-reset hd hd--h1"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="contacts">
      <div class="container">
        <div class="contacts__map" id="company-map"></div>
        <ul class="list-reset contacts__list">
          <li class="contacts__item contacts-item">
            <span class="small contacts-item__title">Бесплатная горячая линия</span>
            <p class="indent-reset contacts-item__phone contacts-item__phone--big"><?=get_phone(get_field('main_phone', 'options'));?></p>
            <button class="btn-reset btn contacts-item__cb-btn" type="button" data-hystmodal="#callback-modal">Заказать звонок</button>
          </li>
          <li class="contacts__item contacts-item">
            <span class="small contacts-item__title">Адрес</span>
            <?=get_adress( get_field('main_adress', 'options'), 'indent-reset contacts-item__adress' );?>
            <p class="indent-reset contacts-item__shedule">
              <span class="small contacts-item__shedule-days"><?=get_field('shedule_days', 'options');?></span>
              <span><?=get_field('shedule_time', 'options');?></span>
            </p>
          </li>
          <li class="contacts__item contacts-item">
            <span class="small contacts-item__title">E-mail</span>
            <p class="indent-reset contacts-item__email"><?=get_email(get_field('main_email', 'options'));?></p>
            <span class="small contacts-item__title contacts-item__title--inner">Свяжитесь с нами</span>
            <?php get_template_part('/template-parts/messengers'); ?>
          </li>
          <?php $custom_contacts = get_field('custom_contacts', 'options'); ?>
          <?php if($custom_contacts) : ?>
            <?php foreach ($custom_contacts as $contact) :?>
            <li class="contacts__item contacts-item contacts-item--custom">
              <?php
              $title = $contact['title'];
              $phones = $contact['phones'];
              $emails = $contact['emails'];
              ?>
              <?php if($title) : ?><p class="indent-reset hd hd--h4 contacts-item__block-title"><?=$title;?></p><?php endif; ?>
              <?php if($phones) : ?>
                <span class="small contacts-item__title">Телефон</span>
                <?php foreach ($phones as $item) :?>
                  <p class="indent-reset contacts-item__phone"><?=get_phone($item['phone']);?></p>
                <?php endforeach; ?>
              <?php endif; ?>

              <?php if($emails) : ?>
                <span class="small contacts-item__title contacts-item__title--inner">E-mail</span>
                <?php foreach ($emails as $item) :?>
                  <p class="indent-reset contacts-item__email"><?=get_email($item['email']);?></p>
                <?php endforeach; ?>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
