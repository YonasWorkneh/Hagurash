import InputView from "./inputView.js";
class ToggleView {
  _signUpForm = document.querySelector(".sign-up");
  _signInForm = document.querySelector(".sign-in");
  _signUpBtn = document.querySelector(".sign-up-btn");
  _signInBtn = document.querySelector(".sign-in-btn");
  _inputs = document.querySelectorAll("input");

  constructor() {
    this._addEventListeners();
  }
  _addEventListeners() {
    this._signInBtn?.addEventListener("click", this._toggleForm.bind(this));
    this._signUpBtn?.addEventListener("click", this._toggleForm.bind(this));
  }
  _toggleForm() {
    this._signInForm.classList.toggle("hidden");
    this._signUpForm.classList.toggle("hidden");
    this._clearInputs();
    this._signUpForm.classList.contains("hidden")
      ? this._toggleDocumentTitle("Sign In")
      : this._toggleDocumentTitle("Sign Up");
  }
  _clearInputs() {
    this._inputs.forEach((input) => {
      input.value = input.type !== "submit" ? "" : input.value;
      input.classList.remove("err__input");
      if (input.type === "checkbox") input.checked = false;
    });
    document.querySelectorAll(".err__mess")?.forEach((err) => err.remove());
    document.querySelectorAll("label").forEach((label) => {
      label.classList.remove("label__active");
      label.classList.remove("err__input__label");
    });
    this._signUpForm.classList.contains("hidden")
      ? this._signInForm.querySelector("input").focus()
      : this._signUpForm.querySelector("input").focus();
  }
  _toggleDocumentTitle(title) {
    document.title = `${title} | Hagurash`;
  }
}

export default new ToggleView();
