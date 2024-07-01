class SearchFormView {
  constructor() {
    document.addEventListener("click", this._closeForm);
  }
  searchQueryHandler(handler) {
    document.addEventListener("submit", function (e) {
      e.preventDefault();
      this._query = document.getElementById("search-input").value;
      handler(this._query);
    }.bind(this));
  }
  _closeForm(e) {
    if (!e.target.classList.contains("close__form")) return;
    e.target.closest(".form__field").remove();
  }
}

export default new SearchFormView();
