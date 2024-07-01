class InputView {
  _parentEl = Array.from(document.querySelectorAll("form"));
  _inputs = document.querySelectorAll("input");
  _labels = document.querySelectorAll("label");
  constructor() {
    this._addEventListener();
  }
  _addEventListener() {
    document.addEventListener(
      "DOMContentLoaded",
      function () {
        this._inputs.forEach((input) => {
          input.hasAttribute("autofocus") &&
            document
              .querySelector(`label[for=${input.id}]`)
              .classList.add("label__active");
        });
      }.bind(this)
    );
    this._inputs.forEach((input) => {
      if (input.type !== "checkbox" && input.type !== "submit") {
        input.addEventListener("focus", this._translateLabel.bind(this));
        input.addEventListener("input", this._removeError);
      }
    });
    this._inputs.forEach((input) => {
      input.type !== "checkbox" &&
        input.type !== "submit" &&
        input.addEventListener("blur", this._unTranslateLabels.bind(this));
    });
  }
  _translateLabel(e) {
    this._parentEl.forEach((parent) => {
      if (!parent.classList.contains("hidden")) {
        this._unTranslateLabels();
        const label = parent.querySelector(`label[for=${e.target.id}]`);
        label.classList.add("label__active");
      }
    });
    document.addEventListener("click", function (e) {
      if (!e.target.classList.contains("cont")) return;
      e.target.closest(".succ").remove();
      document.title = "Sign In | Hagurash";
      this.querySelector(".sign-in").classList.remove("hidden");
    });
  }
  _removeError() {
    if (!this.nextElementSibling?.classList.contains("err__mess")) return;
    const label = this.previousElementSibling;
    this.classList.remove("err__input");
    label.classList.remove("err__input__label");
    this.nextElementSibling.remove();
  }
  _unTranslateLabels() {
    this._labels.forEach((label) => {
      if (!document.querySelector(`#${label.htmlFor}`).value)
        label.classList.remove("label__active");
    });
  }
}
export default new InputView();
