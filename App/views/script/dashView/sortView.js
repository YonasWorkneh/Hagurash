class SortView {
  _parentEl = document.querySelector("#sort");

  sortHandler(handler) {
    this._parentEl.addEventListener("change", function (e) {
      handler(e.target.value);
    });
  }
}

export default new SortView();
