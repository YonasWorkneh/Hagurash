import View from "./view.js";
class RecipeView extends View {
  _parentEl = document.querySelector(".recipe__desc");
  _errorMessage = `We couldn't find your recipe! Please try another one.`;
  _rating = 0;

  _generateHtml() {
    setTimeout(
      function () {
        this.ratingOnHover();
      }.bind(this),
      100
    );
    return `
      <div>
        <figure class="recipe__img__desc">
          <img
            src="${this._data.image_url}"
            alt="${this._data.title}"
          />
          <div><span class="recipe__title">${this._data.title}</span></div>
        </figure>
        <div class="recipe__desc__wrap">
          <div class="buttons">
            <p>
              <i class="fa-regular fa-clock"></i>
              <span class="time">${this._data.cooking_time}</span> minutes
            </p>
            <p>
              <i class="fa-solid fa-user-group"></i>
              <span class="serving__amount">${
                this._data.servings
              }</span> Serving
            </p>
            <div>
              <button class="update__serving decrement">
                <i class="fa-solid fa-minus"></i>
              </button>
              <button class="update__serving increment">
                <i class="fa-solid fa-plus"></i>
              </button>
            </div>
            <button class="bookmark__btn" data-status="${this._status}">
              <i class="${
                this._status ? "fa-solid" : "fa-regular"
              } fa-bookmark"></i>
            </button>
            <div class="rating">
              ${Array.from({ length: 5 }).reduce(
                function (rating, _, i) {
                  rating += this._starMarkup(i);
                  return rating;
                }.bind(this),
                ""
              )}
            </div>
          </div>
          <div class="ingredients">
            <h1>Recipe ingredients</h1>
            <ul class="ingredient__list">
            ${this._data.ingredients.reduce(this.#listIngredients, "")}
            </ul>
          </div>
          <div class="direction__links">
            <h2>How To Cook it</h2>
            <p class="cooker__message">
              This recipe was carefully designed and tested by
              <span class="publisher">${this._data.publisher}</span>. 
              Please check out directions at their website.
            </p>
            <a href="${
              this._data.source_url
            }" target= "_blank" class="direction__link">Direction<span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
    </div> `;
  }
  #listIngredients(list, ingredient) {
    return (list += `<li>
      <i class="icon__ fa-solid fa-check"></i> 
      <span class="ingd__quantity">${
        ingredient.quantity === null || ingredient.quantity === 0
          ? ""
          : ingredient.quantity
      } </span> 
      ${ingredient.unit} ${ingredient.description}
    </li>`);
  }
  addHandler(controller) {
    ["hashchange", "load"].forEach((event) => {
      window.addEventListener(event, controller);
    });
  }
  setBookStatus(status) {
    this._status = status;
  }
  _starMarkup(rate) {
    return `
      <span
      role="button"
      style="
        display: block;
        width: 20px;
        height: 20px;
        cursor: pointer"
      data-rate = '${rate + 1}'
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class = '${rate < this._rating ? "filled" : ""}'
        viewBox="0 0 24 24"
      >
        <path
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeWidth="2"
          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
        />
      </svg>
    </span>`;
  }
  ratingOnHover() {
    this._parentEl.addEventListener(
      "mouseover",
      function (e) {
        if (!e.target.closest("svg")) return;
        const rate = +e.target.closest("span").dataset.rate;
        this.adjustFilling(rate);
      }.bind(this)
    );
    document.querySelector(".rating").addEventListener(
      "mouseleave",
      function () {
        const stars = document.querySelector(".rating").querySelectorAll("svg");
        this.adjustFilling(this._rating);
      }.bind(this)
    );
  }
  ratingHandler(handler) {
    this._parentEl.querySelectorAll("svg").forEach((star) =>
      star.addEventListener(
        "click",
        function (e) {
          const rate = e.target.closest("span").dataset.rate;
          handler(rate);
        }.bind(this)
      )
    );
  }
  adjustFilling(rate, flag) {
    if (flag) this._rating = rate;
    const stars = document.querySelector(".rating").querySelectorAll("svg");
    stars.forEach((star) => {
      star.classList.remove("filled");
    });
    stars.forEach((star, i) => {
      if (i < rate) star.classList.add("filled");
    });
  }
  setRating(rating) {
    this._rating = Math.round(+rating);
  }
}

export default new RecipeView();
