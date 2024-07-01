class NavMenu {
  _parentEl = document.querySelector(".nav__menu");
  _closeBtn = this._parentEl.querySelector(".close__menu");
  _navToggler = document.querySelector(".nav-toggler");

  constructor() {
    this._addEventListeners();
  }
  _addEventListeners() {
    this._navToggler.addEventListener("click", this._toggleMenu.bind(this));
    this._closeBtn.addEventListener("click", this._hideMenu.bind(this));
  }
  _toggleMenu() {
    this._parentEl.classList.contains("not__visible")
      ? this._showMenu()
      : this._hideMenu();
  }
  _showMenu() {
    this._parentEl.classList.remove("not__visible");
  }
  _hideMenu() {
    
    this._parentEl.classList.add("not__visible");
  }
}
export default new NavMenu();
