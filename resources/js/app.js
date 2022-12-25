import './bootstrap';

import '../../node_modules/bootstrap/dist/js/bootstrap'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const burger = document.getElementById('burger');
const modalValidation = document.querySelector("body > div.modal-validation > div")
const btnDelete = document.querySelectorAll("#pizza-list > div > form > button")
const body = document.querySelector('.dashboard-body')
const asideLink = document.querySelectorAll('.dashboard-body aside a')
const mainNav = document.querySelector('#main-nav');
const main = document.querySelector('main')
const aside = document.querySelector('#aside');
const burgerDashboard = document.querySelector('#burger-dashboard')
const mainHeader = document.querySelector('#main-header')
const topNav = document.querySelector('#top-nav')
const pizzaTitle = document.querySelectorAll('.pizza-title')
const pizza_li = document.querySelectorAll('.pizza-list')
const arrow = document.querySelectorAll(".pizza-title > i")
const categoryPizza = document.querySelector("#top-nav > ul > li.pizza-category")
const menuCarte = document.querySelector("#top-nav > ul > li.menu-carte")
const menuCarteNav = document.querySelector("#top-nav > ul > li.menu-carte > ul")
const categoryPizzaNav = document.querySelector("#top-nav > ul > li.pizza-category > ul")
let arrayOfPizza = [categoryPizza, menuCarte];
let arrayOfMenu = [categoryPizzaNav, menuCarteNav]

btnDelete.forEach(element => {
    console.log(element.value)
    element.addEventListener('click', () => {
        modalValidation.style.display = "block"
        modalValidation.innerHTML = `Voulez-vous vraiment supprimer la ${element.value}`
    })
})

// 
arrayOfPizza.forEach((elementMenu, indexMenu) => {
    arrayOfMenu.forEach((elementSubMenu, indexSubMenu) => {
        if (elementMenu && elementSubMenu) {
            elementMenu.addEventListener('click', () => {
                if (indexMenu == indexSubMenu) {
                    elementSubMenu.classList.toggle('show')
                    if (window.innerWidth <= 768) {
                        mainHeader.classList.toggle('expends')
                    }
                } else {
                    elementSubMenu.classList.remove('show')
                }

                if (elementSubMenu.classList.contains('show') && !mainHeader.classList.contains('expends') && window.innerWidth <= 768) {
                    mainHeader.classList.toggle('expends')
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
        }
    })
})



if (window.innerWidth <= 768) {
    pizza_li.forEach((elementLi, indexLi) => {
        elementLi.addEventListener('click', () => {
            pizzaTitle.forEach((element, indexTitle) => {
                if (indexTitle == indexLi) {
                    elementLi.classList.toggle('show')
                }
            })
            arrow.forEach((elementArrow, indexArrow) => {
                if (indexArrow == indexLi)
                    elementArrow.classList.toggle('up')
            })
        })
    })
}

if (burger) {
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
}

if (burgerDashboard) {
    burgerDashboard.addEventListener('click', () => {
        burgerDashboard.classList.toggle('active')
        aside.classList.toggle('show')
        body.classList.toggle('background-black')
        main.style.backgroundColor = "transparent"
    })
}

asideLink.forEach(element => {
    element.addEventListener('click', () => {
        burgerDashboard.classList.remove('active')
        aside.classList.remove('show')
        body.classList.remove('background-black')

    })
})



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