class SubscribeView{
  _parentEls = document.querySelectorAll('.sub__btn');

  redirectHandler(handler) {
    this._parentEls.forEach(parentEl => parentEl.addEventListener('click', function (e) {
      e.preventDefault();
      const plan = e.currentTarget.closest('.offer').querySelector('.amount').textContent;
      this._redirect(handler,plan);
    }.bind(this)));
  }
  _redirect(handler,plan) {
    handler(plan);
  }
}
export default new SubscribeView();