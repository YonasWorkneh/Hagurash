class ChatView {

  _parentEl = document.querySelector(".comment__detail__wrap");

  renderChat(chat, userImg) {
    this._parentEl.classList.add(".active");
    this._parentEl.innerHTML = this._genetateMarkUp(chat, userImg);
    this._parentEl
      .closest(".comment__detail")
      .querySelector(".comment__detail__placeholder")
      .classList.add("hidden");
    setTimeout(
      function () {
        const el = document.querySelector(".comm__mess");
        el.scrollTop = el.scrollHeight - el.clientHeight;
      }.bind(this),
      10
    );
  }
  _genetateMarkUp(chat, src) {
    return `
      <div class="comment__detail__wrap">
        <div class="comment__header">
          <div class="commenter">
            <img src="${src}" alt="avatar">
            <div style="display: flex; justify-content:center; flex-direction:column">
              <p class="name">${chat.name}</p>
              <div class="mess__dates" style="flex-direction: row; gap:5px">
                <p class="last__seen"> Last seen </p>
                <p class="date">${this.formatDate(+chat.last_active)}</p>
              </div>
            </div>
          </div>
          <i style="cursor:pointer;" class="fa-solid fa-ellipsis-vertical"></i>
          </div>
          <div class="comm__mess">
          <ul class="convos">
          ${chat.messages.reduce((messages, message) => {
      messages += `
            ${this._messageMarkup(
        "user",
        message.message_id,
        chat.email,
        chat.name,
        src,
        message.message,
        message.sent_at
      )}
              ${message.replies.reduce((replies, reply) => {
        replies += `
                ${this._messageMarkup(
          "admin",
          "",
          "",
          "",
          document.querySelector(".admin_img").querySelector("img").src,
          reply.reply,
          +reply.sent_at
        )}`;
        return replies;
      }, "")}`;
      return messages;
    }, "")}
          </ul>
        </div>
        <form class="reply">
          <textarea name="reply" class="reply__field"></textarea>
          <button class="send" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
      </div>`;
  }
  _messageMarkup(className, id, email, name, src, message, sentAt) {
    return `
      <li class="${className}" data-id="${id}" data-email="${email}" data-name="${name}">
        <img src="${src}" alt="avatar">
        <div>
          <p class="message">
            ${message}
          </p>
          <p class="sent__at">${Number.isFinite(sentAt) ? this.formatDate(sentAt) : sentAt
      }</p>
        </div>
      </li>`;
  }
  formatDate(timestamp) {
    const date = new Date(timestamp);
    const options = { hour: "numeric", minute: "numeric", hour12: true };
    const formatter = new Intl.DateTimeFormat("en-US", options);
    return formatter.format(date);
  }
  renderSentMessage(message) {
    const src = document.querySelector(".admin_img").querySelector("img").src;
    this._parentEl
      .querySelector(".convos")
      .insertAdjacentHTML(
        "beforeend",
        this._messageMarkup(
          "admin new",
          "",
          "",
          "",
          src,
          message,
          this._clockSpinnerMarkUp()
        )
    );
    Array.from(this._parentEl.querySelectorAll('.admin')).at(-1).scrollIntoView({ behavior: 'smooth' });
  }
  _clockSpinnerMarkUp() {
    return `
      <span class="clock">
        <span class="min"></span>
        <span class="sec"></span>
      </span>`;
  }
  removeLoader() {
    Array.from(this._parentEl.querySelectorAll('.admin')).at(-1).querySelector('.sent__at').innerHTML = this.formatDate(Date.now());
  }
}

export default new ChatView();
