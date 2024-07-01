class MenuView {
  _parentEl = document.querySelector(".sidebar");
  _lists = this._parentEl.querySelectorAll("li");
  _darkModeBtn = this._parentEl.querySelector(".dark").querySelector('label');
  _body = document.querySelector('body');

  constructor() {
    this._darkModeBtn.addEventListener(
      "click",
      this._toggleDarkMode.bind(this)
    );
  }

  addEventListener(handler) {
    this._lists.forEach((list) => {
      list.addEventListener(
        "click",
        function (e) {
          if (list.classList.contains("dark")) return;
          this._lists.forEach((list) => list.classList.remove("active"));
          list.classList.add("active");
          handler(e.target.dataset.class);
        }.bind(this)
      );
    });
  }
  _toggleDarkMode(e) {
    e.preventDefault();
    this._darkModeBtn.classList.toggle('toggle-switch-active');
    this._body.classList.toggle('dark__mode');
  }
}

export default new MenuView();
