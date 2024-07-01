import View from "./view.js";

class PaginationView extends View{
  _parentEl = document.querySelector('.pagination');
  
  _generateHtml() {
    const currPage = this._data.page;
    const numPage = Math.ceil(this._data.results.length / this._data.resultsPerPage);
    const prevBtn = `
      <button class="pagination__btn btn__prev" data-goto="${currPage - 1}">
        <i class="fa-solid fa-arrow-left"></i><span>Page ${currPage - 1}</span>
      </button>
      `;
    const nextBtn = `
      <button class="pagination__btn btn__next" data-goto="${currPage + 1}">
        <i class="fa-solid fa-arrow-right"></i><span>Page ${currPage + 1}</span>
      </button>
    `;
    // at first Page;
    if (currPage === 1 && numPage > 1) {
      return nextBtn;
    }
    //at last page
    if (currPage === numPage && numPage > 1) {
      return prevBtn;
      }
    //at middle page
    if (currPage > 1) {
      return prevBtn + nextBtn;
    }
    //at first page no other results
    return '';
  }
  paginationHandler(handler) {
    this._parentEl.addEventListener('click', function (e) {
      const btn = e.target.closest('.pagination__btn');
      btn && handler(+btn.dataset.goto);
    });
  }
}
export default new PaginationView();