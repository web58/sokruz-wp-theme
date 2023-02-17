
<?php $contacts_socials = get_field('contacts_socials', 'options') ?>
<?php if ($contacts_socials) : ?>
  <ul class="list-reset messengers">
    <?php foreach ($contacts_socials as $social) : ?>
      <li>
        <a href="<?=get_field($social.'_link', 'options') ? get_field($social.'_link', 'options') : '#';?>" target="_blank" rel="nofollow noreferer noopener" title="Написать в <?=$social;?>">
          <svg width="26" height="26" aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-<?=$social;?>"></use>
          </svg>
          <span class="visually-hidden">Написать в <?=$social;?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
