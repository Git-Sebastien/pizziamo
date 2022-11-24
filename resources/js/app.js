import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



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
const linkCategoryPizza = document.querySelectorAll("#top-nav > ul > li.pizza-category > ul > li > a")
const linkMenuCarte = document.querySelectorAll("#top-nav > ul > li.menu-carte > ul > li > a")
let arrayOfPizza = [categoryPizza, menuCarte];
let arrayOfMenu = [categoryPizzaNav, menuCarteNav]
let arrayOfLink = [linkCategoryPizza, linkMenuCarte]
let headerStyleHeight = getComputedStyle(mainHeader)
let headerHeight = parseInt(headerStyleHeight.height.slice(0, 3))
let heightToAdd = 190
let totalHeight = headerHeight + heightToAdd
let heightToString = totalHeight.toString()

function checkNavState(header, navMenu) {
    if (window.innerWidth <= 768 && !header.classList.contains('expends')) {
        header.classList.toggle('expends')
        header.removeAttribute('style')
    } else if (window.innerWidth <= 768 && header.classList.contains('expends') && navMenu.classList.contains('show')) {
        header.style.height = heightToString + 'px'
        header.classList.remove('expends')
    } else if (window.innerWidth <= 768) {
        header.classList.toggle('expends')
    }
}

// Gerer les effets de la nav avec une boucle sur les elements

arrayOfPizza.forEach((element, indexLink) => {
    element.addEventListener('click', () => {
        arrayOfMenu.forEach((elementMenu, index) => {
            if (index == indexLink) {
                elementMenu.classList.toggle('show')
            }
        })
        checkNavState(mainHeader, categoryPizzaNav)
    })
})

arrayOfLink.forEach((elementLink, indexLink) => {
    elementLink.forEach((element) => {
            element.addEventListener('click', () => {
                topNav.classList.remove('active')
                mainHeader.classList.remove('show')
                burger.classList.remove('active')
            })


            // } else {
            //     mainHeader.classList.remove('expends')
            // }
        })
        // element.addEventListener('click', () => {
        //     if (mainHeader.classList.contains('show')) {
        //         topNav.classList.remove('active')
        //         mainHeader.classList.remove('show')
        //         burger.classList.remove('active')
        //     } else {
        //         mainHeader.classList.remove('expends')
        //     }
        // })
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
        })
    })
}

burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    mainHeader.classList.toggle('show')
    topNav.style.display = "block";
    mainHeader.classList.remove('expends')
    categoryPizzaNav.classList.remove('show')
    menuCarteNav.classList.remove('show')
    if (mainHeader.hasAttribute('style')) {
        mainHeader.removeAttribute('style')
    }
});



const ratio = .6;

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