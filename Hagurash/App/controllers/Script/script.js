'use strict'

//Selecting all the dom elements we are going to manipulate
const header = document.querySelector('.header-top');
const search = document.querySelectorAll('.search');
const searchBtn = document.querySelector('.searchh');
const overlay = document.querySelector('.overlay');
const form = document.querySelector('form');
const closeBtn = document.querySelector('.closeField');
const menuBtn = document.querySelector('.bx');
const menuClose = document.querySelector('.menu-close');
const navBar = document.querySelector('nav');
const searchhInput = document.getElementById('search2-input');
console.log(search);
console.log(searchhInput);

const inputField = document.getElementById('search-input');
const sectionHidden = document.querySelector('.section-hidden');
const images = document.querySelectorAll('img');
const testimonial = document.querySelector('.testimonial-section');

//loader display
setTimeout(() => {
  const loader = document.querySelector('.loader');
  loader.classList.add('loader-hidden');
}, 3000);


//default Img src if an img is not loaded
images.forEach(function (image) {
  image.addEventListener('error', function () {
    const defaultSrc = '../../Resources/Images/Logo.png';
    image.src = defaultSrc;
  })
}) 


//sticky navigation bar 
window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 0);
})
window.addEventListener('scroll', function () {
  if (window.scrollY > 2869) {
    testimonial.classList.remove('nv');
    testimonial.style.transform = 'translateY(0)';
  }
});

//attahcing event handler to both search icons one in the navigation bar and one in the button 
for (let i = 0; i < search.length; i++){
  search[i].addEventListener('click', function () {
    overlay.classList.remove('hidden');
    form.classList.remove('hidden');
  })
}

//closes the overlay along with the search form;
closeBtn.addEventListener('click', function () {
  overlay.classList.add('hidden');
  form.classList.add('hidden');
})
//open/close the menu to navigate to other pages
menuBtn.addEventListener('click', function () {
  menuClose.classList.remove('hidden');
  navBar.classList.remove('hidden');
})

menuClose.addEventListener('click', function () {
  menuClose.classList.add('hidden');
  navBar.classList.add('hidden');
});

//Testimonial Slider
const testimonialContainer = document.querySelector('.testimonial-wrapper');

const previous = document.querySelector('.prev-btn');
const next = document.querySelector('.next-btn');
next.addEventListener('click', function () {
 // console.log('yes');
 // console.log(testimonialContainer);
  const curr = testimonialContainer.style.transform;
  const trans = curr.slice(curr.indexOf('(')+1,curr.indexOf(')')-2);
  const index = Number(trans) - 300;
  //console.log(index);
  if (Math.abs(index) < 1800) {
    testimonialContainer.style.transform = `translateX(${index}px)`;  
  }
  else
    testimonialContainer.style.transform = 'translateX(0)';
})
previous.addEventListener('click', function () {
  console.log(testimonialContainer);
  const curr = testimonialContainer.style.transform;
  const trans = curr.slice(curr.indexOf('(') + 1, curr.indexOf(')') - 2);
  const index = Number(trans) + 300;
  if (index <= 0) {
    testimonialContainer.style.transform = `translateX(${index}px)`;
  }
});


//calling get meal list function when ever the search icon in the search input is clicked
searchBtn.addEventListener('click', getMealList);
function getMealList() {
  overlay.classList.add('hidden');
  form.classList.add('hidden');
  let searchInput = document.getElementById('search-input').value.trim();
  searchhInput.value = searchInput;
  inputField.value = '';
  searchResult.scrollIntoView({
    behaviour: 'smooth'
  });
}
//section observer for applying our animation as they scroll into the viewport
const sections = document.querySelectorAll('.reveal');
const revealSection = function (entries, observer) {
  const [entry] = entries;
  console.log(entry);
  if (entry.isIntersecting)
    entry.target.classList.add('animation');
}
const sectionObserver = new IntersectionObserver(revealSection, {
  root: null,
  threshold: 0.2,
});
sections.forEach(function (section) {
  section.classList.add('section-hidden');
  sectionObserver.observe(section);
});