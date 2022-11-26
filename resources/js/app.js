import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const cls = ["show", "expends"];
const burger = document.getElementById('burger');
const mainHeader = document.querySelector('#main-header')
const topNav = document.querySelector('#top-nav')
const pizzaTitle = document.querySelectorAll('#pizza-title')
const pizza_li = document.querySelectorAll('#pizza-list')
const arrow = document.querySelectorAll("#pizza-title > i")
const categoryPizza = document.querySelector("#top-nav > ul > li.pizza-category")
const menuCarte = document.querySelector("#top-nav > ul > li.menu-carte")
const menuCarteNav = document.querySelector("#top-nav > ul > li.menu-carte > ul")
const categoryPizzaNav = document.querySelector("#top-nav > ul > li.pizza-category > ul")
document.querySelector("#top-nav > ul > li.menu-carte > ul")
const linkCategoryPizza = document.querySelectorAll("#top-nav > ul > li.pizza-category > ul > li > a")
const linkMenuCarte = document.querySelectorAll("#top-nav > ul > li.menu-carte > ul > li > a")
let arrayOfPizza = [categoryPizza, menuCarte];
let arrayOfMenu = [categoryPizzaNav, menuCarteNav]
let arrayOfLink = [linkCategoryPizza, linkMenuCarte]
let headerStyleHeight = getComputedStyle(mainHeader)
let headerHeight = parseInt(headerStyleHeight.height.slice(0, 3))
let heightToAdd = 250
let isOpen = false
let totalHeight = headerHeight + heightToAdd
let heightToString = totalHeight.toString()
    // let menu = null


arrayOfPizza.forEach((elementMenu, indexMenu) => {
    arrayOfMenu.forEach((elementSubMenu, indexSubMenu) => {
        elementMenu.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                mainHeader.classList.add('expends')
            }

            if (indexMenu == indexSubMenu) {
                elementSubMenu.classList.toggle('show')
            } else {
                elementSubMenu.classList.remove('show')
            }
        })
        elementSubMenu.addEventListener('click', () => {
            topNav.classList.remove('d-block')
            mainHeader.classList.remove('show')
            burger.classList.remove('active')
            if (window.innerWidth <= 768) {
                mainHeader.style.height = "340px"
            }
        })
    })
})


if (window.innerWidth <= 768) {
    pizza_li.forEach((elementLi, indexLi) => {
        elementLi.addEventListener('click', () => {
            pizzaTitle.forEach((element, indexTitle) => {
                if (indexTitle == indexLi) {
                    elementLi.classList.toggle('show')
                    elementLi.style.cursor = "pointer"
                }
            })
            arrow.forEach((elementArrow, indexArrow) => {
                if (indexArrow == indexLi)
                    elementArrow.classList.toggle('up')
            })
        })
    })
}

burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    mainHeader.classList.toggle('show')
    topNav.classList.toggle('d-block')
    if (mainHeader.classList.contains('expends')) {
        mainHeader.classList.remove('expends')
    }
    if (mainHeader.hasAttribute('style')) {
        mainHeader.removeAttribute('style')
    }
    arrayOfMenu.forEach(element => {
        if (element.classList.contains('show')) {
            element.classList.remove('show')
        }
    })
});

const ratio = .7;

const fade = document.querySelectorAll('.fade');
const slide = document.querySelectorAll('.slide')


let options = {
    root: null,
    rootMargin: '',
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