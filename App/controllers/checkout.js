import InputView from "../views/script/checkOutView/inputView.js";
import Header from "../views/script/checkOutView/headerView.js";
import validateView from "../views/script/checkOutView/validateView.js";
import { getSelectedPlan } from "../models/script/localStorageUtils.js";
import { fetchJSON } from "../models/script/helpers.js";

const handleSetCountry = async function () {
  try {
    const data = await fetchJSON(`https://ipapi.co/json/`);
    return data.country_name;  
  } catch (err) {
    console.log(err.message);
  }
}

 const handleGoBack = function () {
    window.location.assign("offer.php");
  }

const init = function () {
  Header.getPlan(getSelectedPlan());
  Header.setCountryHandler(handleSetCountry);
  Header.goBackHandler(handleGoBack);
};
init();
