import { sectionObserver } from "../util.js";
class SectionObserver {
  _sections = document.querySelectorAll(".reveal");
  constructor() {
    this._observeSections(this._sections);
  }
  _revealSection(entries, observer) {
    const [entry] = entries;
    entry.isIntersecting &&
      entry.target.classList.add("animate") &&
      observer.unobserve(entry.target);
  }
  _observeSections(sections) {
    sections.forEach((section) => {
      section.classList.add("section-hidden");
      sectionObserver(this._revealSection,0.2).observe(section);
    });
  }
}
export default new SectionObserver();
