class SearchView {
  parentEl = document.querySelector(".search__form");
  searchInput = this.parentEl.querySelector(".search__input");
  getQuery() {
    const query = this.searchInput.value;
    return query;
  }
  setQuery(query) {
    this.searchInput.value = query;
  }
  addSearchHandler(handler) {
    this.parentEl.addEventListener("submit", handler);
  }
}
export default new SearchView();