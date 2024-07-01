import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";
import { getBookmarks } from "./recipeModel.js";

export const validateSignUpInfo = async function (data) {
  return await fetchJSON(`${LOCAL_API_URL}/signUp.php`, "POST", data);
};

export const validateSignInInfo = async function (data) {
  return await fetchJSON(`${LOCAL_API_URL}/signIn.php`, "POST", data);
};

export const processAdminLogin = async function (data) {
  return await fetchJSON(`${LOCAL_API_URL}/adminLogin.php`, "POST", data);
};

export const processAdminProfileChange = async function (data) {
  return await fetch(`${LOCAL_API_URL}/adminProfileUpdate.php`, {
    method: "POST",
    body: data,
  })
    .then((res) => res.json())
    .then((data) => data);
};

export const processAdminLogout = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/adminLogout.php`);
};

export const submitComment = async function (comment) {
  console.log(comment);
  return await fetch(`${LOCAL_API_URL}/comment.php`, {
    method: "POST",
    body: comment,
  }).then(res => res.json());
};

