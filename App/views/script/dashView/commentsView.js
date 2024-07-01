import ChatView from "./chatView.js";
import ChatsView from "./chatsView.js";
import SearchView from "./searchView.js";
import MailView from "./mailView.js";

class CommentsView {
  _parentEl = document.querySelector(".comments");
  _chats = [];

  constructor() {
    SearchView.searchHandler(this.handleSearch, this);
  }
  renderChats(chats,flag) {
    this._chats = chats;
    if (flag) return;
    this._parentEl.querySelector(".no__chats").classList.add("hidden");
    ChatsView.displayChats(
      chats
        .map((chat) => chat)
        .sort((chat1, chat2) => chat2.last_active - chat1.last_active)
    );
    this.renderNotification();
  }
  renderNotification() {
    const unseen = this._chats.reduce((unseen, chat) => {
      unseen += chat.messages.reduce((acc, message) => {
        acc = !message.seen ? ++acc : acc;
        return acc;
      }, 0);
      return unseen;
    }, 0);
    this._parentEl.closest(".hero").querySelector(".unseen").textContent =
      unseen ? unseen : "";
  }
  handleChatSelection(handler) {
    ChatsView.chatSelectionHandler(handler);
  }
  renderSelectedChat(id) {
    document
      .querySelector(`li[data-id="${id}"`)
      .querySelector(".unseen__mess")
      .classList.add("unseen__zero");
    const chat = this._chats.find((chat) => chat.id === id);
    const img = this._parentEl
      .querySelector(`li[data-id="${id}"]`)
      .querySelector("img");
    ChatView.renderChat(chat, img.src);
  }
  handleSearch(name, that) {
    const chats = that._chats.filter((chat) =>
      chat.name.toLowerCase().includes(name.toLowerCase())
    );
    if (!chats.length) {
      ChatsView.renderError();
      return;
    }
    ChatsView.displayChats(chats, true);
  }
  handleMailing(handler) {
    MailView.mailHandler(handler);
  }
  renderNewMessage(message) {
    ChatView.renderSentMessage(message);
    MailView.clearText();
  }
  removeLoader() {
    ChatView.removeLoader();
  }
}

export default new CommentsView();
