class Header {
  _parentEl = document.querySelector(".header");
  _logo = this._parentEl.querySelector(".logo");
  constructor() {
    this._setCountry();
  }
  goBackHandler(handler) {
    this._logo.addEventListener("mouseover", this._goBackToggle);
    this._logo.addEventListener("mouseout", this._goBackToggle);
    this._logo.addEventListener("click", handler);
  }
  getPlan(plan) {
    console.log(plan);
    this._plan = plan.includes('$') ? plan : `$${plan}`;
    this._displayPlan();
  }
  _displayPlan() {
    this._parentEl.querySelector("h1").textContent = `$${(+this._plan.slice(
      1
    )).toFixed(2)}`;
  }
  _goBackToggle() {
    this.querySelector("img").classList.toggle("hidden");
    this.querySelector(".back").classList.toggle("hidden");
  }
 
  async setCountryHandler(handler) {
    const country = await handler();
    this._setCountry(country);
  }
  _setCountry(country) {
    this._parentEl.closest("body").querySelector("select").value = country;
  }
}
// const cardNum = '1212 23a41 1213 0921';
// const bin = cardNum.replace(/\D/g, '');
// console.log(bin);
// const corsProxyUrl = 'https://cors-anywhere.herokuapp.com/';
// const url = `https://binlist.p.rapidapi.com/json/${bin}`;
// const options = {
// 	method: 'GET',
// 	headers: {
// 		'X-RapidAPI-Key': '34657b0608mshb957671e583f975p1f4869jsn9b51519add40',
// 		'X-RapidAPI-Host': 'binlist.p.rapidapi.com'
// 	}
// };

// try {

//   // const response = await fetch(`${corsProxyUrl}${url}`, options);
//   const response = await fetch(`https://api.bincodes.com/cc/?format=json&cc=${bin}`);
//   const result = await response.text();
//   console.log(result);
// } catch (error) {
// 	console.error(error);
// }

export default new Header();
