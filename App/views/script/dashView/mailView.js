class MailView{
  _parentEl = document.querySelector('.comment__detail');
  mailHandler(handler) {
    this._parentEl.addEventListener('submit', function (e) {
      const message = e.target.querySelector('textarea').value;
      const users = Array.from(e.target.closest(".comment__detail").querySelectorAll(".user"));
      const id = users.at(-1).dataset.id;
      const email = users.at(-1).dataset.email;
      const name = users.at(-1).dataset.name;
      if (!message) return;
      handler(message,id,email,name);
    }.bind(this));
  }
  clearText() {
    document.querySelector('.comments').querySelector('textarea').value = '';
  }
}
export default new MailView();