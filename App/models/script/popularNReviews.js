import { fetchJSON } from "./helpers.js";
import { LOCAL_API_URL } from "./config.js";

export const fetchBoth = async function () {
  try {
    const reviews = fetchJSON(`${LOCAL_API_URL}/review.php`);
    const populars = fetchJSON(`${LOCAL_API_URL}/popularRecipes.php`);
    const result = await Promise.all([populars, reviews]);
    return result;
  } catch (err) {
    throw err;
  }
};
