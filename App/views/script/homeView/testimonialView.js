import { slide } from "../util.js";
class TestimonialView {
  #parentEl = document.querySelector(".testimonial-wrapper");
  #prevBtn = document.querySelector(".prev-btn");
  #nextBtn = document.querySelector(".next-btn");
  constructor() {
    this._addEventListeners();
  }
  _addEventListeners() {
    this.#nextBtn.addEventListener("click", this._slide.bind(this));
    this.#prevBtn.addEventListener("click", this._slide.bind(this));
  }
  _slide(e) {
    const testimonies = document.querySelectorAll(".testimonial-content");
    const testimony = document.querySelector(".testimonial-content");
    const contentWidth = Number.parseInt(getComputedStyle(testimony).width);
    slide(e, this.#parentEl, testimonies, contentWidth);
  }
  displayTestionials(reviews) {
    reviews.forEach((review) =>
      this.#parentEl.insertAdjacentHTML(
        "beforeend",
        this._generateMarkUp(review)
      )
    );
  }
  _generateMarkUp(review) {
    return `<div class="testimonial-content">
          <img src="${review.imgUrl}" alt="chef Henok">
          <p>"${review.review}"</p>
          <p>- ${review.title.slice(0,1).toUpperCase() + review.title.slice(1)} ${review.name} -</p>
      </div>`;
  }
}
export default new TestimonialView();
