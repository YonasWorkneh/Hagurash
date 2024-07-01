import View from "./view.js";
import { MAXCHAR } from "../../../models/script/config.js";
class BookmarkView extends View {
  _parentEl = document.querySelector(".bookmarks");
  _generateHtml() {
    const id = window.location.hash.slice(1);
    if (this._data.length === 0)
      return `
        <p class="bookmark__mess">
          <i class="icon__ fa-solid fa-triangle-exclamation"></i> 
          <span class="idc">Sign in to bookmark !)</span>
        </p>`;
    return this._data.reverse().reduce((li, recipe) => {
      return (li += `
        <li>
        <a href="#${recipe.id}"class="${recipe.id === id ? "preview" : ""}">
          <figure class="recipe__fig">
            <img
              class="recipe__img"
              src="${recipe.image_url}"
              alt="${recipe.title.slice(0, MAXCHAR - 20)}..."
            />
          </figure>
          <div class="recipe__detail">
            <p class="title">${
              recipe.title.length > MAXCHAR
                ? recipe.title.slice(0, MAXCHAR) + "..."
                : recipe.title
            }</p>
            <p class="publisher">${recipe.publisher}</p>
          </div>
        </a>
      </li>`);
    }, "");
  }
  bookmarkHandler(handler) {
    const bookmarkBtnContainer = this._parentEl
      .closest(".container")
      .querySelector(".recipe__desc");
    bookmarkBtnContainer.addEventListener("click", function (e) {
      const btn = e.target.closest(".bookmark__btn");
      if (!btn) return;
      const status = btn.dataset.status === "false" ? true : false;
      // btn.dataset.status = status ? 1 : 0;
      btn && handler(status);
    });
  }
  changeBookmarkIcon(status) {
    document.querySelector(".recipe__desc").querySelector('.fa-bookmark').className = status
      ? "fa-solid fa-bookmark"
      : "fa-regular fa-bookmark";
    this.setBookmarkStatus(status);
  }
  setBookmarkStatus(status) {
    const btn = document.querySelector('.bookmark__btn');
    btn.dataset.status = status;
  }
}
export default new BookmarkView();
