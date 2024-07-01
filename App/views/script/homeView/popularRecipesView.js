class PopularRecipes {
  _parentEl = document.querySelector(".recipe-slider-track");
  _duplicateParent = document.querySelector(".recipe-slider-track2");
  setRecipes(recipes) {
    this._recipes = recipes;
    this._displayRecpes();
  }
  _displayRecpes() {
    this._recipes.forEach((recipe) => {
      this._parentEl.insertAdjacentHTML(
        "beforeend",
        this._generateMarkUp(recipe)
      );
      this._duplicateParent.insertAdjacentHTML(
        "beforeend",
        this._generateMarkUp(recipe)
      );
    });
  }
  _generateMarkUp(recipe) {
    return ` 
      <div class="recipe">
        <img src="${recipe.imgUrl}" alt="${recipe.title}">
        <span>${recipe.title}</span>
        <a href="${recipe.srcUrl}" class="popular">Get Recipe</a>
      </div>`;
  }
}
export default new PopularRecipes();
