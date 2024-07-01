import MainView from "./mainView.js";
class SideView {
  _parentEl = document.querySelector(".up__next");
  _hideIcon = this._parentEl.querySelector(".hide");

  constructor() {
    this._addEventListeners();
  }

  _addEventListeners() {
    this._hideIcon.addEventListener("click", this._hideSideView.bind(this));
    
  }

  _hideSideView() {
    MainView._isFullScreen = true;
    MainView._parentEl.classList.add("fullscreen");
    this._parentEl.classList.add("hidden");
  }
  changeVideo(handler) {
   this._parentEl.addEventListener(
     "click",
     function (e) {
       if (!e.target.closest(".next__video")) return;
       const nextVideo = e.target.closest(".next__video");
       const video = this.videos.find(
         (video) => video.id === nextVideo.dataset.id
       );
       handler(video.src);
       MainView.setVideo(video.title, video.description);
       this.renderNextVideos(this._shuffleVideos(video.id));
     }.bind(this)
   );
  }
  _showSideView() {
    MainView._isFullScreen = false;
    MainView._parentEl.classList.remove("fullscreen");
    this._parentEl.classList.remove("hidden");
  }
  setNextVideos(videos) {
    this.videos = videos;
  }
  renderNextVideos(videos = this.videos) {
    this._parentEl.querySelector(".vid__wrap").innerHTML = '';
    videos.forEach((video) =>
      this._parentEl
        .querySelector(".vid__wrap")
        .insertAdjacentHTML("beforeend", this._generateHTML(video))
    );
  }
  _shuffleVideos(id) {
    return this.videos
      .filter((vid) => vid.id !== id)
      .sort(() => Math.random() - 0.5);
  }
  _generateHTML(video) {
    return `
      <div class="next__video" data-id="${video.id}">
        <img class="vidd" src="${video.poster}" alt="${video.title}">
        <p class="title">
          ${video.title.slice(0, 40)}${video.title.length > 10 ? "..." : ""}   
        </p>
      </div>`;
  }
}

export default new SideView();
