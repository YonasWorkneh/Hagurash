class SearchView {
  _parentEL = document.querySelector("body");
  _searchBtns = document.querySelectorAll(".search");
  constructor() {
    this._handleClick();
  }
  _generateMarkUp() {
    return `
      <div class="form__field">
        <div class="overlay"></div>
          <form method="post" class="search__form">
            <fieldset >
              <button class="searchh" type="submit" value="Submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              <input type="text" name="search-Result" placeholder="Find a Recipe" id="search-input" autofocus maxlength="30"/>
              <button class="close__form" type="reset" value="Clear">&times;</button>
            </fieldset>
          </form>
      </div>
        `;
  }
  _displayForm() {
    this._parentEL.insertAdjacentHTML("beforeend", this._generateMarkUp());
  }
  _handleClick() {
    this._searchBtns.forEach((btn) =>
      btn.addEventListener("click", this._displayForm.bind(this))
    );
  }
}

export default new SearchView();
