import InputView from "../views/script/loginView/inputView.js";
import ToggleView from "../views/script/loginView/toggleView.js";
import SubmitForm from "../views/script/loginView/submitView.js";
import { validateSignInInfo, validateSignUpInfo } from "../models/script/userModel.js";

const signUp = async function (signUpInfos) {
  const res = await validateSignUpInfo(signUpInfos);
  res.ok ? SubmitForm.displaySignUpSucc(res.data.name) : SubmitForm.displaySignUpErrors(res.errors);
}

const signIn = async function (data) {
  const res = await validateSignInInfo(data);
  console.log(res);
  res.ok
    ? document.location.assign('../')
    : SubmitForm.displaySignInErrors(res.errors);
}

const init = function () {
  SubmitForm.signUpHandler(signUp);
  SubmitForm.signInHandler(signIn);
}

init();