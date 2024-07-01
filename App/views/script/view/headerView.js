class HeaderView {
  #parentEl = document.querySelector(".header-top");
  #heartIcon = document.querySelector(".save");
  #toolTip = document.querySelector(".tool-tip");
  constructor() {
    this._toogleStickyHeader();
    this._handleHover();
  }
  _toogleStickyHeader() {
    window.addEventListener(
      "scroll",
      function () {
        this.#parentEl?.classList.toggle("sticky", window.scrollY > 50);
      }.bind(this)
    );
  }
  _handleHover() {
    this.#heartIcon?.addEventListener(
      "mouseover",
      this._toogleToolTip.bind(this)
    );
    this.#heartIcon?.addEventListener(
      "mouseleave",
      this._toogleToolTip.bind(this)
    );
  }
  _toogleToolTip(e) {
    this.#toolTip.style.visibility =
      e.type === "mouseover" ? "visible" : "hidden";
  }
  logOutHandler(handler) {
    document.querySelector('.logout')?.addEventListener('click', handler);
  }
}
export default new HeaderView();
