<h3 class="indent-reset hd hd--h1 help-item__title">Скачать каталоги</h3>
<ul class="list-reset help-item__links">
  <?php foreach(COMPANY_CATALOGS as $catalog): if($catalog['title'] && $catalog['file']): ?>
  <li class="help-item__item"><a class="hd hd--h3 help-item__link help-item__link--download" href="<?= $catalog['file']; ?>" download><?= $catalog['title']; ?></a></li>
  <?php endif; endforeach; ?>
</ul>
