class CookieView {
  _parentEl = document.querySelector("body");
  _cookieContainer = document.querySelector(".cookie__container");

  constructor() {
    setTimeout(this._displayContainer.bind(this), 5000);
  }
  _displayContainer() {
    if (!this._cookieContainer) return;
    this._cookieContainer.style.visibility = "visible";
    this._cookieContainer.style.transform = "translateY(0px)";
  }
  _removeContainer() {
    this._cookieContainer.style.transition = "2s";
    this._cookieContainer.style.transform = "translateY(400px)";
    setTimeout(function () {
      this._cookieContainer.remove();
    }.bind(this), 700);
  }
  cookieHandler(handler) {
    if (!this._cookieContainer) return;
    this._cookieContainer.querySelector(".consent").addEventListener(
      "click",
      function (e) {
        if (e.target.classList.contains("btn")) {
          console.log(+e.target.value);
          handler(+e.target.value);
          this._removeContainer();
        }
      }.bind(this)
    );
  }
}

export default new CookieView();
