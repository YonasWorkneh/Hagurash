import Loader from "../views/script/view/loaderView.js";
import HeaderView from "../views/script/view/headerView.js";
import FooterView from "../views/script/view/footerView.js";
import MainView from "../views/script/videoView/mainView.js";
import SideView from "../views/script/videoView/sideView.js";
import TrendingView from "../views/script/videoView/trendingView.js";
import PlayerModel from "../models/script/playerModel.js";
import { logOut } from "../models/script/logOut.js";
import { getVideos } from "../models/script/videoModel.js";
import { getTrendingVideos } from "../models/script/videoModel.js";
import { updateNumView } from "../models/script/updateNumView.js";
import PlayerView from "../views/script/videoView/playerView.js";




const handleLogOut = async function () {
  const res = await logOut();
  res.ok && window.location.assign("../index.php");
};

const handleSetSrc = function (src) {
  const id = src.slice(src.lastIndexOf('/') + 1);
  const playerModel = new PlayerModel(id);
  const playerView = new PlayerView();
  playerView.destroyPlayer();
  playerModel.updateVideoSource(id, updateNumView);
}


const setVideos = async function () {
  try {
    const videos = getVideos();
    const trending = getTrendingVideos();
    const res = await Promise.all([videos, trending]);
    const [video, trend] = res;
    if (video.ok) SideView.setNextVideos(video.results);
    SideView.renderNextVideos();
    if (trend.ok)
      TrendingView.setTrendingVideos(trend.results);
    TrendingView.renderTrendings();
  } catch (err) {
    console.log(err.message);
  }
}


const init = function () {
  TrendingView.changeVideoHandler(handleSetSrc);
  SideView.changeVideo(handleSetSrc);
  Loader.render();
  HeaderView.logOutHandler(handleLogOut);
  setVideos();
}

init();
