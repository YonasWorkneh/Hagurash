class PopularRecipes {
  _parentEl = document.querySelector(".recipes");
  _recipeContainer = this._parentEl.querySelector(".recipes__wrap");
  _addRecipeButton = this._parentEl.querySelector(".add__recipe");
  constructor() {
    this._handleAdd();
    this._handleEdit();
    document.addEventListener(
      "click",
      function (e) {
        e.target.classList.contains("overlay") && this._removeForm();
      }.bind(this)
    );
  }
  removeRecipeHandler(handler) {
    document.addEventListener("click", function (e) {
      if (!e.target.classList.contains("remove")) return;
      const id = e.target.closest(".recipe").dataset.id;
      const title = e.target.closest(".recipe").classList[1];
      handler(id, title);
    });
  }
  removeFromList(title) {
    this._recipeContainer.querySelector(`.${title}`).remove();
  }
  displayRecipes(recipes) {
    recipes.forEach((recipe) => {
      const { imgUrl: src, title, id } = recipe;
      this._recipeContainer.insertAdjacentHTML(
        "beforeend",
        this._generateHTML(src, title, id)
      );
    });
  }
  _generateHTML(src, title, id) {
    return `
      <div class="recipe ${title}" data-id = "${id}">
        <img src="${src}" alt="${title}">
        <span class="title">${title}</span>
        <div class="recipe__btns">
          <span class= "edit">Edit</span> 
          <span class="remove">Remove</span>
        </div>
      </div>
    `;
  }
  _handleAdd() {
    this._addRecipeButton.addEventListener(
      "click",
      function () {
        this._createOverlay();
        this._createForm("", "Add Recipe Form", "Add", "required");
      }.bind(this)
    );
  }
  _handleEdit() {
    this._parentEl.addEventListener("click", this._showEditForm.bind(this));
  }
  _showEditForm(e) {
    if (!e.target.classList.contains("edit")) return;
    const id = e.target.closest(".recipe").dataset.id;
    this._createForm(id, `Edit Recipe Form`, "Edit");
  }
  _createForm(id = "", title, buttonValue, required) {
    const form = document.createElement("form");
    form.className = "add__recipe__form";
    form.dataset.id = id;
    this._createOverlay();
    form.innerHTML = this._generateFormHTML(title, buttonValue, required);
    document.querySelector(".overlay").insertAdjacentElement("beforeend", form);
  }
  _generateFormHTML(title, value, required = "") {
    return `
      <fieldset>
        <legend>${title}</legend>
        <label for="url">Source URL:</label>
        <input type="url" name = "src_url"placeholder="Source URL"  ${required} id="url"><br>
        <label for="img_url">Image URL:</label>
        <input type = "url" name = "img_url" placeholder = "Image URL" ${required}  min-length="2" max - length="40"  id = "img_url">
        <br><label for="title">Title:</label>
        <input style = "margin-left:60px;" type="text" name = "title" placeholder="title" min-length="2" ${required} max-length="40"   id="title">
        <div>
        <input type="submit" value="${value}" class"edit__submit">
        </div>
      </fieldset>
    `;
  }
  _createOverlay() {
    document.querySelector(".overlay") &&
      document.querySelector(".overlay").remove();
    const div = document.createElement("div");
    div.className = "overlay";
    document.querySelector("body").insertAdjacentElement("beforeend", div);
  }
  editHandler(handler) {
    document.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!e.target.dataset.id) return;
      const form = new FormData(e.target);
      form.append("id", e.target.dataset.id);
      handler(Object.fromEntries(form));
    });
  }
  onEditSuccess(data) {
    const recipe = document.querySelector(`[data-id = '${data.id}']`);
    recipe.querySelector("img").src =
      data.img_url || recipe.querySelector("img").src;
    recipe.querySelector(".title").textContent =
      data.title || recipe.querySelector(".title").textContent;
    this._removeForm();
  }
  addHandler(handler) {
    document.addEventListener("submit", function (e) {
      e.preventDefault();
      if (
        e.target.dataset.id ||
        e.target.classList.contains("admin_profile_form") ||
        e.target.classList.contains("format") ||
        e.target.classList.contains("mess-search") ||
        e.target.classList.contains("reply")
      )
        return;
      const form = new FormData(e.target);
      handler(Object.fromEntries(form));
    });
  }
  _removeForm() {
    document.querySelector(".overlay").remove();
  }
  OnSuccessfulAdd(data) {
    this._recipeContainer.insertAdjacentHTML(
      "afterbegin",
      this._generateHTML(data.img_url, data.title, data.id)
    );
    this._removeForm();
  }
}

export default new PopularRecipes();
