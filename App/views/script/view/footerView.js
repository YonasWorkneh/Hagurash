import { sectionObserver } from "../util.js";

class FooterView {
  _parentEl = document.querySelector(".footer__content");
  _proudcts = document.querySelector(".product");
  _resources = document.querySelector(".resources");
  _about = document.querySelector(".about");
  _community = document.querySelector(".community");
  _twitterIcon = this._parentEl.querySelector(".fa-twitter");
  _facebookIcon = this._parentEl.querySelector(".fa-facebook");
  _instagramIcon = this._parentEl.querySelector(".fa-instagram");
  constructor() {    
    this._observeFooter();
    this._hideElements();
  }
  _animateFooter(entries, observer) {
    const [entry] = entries;
    if (entry.isIntersecting) {
      this._animateLogo();
      this._animatedElementDisplay();
      observer.unobserve(entry.target);
    }
  }
  _hideElements() {
    this._community.classList.add("footer__hidden");
    this._proudcts.classList.add("footer__hidden");
    this._resources.classList.add("footer__hidden");
    this._about.classList.add("footer__hidden");
    this._instagramIcon.classList.add('icon__hidden');
    this._facebookIcon.classList.add('icon__hidden');
    this._twitterIcon.classList.add('icon__hidden');
  }
  _animatedElementDisplay() {
    const elements = [
      this._proudcts,
      this._resources,
      this._about,
      this._community,
      this._twitterIcon,
      this._facebookIcon,
      this._instagramIcon
    ];
    let index = 0;
    const timer = setInterval(function () {
      elements[index].classList.add("footer__visible");
      index++;
      if (index > 6) clearInterval(timer);
    }, 500);
  }
  _observeFooter() {
    sectionObserver(this._animateFooter.bind(this), 0.15).observe(
      this._parentEl
    );
  }
  _animateLogo() {
    const text = document.querySelector(".fancy");
    const textStr = text.textContent;
    const textSplitted = textStr.split("");
    text.innerHTML = "";
    textSplitted.forEach(
      (letter) => (text.innerHTML += `<span>${letter}</span`)
    );
    text
      .querySelectorAll("span")
      .forEach((span) => span.classList.add("f-dancing"));
    const spans = text.querySelectorAll("span");
    let index = 0;
    let timer;
    setTimeout(function () {
      timer = setInterval(onTick, 50);
    }, 500);
    const onTick = () => {
      spans[index].classList.add("animate__letter");
      index++;
      if (index === spans.length) {
        onComplete();
        return;
      }
    };
    const onComplete = () => {
      clearInterval(timer);
    };
  }
}
export default new FooterView();
