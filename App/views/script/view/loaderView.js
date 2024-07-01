class Loader {
  _parentEl = document.querySelector("body");

  #markup = `<div class="load__wrap main-loader"><div class="loader"><div></div>`;
  
  render() {
    this._parentEl.insertAdjacentHTML('beforeend', this.#markup);
  }
  remove() {
    document.querySelector('.load__wrap')?.remove();
  }
}

export default new Loader();