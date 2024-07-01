
import LoaderView from "../views/script/view/loaderView.js";
import HeaderView from "../views/script/view/headerView.js";
import FooterView from "../views/script/view/footerView.js";
import MainView from "../views/script/accountView/mainView.js";
import { deleteBookmarked, getBookmarks } from "../models/script/recipeModel.js";
import { logOut } from "../models/script/logOut.js";


const getUserBookmarks = async function () {
  try {
    const bookmarks = await getBookmarks();
    bookmarks.length ? MainView.renderBookmarks(bookmarks) : MainView.renderMenu();
  } catch (err) {
    console.error(err.message);
  } finally {
    setTimeout(function () {
      LoaderView.remove();
    }, 1000);
  }
}

const handleLogOut = async function () {
  localStorage.removeItem('user');
  const res = await logOut();
  res.ok && window.location.assign("../");
};

const handleUnBookmark = async function (id) {
  const res = await deleteBookmarked(id);
  MainView.removeRecipe(id);
}


const init = async function () {
  LoaderView.render();
  getUserBookmarks();
  MainView.logOutHandler(handleLogOut);
  MainView.unBookmarkHandler(handleUnBookmark);
}

init();