class ProfileView {
  _parentEl = document.querySelector(".admin_profile_form");
  _profileMenuContainer = document.querySelector(".profile");

  constructor() {
    this._profileMenuContainer.addEventListener(
      "click",
      this._toggleProfileMenu.bind(this)
    );
    document.addEventListener(
      "click",
      function (e) {
        !e.target.closest(".profile") &&
          this._profileMenuContainer
            .querySelector(".profile__details")
            .classList.add("hidden");
      }.bind(this)
    );
  }
  adminFormHandler(handler) {
    this._parentEl.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!e.target.classList.contains("admin_profile_form")) return;
      const form = new FormData(this);
      handler(form);
    });
  }
 async applyChanges(data) {
    const profile = document.querySelector(".profile__container");
    profile.querySelector(".admin_name").textContent = data.name
      ? data.name
      : profile.querySelector(".admin_name").textContent;
    if (data.imgSrc) {
      await this.waitForImageLoad(data.imgSrc);
      this._parentEl.querySelector("img").src = data.imgSrc;
      profile.querySelector("img").src = data.imgSrc;
    }
    this._parentEl
      .querySelectorAll("input")
      .forEach((input) => (input.value = ""));
  }
  _toggleProfileMenu() {
    this._profileMenuContainer
      .querySelector(".profile__details")
      .classList.toggle("hidden");
  }
  profileMenuHandler(handler) {
    document.addEventListener(
      "click",
      function (e) {
        e.target.closest(".logout") && handler();
        if (!e.target.closest(".settings")) return;
        document
          .querySelector(".sidebar")
          .querySelectorAll("li")
          .forEach((li) => li.classList.remove("active"));
        document.querySelector(".prof").classList.add("active");
        document
          .querySelectorAll(".detail")
          .forEach((detail) => detail.classList.add("hidden"));
        document.querySelector(".admin_profile").classList.remove("hidden");
      }.bind(this)
    );
  }
  waitForImageLoad(imgSrc) {
    return new Promise((resolve, reject) => {
      const tempImg = new Image();
      tempImg.src = imgSrc;
      tempImg.onload = () => resolve();
      tempImg.onerror = (error) => reject(error);
    });
  }
}

export default new ProfileView();
