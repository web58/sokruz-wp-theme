<div class="hystmodal hystmodal--simple" id="send-error-modal" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close" type="button" aria-label="Закрыть окно" data-hystclose>
          <svg class="modal__close-icon" width="18" height="18" aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h1 modal__title">Ошибка!</p>
        <p class="modal__send-text">Возникла непредвиденная ошибка, отправка не удалась. Попробуйте отправить запрос позднее.</p>
        <div class="modal__bottom-field">
          <button class="btn-reset btn btn--outlined" type="submit" data-hystclose>Закрыть</button>
        </div>
      </div>
    </div>
  </div>
</div>
