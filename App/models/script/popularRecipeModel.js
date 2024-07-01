import { LOCAL_API_URL } from "./config.js"
import { fetchJSON } from "./helpers.js"

export const addRecipe = async function (data) {
  return await fetchJSON(`${LOCAL_API_URL}/addRecipe.php`,"POST",data);
}
export const editRecipe = async function (data) {
  return await fetchJSON(`${LOCAL_API_URL}/editRecipe.php?`,"POST",data);
}

export const deleteRecipe = async function (id) {
  const res = await fetchJSON(`${LOCAL_API_URL}/deleteRecipe.php?id=${id}`);
  console.log(res);
  return res;
};