class OverView {
  _parentEl = document.querySelector(".overview");
  _customers = this._parentEl.querySelector(".cust__num");
  _bookmarks = this._parentEl.querySelector(".bookmark__total");
  _recipes = this._parentEl.querySelector(".recipe_num");
  _totalRecipes = 100_000;

  setTotalCustomers(numCustomers) {
    this._customers.textContent = numCustomers;
    this._totalCustomers = numCustomers;
  }
  setTotalBookmarks(numBookmark) {
    this._bookmarks.textContent = numBookmark;
    this._totalBookmarks = numBookmark;
  }
  onSettterComplete() {
    this._counter(this._totalRecipes, this._recipes, 2000);
  }
  _counter(max, el, inc = 100) {
    let currentCount = 0;
    const step = () => {
      el.textContent = currentCount + inc;
      if (currentCount < +max - inc) {
        currentCount += inc;
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  }
  setTotalComments(total) {
    this._parentEl.querySelector(".comment__total").textContent = total;
  }
}

export default new OverView();
