import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";

export const getTotals = async function (url,table) {
  const res = await fetchJSON(`${LOCAL_API_URL}/${url}?table=${table}`);
  return res.length;
}