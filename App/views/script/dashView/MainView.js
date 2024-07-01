class MainView {
  _parentEl = document.querySelector('.main');
  _contents = document.querySelectorAll('.detail');

  constructor(){
    this._setUpdateTime();
  }

  showActiveContent(className) {
    this._contents.forEach(content => content.classList.add('hidden'));
    this._parentEl.querySelector(`.${className}`).classList.remove('hidden');
  }
  _setUpdateTime() {
    const date = new Date();
    this._parentEl.querySelector('.upd__hour').textContent = `${date.getHours()}:${date.getMinutes().toString().padStart(2,0)}`;
  }
}

export default new MainView();