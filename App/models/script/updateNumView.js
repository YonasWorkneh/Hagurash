import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";

export const updateNumView = async function (id) {
   return await fetchJSON(`${LOCAL_API_URL}/updateNumView.php?id=${id}`);
};

export const getViews = async function () {
   return await fetchJSON(`${LOCAL_API_URL}/getViewsInfo.php`);
}

export const getRatings = async function () {
   return await fetchJSON(`${LOCAL_API_URL}/getRatings.php`);
}
