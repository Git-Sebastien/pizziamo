import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



const burger = document.getElementById('burger');
const mainHeader = document.querySelector('#main-header')
const topNav = document.querySelector('#top-nav')
const pizzaTitle = document.querySelectorAll('#pizza-title')
const pizza_li = document.querySelectorAll('#pizza-list')
const liTopNav = document.querySelectorAll("#top-nav > ul > li > a")
const arrow = document.querySelectorAll("#pizza-title > i")
const categoryPIzza = document.querySelector("#top-nav > ul > li.pizza-category")
const categoryPIzzaNav = document.querySelector("#top-nav > ul > li.pizza-category > ul")

categoryPIzza.addEventListener('click', () => {
    categoryPIzzaNav.classList.toggle('show')
    if (window.innerWidth <= 768) {
        mainHeader.classList.toggle('expends')
    }
})

if (window.innerWidth <= 768) {
    pizzaTitle.forEach((elementTitle, indexTitle) => {
        elementTitle.style.cursor = "pointer"
        elementTitle.addEventListener('click', () => {
            pizza_li.forEach((element, indexLi) => {
                if (indexTitle == indexLi)
                    element.classList.toggle('show')

            })
            arrow.forEach((elementIcone, elementIndex) => {
                if (elementIndex == indexTitle)
                    elementIcone.classList.toggle('up');

            })
        })
    })
}
liTopNav.forEach(element => {
    element.addEventListener('click', () => {
        console.log('hello')
        if (mainHeader.classList.contains('show')) {
            topNav.classList.remove('active')
            mainHeader.classList.remove('show')
            burger.classList.remove('active')
        }
    })
})

burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    // mainNav.classList.toggle('show')
    mainHeader.classList.toggle('show')
    topNav.style.display = "block";
});



const ratio = .4;

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