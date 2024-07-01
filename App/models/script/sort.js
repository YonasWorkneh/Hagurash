import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";

export const sortCustomerList = async function (sortBy) {
  return await fetchJSON(`${LOCAL_API_URL}/sort.php?sort=${sortBy}`);
};
