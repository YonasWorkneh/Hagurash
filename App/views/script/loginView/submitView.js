class SubmitForm {
  _signUpForm = document.querySelector(".sign-up");
  _signInForm = document.querySelector(".sign-in");

  signUpHandler(handler) {
    this._addSubmitEvent(this._signUpForm, handler);
  }
  signInHandler(handler) {
    this._addSubmitEvent(this._signInForm, handler);
  }
  _addSubmitEvent(el, handler) {
    el?.addEventListener("submit", function (e) {
      e.preventDefault();
      const form = new FormData(this);
      const data = Object.fromEntries(form);
      handler(data);
    });
  }
  displaySignUpErrors(errors) {
    errors.forEach((err) => {
      const input = this._signUpForm.querySelector(
        `input[name="${err.input}"]`
      );
      input.classList.add("err__input");
      input.previousElementSibling.classList.add("err__input__label");
      !input.nextElementSibling &&
        input.insertAdjacentHTML(
          "afterend",
          `<p class="err__mess">${err.errMess}</p>`
        );
    });
  }
  displaySignUpSucc(name) {
    document
      .querySelector(".inner__wrap")
      .insertAdjacentHTML("beforeend", this._generateMarkup(name));
    this._signUpForm.classList.add("hidden");
  }
  _generateMarkup(name) {
    return `
      <div class="fieldset succ">
        <img src="../../../assets/images/Logo.png" width="150" height="150" align="center" style="margin-top:20px">
        <div class="line"></div>
        <div class="succ__mess">
          <span>Welcome to Hagurash ${name}. Please press continue to Log into your account or home to go back to the home page.</span> 
          <div style="">
            <a href="../index.php">Home</a> 
            <button class="cont">Continue</button>
          </div>
        </div>
      </div>`;
  }
  displaySignInErrors(errors) {
    errors.forEach((err) => {
      const input = this._signInForm.querySelector(
        `input[name="${err.input}"]`
      );
      input.classList.add("err__input");
      input.previousElementSibling.classList.add("err__input__label");
      !input.nextElementSibling &&
        input.insertAdjacentHTML(
          "afterend",
          `<p class="err__mess">${err.errMess}</p>`
        );
      if (err.both) {
        input = this._signInForm.querySelector("input");
        input.classList.add("err__input");
        input.previousElementSibling.classList.add("err__input__label");
      }
    });
  }
}

export default new SubmitForm();
