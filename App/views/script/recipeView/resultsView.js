import View from "./view.js";
import { MAXCHAR } from "../../../models/script/config.js";
class resultsView extends View {
  _parentEl = document.querySelector(".all__recipes");
  _errorMessage = `No Results Found! Please try another one.`;
  _generateHtml() {
    if (!this._data) return;
    const id = window.location.hash.slice("1");
    return this._data.reduce((list, recipe) => {
      return (list += `
      <li>
        <a href="#${recipe.id}" class="detail__recipe ${
        recipe.id === id ? "preview" : ""
      }">
          <figure class="recipe__fig">
            <img
              class="recipe__img"
              src="${recipe.image_url}"
              alt="${recipe.title.slice(0, MAXCHAR - 20)}..."
            />
          </figure>
          <div class="recipe__detail">
            <p class="title">${
              recipe.title.length >= MAXCHAR
                ? recipe.title.slice(0, MAXCHAR) + "..."
                : recipe.title
            }</p>
            <p class="publisher">${recipe.publisher}</p>
          </div>
        </a>
      </li>`);
    }, "");
  }
}
export default new resultsView();
