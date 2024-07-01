import HeaderView from "../views/script/view/headerView.js";
import FooterView from "../views/script/view/footerView.js";
import SubscribeView from "../views/script/offersView/subscribeView.js";
import { setSelectedPlan } from "../models/script/localStorageUtils.js";
import { logOut } from "../models/script/logOut.js";

const handleSelectedPlan = function (plan) {
  setSelectedPlan(plan);
  window.location.assign("checkout.php");
};

const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("../index.php");
};

const init = function () {
  HeaderView.logOutHandler(handleLogOut);
  SubscribeView.redirectHandler(handleSelectedPlan);
};

init();
