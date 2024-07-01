import PlayerModel from "../models/script/playerModel.js";
import PlayerView from "../views/script/videoView/playerView.js";
import { updateNumView } from "../models/script/updateNumView.js";

class PlayerController {
  constructor(videoId) {
    this.model = new PlayerModel(videoId);
    this.view = new PlayerView(this.model);
  }

  init() {
    this.view.render(updateNumView);
  }

  removeLoader() {
    Loader.remove();
  }
  changeVideo(id) {
    this.model = new PlayerModel(id);
    this.view = new PlayerView(this.model);
    this.view.render();
  }
  async updateNumView(id) {
    const res = updateNumView(id);
    console.log(res);
  }
  stopVideo() {
    this.view.stopVideo();
  }
}

export default PlayerController;
