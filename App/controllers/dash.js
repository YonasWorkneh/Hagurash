import MainView from "../views/script/dashView/MainView.js";
import MenuView from "../views/script/dashView/menuView.js";
import OverView from "../views/script/dashView/overView.js";
import AnalyticsView from "../views/script/dashView/analyticsView.js";
import PopularRecipes from "../views/script/dashView/recipeView.js";
import CustomersView from "../views/script/dashView/customersView.js";
import SearchView from "../views/script/dashView/customerSearchView.js";
import SortView from "../views/script/dashView/sortView.js";
import FilterView from "../views/script/dashView/filterView.js";
import ProfileView from "../views/script/dashView/profileView.js";
import { getTotals } from "../models/script/overviewModel.js";
import { fetchBoth } from "../models/script/popularNReviews.js";
import {
  deleteRecipe,
  editRecipe,
  addRecipe,
} from "../models/script/popularRecipeModel.js";
import { fetchCustomersList } from "../models/script/customersListModel.js";
import { searchUser } from "../models/script/SearchModel.js";
import recipeView from "../views/script/dashView/recipeView.js";
import { filterCustomerList } from "../models/script/filterModel.js";
import { sortCustomerList } from "../models/script/sort.js";
import {
  processAdminLogout,
  processAdminProfileChange,
} from "../models/script/userModel.js";
import { exportCustomerData } from "../models/script/exportModel.js";
import CommentsView from "../views/script/dashView/commentsView.js";
import { retrieveChats } from "../models/script/commentsModel.js";
import { updateUnseen } from "../models/script/commentsModel.js";
import { mailMessage } from "../models/script/commentsModel.js";
import { getRatings, getViews } from "../models/script/updateNumView.js";

const handleContentChange = function (className) {
  MainView.showActiveContent(className);
};

const getPopularAndReviews = async function () {
  const [populars, reviews] = await fetchBoth();
  PopularRecipes.displayRecipes(populars.popularRecipes);
};

const setTotals = async function () {
  try {
    const numCustomers = getTotals(`length.php`, "users");
    const numBookmark = getTotals(`length.php`, "bookmarks");
    const res = await Promise.all([numCustomers, numBookmark]);
    const [customers, bookmarks] = res;
    OverView.setTotalCustomers(customers);
    OverView.setTotalBookmarks(bookmarks);
  } catch (err) {
    console.error(err.message);
  } finally {
    OverView.onSettterComplete();
  }
};

const handleRecipeDelete = async function (id, title) {
  if (!window.confirm(`Are you sure you want remove this recipe?`)) return;
  const res = await deleteRecipe(id);
  if (res.status === "success") PopularRecipes.removeFromList(title);
};
const handleAddRecipe = async function (data) {
  const res = await addRecipe(data);
  if (res.status === "sucess") {
    PopularRecipes.OnSuccessfulAdd(data);
  }
};
const handleEditRecipe = async function (data) {
  const res = await editRecipe(data);
  if (res.status === "success") PopularRecipes.onEditSuccess(data);
};

const getCustomersList = async function () {
  const res = await fetchCustomersList();
  if (res.status === "success") CustomersView.displayCustomers(res.results);
};
const handleSearch = async function (key) {
  if (!key) {
    const res = await fetchCustomersList();
    if (res.status === "success") CustomersView.displayCustomers(res.results);
    return;
  }
  const res = await searchUser(key);
  if (res.status === "success") CustomersView.displayCustomers(res.results);
};
const handleFilter = async function (bool) {
  if (bool) {
    const res = await fetchCustomersList();
    if (res.status === "success") CustomersView.displayCustomers(res.results);
    return;
  }

  const res = await filterCustomerList();
  if (res.status === "success") CustomersView.displayCustomers(res.results);
};

const handleSort = async function (sortBy) {
  const res = await sortCustomerList(sortBy);
  if (res.status === "success") CustomersView.displayCustomers(res.results);
};

const handleAdminProfileChange = async function (data) {
  const res = await processAdminProfileChange(data);
  if (res.ok) ProfileView.applyChanges(res.result);
};

const handleLogout = async function () {
  const res = await processAdminLogout();
  res.ok && window.location.assign("login.php");
};

const handleExport = async function (format) {
  const res = await exportCustomerData(format);
};

const getChats = async function (flag) {
  const res = await retrieveChats();
  if (res.ok) {
    CommentsView.renderChats(res.comments, flag);
    OverView.setTotalComments(res.comments.length);
  }
};

const getPopularRecipesInfo = async function () {
  const res = await Promise.allSettled([getViews(), getRatings()]);
  const [views, ratings] = res;
  if (views.value.ok || ratings.value.ok)
    AnalyticsView.renderAnalytics(ratings.value.results, views.value.results);
};

const updateChatSeenStatus = async function (id) {
  const res = await updateUnseen(id);
  if (res.ok) CommentsView.renderSelectedChat(id);
};

const handleMail = async function (message, id, email, name) {
  CommentsView.renderNewMessage(message);
  const res = await mailMessage(message, id, email, name);
  if (res.ok) {
    CommentsView.removeLoader();
    getChats({ render: false });
  } else console.error(res.error);
};

const init = function () {
  getChats();
  getPopularRecipesInfo();
  MenuView.addEventListener(handleContentChange);
  PopularRecipes.removeRecipeHandler(handleRecipeDelete);
  PopularRecipes.editHandler(handleEditRecipe);
  PopularRecipes.addHandler(handleAddRecipe);
  CustomersView.exportHandler(handleExport);
  SearchView.searchHandler(handleSearch);
  SortView.sortHandler(handleSort);
  FilterView.filterHandler(handleFilter);
  ProfileView.adminFormHandler(handleAdminProfileChange);
  ProfileView.profileMenuHandler(handleLogout);
  CommentsView.handleChatSelection(updateChatSeenStatus);
  CommentsView.handleMailing(handleMail);
  setTotals();
  getPopularAndReviews();
  getCustomersList();
};

init();
