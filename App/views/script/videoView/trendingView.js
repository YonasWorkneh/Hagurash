import MainView from "./mainView.js";
import SideView from "./sideView.js";
import { slide } from "../util.js";
class TrendingView {
  _parentEl = document.querySelector(".trending__container");
  _trendingVideosContainer = this._parentEl.querySelector(".trending__videos");
  _prevBtn = this._parentEl.querySelector(".prev-btn");
  _nextBtn = this._parentEl.querySelector(".next-btn");
  _playBtn = this._parentEl.querySelector(".fa-play");

  constructor() {
    this._addEventListeners();
  }

  setTrendingVideos(videos) {
    this.trending = videos;
  }

  _addEventListeners() {
    this._nextBtn.addEventListener("click", this._slide.bind(this));
    this._prevBtn.addEventListener("click", this._slide.bind(this));
  }
  changeVideoHandler(handler) {
    this._parentEl.addEventListener("click", function (e) {
      if (!(e.target.classList.contains("fa-play") || e.target.classList.contains("trend__title"))) return;
      const video = this.trending.find(video => video.id === e.target.closest(".trending__vid").dataset.id);
      handler(video.src);
      MainView.setVideo(video.title, video.description);
      MainView.scrollToView();
      SideView.renderNextVideos(SideView._shuffleVideos(video.id));
    }.bind(this));
  }

  _slide(e) {
    const trendings = document.querySelectorAll(".trending__vid");
    const trend = document.querySelector(".trending__vid");
    const contentWidth = Number.parseInt(getComputedStyle(trend).width);
    slide(e, this._trendingVideosContainer, trendings, contentWidth);
  }

  _playTrending(e) {
    if (
      !(
        e.target.classList.contains("fa-play") ||
        e.target.classList.contains("trend__title")
      )
    )
      return;
    const video = this.trending.find(
      (video) => video.id === e.target.closest(".trending__vid").dataset.id
    );
    MainView.setVideo(video.title, video.description);
    MainView.scrollToView();
  }
  renderTrendings(videos = this.trending) {
    videos.forEach((video) => {
      this._trendingVideosContainer.insertAdjacentHTML(
        "beforeend",
        this._generateHTML(video)
      );
    });
  }

  _generateHTML(video) {
    return `
      <div class="trending__vid" data-id="${video.id}">
      <div class="trend__img">
        <img src="${video.poster}" alt="fritata">
        <i class="fa-solid fa-play"></i>
      </div>
      <p class="trend__title">
        ${video.title.slice(0, 40)}${video.title.length > 10 ? "..." : ""}  
      </p>
    </div>`;
  }
}

export default new TrendingView();
