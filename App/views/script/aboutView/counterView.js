import { sectionObserver } from "../util.js";

class CounterView {
  _parentEl = document.querySelector(".num_counting");
  _recipeCounter = document.querySelector(".num1");
  _chefsCounter = document.querySelector(".num2");
  _usersCounter = document.querySelector(".num3");

  constructor() {
    this._observeCounter();
  }

  _observeCounter() {
    sectionObserver(this._checkCounter.bind(this), 0.15).observe(
      this._parentEl
    );
  }
  _checkCounter(entries, observer) {
    const [entry] = entries;
    if (entry.isIntersecting) {
      this._startCounter();
      observer.unobserve(entry.target);
    }
  }
  _startCounter() {
    this._countRecipes();
    this._countChefs();
    this._countUsers();
  }
  _countRecipes() {
    this._counter(this._recipeCounter.dataset.max, this._recipeCounter);
  }
  _countUsers() {
    this._counter(
      (this.numUsers || +this._usersCounter.dataset.max) * 1000,
      this._usersCounter
    );
  }
  _countChefs() {
    this._counter(this._chefsCounter.dataset.max, this._chefsCounter);
  }
  _counter(max, el) {
    let currentCount = 0;
    const step = () => {
      el.textContent = currentCount + 100;
      if (currentCount < +max - 150) {
        currentCount += 150;
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  }

  setNumUsers(users) {
    this.numUsers = users;
  }
}

export default new CounterView();
