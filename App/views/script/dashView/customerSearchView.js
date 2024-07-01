class SearchView{
  _parentEl = document.querySelector('.search');

  searchHandler(handler) {
    this._parentEl.addEventListener('keydown', function (e) {
      if (e.key !== "Enter") return;
      handler(e.target.value);
    })
  }
}

export default new SearchView();