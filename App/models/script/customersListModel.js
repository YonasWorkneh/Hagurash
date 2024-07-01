import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";


export const fetchCustomersList = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/customersList.php?`);
}