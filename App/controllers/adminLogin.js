import InputView from "../views/script/loginView/inputView.js";
import SubmitForm from "../views/script/loginView/submitView.js";
import { processAdminLogin } from "../models/script/userModel.js";

const signIn = async function (data) {
  const res = await processAdminLogin(data);
  res.ok
    ? document.location.assign("../dashboard/")
    : SubmitForm.displaySignInErrors(res.errors);
};

const init = function () {
  SubmitForm.signInHandler(signIn);
};

init();
