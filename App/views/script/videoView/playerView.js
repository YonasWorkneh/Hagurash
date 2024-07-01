import Loader from "../view/loaderView.js";
class PlayerView {
  constructor(model) {
    this.model = model;
  }

  render(onVideoChange) {
    this.model.initializePlayer('player',Loader.remove,onVideoChange);
  }

  destroyPlayer() {
    const player = document.getElementById('player');
    const div = document.createElement('div');
    div.id = 'player';
    player.parentNode.replaceChild(div, player);
  }
}

export default PlayerView;
