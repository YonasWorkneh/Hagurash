class FormView {
  _parentEl = document.querySelector("form");
  _checkboxes = this._parentEl.querySelectorAll('input[type="checkbox"]');

  constructor() {
    this._checkboxToggler();
  }

  commentHandler(handler) {
    this._parentEl.addEventListener("submit", function (e) {
      e.preventDefault();
      const form = new FormData(this);
      handler(form);
    });
  }
  _checkboxToggler() {
    this._checkboxes.forEach((checkbox) =>
      checkbox.addEventListener(
        "change",
        function () {
          this._checkboxes.forEach(
            (cBtn) => (cBtn.checked = cBtn === checkbox)
          );
        }.bind(this)
      )
    );
  }
  clearInputs() {
    document
      .querySelectorAll("input")
      .forEach(
        (input) =>
          (input.value = input.classList.contains("submit") ? input.value : "")
      );
    document.querySelector("textarea").value = "";
    this._checkboxes.forEach((checkbox) => (checkbox.checked = false));
  }
  logOutHandler(handler) {
    this._parentEl.closest('body').querySelector('.logout').addEventListener('click', function () {
      handler();
    })
  }
}

export default new FormView();
