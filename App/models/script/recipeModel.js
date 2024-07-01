import { API_KEY, API_URL, LOCAL_API_URL, RES_PER_PAGE } from "./config.js";
import { fetchJSON } from "./helpers.js";

export const getBookmarks = async function () {
  try {
    const data = await fetchJSON(`${LOCAL_API_URL}/bookmarksGetter.php`);
    const bookmarks = await Promise.all(
      data.bookmarks.map(async (id) => {
        const apiRecipe = fetchJSON(`${API_URL}${id}`);
        const localRecipe = fetchJSON(
          `${LOCAL_API_URL}/retrieveRecipe.php/${id}`
        );
        const res = await Promise.allSettled([localRecipe, apiRecipe]);
        const [data] = res.filter((res) => res.status === "fulfilled");
        return data.value.data.recipe;
      })
    );
    return bookmarks;
  } catch (err) {
    console.log(err.message);
  }
};
export const state = {
  recipe: {},
  bookmarks: [],
  search: {
    resultsPerPage: RES_PER_PAGE,
    page: 1,
  },
};
const createRecipeObject = function (data) {
  state.recipe = { ...data?.data?.recipe };
};

export const getRecipe = async function (id) {
  state.bookmarks;
  try {
    const apiRecipe = fetchJSON(`${API_URL}${id}`);
    const localRecipe = fetchJSON(`${LOCAL_API_URL}/retrieveRecipe.php/${id}`);
    const res = await Promise.allSettled([localRecipe, apiRecipe]);
    const data = res.reduce((data, res) => {
      if (res.status === "fulfilled") data = { ...res.value };
      return data;
    }, {});
    if (!data)
      throw new Error(`We couldn't find your recipe! Please try another one.`);
    createRecipeObject(data);
  } catch (err) {
    throw err;
  }
};
export const getRecipes = async function (query) {
  try {
    state.search.query = query;
    const apiRecipes = fetchJSON(`${API_URL}?search=${query}&key=${API_KEY}`);
    const localRecipes = fetchJSON(
      `${LOCAL_API_URL}/retrieveRecipes.php?search=${query}`
    );
    const data = await Promise.all([localRecipes, apiRecipes]);
    const [{ data: local }, { data: api }] = data;
    state.search.results = [...local.recipes, ...api.recipes];
    if (state.search.results.length === 0) throw new Error(`No Result Found`);
  } catch (err) {
    throw err;
  }
};

export const getRecipesPerPage = function (page = state.search.page) {
  state.search.page = page;
  const start = (page - 1) * 10;
  const end = page * 10;
  if (!state.search.results) return;
  return state.search.results.slice(start, end);
};
const storeBookmark = async function () {
  await fetchJSON(
    `${LOCAL_API_URL}/bookmarkSetter.php?recipe=${state.recipe.id}`
  );
};

export const addToBookmark = function () {
  if (state.recipe) state.bookmarks.push(state.recipe);
  storeBookmark();
};

export const deleteBookmarked = async function (id) {
  await fetchJSON(`${LOCAL_API_URL}/removeBookmarked.php?recipe=${id}`);
};
export const removeBookmark = function (id) {
  state.bookmarks.splice(
    state.bookmarks.findIndex((bookmark) => bookmark.id === id),
    1
  );
  deleteBookmarked(id);
};

export const checkBookmark = function () {
  return state.bookmarks.some((bookmark) => bookmark.id === state.recipe.id);
};

export const updateServing = function (newServing) {
  state.recipe.ingredients.forEach((ingd) => {
    ingd.quantity = ingd.quantity * (newServing / state.recipe.servings);
  });
  state.recipe.cooking_time = Math.round(
    state.recipe.cooking_time * (newServing / state.recipe.servings)
  );
  state.recipe.servings = newServing;
};

export const uploadRecipe = async function (newRecipe) {
  try {
    const ingredients = Object.entries(newRecipe)
      .filter(
        (entry) => entry[0].includes("ingredient") && (entry[1] || entry[2])
      )
      .map((ingredient) => {
        const ingrdArr = ingredient[1].split(",");
        if (ingrdArr.length !== 3)
          throw new Error(
            `Wrong Ingredient Format! Refer the one in the place-holder.`
          );
        const [quantity, unit, description] = ingrdArr;
        return {
          quantity: quantity ? +quantity : null,
          unit,
          description,
        };
      });
    const recipe = {
      title: newRecipe.title,
      source_url: newRecipe.source_url,
      servings: +newRecipe.serving,
      cooking_time: +newRecipe.cooking_time,
      image_url: newRecipe.img_url,
      publisher: newRecipe.publisher,
      ingredients,
    };
    const data = await fetchJSON(`${API_URL}?key=${API_KEY}`, "POST", recipe);
    createRecipeObject(data);
    window.location.hash = `#${state.recipe.id}`;
  } catch (err) {
    throw err;
  }
};

export const setRecipeRating = async function (id, rating, name) {
  console.log(id, rating, name);
  return await fetchJSON(
    `${LOCAL_API_URL}/setRating.php?id=${id}&rating=${rating}&recipe=${name}`
  );
};
export const getRecipeRating = async function (id) {
  return await fetchJSON(`${LOCAL_API_URL}/getRating.php?id=${id}`);
};
export const updateRecipeView = async function (id, name) {
  return await fetchJSON(`${LOCAL_API_URL}/updateRecipeView.php?id=${id}&name=${name}`);
};
