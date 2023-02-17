<div class="hystmodal hystmodal--simple" id="make-partnership-modal" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close" type="button" aria-label="Закрыть окно" data-hystclose>
          <svg class="modal__close-icon" width="18" height="18" aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h1 modal__title">Стать партнером</p>
        <form class="form modal__form" id="modal-make-partnership-form" data-validate>
          <input type="hidden" name="Страница" value="<?=get_page_page();?>">
          <input type="hidden" name="Форма" value="Стать партнером">
          <div>
            <input class="form__input" type="text" name="Контактное&nbsp;лицо" placeholder="Имя *" data-validate="text" required>
          </div>
          <div>
            <input class="form__input" type="tel" name="Контактный&nbsp;телефон" placeholder="Телефон *" data-validate="phone" required>
          </div>
          <div>
            <input class="form__input" type="text" name="Должность" placeholder="Должность *" data-validate="post" required>
          </div>
          <div>
            <input class="form__input" type="text" name="Адрес&nbsp;торговой&nbsp;точки" placeholder="Адрес торговой точки *" data-validate="adress" required>
          </div>
          <div class="form__select-wrapper">
            <select class="form__input" name="Форма собственности">
              <option value="ИП/ЗАО">ИП/ЗАО</option>
              <option value="ООО/ОАО">ООО/ОАО</option>
            </select>
          </div>
          <p class="indent-reset modal__gray-text">После выбора формы собственности укажите ОГРН (если вы ИП) или устав (если вы представитель ООО)</p>
          <div>
            <input class="form__input" type="text" name="ОГРН&nbsp;или&nbsp;Устав" placeholder="ОГРН или Устав *" data-validate="rule-form" required>
          </div>
          <div class="small modal__confirm">
            <input class="visually-hidden form__checkbox" type="checkbox" id="modal-make-partnership-checkbox" data-validate="confirm" required>
            <label for="modal-make-partnership-checkbox">Нажимая «Отправить», я даю согласие на обработку моих персональных данных, в соответствии с ФЗ от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="/agreement" target="_blank" rel="nofollow noreferer noopener">Согласии на обработку персональных данных</a>
            </label>
          </div>
          <div class="modal__bottom-field">
            <button class="btn-reset btn" type="submit">Отправить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
