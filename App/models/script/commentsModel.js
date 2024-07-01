import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";

export const retrieveChats = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/retrieveChats.php`);
};
export const updateUnseen = async function (id) {
  return await fetchJSON(`${LOCAL_API_URL}/updateUnseen.php?id=${id}`);
};

export const mailMessage = async function (message, id, email,name) {
  return await fetchJSON(`${LOCAL_API_URL}/mail.php`, 'POST', { message, id, email,name });
};
