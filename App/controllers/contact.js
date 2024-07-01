import LoaderView from "../views/script/view/loaderView.js";
import HeaderView from "../views/script/view/headerView.js";
import FooterView from "../views/script/view/footerView.js";
import FormView from "../views/script/contactView/formView.js";
import { submitComment } from "../models/script/userModel.js";

import { logOut } from "../models/script/logOut.js";

const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("../index.php");
};

const handleComment = async function (comment) {
  try {
    const res = await submitComment(comment);
    console.log(res);
    if (res.ok) {
      window.alert("Your response has been recorded!");
    } else throw new Error(`Message Couldn't be sent.`);
  } catch (err) {
    console.error(err.message);
    window.alert(err.message);
  } finally {
    FormView.clearInputs();
  }
};

const init = function () {
  LoaderView.render();
  setTimeout(function () {
    LoaderView.remove();
  }, 2000);
  FormView.commentHandler(handleComment);
  FormView.logOutHandler(handleLogOut);
};

init();
