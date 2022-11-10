import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



const burger = document.getElementById('burger');
const mainHeader = document.querySelector('#main-header')
const topNav = document.querySelector('#top-nav')
const pizzaTitle = document.querySelectorAll('#pizza-title')
const pizza_li = document.querySelectorAll('#pizza-list')



console.log(window.innerWidth)
if (window.innerWidth <= 768) {
    pizzaTitle.forEach((elementTitle, indexTitle) => {
        elementTitle.style.cursor = "pointer"
        elementTitle.addEventListener('click', () => {
            pizza_li.forEach((element, indexLi) => {
                if (indexTitle == indexLi)
                    element.classList.toggle('show')
            })
        })
    })
}

burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    // mainNav.classList.toggle('show')
    mainHeader.classList.toggle('show')
    topNav.style.display = "block";
});



const ratio = .7;

const fade = document.querySelectorAll('.fade');
const slide = document.querySelectorAll('.slide')


let options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = (entries, observer) => {
    entries.forEach(function(entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('appear');
            observer.unobserve(entry.target)
        }
    });
}

const observer = new IntersectionObserver(handleIntersect, options);

fade.forEach(function(r) {
    observer.observe(r);
})

slide.forEach(function(r) {
    observer.observe(r);
})