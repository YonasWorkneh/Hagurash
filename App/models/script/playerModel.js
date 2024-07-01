class PlayerModel {
  static id;
  constructor(videoId) {
    this.videoId = videoId;
    PlayerModel.id = videoId;
    this.player = null;
  }

  initializePlayer(containerId, onReadyCallback, onStateChangeCallback) {
    this.onReadyCallback = onReadyCallback;
    this.onStateChangeCallback = onStateChangeCallback;
    if (YT.loaded) {
      this.setPlayer(containerId);
    } else {
      const init = setInterval(
        function () {
          YT.loaded && this.setPlayer(containerId) && clearInterval(init);
        }.bind(this),
        50
      );
    }
  }
  setPlayer(id = "player", onStateChangeCallback) {
    if (onStateChangeCallback) {
      this.onStateChangeCallback = onStateChangeCallback;
      this.play = true;
    }
    this.player = new YT.Player(id, {
      height: "390",
      width: "640",
      videoId: this.videoId,
      playerVars: {
        playsinline: 1,
      },
      events: {
        'onReady': this.onPlayerReady.bind(this),
        'onStateChange': this.onPlayerStateChange.bind(this),
      },
    });
    return true;
  }
  updateVideoSource(newVideoId, onStateChangeCallback) {
    this.videoId = newVideoId;
    this.setPlayer("player", onStateChangeCallback);
  }
  onPlayerReady(event) {
    if (this.play) event.target.playVideo();
    this.onReadyCallback && this.onReadyCallback();
  }
  async onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING && !this.numViewIsSet) {
      this.numViewIsSet = true;
      try {
        const res = await this.onStateChangeCallback(this.videoId);
        if (!res.ok) throw new Error(`Problem trying to update number of Views`);
      } catch (err) {
        console.error(err);
      }
      
    }
  }
}

export default PlayerModel;
