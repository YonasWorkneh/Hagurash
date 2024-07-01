import SideView from "./sideView.js";
import Loader from "../view/loaderView.js";
class MainView {
  _parentEl = document.querySelector(".hero");
  _expandBtn = this._parentEl.querySelector("svg");
  _isFullScreen = false;

  constructor() {
    this.expandHandler();
    this._litenToVideoLoad();
  }

  _litenToVideoLoad() {
    const check = setInterval(function () {
      if (this._parentEl.querySelector("iframe")) {
        this._videoPlayer = this._parentEl.querySelector('iframe');
        Loader.remove();
        clearInterval(check);
      }
    }.bind(this), 50);
  }
  _setMainVideoTitle(title) {
    this._parentEl.querySelector(".vid__title").innerHTML = title;
  }
  _setMainVideoDescription(description) {
    this._parentEl.querySelector(".vid__description").innerHTML = description;
  }
  setVideo(title, description) {
    this._setMainVideoTitle(title);
    this._setMainVideoDescription(description);
  }

  expandHandler() {
    this._parentEl.querySelector(".hero__vid").addEventListener(
      "mouseover",
      function () {
        this._isFullScreen && this._expandBtn.classList.remove("hidden");
      }.bind(this)
    );
    this._parentEl.querySelector(".hero__vid").addEventListener(
      "mouseleave",
      function (e) {
        this._expandBtn.classList.add("hidden");
      }.bind(this)
    );
    this._expandBtn.addEventListener(
      "click",
      SideView._showSideView.bind(SideView)
    );
  }
  scrollToView() {
    this._parentEl.scrollIntoView({ behavior: "smooth", block: "start" });
  }
}

export default new MainView();
