import { wait } from "../util.js";
class ValidateView {
  _parentEl = document.querySelector("form");
  _cardInput = document.querySelector(".card-num-input");
  _dateInput = document.querySelector(".date__input");
  _cvcInput = document.querySelector(".cvc__input");
  _errMessage = `Required`;
  constructor() {
    this._validateInputHandler();
  }
  _validateInputHandler() {
    this._cardInput.addEventListener("blur", this._validateCardNum.bind(this, this._cardInput));
    this._dateInput.addEventListener("blur", this._validateCardDate.bind(this, this._dateInput));
    this._cvcInput.addEventListener("blur", this._validateCardCvc.bind(this, this._cvcInput));
    this._cardInput.addEventListener("input", this.removeError.bind(this, this._cardInput));
    this._dateInput.addEventListener("input", this.removeError.bind(this, this._dateInput));
    this._cvcInput.addEventListener("input", this.removeError.bind(this, this._cvcInput));
    this._dateInput.addEventListener("keydown", this._valid.bind(this));
    this._cardInput.addEventListener("keydown", this._valid.bind(this));
    this._cvcInput.addEventListener('keydown', this._valid.bind(this));
  }
  async _valid(e) {
    await wait(1);
    if (e.target.value.replace(/\D/g, '').length === 4)
      this._validateCardDate(this._dateInput);
    if (e.target.value.replace(/\D/g, '').length === 16)
      this._validateCardNum(this._cardInput);
    if (e.target.value.replace(/\D/g, '').length === 3)
      this._validateCardCvc(this._cvcInput);
  
  }
  _validateCardNum(el) {
    const cardNum = el.value.replaceAll(/\D/g, "");
    if (cardNum.length === 0) return;
    if (cardNum.length < 16) this.renderError(el, "Your card is incomplete.");
  }
  _validateCardDate(el) {
    const date = new Date();
    const cardDate = el.value.replace(/\D/g, "");
    const month = el.value.slice(0, 2);
    const year = el.value.slice(-2);
    const cDate = new Date(+year.padStart(4, 20), +month - 1, 1);
    if (cardDate.length === 0)
      return;
    if (cardDate.length < 4) {
      this.renderError(el, "Your card's expiration date is incomplete.");
      return;
    }
    if (+year > 80) {
      this.renderError(el, "Your card's expiration year is invalid.");
      return;
    }
    if (cDate < date)
      this.renderError(el, "Your card's expiration date is in the past.");
  }
  _validateCardCvc(el) {
    if (el.value.length === 0)
      return;
    el.value.length < 3 && this.renderError(el, "Your card's security code is incomplete.");
  }
  renderError(el, message = this._errMessage) {
    const err = `<p class="err__message">${message}</p>`;
    const icons = el.closest(".card__num")?.querySelector(".card__icons");
    icons?.classList.add("hidden");
    el.classList.add("err__input");
    const field = el.closest(".input__field");
    const card = el.closest(".card_field");
    !field.querySelector('i') && field.insertAdjacentHTML("beforeend", `<i class= "fa-solid fa-circle-exclamation">`);
    if (message.toLowerCase() === "required") {
      card.querySelector(".label").querySelector(".err__message") &&
        card.querySelector(".label").insertAdjacentHTML("beforeend", err);
      return;
    }
    !card.querySelector(".error") &&
      card.insertAdjacentHTML("beforeend", `<div class="error">${err}</div>`);
  }
  removeError(el) {
    el.classList.remove("err__input");
    const field = el.closest(".input__field");
    const card = el.closest(".card_field");
    el.closest(".card__num")
      ?.querySelector(".card__icons")
      .classList.remove("hidden");
    field.querySelector("i")?.remove();
    card.querySelector(".error")?.remove();
  }
}

export default new ValidateView();
