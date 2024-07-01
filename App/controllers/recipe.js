import * as model from "../models/script/recipeModel.js";
import HeaderView from "../views/script/view/headerView.js";
import recipeView from "../views/script/recipeView/recipeView.js";
import searchView from "../views/script/recipeView/searchView.js";
import resultsView from "../views/script/recipeView/resultsView.js";
import paginationView from "../views/script/recipeView/paginationView.js";
import bookmarkView from "../views/script/recipeView/bookmarkView.js";
import updateServingView from "../views/script/recipeView/updateServingView.js";
import AddRecipeView from "../views/script/recipeView/addRecipeView.js";
import { Modal_Close_Sec } from "../models/script/config.js";
import { getQuery, resetQuery } from "../models/script/SearchModel.js";
import NavMenu from "../views/script/recipeView/navMenuView.js";
import {
  getUserStatus,
  setSelectedPlan,
} from "../models/script/localStorageUtils.js";
import { getBookmarks } from "../models/script/recipeModel.js";
import { USER } from "../models/script/config.js";
import OfferView from "../views/script/recipeView/offerView.js";
import offerView from "../views/script/recipeView/offerView.js";
import headerView from "../views/script/view/headerView.js";

const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("../index.php");
};

const searchRecipes = async function (e) {
  e && e.preventDefault();
  try {
    const query = searchView.getQuery();
    if (!query) return;
    resultsView.renderLoader();
    await model.getRecipes(query);
    renderData();
  } catch (err) {
    console.error(err.message);
    resultsView.renderError();
  }
};

const renderData = function (page = 1) {
  resultsView.render(model.getRecipesPerPage(page));
  paginationView.render(model.state.search);
};

const showRecipe = async function (e) {
  try {
    const key = window.location.hash.slice(1);
    if (!key) return;
    recipeView.renderLoader();
    await model.getRecipe(key);
    await model.updateRecipeView(
      model.state.recipe.id,
      model.state.recipe.title
    );
    recipeView.setBookStatus(model.checkBookmark());
    const recipeRating = await model.getRecipeRating(model.state.recipe.id);
    if (recipeRating.ok) recipeView.setRating(recipeRating.rating);
    recipeView.render(model.state.recipe);
    recipeView.ratingHandler(handleRating);
    resultsView.update(model.getRecipesPerPage(model.state.search.page));
    bookmarkView.update(model.state.bookmarks);
  } catch (err) {
    console.error(err.message);
    recipeView.renderError();
  }
};

const handleBookmark = function (option) {
  const user = getUserStatus();
  if (!user.loggedIn) {
    alert("You have to sign in to bookmark.");
    return;
  }
  if (option) {
    if (user.status === USER.FREE.CODE) {
      if (++model.state.bookmarks.length > USER.FREE.MAX_BOOKMARKS) {
        OfferView.displayOffer();
        return;
      }
    }
    model.addToBookmark();
    bookmarkView.changeBookmarkIcon(true);
  }
  if (!option) {
    model.removeBookmark(model.state.recipe.id);
    bookmarkView.changeBookmarkIcon(false);
  }
  bookmarkView.render(model.state.bookmarks);
};

const controlServing = function (serving) {
  model.updateServing(serving);
  recipeView.update(model.state.recipe);
};

const addRecipe = async function (newRecipe) {
  try {
    const user = getUserStatus();

    if (user.status === USER.FREE.CODE || !user.loggedIn) {
      OfferView.displayOffer();
      throw new Error(`You have to upgrade to premium to upload recipes`);
    }
    AddRecipeView.renderLoader();
    await model.uploadRecipe(newRecipe);
    AddRecipeView.renderMessage();
    recipeView.setBookStatus(model.checkBookmark());
    recipeView.render(model.state.recipe);
    setTimeout(
      AddRecipeView.toggleWindow.bind(AddRecipeView),
      Modal_Close_Sec * 1000
    );
  } catch (err) {
    console.error(err.message);
    AddRecipeView.renderError(err.message);
  }
};
const acrossSearchHandler = async function () {
  const res = await getQuery();
  if (!res.ok) return;
  searchView.setQuery(res.query);
  searchRecipes();
  await resetQuery();
};

const setBookmarks = async function () {
  try {
    const bookmarks = await getBookmarks();
    model.state.bookmarks = bookmarks;
    bookmarkView.render(model.state.bookmarks);
  } catch (err) {
    console.error(err.message);
  }
};

const handleRating = async function (rating) {
  const user = getUserStatus();
  console.log(user);
  if (!user.loggedIn) {
    window.alert("You should create an account to rate recipes");
    return;
  }
  const id = model.state.recipe.id;
  const recipe = model.state.recipe.title;
  const res = await model.setRecipeRating(id, rating, recipe);
  if (res.ok) {
    recipeView.adjustFilling(+rating, true);
  }
};

const handlePlanSelection = function (plan) {
  setSelectedPlan(plan);
  window.location.assign(`../subscription/checkout.php`);
};
const init = function () {
  HeaderView.logOutHandler(handleLogOut);
  const user = getUserStatus();
  user.loggedIn && setBookmarks();
  recipeView.addHandler(showRecipe);
  searchView.addSearchHandler(searchRecipes);
  paginationView.paginationHandler(renderData);
  bookmarkView.bookmarkHandler(handleBookmark);
  updateServingView.ServingHandler(controlServing);
  AddRecipeView.submitRecipeHandler(addRecipe);
  offerView.selectHandler(handlePlanSelection);
  acrossSearchHandler();
};

init();
