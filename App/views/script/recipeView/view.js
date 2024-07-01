export default class View{
  render(data) {
    this._data = data;
    this._parentEl.innerHTML = this._generateHtml(); 
  }
  renderLoader() {
    this._parentEl.innerHTML = `<div class="load__wrap"><div class="loader"><div></div>`;
  }
  renderError(message = this._errorMessage) {
    this._parentEl.innerHTML = `
      <p class="err__message">
        <i class="icon__ fa-solid fa-triangle-exclamation"></i>
        ${message}
      </p>
      `;
  }
  renderMessage(message = this._message) {
    this._parentEl.innerHTML = `
    <p class="succ__message">
      <i class="icon__ fa-regular fa-face-smile"></i>
      ${message}
    </p>
    `;
  }
  update(recipe) {
    this._data = recipe;
    const newDOM = document.createRange().createContextualFragment(this._generateHtml());
    const newEls = newDOM.querySelectorAll('*');
    const currEls = this._parentEl.querySelectorAll('*');
    newEls.forEach((newEl, i) => {
      if (!newEl.isEqualNode(currEls[i]) && newEl.firstChild?.nodeValue?.trim() !== '')
        currEls[i].innerHTML = newEl.innerHTML;   
      if (!newEl.isEqualNode(currEls[i]))
        Array.from(newEl.attributes).forEach(attr => currEls[i].setAttribute(attr.name, attr.value));
    })
  }  
};
// localStorage.clear();