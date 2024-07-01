class FilterView{
  _parentEl = document.querySelector('.filter');

  filterHandler(handler) {
    this._parentEl.addEventListener('click', function (e) {
      const btn = e.target.closest('.filter');
      handler(+btn.dataset.filter);
      btn.dataset.filter = +btn.dataset.filter === 0 ? 1 : 0;
      console.log(+btn.dataset.filter);
    });
  }
}

export default new FilterView();