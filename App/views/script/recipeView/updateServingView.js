import View from "./view.js";
class UpdateServingView extends View {
  _parentEl = document.querySelector('.recipe');
  ServingHandler(handler) {
    const that = this;
    this._parentEl.addEventListener('click', function (e) {
      const updateBtn = e.target.closest('.update__serving');
      const serving = that._parentEl.querySelector('.serving__amount');
      if (!updateBtn) return;
      const currServing = +serving.textContent;
      if (currServing < 1) return; 
      updateBtn.classList.contains('increment') ? handler(currServing + 1) : handler(currServing - 1);
    })
  }
}
export default new UpdateServingView();