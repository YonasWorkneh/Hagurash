import View from "./view.js";

class AddRecipeView extends View {
  _parentEl = document.querySelector(".add__recipe__form");
  _openBtn = document.querySelector(".add__recipe");
  _closeBtn = document.querySelector(".close__btn");
  _modal = document.querySelector(".add__recipe__modal");
  _message = `Recipe successfully uploaded!`;
  constructor() {
    super();
    this._showWindow();
    this._hideWindow();
    this._addIngredientInput();
  }
  _showWindow() {
    this._openBtn.addEventListener("click", this.toggleWindow.bind(this));
  }
  _hideWindow() {
    const that = this;
    this._closeBtn.addEventListener("click", this.toggleWindow.bind(this));
    this._modal.addEventListener("click", function (e) {
      e.target === e.currentTarget && that.toggleWindow();
    });
  }
  toggleWindow() {
    this._modal.classList.toggle("hidden");
    this._modal.querySelector(".err__message") &&
      this._modal.querySelector(".err__message").remove();
    this._parentEl.classList.remove("hidden");
  }
  submitRecipeHandler(handler) {
    this._parentEl.addEventListener("submit", function (e) {
      e.preventDefault();
      if (e.submitter !== this.querySelector(".add__recipe__submit__btn"))
        return;
      const input = [...new FormData(this)];
      const data = Object.fromEntries(input);
      data.id = e.timeStamp.toFixed(0);
      handler(data);
    });
  }
  _addIngredientInput() {
    this._parentEl
      .querySelector(".ingredient__data")
      .addEventListener("click", function (e) {
        const btn = e.target.closest(".more__ingrd");
        if (!btn) return;
        e.preventDefault();
        const data = +btn.dataset.number + 1;
        const html = `
      <label for="ingrd_${data}">Ingredient ${data}</label>
      <input type="text" name="ingredient_${data}" id="ingrd_${data}">
      <button class="more__ingrd" data-number="${data}"><i class="icon__ fa-solid fa-plus"></i></button>
      `;
        btn.remove();
        e.currentTarget.insertAdjacentHTML("beforeend", html);
        document.querySelector(`#ingrd_${data}`).scrollIntoView();
      });
  }
  renderError(message = this._errorMessage) {
    console.log("Child error rendering");
    this._modal.insertAdjacentHTML(
      "beforeend",
      `
      <p class="err__message">
        <i class="icon__ fa-solid fa-triangle-exclamation"></i>
        ${message}
      </p>
      `
    );
    this._parentEl.classList.add("hidden");
  }
}

export default new AddRecipeView();
