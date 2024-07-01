import Loader from "../views/script/view/loaderView.js";
import HeaderView from "../views/script/view/headerView.js";
import FooterView from "../views/script/view/footerView.js";
import CounterView from "../views/script/aboutView/counterView.js";
import { getTotals } from "../models/script/overviewModel.js";
import { logOut } from "../models/script/logOut.js";


const getNumUsers = async function () {
  try {
    Loader.render();
    const numUsers = await getTotals("length.php", "users");
    CounterView.setNumUsers(numUsers);
  } catch(err){
    console.error(err.message);
  } finally {
    setTimeout(function () {
      Loader.remove();
    }, 2000);
  }
}

const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("../index.php");
};

const init = function () {
  HeaderView.logOutHandler(handleLogOut)
  getNumUsers();
}

init();