import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";

export const setQuery = function (query) {
  localStorage.setItem("query", query);
};
export const getQuery = function () {
  return localStorage.getItem("query");
};
export const resetQuery = function () {
  localStorage.removeItem("query");
};
export const setCookieConsent = function (bool) {
  localStorage.setItem(
    "cookie-consent",
    JSON.stringify({ consent: bool, date: Date.now() })
  );
};

export const getCookieConsent = function () {
  localStorage.getItem("cookie-consent");
};
export const resetCookieConsent = function () {
  localStorage.removeItem("cookie-consent");
};
export const setSelectedPlan = function (plan) {
  localStorage.setItem("selectedPlan", plan);
};

export const getSelectedPlan = function () {
  return localStorage.getItem("selectedPlan");
};

export const setUserStatus = async function () {
  const data = await fetchJSON(`${LOCAL_API_URL}/userStatus.php`);
  localStorage.setItem("user", JSON.stringify(data));
};
export const getUserStatus = function () {
  return JSON.parse(localStorage.getItem("user"));
};
