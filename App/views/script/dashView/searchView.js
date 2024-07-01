class SearchView{
  _parentEl = document.querySelector('.mess-search');

  constructor() {
    document.addEventListener('click', this.clearInput.bind(this));
  }

  searchHandler(handler,that) {
    this._parentEl.addEventListener('submit', function () {
      const name = this.querySelector('input').value;
      handler(name,that);
    })
  }
  clearInput(e) {
    if (!this._parentEl.querySelector("input").value || e.target.closest('.mess-search')) return;
    setTimeout(function () { 
      this._parentEl.querySelector("input").value = "";
    }.bind(this), 50);
  }

}
export default new SearchView();