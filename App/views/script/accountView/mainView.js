class MainView {
  _parentEl = document.querySelector(".container");
  _recipeContainer = this._parentEl.querySelector(".recipe__container");

  renderBookmarks(bookmarks) {
    bookmarks.forEach((bookmark) => {
      this._recipeContainer.insertAdjacentHTML(
        "beforeend",
        this._generateRecipeMarkup(bookmark)
      );
    });
  }
  renderMenu(message) {
    this._parentEl.insertAdjacentHTML("beforeend", this._menuMarkUp(message));
  }
  _menuMarkUp(message="You haven't saved any recipes recently.") {
    return `
      <div class="no__saved">
        <p>${message}</p>
        <a href="../recipe/" class="searchh">Search All Recipes</a>
      </div>
      `;
  }
  logOutHandler(handler) {
    this._parentEl
      .closest("body")
      .querySelector(".logout")
      .addEventListener("click", function () {
        handler();
      });
  }
  _generateRecipeMarkup(bookmark) {
    return `
      <div class="recipe" data-id="${bookmark.id}">
        <img src="${bookmark.image_url}">
        <p>Hagurash</p>
        <a href="${bookmark.source_url}">${bookmark.title
      .split(" ")
      .map((tit) => tit[0].toUpperCase().concat(tit.slice(1)))
      .join(" ")}</a>
        <div class="icons">
        <div>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <i class="fa-solid fa-bookmark"></i>
        </div>
      </div>
        `;
  }
  unBookmarkHandler(handler) {
    this._recipeContainer.addEventListener("click", function (e) {
      console.log("clicked");
      console.log(e.target);
      if (!e.target.classList.contains("fa-bookmark")) return;
      const id = e.target.closest(".recipe").dataset.id;
      handler(id);
    });
  }
  removeRecipe(id) {
    const recipe = this._recipeContainer.querySelector(`div[data-id="${id}"]`);
    console.log(recipe);
    recipe.classList.add("remove");
    setTimeout(
      function () {
        recipe.remove();
        document.querySelectorAll(".recipe").length === 0 && this.renderMenu("You have un bookmarked all your recipes !");
      }.bind(this),
      1000
    );
  }
}
export default new MainView();
