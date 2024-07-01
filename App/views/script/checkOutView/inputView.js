import { wait } from "../util.js";
class InputView{
  _parentEl = document.querySelector('form');
  _comandKeys = ["Backspace", "Tab", "Enter", "Escape", 'ArrowLeft', 'ArrowRight', 'Space'];
  constructor() {
    this._formatInput();
  }
  _formatInput() {
    this._parentEl.querySelector('.card-num-input').addEventListener('keydown', (e) => {
      !this._regex(e.key) && !this._comandKeys.includes(e.key) && e.preventDefault();
      this._formatCardNum(e);
    });
    this._parentEl.querySelector('.date__input').addEventListener('keydown', (e) => {
      !this._regex(e.key) && !this._comandKeys.includes(e.key) && e.preventDefault();
      this._formatDate(e);
    })
  }
  async _formatCardNum(e) {
    await wait(1);
    const that = e.target;
    let length = that.value.split("").filter((x) => x !== " ").length;  
    if (!this._regex(e.key)) return;
    if (e.key === "Backspace") return;
    if (length > 14) return;
    if (length % 4 === 0 && length !== 0)
      that.value += '  ';
  }
  async _formatDate(e) {
    await wait(1);
    const that = e.target;
    let length = that.value.split("").filter((x) => x !== " ").length;
    if (!this._regex(e.key)) return;
    if (e.key === "Backspace") return;
    if(that.value.includes('/')) return;
    if ( length > 5)  return;
    if (length === 1 & that.value > 1) 
      that.value = `${that.value.padStart(2, 0)} / `;
    if (length === 2 & +that.value > 12) 
      that.value = `0${that.value.slice(0, 1)} / ${that.value.slice(1)}`;
    if (length % 2 === 0 && length !== 0 && !that.value.includes('/'))
      document.querySelector('.date__input').value += ' / ';    
  }
  _regex(str) {
    const regex = /\d/;
    return regex.test(str);
  }
}
export default new InputView();
