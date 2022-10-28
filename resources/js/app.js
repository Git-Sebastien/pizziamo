import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



const burger = document.getElementById('burger');
const mainHeader = document.querySelector('#main-header')
const mainNav = document.querySelector('.main-nav')
const topNav = document.querySelector('#top-nav')

burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    // mainNav.classList.toggle('show')
    mainHeader.classList.toggle('show')
    topNav.style.display = "block";
});

console.log('hello')