import HeaderView from "../views/script/view/headerView.js";
import SearchView from "../views/script/homeView/searchView.js";
import SearchFormView from "../views/script/homeView/searchFormView.js";
import PopularRecipes from "../views/script/homeView/popularRecipesView.js";
import TestimonialView from "../views/script/homeView/testimonialView.js";
import FooterView from "../views/script/view/footerView.js";
import SectionObserver from "../views/script/homeView/observerView.js";
import CookieView from "../views/script/homeView/cookieView.js";
import { setUserCookieConsent } from "../models/script/cookieModel.js";
import { setQuery } from "../models/script/SearchModel.js";
import cookieView from "../views/script/homeView/cookieView.js";
import inputView from "../views/script/loginView/inputView.js";
import { logOut } from "../models/script/logOut.js";
import { fetchBoth } from "../models/script/popularNReviews.js";
import Loader from "../views/script/view/loaderView.js";
import { fetchJSON } from "../models/script/helpers.js";
import { setUserStatus } from "../models/script/localStorageUtils.js";

const setSearchQuery = async function (query) {
  const res = await setQuery(query);
  res.ok && window.location.assign("recipe/");
};

const getReviewsAndPopularRecipes = async function () {
  try {
    const res = await fetchBoth();
    const [popular, review] = res;
    PopularRecipes.setRecipes(popular.popularRecipes);
    TestimonialView.displayTestionials(review.reviews);
  } catch (err) {
    console.log(err.message);
  } finally {
    setTimeout(() => Loader.remove(), 2000);
  }
};
const handleCookies = async function (consent) {
  await setUserCookieConsent(consent);
};

const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("index.php");
};

const setStatus = async function () {
  try {
    setUserStatus();
  } catch (err) {
    console.log(err.message);
  }
};

const init = function () {
  Loader.render();
  SearchFormView.searchQueryHandler(setSearchQuery);
  CookieView.cookieHandler(handleCookies);
  getReviewsAndPopularRecipes();
  HeaderView.logOutHandler(handleLogOut);
  setStatus();
};

init();
