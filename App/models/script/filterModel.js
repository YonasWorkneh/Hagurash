import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";

export const filterCustomerList = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/filterList.php?`);
};

