import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";

export const logOut = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/logout.php`);
}