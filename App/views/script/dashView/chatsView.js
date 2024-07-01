class ChatsView {
  _parentEl = document.querySelector(".chats");
  displayChats(chats, flag) {
    if (flag) this._parentEl.innerHTML = "";
    chats.forEach((chat) =>
      this._parentEl.insertAdjacentHTML("beforeend", this.generateHTML(chat))
    );
  }
  chatSelectionHandler(handler) {
    document.addEventListener("click", function (e) {
      const chat = e.target.closest(".chat");
      if (!chat) return;
      const id = chat.dataset.id;
      document
        .querySelectorAll(".chat")
        .forEach((chat) => chat.classList.remove("active"));
      chat.classList.add("active");
      handler(id);
    });
  }
  generateHTML(chat) {
    const date = new Date(Number(chat.last_active));
    let options = { hour: "numeric", minute: "numeric", hour12: true };
    if (
      Date.now() - Number(chat.last_active) > 86_400_000 &&
      Date.now() - Number(chat.last_active) < 604_800_000
    )
      options = { weekday: "short" };
    if (Date.now() - Number(chat.last_active) > 604_800_000) {
      options = { day: "2-digit", month: "2-digit" };
    }

    const formatter = new Intl.DateTimeFormat("en-US", options);
    const lastSeen = formatter.format(date);
    const unseen = chat.messages.reduce((acc, message) => {
      acc = !message.seen ? ++acc : acc;
      return acc;
    }, 0);
    const subject = chat.messages.at(-1).subject;
    return `
      <li class="chat" data-id="${chat.id}">
        <div class="message_left">
          <img src="../../../assets/images/${
            chat.gender === "f"
              ? "avatar_f.jpg"
              : Math.round(Math.random() * 3) === 1
              ? "avatar.png"
              : "avatar.avif"
          }" alt="avatar">
          <div class="message">
            <p class="sender">${chat.name}</p>
            <p class="body">${subject}...</p>
          </div>
        </div>
        <div class="mess__dates">
          <p class="date">${lastSeen}</p>
          <p class="unseen__mess ${
            unseen === 0 ? "unseen__zero" : ""
          }">${unseen}</p>
        </div>
      </li>`;
  }
  renderError(message = "No Results") {
    console.log(this._parentEl);
    console.log(this._parentEl.innerHTML);
    this._parentEl.innerHTML = `
    <li class = "no__search">
      <i class="fa-solid fa-triangle-exclamation"></i>
      <span>${message} for &quot;${
      this._parentEl.closest(".comments").querySelector(".search").value
    }&quot;</span>
    </li>`;
  }
  
}

export default new ChatsView();
