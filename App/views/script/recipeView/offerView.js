class OfferView{
  _parentEl = document.querySelector('.premium__modal');

  constructor() {
    this._parentEl.querySelector('.close__premium').addEventListener('click', this.hideOffer.bind(this));
  }
  displayOffer() {
    this._parentEl.classList.remove('hidden');
  }
  hideOffer() {
    this._parentEl.classList.add('hidden');
  }
  selectHandler(handler) {
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('.offer__button');
      if (!btn) return;
      console.log(btn);
      const plan = btn.dataset.offer;
      handler(+plan);
    }.bind(this));
  }
};

export default new OfferView();