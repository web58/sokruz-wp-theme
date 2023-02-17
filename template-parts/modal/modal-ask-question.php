<div class="hystmodal hystmodal--simple" id="ask-question-modal" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close" type="button" aria-label="Закрыть окно" data-hystclose>
          <svg class="modal__close-icon" width="18" height="18" aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h1 modal__title">Задать вопрос</p>
        <form class="form modal__form" id="modal-ask-question-form" data-validate>
          <input type="hidden" name="Страница" value="<?=get_page_page();?>">
          <input type="hidden" name="Форма" value="Задать вопрос">
          <div>
            <input class="form__input" type="text" name="Контактное&nbsp;лицо" placeholder="Имя *" data-validate="text" required>
          </div>
          <div>
            <input class="form__input" type="tel" name="Контактный&nbsp;телефон" placeholder="Телефон *" data-validate="phone" required>
          </div>
          <div>
            <textarea class="form__input form__textarea" name="Комментарий" placeholder="Комментарий"></textarea>
          </div>
          <div class="small modal__confirm">
            <input class="visually-hidden form__checkbox" type="checkbox" id="modal-ask-question-checkbox" data-validate="confirm" required>
            <label for="modal-ask-question-checkbox">Нажимая «Отправить», я даю согласие на обработку моих персональных данных, в соответствии с ФЗ от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="/agreement" target="_blank" rel="nofollow noreferer noopener">Согласии на обработку персональных данных</a>
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
