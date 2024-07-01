import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";


export const searchUser = async function (key) {
  return await fetchJSON(`${LOCAL_API_URL}/searchUser.php?search=${key}`);
}

export const setQuery = async function (key) {
  return await fetchJSON(`${LOCAL_API_URL}/setQuery.php?query=${key}`);
}
export const getQuery = async function (key) {
  return await fetchJSON(`${LOCAL_API_URL}/getQuery.php`);
}

export const resetQuery = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/resetQuery.php`);
}